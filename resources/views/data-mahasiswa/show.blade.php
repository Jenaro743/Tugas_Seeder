@extends('layouts.app')

@section('content')
    <style>
        .detail-container {
            max-width: 600px;
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

        .detail-row {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e9ecef;
        }

        .detail-row:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #6c757d;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            min-width: 150px;
        }

        .detail-value {
            color: #212529;
            font-size: 1rem;
            flex: 1;
        }

        .badge-npm {
            font-family: monospace;
            font-size: 0.85rem;
            background-color: #f1f3f5;
            color: #495057;
            padding: 4px 10px;
            border-radius: 6px;
            display: inline-block;
        }

        .action-buttons {
            display: flex;
            gap: 0.75rem;
            margin-top: 2rem;
        }

        .btn-custom {
            padding: 0.625rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-edit {
            background-color: #3b82f6;
            color: white;
        }

        .btn-edit:hover {
            background-color: #2563eb;
            color: white;
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
        }

        .btn-back:hover {
            background-color: #5c636a;
            color: white;
        }

        .info-icon {
            width: 36px;
            height: 36px;
            background-color: #e0e7ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6366f1;
            margin-bottom: 1rem;
        }
    </style>

    <div class="detail-container">
        <div class="card">
            <div class="card-header">
                <h5>
                    <i class="bi bi-person-fill"></i> Detail Mahasiswa
                </h5>
            </div>

            <div class="card-body">
                <div class="info-icon">
                    <i class="bi bi-person" style="font-size: 1.5rem;"></i>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-tag"></i> NPM
                    </div>
                    <div class="detail-value">
                        <span class="badge-npm">{{ $mahasiswa->npm }}</span>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-person"></i> Nama
                    </div>
                    <div class="detail-value">
                        {{ $mahasiswa->nama }}
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-person-badge"></i> Dosen Pembimbing
                    </div>
                    <div class="detail-value">
                        {{ $mahasiswa->dosen->nama ?? 'Tidak Ada' }}
                        <br>
                        <small class="text-muted">NIDN: {{ $mahasiswa->dosen->nidn ?? '-' }}</small>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-calendar-event"></i> Dibuat
                    </div>
                    <div class="detail-value">
                        {{ $mahasiswa->created_at->format('d M Y H:i') }}
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-pencil"></i> Diperbarui
                    </div>
                    <div class="detail-value">
                        {{ $mahasiswa->updated_at->format('d M Y H:i') }}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <a href="{{ route('mahasiswa.edit', $mahasiswa->npm) }}" class="btn-custom btn-edit">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <a href="/mahasiswa" class="btn-custom btn-back">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
