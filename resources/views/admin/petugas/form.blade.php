<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $petugas->nama ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $petugas->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Password @if(isset($petugas)) <small>(isi bila ubah)</small> @endif</label>
    <input type="password" name="password" class="form-control">
</div>

<div class="mb-3">
    <label>No HP</label>
    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $petugas->no_hp ?? '') }}">
</div>

<div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control">{{ old('alamat', $petugas->alamat ?? '') }}</textarea>
</div>
