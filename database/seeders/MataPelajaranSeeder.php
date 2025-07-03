<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan mata pelajaran secara manual ke dalam tabel mata_pelajarans
        $mataPelajaran = [
            ['kode_mata_pelajaran' => 'MP01', 'nama_mata_pelajaran' => 'Pendidikan Agama', 'nilai_kkm' => 75, 'jumlah_jam' => 4],
            ['kode_mata_pelajaran' => 'MP02', 'nama_mata_pelajaran' => 'Pendidikan Pancasila dan Kewarganegaraan (PPKn)', 'nilai_kkm' => 75, 'jumlah_jam' => 4],
            ['kode_mata_pelajaran' => 'MP03', 'nama_mata_pelajaran' => 'Bahasa Indonesia', 'nilai_kkm' => 75, 'jumlah_jam' => 4],
            ['kode_mata_pelajaran' => 'MP04', 'nama_mata_pelajaran' => 'Matematika', 'nilai_kkm' => 75, 'jumlah_jam' => 4],
            ['kode_mata_pelajaran' => 'MP05', 'nama_mata_pelajaran' => 'Ilmu Pengetahuan Alam (IPA)', 'nilai_kkm' => 75, 'jumlah_jam' => 4],
            ['kode_mata_pelajaran' => 'MP06', 'nama_mata_pelajaran' => 'Ilmu Pengetahuan Sosial (IPS)', 'nilai_kkm' => 75, 'jumlah_jam' => 4],
            ['kode_mata_pelajaran' => 'MP07', 'nama_mata_pelajaran' => 'Seni Budaya', 'nilai_kkm' => 75, 'jumlah_jam' => 3],
            ['kode_mata_pelajaran' => 'MP08', 'nama_mata_pelajaran' => 'Penjasorkes', 'nilai_kkm' => 75, 'jumlah_jam' => 3],
            ['kode_mata_pelajaran' => 'MP09', 'nama_mata_pelajaran' => 'Prakarya', 'nilai_kkm' => 75, 'jumlah_jam' => 2],
        ];

        // Insert data mata pelajaran ke dalam tabel
        foreach ($mataPelajaran as $pelajaran) {
            MataPelajaran::create($pelajaran);
        }
    }
}
