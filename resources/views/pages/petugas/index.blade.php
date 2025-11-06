@extends('layouts.admin.app')

@section('content')
<h2>Daftar Petugas Fasilitas</h2>
<a href="{{ route('admin.petugas.create') }}">+ Tambah Data</a>

<table border="1">
<tr>
<th>Fasilitas</th>
<th>Nama</th>
<th>No HP</th>
<th>Email</th>
<th>Aksi</th>
</tr>

@foreach($data as $row)
<tr>
<td>{{ $row->fasilitas->nama_fasilitas }}</td>
<td>{{ $row->nama_petugas }}</td>
<td>{{ $row->no_hp }}</td>
<td>{{ $row->email }}</td>
<td>
<a href="{{ route('admin.petugas.edit', $row->petugas_id) }}">Edit</a>
<form action="{{ route('admin.petugas.destroy',$row->petugas_id) }}" method="POST">
@csrf @method('DELETE')
<button type="submit">Hapus</button>
</form>
</td>
</tr>
@endforeach
</table>
