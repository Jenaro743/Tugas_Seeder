<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Mahasiswa::query();
        
        // Search functionality
        if ($request->has('search') && $request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('npm', 'like', '%' . $search . '%')
                  ->orWhere('nidn', 'like', '%' . $search . '%');
        }
        
        // Pagination with 10 items per page
        $mahasiswas = $query->paginate(10);
        $search = $request->input('search', '');
        
        return view('mahasiswa.index', compact('mahasiswas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosens = Dosen::all();
        return view('mahasiswa.create', compact('dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'npm' => 'required|string|unique:mahasiswa|max:20',
            'nidn' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $dosens = Dosen::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nidn' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.show', $mahasiswa)->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * Show confirmation page before deleting.
     */
    public function confirmDelete(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.delete', compact('mahasiswa'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}
