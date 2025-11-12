@extends('layouts.admin.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-semibold">
                <i class="fa-solid fa-pen-to-square me-2"></i> Edit Fasilitas Umum
            </h4>
            <a href="{{ route('fasilitas.index') }}" class="btn btn-light btn-sm fw-semibold">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card-body bg-light p-4">
            <form action="{{ route('fasilitas.update', $item->fasilitas_id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="row g-3">
                    {{-- Nama Fasilitas --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-signature me-1 text-primary"></i> Nama Fasilitas
                        </label>
                        <input type="text" name="nama" class="form-control shadow-sm" value="{{ $item->nama }}" required>
                    </div>

                    {{-- Jenis --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-list-ul me-1 text-primary"></i> Jenis
                        </label>
                        <input type="text" name="jenis" class="form-control shadow-sm" value="{{ $item->jenis }}" required>
                    </div>

                    {{-- Alamat --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-location-dot me-1 text-primary"></i> Alamat
                        </label>
                        <input type="text" name="alamat" class="form-control shadow-sm" value="{{ $item->alamat }}" required>
                    </div>

                    {{-- Kapasitas --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-users me-1 text-primary"></i> Kapasitas
                        </label>
                        <input type="number" name="kapasitas" class="form-control shadow-sm" value="{{ $item->kapasitas }}" required>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-align-left me-1 text-primary"></i> Deskripsi
                        </label>
                        <textarea name="deskripsi" class="form-control shadow-sm" rows="3" placeholder="Tuliskan deskripsi fasilitas...">{{ $item->deskripsi }}</textarea>
                    </div>

                    {{-- Media --}}
                    <div class="col-md-12">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-image me-1 text-primary"></i> Foto / Media
                        </label><br>
                        @if($item->media)
                            <img src="{{ asset('storage/media/'.$item->media) }}" width="120" class="mb-2 rounded shadow-sm border border-primary">
                        @else
                            <p class="text-muted fst-italic small">Belum ada foto diunggah.</p>
                        @endif
                        <input type="file" name="media" class="form-control shadow-sm mt-2">
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-4 py-2 fw-semibold shadow-sm d-flex align-items-center">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Efek Animasi dan Hover --}}
<style>
    .card {
        animation: fadeInUp 0.6s ease-in-out;
    }

    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .btn-success:hover {
        background-color: #198754;
        box-shadow: 0 0 15px rgba(25, 135, 84, 0.6);
        transform: translateY(-2px);
        transition: all 0.2s ease-in-out;
    }
</style>
@endsection
