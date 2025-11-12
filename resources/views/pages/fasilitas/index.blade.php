@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-semibold text-dark mb-0">
            <i class="fa-solid fa-building-circle-check me-2 text-primary"></i>
            Data Fasilitas Umum
        </h2>
        <a href="{{ route('fasilitas.create') }}" class="btn btn-primary shadow-sm">
            <i class="fa-solid fa-circle-plus me-1"></i> Tambah Fasilitas
        </a>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Card Tabel --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th><i class="fa-solid fa-signature me-1"></i>Nama</th>
                        <th><i class="fa-solid fa-tags me-1"></i>Jenis</th>
                        <th><i class="fa-solid fa-location-dot me-1"></i>Alamat</th>
                        <th><i class="fa-solid fa-users me-1"></i>Kapasitas</th>
                        <th><i class="fa-solid fa-image me-1"></i>Media</th>
                        <th><i class="fa-solid fa-gears me-1"></i>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td class="fw-semibold">{{ $item->nama }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td class="text-center">{{ $item->kapasitas }}</td>
                            <td class="text-center">
                                @if($item->media)
                                    <img src="{{ asset('storage/media/'.$item->media) }}"
                                         alt="Media {{ $item->nama }}" width="80"
                                         class="rounded-3 border shadow-sm">
                                @else
                                    <span class="text-muted">
                                        <i class="fa-regular fa-image me-1"></i>Tidak ada
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('fasilitas.edit', $item->fasilitas_id) }}"
                                   class="btn btn-sm btn-warning me-1 shadow-sm text-white">
                                    <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                </a>

                                <form action="{{ route('fasilitas.destroy', $item->fasilitas_id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger shadow-sm"
                                            onclick="return confirm('Yakin ingin menghapus fasilitas ini?')">
                                        <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center text-muted">
                            <td colspan="6" class="py-4">
                                <i class="fa-solid fa-circle-info me-2"></i>
                                Belum ada data fasilitas yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Tambahan style agar lebih elegan --}}
<style>
    .table th {
        font-weight: 600;
        vertical-align: middle;
    }

    .btn-warning {
        background-color: #f4b400;
        border: none;
    }

    .btn-warning:hover {
        background-color: #e2a200;
    }

    .btn-danger:hover {
        background-color: #d93025;
    }

    .table-hover tbody tr:hover {
        background-color: #f9f9f9;
        transition: 0.2s;
    }

    .card {
        animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
