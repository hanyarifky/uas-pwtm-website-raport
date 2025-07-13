<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Exports\RaportExport;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $totalNilaiRata = 0;
        $nilai_rata = 0;
        $dataRaportSiswa = Nilai::with(['siswas', 'mata_pelajarans'])->where('siswa_id', $siswa->id)->get();
        foreach ($dataRaportSiswa as $nilai) {
            $totalNilai += $nilai->nilai_total;
            $totalNilaiRata += $nilai->nilai_rata_rata;
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
                "total_nilai_rata" => $totalNilaiRata,
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
            'nilai_angka_pengetahuan' => 'required|integer|min:1|max:100',
            'deskripsi_pengetahuan' => 'required|string',
            'nilai_angka_keterampilan' => 'required|integer|min:1|max:100',
            'deskripsi_keterampilan' => 'required|string'
        ];

        $validateData = $request->validate($rulesData);

        if ($validateData) {
            $validateData['nilai_predikat_pengetahuan'] = $this->predikatNilai($validateData['nilai_angka_pengetahuan']);
            $validateData['nilai_predikat_keterampilan'] = $this->predikatNilai($validateData['nilai_angka_keterampilan']);
            $validateData['nilai_total'] = $validateData['nilai_angka_pengetahuan'] + $validateData['nilai_angka_keterampilan'];
            $validateData['nilai_rata_rata'] = $validateData['nilai_total'] / 2;
            $validateData['keterangan'] = ($nilai->mata_pelajarans->nilai_kkm < $validateData['nilai_angka_pengetahuan'] && $nilai->mata_pelajarans->nilai_kkm < $validateData['nilai_angka_keterampilan']) ? "Terpenuhi" : "Tidak Terpenuhi";

            // return $validateData;
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
        return Excel::download(new RaportExport($siswa), "raport_siswa_" . $siswa->nis . ".xlsx");
    }

    public function export_pdf(Siswa $siswa)
    {

        $totalNilai = 0;
        $totalMapel = 0;
        $nilai_rata = 0;
        $totalNilaiRata = 0;
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
                "nilai_rata" => $nilai_rata,
                "total_nilai_rata" => $totalNilaiRata,
            ]
        );
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->setPaper('A4', 'landscape')->stream("raport_siswa_" . $siswa->nis . ".pdf");
    }

    public function predikatNilai($nilai)
    {

        if ($nilai > 85) {
            return "A";
        } else if ($nilai <= 85 && $nilai > 75) {
            return "B";
        } else if ($nilai <= 75 && $nilai > 65) {
            return "C";
        } else {
            return "D";
        }
    }
}
