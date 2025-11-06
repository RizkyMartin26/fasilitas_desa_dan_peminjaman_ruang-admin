@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Tambah Syarat Fasilitas</h2>

    <form action="{{ route('admin.syarat_fasilitas.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="fasilitas_id">Pilih Fasilitas</label>
            <select name="fasilitas_id" class="form-control @error('fasilitas_id') is-invalid @enderror" required>
                <option value="">-- Pilih Fasilitas --</option>
                @foreach($fasilitas as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_fasilitas }}</option>
                @endforeach
            </select>
            @error('fasilitas_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi Syarat</label>
            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.syarat_fasilitas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
