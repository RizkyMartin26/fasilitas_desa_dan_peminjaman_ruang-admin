@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Petugas</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.petugas.update', $petugas->id) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.petugas.form')
            <button class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
