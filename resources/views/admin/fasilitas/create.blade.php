@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Fasilitas</h2>

    <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.fasilitas.form')
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
