@extends('layouts.app')

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
        background: rgba(13,110,253,0.08);
        color: #084298;
        font-weight: 600;
        border-top: none;
    }

    .table-hover tbody tr:hover {
        background: rgba(13,110,253,0.05);
    }

    .badge-gender {
        background: rgba(13,110,253,0.15);
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
                <h4>Data Warga</h4>
                <small>Kelola data warga dengan mudah dan cepat</small>
            </div>
            <a href="{{ route('warga.create') }}" class="btn btn-add btn-sm mt-2 mt-md-0">
                <i class="bi bi-person-plus"></i> Tambah Warga
            </a>
        </div>

        <div class="card-body">
            <div class="row mb-3 g-2 align-items-center">
                <div class="col-md-6">
                    <form method="GET" action="{{ route('warga.index') }}" class="d-flex">
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control form-control-sm"
                               placeholder="Cari nama, no KTP, pekerjaan...">
                        <button class="btn btn-primary btn-sm ms-2" type="submit">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-custom align-middle">
                    <thead>
                        <tr>
                            <th style="width:60px">No</th>
                            <th>No KTP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Pekerjaan</th>
                            <th class="text-center" style="width:150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
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
                                <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn btn-outline-primary btn-sm me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST" class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center empty-state py-4">
                                Belum ada data warga. <a href="{{ route('warga.create') }}">Tambah warga baru</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
                <div class="text-muted small">
                    Menampilkan {{ $data->count() }} dari {{ $data instanceof \Illuminate\Pagination\LengthAwarePaginator ? $data->total() : $data->count() }} entri
                </div>
                <div>
                    @if($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{ $data->withQueryString()->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session("success") }}',
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
