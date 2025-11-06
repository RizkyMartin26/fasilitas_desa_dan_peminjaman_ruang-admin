@extends('layouts.admin.app')

@section('content')
<h2>Daftar Syarat Fasilitas</h2>
<a href="{{ route('admin.syarat.create') }}">+ Tambah Syarat</a>

<table border="1">
    <tr>
        <th>Fasilitas</th>
        <th>Nama Syarat</th>
        <th>Dokumen</th>
        <th>Aksi</th>
    </tr>

    @foreach($data as $row)
    <tr>
        <td>{{ $row->fasilitas->nama }}</td>
        <td>{{ $row->nama_syarat }}</td>
        <td>
            @if($row->dokumen)
               <a href="{{ asset('storage/'.$row->dokumen) }}" target="_blank">Lihat</a>
            @endif
        </td>
        <td>
            <a href="{{ route('admin.syarat.edit', $row->syarat_id) }}">Edit</a>
            <form method="POST" action="{{ route('admin.syarat.destroy',$row->syarat_id) }}">
                @csrf @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
