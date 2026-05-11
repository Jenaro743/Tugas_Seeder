<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 text-slate-900">
    <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:px-8">
        <!-- Success Message -->
        @if ($message = session('success'))
            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 shadow-sm">
                <div class="flex gap-3">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-green-800">{{ $message }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/60">
            <!-- Header -->
            <div class="mb-8">
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-cyan-600">Manajemen Mahasiswa</p>
                <h1 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900">Detail Mahasiswa</h1>
                <p class="mt-2 text-sm text-slate-500">Informasi lengkap tentang mahasiswa terpilih.</p>
            </div>

            <!-- Information Cards -->
            <div class="space-y-5 mb-8">
                <!-- NPM -->
                <div class="rounded-xl border border-slate-200 bg-gradient-to-br from-slate-50 to-white p-5">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">NPM</p>
                    <p class="mt-1.5 text-xl font-semibold text-slate-900">{{ $mahasiswa->npm }}</p>
                </div>

                <!-- NIDN -->
                <div class="rounded-xl border border-slate-200 bg-gradient-to-br from-slate-50 to-white p-5">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">NIDN</p>
                    <p class="mt-1.5 text-xl font-semibold text-slate-900">{{ $mahasiswa->nidn }}</p>
                </div>

                <!-- Nama -->
                <div class="rounded-xl border border-slate-200 bg-gradient-to-br from-slate-50 to-white p-5">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Nama Lengkap</p>
                    <p class="mt-1.5 text-xl font-semibold text-slate-900">{{ $mahasiswa->nama }}</p>
                </div>

                <!-- Waktu Pembuatan -->
                <div class="rounded-xl border border-slate-200 bg-gradient-to-br from-slate-50 to-white p-5">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Dibuat Pada</p>
                    <p class="mt-1.5 text-sm text-slate-700">{{ $mahasiswa->created_at->format('d F Y, H:i') }}</p>
                </div>

                <!-- Waktu Update -->
                <div class="rounded-xl border border-slate-200 bg-gradient-to-br from-slate-50 to-white p-5">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Terakhir Diperbarui</p>
                    <p class="mt-1.5 text-sm text-slate-700">{{ $mahasiswa->updated_at->format('d F Y, H:i') }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 flex-col">
                <div class="flex gap-3 flex-col sm:flex-row">
                    <a 
                        href="{{ route('mahasiswa.edit', $mahasiswa) }}" 
                        class="flex-1 rounded-lg bg-gradient-to-r from-violet-600 to-purple-600 px-6 py-2.5 font-semibold text-white shadow-lg shadow-violet-500/30 transition-all hover:shadow-xl hover:shadow-violet-500/40 hover:scale-105 active:scale-95 text-center"
                    >
                        Edit Data
                    </a>
                    <a 
                        href="{{ route('mahasiswa.confirmDelete', $mahasiswa) }}" 
                        class="flex-1 rounded-lg bg-gradient-to-r from-rose-600 to-pink-600 px-6 py-2.5 font-semibold text-white shadow-lg shadow-rose-500/30 transition-all hover:shadow-xl hover:shadow-rose-500/40 hover:scale-105 active:scale-95 text-center"
                    >
                        Hapus Data
                    </a>
                </div>
                <a 
                    href="{{ route('mahasiswa.index') }}" 
                    class="rounded-lg border border-slate-300 bg-white px-6 py-2.5 font-semibold text-slate-700 shadow-sm transition-all hover:bg-slate-50 hover:border-slate-400 text-center"
                >
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</body>
</html>
