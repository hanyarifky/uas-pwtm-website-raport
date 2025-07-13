<?php

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Exports\RaportExport;
use App\Exports\SiswaSpesifikExport;
use App\Models\MataPelajaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\UserSiswaController;

// Cetak Raport
Route::get('/siswa/raport/excel', function () {
    $siswa = Siswa::find(Auth::user()->siswa_id);
    return Excel::download(new RaportExport($siswa), "raport_siswa_" . $siswa->nis . ".xlsx");
})->middleware('auth');

Route::get('/siswa/raport/pdf', function () {
    $totalNilai = 0;
    $totalMapel = 0;
    $nilai_rata = 0;
    $totalNilaiRata = 0;
    $siswa = Siswa::find(Auth::user()->siswa_id);
    $dataRaportSiswa = Nilai::with(['siswas', 'mata_pelajarans'])->where('siswa_id', $siswa->id)->get();
    foreach ($dataRaportSiswa as $nilai) {
        $totalNilai += $nilai->nilai_total;
        $totalNilaiRata += $nilai->nilai_rata_rata;
        $totalMapel++;
    }
    $nilai_rata = $totalNilai / $totalMapel;
    // echo "Total Nilai = " . $totalNilai . "<br>";
    // echo "Nilai Rata-rata = " . $nilai_rata;

    $pdf = Pdf::loadView(
        'pdf.raport-pdf',
        [
            "siswa" => $siswa,
            "data_raport_siswa" => $dataRaportSiswa,
            "total_nilai" => $totalNilai,
            "total_nilai_rata" => $totalNilaiRata,
            "nilai_rata" => $nilai_rata
        ]
    );
    $pdf->setOption('isRemoteEnabled', true);
    $pdf->setOption('isHtml5ParserEnabled', true);
    $pdf->setOption('isPhpEnabled', true);
    return $pdf->setPaper('A4', 'landscape')->stream("data-raport-" . $siswa->nis . ".pdf");
})->name('siswa.raport.pdf')->middleware('auth');

// Route Default
Route::get('/', function () {
    if (Auth::user()->role == "admin") {
        return redirect('/admin');
    } else {
        return redirect('/siswa');
    }
})->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//----- Dashboard Admin Route -----
// Route untuk halaman yang bisa diakses oleh admin (Guru)
// Index Dashboard
Route::get('/admin', function () {
    $totalSiswa = count(Siswa::all());
    $totalMapel = count(MataPelajaran::all());
    return view('admin.index', ['total_siswa' => $totalSiswa, 'total_mapel' => $totalMapel]);
})->name('index')->middleware(['auth', 'isAdmin']);

// Mata Pelajaran, Siswa
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Fitur Print untuk Siswa dan Mata Pelajaran
    Route::get('/admin/siswa/pdf', [SiswaController::class, 'export_pdf']);
    Route::get('/admin/mata-pelajaran/pdf', [MataPelajaranController::class, 'export_pdf']);
    Route::get('/admin/siswa/excel', [SiswaController::class, 'export_excel']);
    Route::get('/admin/siswa/{siswa}/excel', [SiswaController::class, 'export_excel_detail']);
    Route::get('/admin/mata-pelajaran/excel', [MataPelajaranController::class, 'export_excel']);

    // Fitur Siswa dan Mata Pelajaran
    Route::resource('/admin/mata-pelajaran', MataPelajaranController::class);
    Route::resource('/admin/siswa', SiswaController::class);
});

// Raport
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/raport', [RaportController::class, 'index']);
    Route::get('/admin/raport/siswa/{siswa}', [RaportController::class, 'show'])->name('raport.siswa');
    Route::get('/admin/raport/nilai/{nilai}/edit', [RaportController::class, 'edit'])->name('raport.nilai');
    Route::get('/admin/raport/siswa/{siswa}/excel', [RaportController::class, 'export_excel']);
    Route::put('/admin/raport/nilai/{nilai}/', [RaportController::class, 'nilai'])->name('raport.nilai.submit');
    Route::get('/admin/raport/siswa/{siswa}/pdf', [RaportController::class, 'export_pdf']);
});

// User
Route::middleware(['auth', 'isAdmin'])->group(function () {
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
// ----- End Dashboard Admin Route -----

// ----- Siswa Route -----
// Route untuk halaman yang bisa diakses oleh siswa/siswi

Route::middleware(['auth'])->group(function () {
    Route::get('/siswa', [UserSiswaController::class, 'index']);
    Route::get('/siswa/raport', [UserSiswaController::class, 'raport']);
    Route::get('/siswa/update-password', [UserSiswaController::class, 'edit_password']);
    Route::post('/siswa/update-password/{siswa}', [UserSiswaController::class, 'update_password']);
});

// ----- End Siswa Route -----

// ----- Cetak Siswa ------
// Fitur untuk mencetak/mengexport data-data siswa
Route::get('/siswa/{siswa}/excel', function (Siswa $siswa) {
    return Excel::download(new SiswaSpesifikExport($siswa), "raport_siswa_" . $siswa->nis . ".xlsx");
})->middleware('auth');

Route::get('/siswa/pdf', function () {
    $siswa = Siswa::find(Auth::user()->siswa_id);
    $pdf = Pdf::loadView('pdf.siswa-spesifik-pdf', ["siswa" =>  $siswa]);
    $pdf->setOption('isRemoteEnabled', true);
    $pdf->setOption('isHtml5ParserEnabled', true);
    $pdf->setOption('isPhpEnabled', true);
    return $pdf->setPaper('A4', 'landscape')->stream("data_siswa_" . $siswa->nis . ".pdf");
})->middleware('auth');

Route::get('/siswa/{siswa}/pdf', function (Siswa $siswa) {
    $pdf = Pdf::loadView('pdf.siswa-spesifik-pdf', ["siswa" =>  Siswa::find($siswa->id)]);
    $pdf->setOption('isRemoteEnabled', true);
    $pdf->setOption('isHtml5ParserEnabled', true);
    $pdf->setOption('isPhpEnabled', true);
    return $pdf->setPaper('A4', 'landscape')->stream("data_siswa_" . $siswa->nis . ".pdf");
})->middleware('auth');
