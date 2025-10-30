@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-semibold">
                <i class="bi bi-geo-alt-fill me-2"></i>Edit Destinasi Wisata
            </h4>
            <a href="{{ route('destinasi.index') }}" class="btn btn-light btn-sm fw-semibold">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
        </div>

        <div class="card-body bg-light p-4">
            <form action="{{ route('destinasi.update', $data->destinasi_id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Nama</label>
                        <input type="text" name="nama" class="form-control shadow-sm" value="{{ $data->nama }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Kontak</label>
                        <input type="text" name="kontak" class="form-control shadow-sm" value="{{ $data->kontak }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold text-secondary">Alamat</label>
                        <input type="text" name="alamat" class="form-control shadow-sm" value="{{ $data->alamat }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-secondary">RT</label>
                        <input type="text" name="rt" class="form-control shadow-sm" value="{{ $data->rt }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-secondary">RW</label>
                        <input type="text" name="rw" class="form-control shadow-sm" value="{{ $data->rw }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-secondary">Jam Buka</label>
                        <input type="text" name="jam_buka" class="form-control shadow-sm" value="{{ $data->jam_buka }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold text-secondary">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control shadow-sm" rows="3">{{ $data->deskripsi }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Tiket (Rp)</label>
                        <input type="number" name="tiket" class="form-control shadow-sm" step="0.01" value="{{ $data->tiket }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Foto / Cover</label><br>
                        @if($data->media)
                            <img src="{{ asset('storage/' . $data->media) }}" width="100" class="mb-2 rounded shadow-sm border border-primary">
                        @else
                            <p class="text-muted fst-italic small">Belum ada foto diunggah.</p>
                        @endif
                        <input type="file" name="media" class="form-control shadow-sm mt-2">
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Optional Animation --}}
<style>
    .card {
        animation: fadeInUp 0.6s ease-in-out;
    }

    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .btn-primary:hover {
        background-color: #0d6efd;
        box-shadow: 0 0 15px rgba(13, 109, 253, 0.767);
        transform: translateY(-2px);
        transition: all 0.2s ease-in-out;
    }
</style>
@endsection
