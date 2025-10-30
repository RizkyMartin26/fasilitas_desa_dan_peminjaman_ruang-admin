@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Fasilitas</h2>

    <form action="{{ route('fasilitas.update', $item->fasilitas_id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.fasilitas.form')
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
