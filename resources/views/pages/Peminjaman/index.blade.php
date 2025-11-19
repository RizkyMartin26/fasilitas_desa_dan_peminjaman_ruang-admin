@extends('layouts.admin.app')

@section('content')
<h3>Data Peminjaman Fasilitas</h3>

<a href="{{ route('admin.peminjaman.create') }}" class="btn btn-primary mb-3">Tambah</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Warga</th>
            <th>Fasilitas</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        @forelse ($data as $item)
            <tr>
                <td>{{ $item->warga->nama ?? '-' }}</td>
                <td>{{ $item->fasilitas->nama ?? '-' }}</td>
                <td>{{ $item->tgl_pinjam }}</td>
                <td>{{ $item->tgl_kembali ?? '-' }}</td>
                <td>{{ $item->status }}</td>

                <td>
                    <a href="{{ route('admin.peminjaman.edit', $item->peminjaman_id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.peminjaman.destroy', $item->peminjaman_id) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>

        @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
            </tr>
        @endforelse

    </tbody>
</table>
@endsection
