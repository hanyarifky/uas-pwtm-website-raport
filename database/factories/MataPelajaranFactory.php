<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataPelajaran>
 */
class MataPelajaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'kode_mata_pelajaran' => $this->faker->unique()->word . $this->faker->numberBetween(1, 100), // Contoh kode mata pelajaran
            'nama_mata_pelajaran' => $this->faker->word . ' ' . $this->faker->word, // Nama mata pelajaran
            'nilai_kkm' => $this->faker->numberBetween(60, 100), // Nilai KKM antara 60 sampai 100
            'jumlah_jam' => $this->faker->numberBetween(1, 6), // Jumlah jam pelajaran antara 1 sampai 6
        ];
    }
}
