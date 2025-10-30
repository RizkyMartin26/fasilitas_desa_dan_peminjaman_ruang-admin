<!DOCTYPE html>
<html>
<head>
    <title>Daftar Fasilitas Umum</title>
</head>
<body>
    <h1>Daftar Fasilitas Umum</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Alamat</th>
                <th>RT</th>
                <th>RW</th>
                <th>Kapasitas</th>
                <th>Deskripsi</th>
                <th>Media</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fasilitas as $item)
                <tr>
                    <td>{{ $item['fasilitas_id'] }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['jenis'] }}</td>
                    <td>{{ $item['alamat'] }}</td>
                    <td>{{ $item['rt'] }}</td>
                    <td>{{ $item['rw'] }}</td>
                    <td>{{ $item['kapasitas'] }}</td>
                    <td>{{ $item['deskripsi'] }}</td>
                    <td><img src="/images/{{ $item['media'] }}" width="100"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
