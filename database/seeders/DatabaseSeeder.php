<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat data dalam urutan yang diperlukan oleh foreign key
        Dosen::factory()->count(10)->create();
        Matakuliah::factory()->count(10)->create();
        Mahasiswa::factory()->count(50)->create();
    }
}
