<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'userid' => 'rifky123',
            'nama' => "Muhammad Rifky Ramadhani",
            'email' => 'rifkydoang2014@gmail.com',
            'nomor_telepon' => '088212461825',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        // Siswa::factory()->count(2)->create();
        $this->call(MataPelajaranSeeder::class);
    }
}
