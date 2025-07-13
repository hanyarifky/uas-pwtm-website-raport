<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Exports\SiswaSpesifikExport;

class UserSiswaController extends Controller
{
    //

    public function index()
    {
        return view(
            'siswa.index',
            [
                'siswa' => Siswa::find(Auth::user()->siswa_id)
            ]
        );
    }

    public function raport()
    {

        $totalNilai = 0;
        $totalMapel = 0;
        $nilai_rata = 0;
        $totalNilaiRata = 0;
        $dataRaportSiswa = Nilai::with(['siswas', 'mata_pelajarans'])->where('siswa_id', Auth::user()->siswa_id)->get();
        foreach ($dataRaportSiswa as $nilai) {
            $totalNilai += $nilai->nilai_total;
            $totalNilaiRata += $nilai->nilai_rata_rata;
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
                "total_nilai_rata" => $totalNilaiRata,
                "nilai_rata" => $nilai_rata
            ]
        );
    }

    public function edit_password()
    {
        return view(
            'siswa.update_password',
            [
                'user' => Siswa::find(Auth::user()->siswa_id)
            ]
        );
    }

    public function update_password(Request $request)
    {
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
    }
}
