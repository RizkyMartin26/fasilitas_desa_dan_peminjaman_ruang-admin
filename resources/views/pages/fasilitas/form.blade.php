<div class="mb-3">
    <label>Nama Fasilitas</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $item->nama ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Jenis</label>
    <input type="text" name="jenis" class="form-control" value="{{ old('jenis', $item->jenis ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control" required>{{ old('alamat', $item->alamat ?? '') }}</textarea>
</div>

<div class="row mb-3">
    <div class="col">
        <label>RT</label>
        <input type="text" name="rt" class="form-control" value="{{ old('rt', $item->rt ?? '') }}">
    </div>
    <div class="col">
        <label>RW</label>
        <input type="text" name="rw" class="form-control" value="{{ old('rw', $item->rw ?? '') }}">
    </div>
</div>

<div class="mb-3">
    <label>Kapasitas</label>
    <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas', $item->kapasitas ?? '') }}">
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Foto Media</label><br>
    @if(isset($item) && $item->media)
        <img src="{{ asset('storage/media/'.$item->media) }}" width="100" class="mb-2">
    @endif
    <input type="file" name="media" class="form-control">
</div>
