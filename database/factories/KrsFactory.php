<?php

namespace Database\Factories;

use App\Models\Krs;
use Illuminate\Database\Eloquent\Factories\Factory;

class KrsFactory extends Factory
{
    protected $model = Krs::class;

    public function definition(): array
    {
        return [
            'npm' => null,
            'kode_matakuliah' => null,
        ];
    }
}