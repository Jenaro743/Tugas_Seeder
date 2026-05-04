@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .badge-label {
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .stat-card {
            border: 1px solid #e9ecef;
            border-radius: 10px;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 500;
            line-height: 1;
        }

        .table-card {
            border: 1px solid #e9ecef;
            border-radius: 12px;
            overflow: hidden;
        }

        .table thead th {
            background-color: #f1f3f5;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #868e96;
            border-bottom: 1px solid #dee2e6;
            padding: 0.75rem 1.25rem;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 0.9rem 1.25rem;
            vertical-align: middle;
            border-color: #f1f3f5;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .npm-badge {
            font-family: monospace;
            font-size: 0.8rem;
            background-color: #f1f3f5;
            color: #495057;
            padding: 3px 8px;
            border-radius: 6px;
        }

        .mk-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .mk-list li {
            font-size: 0.83rem;
            color: #495057;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .mk-list li::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background-color: #a5b4fc;
            flex-shrink: 0;
        }

        .table-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
            font-size: 0.8rem;
            color: #868e96;
            padding: 0.65rem 1.25rem;
        }

        .no-col {
            width: 48px;
            text-align: center;
            color: #adb5bd;
            font-size: 0.8rem;
        }

        .action-buttons {
            display: flex;
            flex-direction: row;
            gap: 0.5rem;
            /* flex-wrap: wrap; */
        }

        .btn-sm-custom {
            padding: 0.375rem 0.75rem;
            font-size: 0.8rem;
            border-radius: 4px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: all 0.2s ease;
        }

        .btn-edit {
            background-color: #3b82f6;
            color: white;
            border: none;
        }

        .btn-edit:hover {
            background-color: #2563eb;
            color: white;
        }

        .btn-view {
            background-color: #10b981;
            color: white;
            border: none;
        }

        .btn-view:hover {
            background-color: #059669;
            color: white;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .btn-tambah {
            background-color: #6366f1;
            color: white;
            padding: 0.625rem 1.25rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
        }

        .btn-tambah:hover {
            background-color: #4f46e5;
            color: white;
        }

        .page-title {
            font-size: 1.875rem;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
        }
    </style>

    <div class="container py-5">
        {{-- Page header --}}
        <div class="header-section">
            <div>
                <h1 class="page-title">Data Mahasiswa</h1>
            </div>
            <a href="{{ route('mahasiswa.create') }}" class="btn-tambah">
                <i class="bi bi-plus-circle"></i> Tambah Mahasiswa
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Table --}}
        <div class="table-card bg-white">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="no-col">No</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Dosen Pembimbing</th>
                            <th style="width: 140px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mahasiswa as $mhs)
                            <tr>
                                <td class="no-col">{{ $loop->iteration }}</td>
                                <td>
                                    <span class="npm-badge">{{ $mhs->npm }}</span>
                                </td>
                                <td>
                                    <span class="fw-medium" style="font-size: 0.9rem;">{{ $mhs->nama }}</span>
                                </td>
                                <td>
                                    <ul class="mk-list">
                                        <li>
                                            {{ $mhs->dosen->nama ?? 'Dosen Tidak Ditemukan' }}
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('mahasiswa.show', $mhs->npm) }}" class="btn-sm-custom btn-view"
                                            title="Lihat Detail">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        <a href="{{ route('mahasiswa.edit', $mhs->npm) }}" class="btn-sm-custom btn-edit"
                                            title="Edit">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted fst-italic py-5">
                                    <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                                    Tidak ada data mahasiswa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
