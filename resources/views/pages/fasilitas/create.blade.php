@extends('layouts.admin.app')

@section('content')
    <div class="container mt-4">
        <h2>Tambah Fasilitas</h2>

        <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">

                    {{-- Input Nama --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fa-solid fa-signature me-1 text-primary"></i> Nama Fasilitas
                        </label>
                        <input type="text" name="nama" class="form-control"
                            value="{{ old('nama', $fasilitas->nama ?? '') }}" placeholder="Masukkan nama fasilitas"
                            required>
                    </div>

                    {{-- Input Jenis --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fa-solid fa-list me-1 text-primary"></i> Jenis
                        </label>
                        <input type="text" name="jenis" class="form-control"
                            value="{{ old('jenis', $fasilitas->jenis ?? '') }}" placeholder="Contoh: Lapangan, Gedung, Aula"
                            required>
                    </div>

                    {{-- Input Alamat --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fa-solid fa-location-dot me-1 text-primary"></i> Alamat
                        </label>
                        <input type="text" name="alamat" class="form-control"
                            value="{{ old('alamat', $fasilitas->alamat ?? '') }}" placeholder="Masukkan alamat fasilitas"
                            required>
                    </div>

                    {{-- Input RT dan RW --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">
                                <i class="fa-solid fa-house-user me-1 text-primary"></i> RT
                            </label>
                            <input type="text" name="rt" class="form-control"
                                value="{{ old('rt', $fasilitas->rt ?? '') }}" placeholder="RT" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">
                                <i class="fa-solid fa-house-user me-1 text-primary"></i> RW
                            </label>
                            <input type="text" name="rw" class="form-control"
                                value="{{ old('rw', $fasilitas->rw ?? '') }}" placeholder="RW" required>
                        </div>
                    </div>

                    {{-- Input Kapasitas --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fa-solid fa-users me-1 text-primary"></i> Kapasitas
                        </label>
                        <input type="number" name="kapasitas" class="form-control"
                            value="{{ old('kapasitas', $fasilitas->kapasitas ?? '') }}" placeholder="Masukkan kapasitas"
                            min="1" required>
                    </div>

                    {{-- Input Deskripsi --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fa-solid fa-align-left me-1 text-primary"></i> Deskripsi
                        </label>
                        <textarea name="deskripsi" rows="4" class="form-control" placeholder="Tulis deskripsi fasilitas...">{{ old('deskripsi', $fasilitas->deskripsi ?? '') }}</textarea>
                    </div>

                    {{-- Input Media --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fa-solid fa-image me-1 text-primary"></i> Upload Gambar / Media
                        </label>
                        <input type="file" name="media" class="form-control">

                        @if (!empty($fasilitas->media))
                            <div class="mt-2">
                                <p class="text-muted mb-1"><i class="fa-solid fa-eye me-1"></i>Preview:</p>
                                <img src="{{ asset('storage/media/' . $fasilitas->media) }}" width="120"
                                    class="rounded shadow-sm border">
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
