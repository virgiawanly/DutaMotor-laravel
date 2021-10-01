<div class="form-group row">
    <div class="col-md-2">
        <label for="ktp_pembeli">No. KTP</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="ktp_pembeli" name="ktp_pembeli"
            value="{{ old('ktp_pembeli') ?? ($pembeli->ktp_pembeli ?? '') }}" placeholder="No. KTP pembeli" />
        @error('ktp_pembeli')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="nama">Nama</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="nama" name="nama"
            value="{{ old('nama') ?? ($pembeli->nama ?? '') }}" placeholder="Nama pembeli" />
        @error('nama')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="no_telp">No. Telepon</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="no_telp" name="no_telp"
            value="{{ old('no_telp') ?? ($pembeli->no_telp ?? '') }}" placeholder="No. telepon pembeli" />
        @error('no_telp')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="alamat">Alamat</label>
    </div>
    <div class="col-md-10">
        <textarea name="alamat" class="form-control" id="alamat" rows="6" placeholder="Alamat lengkap pembeli">{{ old('alamat') ?? ($pembeli->alamat ?? '') }}</textarea>
        @error('alamat')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
