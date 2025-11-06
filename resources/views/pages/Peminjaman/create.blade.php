@extends('layouts.admin')

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

        <button class="btn btn-success mt-3">Simpan</button>
    </form>
@endsection
