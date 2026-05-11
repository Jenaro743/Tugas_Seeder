<?php

namespace Database\Factories;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalFactory extends Factory
{
    protected $model = Jadwal::class;

    public function definition(): array
    {
        return [
            'kode_matakuliah' => null,
            'nidn' => null,
            'kelas' => fake()->randomElement(['A', 'B', 'C', 'D']),
            'hari' => fake()->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']),
            'jam' => fake()->dateTimeBetween('08:00:00', '17:00:00'),
        ];
    }
}