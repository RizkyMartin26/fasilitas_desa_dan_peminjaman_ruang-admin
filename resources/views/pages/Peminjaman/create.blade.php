@extends('layouts.admin.app')

@section('content')
    <h3>Tambah Peminjaman Fasilitas</h3>

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        {{-- Warga --}}
        <label>Warga</label>
        <select name="warga_id" class="form-control mb-2" required>
            @foreach ($warga as $w)
                <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
            @endforeach
        </select>

        {{-- Fasilitas --}}
        <label>Fasilitas</label>
        <select name="fasilitas_id" class="form-control mb-2" required>
            @foreach ($fasilitas as $f)
                <option value="{{ $f->fasilitas_id }}">{{ $f->nama }}</option>
            @endforeach
        </select>

        {{-- Tanggal Pinjam --}}
        <label>Tanggal Pinjam</label>
        <input type="datetime-local" name="tgl_pinjam" class="form-control mb-2" required>

        {{-- Tanggal Kembali --}}
        <label>Tanggal Kembali</label>
        <input type="datetime-local" name="tgl_kembali" class="form-control mb-2" required>

        {{-- Tujuan --}}
        <label>Tujuan</label>
        <input type="text" name="tujuan" class="form-control mb-2" required>

        {{-- Total Biaya --}}
        <label>Total Biaya</label>
        <input type="number" name="total_biaya" class="form-control mb-2" required>

        {{-- Status --}}
        <label>Status</label>
        <select name="status" class="form-control mb-3" required>
            <option value="pending">Pending</option>
            <option value="setuju">Setuju</option>
            <option value="tolak">Tolak</option>
        </select>

        <div class="d-flex gap-2">
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                Kembali
            </a>

            <button type="submit" class="btn btn-success">
                Simpan
            </button>
        </div>

    </form>
@endsection
