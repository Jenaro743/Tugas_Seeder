<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
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

        <div class="rounded-3xl border border-slate-200 bg-white/90 p-8 shadow-xl shadow-slate-200/60 backdrop-blur-xl">
            <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-cyan-600">Mahasiswa</p>
                    <h1 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900">Data Mahasiswa</h1>
                </div>
                <a 
                    href="{{ route('mahasiswa.create') }}"
                    class="rounded-lg bg-gradient-to-r from-lime-600 to-green-600 px-6 py-2.5 font-semibold text-white shadow-lg shadow-lime-500/30 transition-all hover:shadow-xl hover:shadow-lime-500/40 hover:scale-105 active:scale-95 text-center"
                >
                    Tambah Mahasiswa
                </a>
            </div>

            <!-- Search Form -->
            <div class="mb-6">
                <form method="GET" action="{{ route('mahasiswa.index') }}" class="flex gap-3">
                    <div class="flex-1">
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Cari berdasarkan nama, NPM, atau NIDN..." 
                            value="{{ $search }}"
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder-slate-400 shadow-sm transition-colors focus:border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/20"
                        >
                    </div>
                    <button 
                        type="submit"
                        class="rounded-lg bg-cyan-600 px-6 py-2.5 font-semibold text-white shadow-lg shadow-cyan-500/30 transition-all hover:shadow-xl hover:shadow-cyan-500/40 hover:scale-105 active:scale-95"
                    >
                        Cari
                    </button>
                    @if ($search)
                        <a 
                            href="{{ route('mahasiswa.index') }}"
                            class="rounded-lg bg-slate-200 px-6 py-2.5 font-semibold text-slate-700 shadow-sm transition-all hover:bg-slate-300 hover:scale-105 active:scale-95"
                        >
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-200">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-900 text-slate-100">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-[0.16em]">Nama</th>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-[0.16em]">NPM</th>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-[0.16em]">NIDN</th>
                            <th scope="col" class="px-6 py-4 text-center text-sm font-semibold uppercase tracking-[0.16em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-slate-50">
                        @forelse ($mahasiswas as $mahasiswa)
                            <tr class="border-b border-slate-200 bg-white hover:bg-slate-50">
                                <td class="px-6 py-4 whitespace-nowrap text-slate-900">{{ $mahasiswa->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-slate-700">{{ $mahasiswa->npm }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-slate-700">{{ $mahasiswa->nidn }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex gap-2 justify-center">
                                        <a 
                                            href="{{ route('mahasiswa.show', $mahasiswa) }}"
                                            class="inline-flex items-center rounded-md bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-indigo-700 hover:bg-indigo-100 transition-colors"
                                        >
                                            Lihat
                                        </a>
                                        <a 
                                            href="{{ route('mahasiswa.edit', $mahasiswa) }}"
                                            class="inline-flex items-center rounded-md bg-orange-50 px-3 py-1.5 text-xs font-semibold text-orange-700 hover:bg-orange-100 transition-colors"
                                        >
                                            Edit
                                        </a>
                                        <a 
                                            href="{{ route('mahasiswa.confirmDelete', $mahasiswa) }}"
                                            class="inline-flex items-center rounded-md bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-100 transition-colors"
                                        >
                                            Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-sm text-slate-500">Tidak ada data mahasiswa untuk ditampilkan. <a href="{{ route('mahasiswa.create') }}" class="font-semibold text-lime-600 hover:underline">Tambah sekarang</a></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination (Tailwind) -->
            <div class="mt-6">
                <nav class="flex justify-center" aria-label="Pagination">
                    {{ $mahasiswas->appends(request()->query())->links() }}
                </nav>
            </div>
        </div>
    </div>
</body>
</html>
