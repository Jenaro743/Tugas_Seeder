@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 500px;
            margin: 40px auto;
        }

        .card {
            border: 1px solid #e9ecef;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background-color: #f1f3f5;
            border-bottom: 1px solid #dee2e6;
            padding: 1.5rem;
        }

        .card-header h5 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
            color: #212529;
        }

        .card-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .form-control,
        .form-select {
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 0.625rem 0.875rem;
            font-size: 0.95rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #a5b4fc;
            box-shadow: 0 0 0 3px rgba(165, 180, 252, 0.1);
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        .btn-group-custom {
            display: flex;
            gap: 0.75rem;
            margin-top: 2rem;
        }

        .btn-primary {
            background-color: #6366f1;
            border-color: #6366f1;
            border-radius: 6px;
            padding: 0.625rem 1.5rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            border-radius: 6px;
            padding: 0.625rem 1.5rem;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background-color: #5c636a;
            border-color: #5c636a;
        }

        .invalid-feedback {
            display: block;
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .form-control.is-invalid {
            border-color: #dc2626;
        }

        .alert-danger {
            background-color: #fee2e2;
            border-color: #fecaca;
            color: #991b1b;
            border-radius: 6px;
            margin-bottom: 1.5rem;
        }

        .field-note {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 0.25rem;
        }
    </style>

    <div class="form-container">
        <div class="card">
            <div class="card-header">
                <h5>
                    <i class="bi bi-{{ isset($mahasiswa) ? 'pencil-square' : 'plus-circle' }}"></i>
                    {{ isset($mahasiswa) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa Baru' }}
                </h5>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Terjadi kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form
                    action="{{ isset($mahasiswa) ? route('mahasiswa.update', $mahasiswa->npm) : route('mahasiswa.store') }}"
                    method="POST" novalidate>
                    @csrf
                    @if (isset($mahasiswa))
                        @method('PUT')
                    @endif

                    @if (!isset($mahasiswa))
                        <div class="mb-3">
                            <label for="npm" class="form-label">
                                <i class="bi bi-tag"></i> NPM
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('npm') is-invalid @enderror" id="npm"
                                name="npm" value="{{ old('npm') }}" placeholder="Masukkan NPM" required>
                            <div class="field-note">NPM tidak dapat diubah setelah dibuat</div>
                            @error('npm')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @else
                        <div class="mb-3">
                            <label for="npm" class="form-label">
                                <i class="bi bi-tag"></i> NPM
                            </label>
                            <input type="text" class="form-control" id="npm" value="{{ $mahasiswa->npm }}"
                                disabled>
                            <div class="field-note">NPM tidak dapat diubah</div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="nama" class="form-label">
                            <i class="bi bi-person"></i> Nama
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama', isset($mahasiswa) ? $mahasiswa->nama : '') }}"
                            placeholder="Masukkan nama lengkap" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nidn" class="form-label">
                            <i class="bi bi-person-badge"></i> Dosen Pembimbing
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('nidn') is-invalid @enderror" id="nidn" name="nidn"
                            required>
                            <option value="">-- Pilih Dosen Pembimbing --</option>
                            @forelse($dosens as $dosen)
                                <option value="{{ $dosen->nidn }}"
                                    {{ old('nidn', isset($mahasiswa) ? $mahasiswa->nidn : '') === $dosen->nidn ? 'selected' : '' }}>
                                    {{ $dosen->nama }} ({{ $dosen->nidn }})
                                </option>
                            @empty
                                <option disabled>Tidak ada dosen tersedia</option>
                            @endforelse
                        </select>
                        @error('nidn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="btn-group-custom">
                        <button type="submit" class="btn btn-primary flex-grow-1">
                            <i class="bi bi-check-circle"></i>
                            {{ isset($mahasiswa) ? 'Perbarui' : 'Simpan' }}
                        </button>
                        <a href="/mahasiswa" class="btn btn-secondary flex-grow-1">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
