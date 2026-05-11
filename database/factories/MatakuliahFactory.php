<?php

namespace Database\Factories;

use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatakuliahFactory extends Factory
{
    protected $model = Matakuliah::class;

    public function definition(): array
    {
        return [
            'kode_matakuliah' => fake()->unique()->bothify('???#####'),
            'nama_matakuliah' => fake()->randomElement([
                'Algoritma dan Pemrograman',
                'Basis Data',
                'Jaringan Komputer',
                'Sistem Operasi',
                'Pemrograman Web',
                'Kecerdasan Buatan',
                'Rekayasa Perangkat Lunak',
                'Matematika Diskrit',
                'Statistika Dasar',
                'Struktur Data',
                'Pemrograman Lanjut',
                'Web Service',
                'Mobile Programming',
                'Cloud Computing',
                'Big Data Analytics',
            ]),
            'sks' => fake()->numberBetween(2, 4),
        ];
    }
}