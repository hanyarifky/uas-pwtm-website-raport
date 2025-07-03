<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Exports\RaportExport;
use Maatwebsite\Excel\Facades\Excel;

class RaportController extends Controller
{
    //

    public function index()
    {
        return view(
            'admin.raport.index',
            [
                'siswas' => Siswa::orderBy('nama', 'asc')->get()
            ]
        );
    }

    public function show(Siswa $siswa)
    {
        $totalNilai = 0;
        $totalMapel = 0;
        $nilai_rata = 0;
        $dataRaportSiswa = Nilai::with(['siswas', 'mata_pelajarans'])->where('siswa_id', $siswa->id)->get();
        foreach ($dataRaportSiswa as $nilai) {
            $totalNilai += $nilai->nilai_total;
            $totalMapel++;
        }
        $nilai_rata = $totalNilai / $totalMapel;
        // echo "Total Nilai = " . $totalNilai . "<br>";
        // echo "Nilai Rata-rata = " . $nilai_rata;

        return view(
            'admin.raport.show',
            [
                "siswa" => $siswa,
                "data_raport_siswa" => $dataRaportSiswa,
                "total_nilai" => $totalNilai,
                "nilai_rata" => $nilai_rata
            ]
        );
    }

    public function edit(Nilai $nilai)
    {
        return view('admin.raport.edit', [
            'nilai' => $nilai
        ]);
    }

    public function nilai(Request $request, Nilai $nilai)
    {
        // dd($request->all());

        $rulesData = [
            'pts_ganjil' => 'required|integer',
            'pts_genap' => 'required|integer',
            'uas' => 'required|integer',
            'ukk' => 'required|integer'
        ];

        $validateData = $request->validate($rulesData);

        if ($validateData) {
            $pts_ganjil = $validateData['pts_ganjil']; // Bobot 20%
            $pts_genap = $validateData['pts_genap']; // Bobot 20%
            $uas = $validateData['uas']; // Bobot 30%
            $ukk = $validateData['pts_ganjil']; // Bobot 30%
            $validateData['nilai_total'] = ($pts_ganjil * 0.20) + ($pts_genap * 0.20) + ($uas * 0.30) + ($ukk * 0.30);
        }


        try {
            Nilai::where('id', $nilai->id)->update($validateData);

            alert()->success('Update Sukses', 'Berhasil Mengupdate Data');
            return redirect()->route('raport.siswa', ['siswa' => $nilai->siswas->id]);
        } catch (\Exception $e) {
            return $e;
            alert()->error('Gagal', 'Gagal Mengupdate Data');
            return back()->withInput();
        }
    }

    public function export_excel(Siswa $siswa)
    {
        return Excel::download(new RaportExport($siswa), "raport_siswa.xlsx");
    }
}
