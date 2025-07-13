<?php

namespace App\Exports;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RaportExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $siswa;

    public function __construct($siswa)
    {
        $this->siswa = $siswa;
    }

    public function view(): View
    {
        $totalNilai = 0;
        $totalMapel = 0;
        $nilai_rata = 0;
        $totalNilaiRata = 0;
        $dataRaportSiswa = Nilai::with(['siswas', 'mata_pelajarans'])->where('siswa_id', $this->siswa->id)->get();
        foreach ($dataRaportSiswa as $nilai) {
            $totalNilai += $nilai->nilai_total;
            $totalNilaiRata += $nilai->nilai_rata_rata;
            $totalMapel++;
        }
        $nilai_rata = $totalNilai / $totalMapel;
        // echo "Total Nilai = " . $totalNilai . "<br>";
        // echo "Nilai Rata-rata = " . $nilai_rata;

        return view(
            'admin.raport.table',
            [
                "siswa" => $this->siswa,
                "data_raport_siswa" => $dataRaportSiswa,
                "total_nilai" => $totalNilai,
                "nilai_rata" => $nilai_rata,
                "total_nilai_rata" => $totalNilaiRata
            ]
        );
    }
}
