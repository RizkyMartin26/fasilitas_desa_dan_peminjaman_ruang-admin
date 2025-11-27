@extends('layouts.admin.app')

@section('content')
    <style>
        body {
            background: #f8fafc;
        }

        .card-custom {
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
            transition: 0.3s;
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

        .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .page-link {
            color: #0d6efd;
        }
    </style>

    <div class="container mt-5">
        <div class="card card-custom">

            {{-- HEADER --}}
            <div class="card-header-blue d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h4><i class="fa-solid fa-handshake-simple"></i> Data Peminjaman Fasilitas</h4>
                    <small>Kelola peminjaman dengan mudah & terstruktur</small>
                </div>

                <a href="{{ route('peminjaman.create') }}" class="btn btn-add btn-sm mt-2 mt-md-0">
                    <i class="fa-solid fa-circle-plus"></i> Tambah
                </a>
            </div>

            <div class="card-body">

                {{-- FILTER + SEARCH --}}
                <form action="{{ route('peminjaman.index') }}" method="GET" class="row g-2 mb-4">

                    {{-- Status --}}
                    <div class="col-md-3">
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="tolak" {{ request('status') == 'tolak' ? 'selected' : '' }}>Ditolak</option>
                            <option value="setuju" {{ request('status') == 'setuju' ? 'selected' : '' }}>Disetujui</option>
                        </select>
                    </div>

                    {{-- Search --}}
                    <div class="col-md-4">
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama warga..."
                                value="{{ request('search') }}">

                            <button class="btn btn-primary" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i> Cari
                            </button>
                        </div>
                    </div>

                    {{-- Reset --}}
                    @if (request('search') || request('status'))
                        <div class="col-md-2">
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary btn-sm w-100">
                                Reset
                            </a>
                        </div>
                    @endif
                </form>

                {{-- NOTIFIKASI --}}
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


                {{-- TABEL --}}
                <div class="table-responsive">
                    <table class="table table-hover table-custom align-middle">
                        <thead>
                            <tr class="text-center">
                                <th>Warga</th>
                                <th>Fasilitas</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data as $item)
                                <tr class="text-center">
                                    <td>{{ $item->warga->nama ?? '-' }}</td>
                                    <td>{{ $item->fasilitas->nama ?? '-' }}</td>
                                    <td>{{ $item->tgl_pinjam }}</td>
                                    <td>{{ $item->tgl_kembali ?? '-' }}</td>

                                    {{-- Status Badge --}}
                                    <td>
                                        @php
                                            $badgeClass =
                                                [
                                                    'pending' => 'bg-warning text-dark',
                                                    'tolak' => 'bg-danger',
                                                    'setuju' => 'bg-success',
                                                ][$item->status] ?? 'bg-secondary';
                                        @endphp

                                        <span class="badge {{ $badgeClass }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>

                                    {{-- Aksi --}}
                                    <td>
                                        <a href="{{ route('peminjaman-fasilitas.edit', $item->peminjaman_id) }}"
                                            class="btn btn-outline-primary btn-sm me-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('peminjaman-fasilitas.destroy', $item->peminjaman_id) }}"
                                            method="POST" class="d-inline form-delete">
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
                                        <i class="fa-solid fa-circle-exclamation"></i> Tidak ada data.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


                {{-- PAGINATION --}}
                <div class="d-flex justify-content-center mt-3">
                    {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>

            </div>

        </div>
    </div>


    {{-- SWEET ALERT DELETE --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll(".btn-delete").forEach(btn => {
            btn.addEventListener("click", function() {
                const form = this.closest("form");

                Swal.fire({
                    title: "Hapus data?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, hapus",
                    cancelButtonText: "Batal",
                }).then(result => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });
    </script>
@endsection
