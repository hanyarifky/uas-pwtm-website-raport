<?php

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Exports\RaportExport;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\MataPelajaranController;

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Dashboard Admin Route

// Index Dashboard
Route::get('/admin', function () {
    $totalSiswa = count(Siswa::all());
    $totalMapel = count(MataPelajaran::all());
    return view('admin.index', ['total_siswa' => $totalSiswa, 'total_mapel' => $totalMapel]);
})->name('index')->middleware('auth');

// Mata Pelajaran, Siswa
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/siswa/excel', [SiswaController::class, 'export_excel']);
    Route::get('/admin/siswa/{siswa}/excel', [SiswaController::class, 'export_excel_detail']);
    Route::get('/admin/mata-pelajaran/excel', [MataPelajaranController::class, 'export_excel']);
    Route::resource('/admin/mata-pelajaran', MataPelajaranController::class);
    Route::resource('/admin/siswa', SiswaController::class);
});

// Raport
Route::middleware('auth')->group(function () {
    Route::get('/admin/raport', [RaportController::class, 'index']);
    Route::get('/admin/raport/siswa/{siswa}', [RaportController::class, 'show'])->name('raport.siswa');
    Route::get('/admin/raport/nilai/{nilai}/edit', [RaportController::class, 'edit'])->name('raport.nilai');
    Route::get('/admin/raport/siswa/{siswa}/excel', [RaportController::class, 'export_excel']);
    Route::put('/admin/raport/nilai/{nilai}/', [RaportController::class, 'nilai']);
});

// User
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'show']);
    Route::get('/admin/kelola-user', [UserController::class, 'index']);
    Route::get('/admin/kelola-user/tambah-user', [UserController::class, 'create']);
    Route::get('/admin/kelola-user/tambah-user-siswa', [UserController::class, 'createSiswa']);
    Route::post('/admin/kelola-user/tambah-user', [UserController::class, 'store']);
    Route::post('/admin/kelola-user/tambah-user-siswa', [UserController::class, 'storeSiswa']);
    Route::get('/admin/kelola-user/{user}/edit', [UserController::class, 'edit']);
    Route::put('/admin/kelola-user/{user}/', [UserController::class, 'update']);
    Route::delete('/admin/kelola-user/{user}', [UserController::class, 'destroy']);

    Route::get('admin/kelola-user/ganti-password/{user}', [UserController::class, 'halamanGantiPassword']);
    Route::put('admin/kelola-user/ganti-password/{user}', [UserController::class, 'gantiPassword']);
});
// End Dashboard Admin Route

// Siswa Route
Route::get('/siswa', function () {
    return view(
        'siswa.index',
        [
            'siswa' => Siswa::find(Auth::user()->siswa_id)
        ]
    );
});

Route::get('/siswa/raport', function () {
    $totalNilai = 0;
    $totalMapel = 0;
    $nilai_rata = 0;
    $dataRaportSiswa = Nilai::with(['siswas', 'mata_pelajarans'])->where('siswa_id', Auth::user()->siswa_id)->get();
    foreach ($dataRaportSiswa as $nilai) {
        $totalNilai += $nilai->nilai_total;
        $totalMapel++;
    }
    $nilai_rata = $totalNilai / $totalMapel;
    // echo "Total Nilai = " . $totalNilai . "<br>";
    // echo "Nilai Rata-rata = " . $nilai_rata;

    return view(
        'siswa.raport',
        [
            "siswa" =>  Siswa::find(Auth::user()->siswa_id),
            "data_raport_siswa" => $dataRaportSiswa,
            "total_nilai" => $totalNilai,
            "nilai_rata" => $nilai_rata
        ]
    );
});

Route::get('/siswa/update-password', function () {
    return view(
        'siswa.update_password',
        [
            'user' => Siswa::find(Auth::user()->siswa_id)
        ]
    );
});

Route::post('/siswa/update-password/{siswa}', function (Request $request) {
    // dd($request->all());

    // Cek Password Lama
    if (!Hash::check($request->password_lama, Auth::user()->password)) {
        alert()->error('Password Lama Salah', 'Password lama anda salah');
        return back()->withInput();
    }

    // Cek Repeat Password
    if ($request->password != $request->repeat_password) {
        alert()->error('Repeat Password Salah', 'Password dan Repeat Password tidak sama');
        return back()->withInput();
    }

    $user = Auth::user();
    $user->update([
        'password' => Hash::make($request->password)
    ]);

    alert()->success('Ganti Password Berhasil', 'Berhasil Ganti Password');
    return redirect('/siswa');
});

Route::get('/siswa/raport/excel', function () {
    $siswa = Siswa::find(Auth::user()->siswa_id);
    return Excel::download(new RaportExport($siswa), "raport_siswa.xlsx");
});
