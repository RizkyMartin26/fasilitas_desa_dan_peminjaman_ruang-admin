@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Fasilitas Umum</h2>
    <a href="{{ route('fasilitas.create') }}" class="btn btn-primary mb-3">+ Tambah Fasilitas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Alamat</th>
                <th>Kapasitas</th>
                <th>Media</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->kapasitas }}</td>
                    <td>
                        @if($item->media)
                            <img src="{{ asset('storage/media/'.$item->media) }}" width="80">
                        @else -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('fasilitas.edit', $item->fasilitas_id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('fasilitas.destroy', $item->fasilitas_id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
