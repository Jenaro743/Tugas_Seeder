<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 text-slate-900">
    <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-rose-200 bg-white p-8 shadow-xl shadow-rose-200/60">
            <!-- Header -->
            <div class="mb-8">
                <div class="mb-4 flex items-center justify-center">
                    <svg class="h-16 w-16 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4v2m0 4v2M9 5h6M7 9h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V11a2 2 0 012-2z" />
                    </svg>
                </div>
                <p class="text-center text-sm font-semibold uppercase tracking-[0.24em] text-rose-600">Konfirmasi Penghapusan</p>
                <h1 class="mt-3 text-center text-3xl font-semibold tracking-tight text-slate-900">Hapus Data Mahasiswa?</h1>
                <p class="mt-4 text-center text-sm text-slate-600">Tindakan ini tidak dapat dibatalkan. Data mahasiswa dan semua informasi terkait akan dihapus secara permanen.</p>
            </div>

            <!-- Data Preview -->
            <div class="space-y-4 mb-8 p-5 bg-slate-50 rounded-xl border border-slate-200">
                <!-- NPM -->
                <div class="flex justify-between items-center">
                    <span class="text-sm font-semibold text-slate-600">NPM:</span>
                    <span class="text-lg font-semibold text-slate-900">{{ $mahasiswa->npm }}</span>
                </div>

                <!-- NIDN -->
                <div class="flex justify-between items-center">
                    <span class="text-sm font-semibold text-slate-600">NIDN:</span>
                    <span class="text-lg font-semibold text-slate-900">{{ $mahasiswa->nidn }}</span>
                </div>

                <!-- Nama -->
                <div class="flex justify-between items-center">
                    <span class="text-sm font-semibold text-slate-600">Nama:</span>
                    <span class="text-lg font-semibold text-slate-900">{{ $mahasiswa->nama }}</span>
                </div>
            </div>

            <!-- Warning Message -->
            <div class="mb-8 rounded-lg border border-amber-200 bg-amber-50 p-4">
                <div class="flex gap-3">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-amber-800">Perhatian!</p>
                        <p class="text-sm text-amber-700 mt-1">Data yang telah dihapus tidak dapat dipulihkan. Semua KRS dan informasi terkait juga akan dihapus.</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 pt-6 flex-col">
                <form 
                    action="{{ route('mahasiswa.destroy', $mahasiswa) }}" 
                    method="POST"
                    class="w-full"
                >
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        class="w-full rounded-lg bg-gradient-to-r from-rose-600 to-pink-600 px-6 py-2.5 font-semibold text-white shadow-lg shadow-rose-500/30 transition-all hover:shadow-xl hover:shadow-rose-500/40 hover:scale-105 active:scale-95"
                    >
                        Ya, Hapus Data Ini
                    </button>
                </form>
                <a 
                    href="{{ route('mahasiswa.show', $mahasiswa) }}" 
                    class="rounded-lg border border-slate-300 bg-white px-6 py-2.5 font-semibold text-slate-700 shadow-sm transition-all hover:bg-slate-50 hover:border-slate-400 text-center"
                >
                    Batal, Jangan Hapus
                </a>
            </div>
        </div>
    </div>
</body>
</html>
