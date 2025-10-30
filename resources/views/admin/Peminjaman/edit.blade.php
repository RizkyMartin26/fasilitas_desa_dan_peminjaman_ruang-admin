@extends('layouts.admin')

@section('content')
<h3>Edit Peminjaman</h3>

<form action="{{ route('admin.peminjaman.update', $data->peminjaman_id) }}" method="POST">
@csrf
@method('PUT')

<label>Status</label>
<select name="status" class="form-control">
    <option value="pending" @selected($data->status=='pending')>Pending</option>
    <option value="setuju" @selected($data->status=='setuju')>Setuju</option>
    <option value="tolak" @selected($data->status=='tolak')>Tolak</option>
</select>

<button class="btn btn-primary mt-3">Update</button>
</form>
@endsection
