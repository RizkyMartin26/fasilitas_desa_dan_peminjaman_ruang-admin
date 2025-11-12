@extends('layouts.admin.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-semibold">
                <i class="fa-solid fa-user-pen me-2"></i> Edit Data Warga
            </h4>
            <a href="{{ route('warga.index') }}" class="btn btn-light btn-sm fw-semibold">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card-body bg-light p-4">
            <form action="{{ route('warga.update', $data->warga_id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-id-card me-1 text-primary"></i> No. KTP
                        </label>
                        <input type="text" name="no_ktp" class="form-control shadow-sm" value="{{ $data->no_ktp }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-signature me-1 text-primary"></i> Nama Lengkap
                        </label>
                        <input type="text" name="nama" class="form-control shadow-sm" value="{{ $data->nama }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-venus-mars me-1 text-primary"></i> Jenis Kelamin
                        </label>
                        <select name="jenis_kelamin" class="form-select shadow-sm" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-place-of-worship me-1 text-primary"></i> Agama
                        </label>
                        <input type="text" name="agama" class="form-control shadow-sm" value="{{ $data->agama }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-briefcase me-1 text-primary"></i> Pekerjaan
                        </label>
                        <input type="text" name="pekerjaan" class="form-control shadow-sm" value="{{ $data->pekerjaan }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-phone me-1 text-primary"></i> Nomor Telepon
                        </label>
                        <input type="text" name="telp" class="form-control shadow-sm" value="{{ $data->telp }}">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label fw-semibold text-secondary">
                            <i class="fa-solid fa-envelope me-1 text-primary"></i> Email
                        </label>
                        <input type="email" name="email" class="form-control shadow-sm" value="{{ $data->email }}">
                    </div>

                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-4 py-2 fw-semibold shadow-sm d-flex align-items-center">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Animasi & hover --}}
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
