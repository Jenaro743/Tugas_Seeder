<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 text-slate-900">
    <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/60">
            <!-- Header -->
            <div class="mb-8">
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-cyan-600">Manajemen Mahasiswa</p>
                <h1 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900">Edit Data Mahasiswa</h1>
                <p class="mt-2 text-sm text-slate-500">Perbarui informasi mahasiswa di bawah ini.</p>
            </div>

            <!-- Form -->
            <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- NPM Field (Read-only) -->
                <div>
                    <label for="npm" class="block text-sm font-semibold text-slate-700 mb-2">NPM (Nomor Pokok Mahasiswa)</label>
                    <input 
                        type="text" 
                        id="npm" 
                        value="{{ $mahasiswa->npm }}"
                        disabled
                        class="w-full rounded-lg border border-slate-300 bg-slate-100 px-4 py-2.5 text-slate-600 cursor-not-allowed"
                    />
                    <p class="mt-1.5 text-xs text-slate-500">NPM tidak dapat diubah.</p>
                </div>

                <!-- NIDN Field -->
                <div>
                    <label for="nidn" class="block text-sm font-semibold text-slate-700 mb-2">NIDN (Nomor Induk Dosen Nasional) <span class="text-red-500">*</span></label>
                    <select 
                        id="nidn" 
                        name="nidn"
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-slate-900 shadow-sm transition-colors focus:border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/20 @error('nidn') border-red-500 @enderror"
                    >
                        <option value="">-- Pilih Dosen --</option>
                        @foreach ($dosens as $dosen)
                            <option value="{{ $dosen->nidn }}" {{ old('nidn', $mahasiswa->nidn) == $dosen->nidn ? 'selected' : '' }}>
                                {{ $dosen->nama }} ({{ $dosen->nidn }})
                            </option>
                        @endforeach
                    </select>
                    @error('nidn')
                        <p class="mt-1.5 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Field -->
                <div>
                    <label for="nama" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        id="nama" 
                        name="nama"
                        value="{{ old('nama', $mahasiswa->nama) }}"
                        placeholder="Masukkan nama lengkap"
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder-slate-400 shadow-sm transition-colors focus:border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/20 @error('nama') border-red-500 @enderror"
                    />
                    @error('nama')
                        <p class="mt-1.5 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex gap-3 pt-6 flex-col">
                    <button 
                        type="submit" 
                        class="rounded-lg bg-gradient-to-r from-sky-600 to-cyan-600 px-6 py-2.5 font-semibold text-white shadow-lg shadow-sky-500/30 transition-all hover:shadow-xl hover:shadow-sky-500/40 hover:scale-105 active:scale-95"
                    >
                        Perbarui Data
                    </button>
                    <div class="flex gap-3 flex-col sm:flex-row">
                        <a 
                            href="{{ route('mahasiswa.show', $mahasiswa) }}" 
                            class="flex-1 rounded-lg border border-slate-300 bg-white px-6 py-2.5 font-semibold text-slate-700 shadow-sm transition-all hover:bg-slate-50 hover:border-slate-400 text-center"
                        >
                            Batal
                        </a>
                        <a 
                            href="{{ route('mahasiswa.confirmDelete', $mahasiswa) }}" 
                            class="flex-1 rounded-lg bg-gradient-to-r from-rose-600 to-pink-600 px-6 py-2.5 font-semibold text-white shadow-lg shadow-rose-500/30 transition-all hover:shadow-xl hover:shadow-rose-500/40 hover:scale-105 active:scale-95 text-center"
                        >
                            Hapus Data
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
