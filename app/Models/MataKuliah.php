<?php

namespace App\Models;

use Database\Factories\MatakuliahFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    /** @use HasFactory<MatakuliahFactory> */
    use HasFactory;

    protected $table = 'matakuliah';
    protected $primaryKey = 'kode_matakuliah';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['kode_matakuliah', 'nama_matakuliah', 'sks'];
}