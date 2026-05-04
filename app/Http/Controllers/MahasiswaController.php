<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Dosen;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with(['dosen', 'krs.mataKuliah'])->get();
        return view('data-mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $dosens = Dosen::all();
        return view('data-mahasiswa.form-mhs', compact('dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:mahasiswa,npm',
            'nama' => 'required',
            'nidn' => 'required|exists:dosen,nidn',
        ]);

        Mahasiswa::create($request->all());

        return redirect('/mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('data-mahasiswa.show', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dosens = Dosen::all();
        return view('data-mahasiswa.form-mhs', compact('mahasiswa', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nidn' => 'required|exists:dosen,nidn',
        ]);

        $mahasiswa->update($request->only('nama', 'nidn'));

        return redirect('/mahasiswa')->with('success', 'Mahasiswa berhasil diperbarui!');
    }
}
