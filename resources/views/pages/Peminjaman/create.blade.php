@extends('layouts.admin.app')

@section('content')
    <h3>Tambah Peminjaman Fasilitas</h3>

    <form action="{{ route('admin.peminjaman.store') }}" method="POST">
        @csrf

        <label>Warga</label>
        <select name="warga_id" class="form-control">
            @foreach ($warga as $w)
                <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
            @endforeach
        </select>

        <label>Fasilitas</label>
        <select name="fasilitas_id" class="form-control">
            @foreach ($fasilitas as $f)
                <option value="{{ $f->fasilitas_id }}">{{ $f->nama }}</option>
            @endforeach
        </select>

        <label>Tanggal Pinjam</label>
        <input type="datetime-local" name="tgl_pinjam" class="form-control">

        <label>Tanggal Kembali</label>
        <input type="datetime-local" name="tgl_kembali" class="form-control">

        <label>Tujuan</label>
        <input type="text" name="tujuan" class="form-control">

        <label>Total Biaya</label>
        <input type="number" name="total_biaya" class="form-control">

        <label>Status</label>
        <select name="status" class="form-control">
            <option value="pending">Pending</option>
            <option value="setuju">Setuju</option>
            <option value="tolak">Tolak</option>
        </select>

        <button class="btn btn-success mt-3">Simpan</button>
    </form>
@endsection
