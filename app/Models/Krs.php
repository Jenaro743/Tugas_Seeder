<?php

namespace App\Models;

use Database\Factories\KrsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    /** @use HasFactory<KrsFactory> */
    use HasFactory;

    protected $table = 'krs';
    protected $fillable = ['npm', 'kode_matakuliah'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'npm', 'npm');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_matakuliah', 'kode_matakuliah');
    }
}