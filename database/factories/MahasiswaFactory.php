<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    protected $model = Mahasiswa::class;

    public function definition(): array
    {
        return [
            'npm' => fake()->unique()->numerify('##########'),
            'nidn' => Dosen::pluck('nidn')->random(),
            'nama' => fake()->name(),
        ];
    }
}