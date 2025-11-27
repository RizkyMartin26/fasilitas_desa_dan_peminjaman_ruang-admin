@extends('layouts.admin.app')

@section('content')
    <style>
        body {
            background: #f8fafc;
        }

        .card-fasilitas {
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(13, 60, 97, 0.1);
            overflow: hidden;
        }

        .card-header-blue {
            background: linear-gradient(90deg, #0d6efd 0%, #2b8cff 100%);
            color: #fff;
            border-bottom: 0;
            padding: 20px 24px;
        }

        .card-header-blue h4 {
            font-weight: 600;
            margin-bottom: 2px;
        }

        .btn-add {
            background: #ffffff;
            color: #0d6efd;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .btn-add:hover {
            background: #e9f2ff;
            transform: scale(1.03);
        }

        .table-custom thead th {
            background: rgba(13, 110, 253, 0.08);
            color: #084298;
            font-weight: 600;
            border-top: none;
        }

        .table-hover tbody tr:hover {
            background: rgba(13, 110, 253, 0.05);
        }

        .empty-state {
            color: #6c757d;
        }

        .table img {
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .page-link {
            color: #0d6efd;
        }
    </style>

    <div class="container mt-5">
        <div class="card card-fasilitas">

            {{-- HEADER BIRU --}}
            <div class="card-header-blue d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h4><i class="fa-solid fa-building-circle-check"></i> Data Fasilitas Umum</h4>
                    <small>Kelola data fasilitas dengan mudah dan cepat</small>
                </div>

                {{-- Tombol Tambah --}}
                <a href="{{ route('fasilitas.create') }}" class="btn btn-add btn-sm mt-2 mt-md-0">
                    <i class="fa-solid fa-circle-plus"></i> Tambah Fasilitas
                </a>
            </div>


            <div class="card-body">

                {{-- FORM FILTER + SEARCH --}}
                <form method="GET" action="{{ route('fasilitas.index') }}" class="mb-4">
                    <div class="row g-2 align-items-center">

                        {{-- Filter Jenis --}}
                        <div class="col-12 col-md-3">
                            <select name="jenis" class="form-select form-select-sm" onchange="this.form.submit()">
                                <option value="">Semua Jenis</option>

                                @php
                                    $availableJenis = ['Pendidikan', 'Kesehatan', 'Ibadah', 'Pemerintahan', 'Sosial'];
                                    $currentJenis = request('jenis');
                                @endphp

                                @foreach ($availableJenis as $j)
                                    <option value="{{ $j }}" {{ $currentJenis == $j ? 'selected' : '' }}>
                                        {{ $j }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Search --}}
                        <div class="col-12 col-md-4">
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                    placeholder="Cari nama fasilitas...">

                                <button class="btn btn-primary" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i> Cari
                                </button>
                            </div>
                        </div>

                        {{-- Reset --}}
                        <div class="col-12 col-md-2">
                            @if (request('search') || request('jenis'))
                                <a href="{{ route('fasilitas.index') }}"
                                    class="btn btn-outline-secondary btn-sm w-100">Reset</a>
                            @endif
                        </div>
                    </div>
                </form>

                {{-- TABEL --}}
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-custom align-middle">
                        <thead>
                            <tr class="text-center">
                                <th><i class="fa-solid fa-signature"></i> Nama</th>
                                <th><i class="fa-solid fa-tags"></i> Jenis</th>
                                <th><i class="fa-solid fa-location-dot"></i> Alamat</th>
                                <th><i class="fa-solid fa-users"></i> Kapasitas</th>
                                <th><i class="fa-solid fa-image"></i> Media</th>
                                <th style="width:150px"><i class="fa-solid fa-gear"></i> Aksi</th>
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
                                        @if ($item->media)
                                            <img src="{{ asset('storage/media/' . $item->media) }}" width="80">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>

                                    {{-- AKSI --}}
                                    <td class="text-center">
                                        <a href="{{ route('fasilitas.edit', $item->fasilitas_id) }}"
                                            class="btn btn-outline-primary btn-sm me-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('fasilitas.destroy', $item->fasilitas_id) }}" method="POST"
                                            class="d-inline form-delete">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn btn-danger btn-sm btn-delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center empty-state py-4">
                                        <i class="fa-solid fa-circle-exclamation"></i> Belum ada data fasilitas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION --}}
                <div class="mt-3 d-flex justify-content-center">
                    {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>


    {{-- SWEETALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1800
            });
        </script>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".btn-delete").forEach(button => {
                button.addEventListener("click", function() {
                    const form = this.closest("form");

                    Swal.fire({
                        title: "Hapus data ini?",
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal"
                    }).then(result => {
                        if (result.isConfirmed) form.submit();
                    });
                });
            });
        });
    </script>
@endsection
