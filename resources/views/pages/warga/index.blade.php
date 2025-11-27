@extends('layouts.admin.app')

@section('content')
    <style>
        body {
            background: #f8fafc;
        }

        .card-warga {
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

        .badge-gender {
            background: rgba(13, 110, 253, 0.15);
            color: #0d6efd;
            font-weight: 600;
        }

        .empty-state {
            color: #6c757d;
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
        <div class="card card-warga">
            <div class="card-header-blue d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h4><i class="fa-solid fa-users"></i> Data Warga</h4>
                    <small>Kelola data warga dengan mudah dan cepat</small>
                </div>
                {{-- Tombol Tambah Warga --}}
                <a href="{{ route('warga.create') }}" class="btn btn-add btn-sm mt-2 mt-md-0">
                    <i class="fa-solid fa-user-plus"></i> Tambah Warga
                </a>
            </div>

            <div class="card-body">
                {{-- Gabungan Filter, Pencarian, dan Tombol Reset --}}
                <form method="GET" action="{{ route('warga.index') }}" class="mb-4">
                    <div class="row g-2 align-items-center">
                        {{-- Filter Jenis Kelamin Dropdown (Col 1) --}}
                        <div class="col-12 col-md-3">
                            <select name="jenis_kelamin" class="form-select form-select-sm" onchange="this.form.submit()">
                                <option value=""> Semua Jenis Kelamin </option>
                                <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                        </div>

                        {{-- Search Input and Button (Col 2 & 3) --}}
                        <div class="col-12 col-md-4">
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                    placeholder="Cari nama atau No KTP...">

                                <button class="btn btn-primary" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i> Cari
                                </button>
                            </div>
                        </div>

                        {{-- Reset Button (Col 4) --}}
                        <div class="col-12 col-md-2">
                            @if (request('search') || request('jenis_kelamin'))
                                <a href="{{ route('warga.index') }}"
                                    class="btn btn-outline-secondary btn-sm w-100">Reset</a>
                            @endif
                        </div>
                    </div>
                </form>

                {{-- Notifikasi sukses (menggunakan SweetAlert) --}}
                {{-- SweetAlert sudah ditangani di bagian script di bawah --}}

                {{-- Tabel Data --}}
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-custom align-middle">
                        <thead>
                            <tr>
                                <th style="width:60px"><i class="fa-solid fa-list-ol"></i> No</th>
                                <th><i class="fa-solid fa-id-card"></i> No KTP</th>
                                <th><i class="fa-solid fa-user"></i> Nama</th>
                                <th><i class="fa-solid fa-venus-mars"></i> Jenis Kelamin</th>
                                <th><i class="fa-solid fa-mosque"></i> Agama</th>
                                <th><i class="fa-solid fa-briefcase"></i> Pekerjaan</th>
                                <th class="text-center" style="width:150px"><i class="fa-solid fa-gear"></i> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $item)
                                <tr>
                                    {{-- Menggunakan index paginasi yang benar --}}
                                    <td>{{ $data->firstItem() + $index }}</td>
                                    <td>{{ $item->no_ktp }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <span class="badge badge-gender rounded-pill px-3">
                                            {{ $item->jenis_kelamin }}
                                        </span>
                                    </td>
                                    <td>{{ $item->agama }}</td>
                                    <td>{{ $item->pekerjaan }}</td>
                                    <td class="text-center">
                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('warga.edit', $item->warga_id) }}"
                                            class="btn btn-outline-primary btn-sm me-1" title="Edit Data">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        {{-- Tombol Delete (dengan SweetAlert) --}}
                                        <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST"
                                            class="d-inline form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                title="Hapus Data">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center empty-state py-4">
                                        <i class="fa-solid fa-circle-exclamation"></i> Belum ada data warga.
                                        <a href="{{ route('warga.create') }}">Tambah warga baru</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-3 d-flex justify-content-center">
                    {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
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
                button.addEventListener("click", function(e) {
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
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
