@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Petugas</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.petugas.store') }}" method="POST">
            @csrf
            @include('admin.petugas.form')
            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
