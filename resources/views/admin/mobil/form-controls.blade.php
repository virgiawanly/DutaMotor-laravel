<div class="form-group row">
    <div class="col-md-2">
        <label for="merek">Merek</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="merek" name="merek"
            value="{{ old('merek') ?? ($mobil->merek ?? '') }}" placeholder="Merek mobil" />
        @error('merek')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="model">Model</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="model" name="model"
            value="{{ old('model') ?? ($mobil->model ?? '') }}" placeholder="Model mobil" />
        @error('model')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="tipe">Tipe</label>
    </div>
    <div class="col-md-10">
        @php
            $tipe = ['SUV', 'Sport', 'Convertible', 'Coupe', 'Hatchback', 'MPV', 'Station Wagon', 'Mini Bus', 'Truck', 'Sedan'];
        @endphp
        <select class="form-control select-tipe" id="tipe" name="tipe">
            <option value="" disabled selected>--- Pilih Tipe --</option>
            @foreach ($tipe as $t)
                <option value="{{ $t }}" @if (old('tipe') == $t || (isset($mobil) && $mobil->tipe && $t == $mobil->tipe)) selected @endif>{{ $t }}</option>
            @endforeach
        </select>
        @error('tipe')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="warna">Warna</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="warna" name="warna"
            value="{{ old('warna') ?? ($mobil->warna ?? '') }}" placeholder="Warna mobil" />
        @error('warna')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="tahun">Tahun Produksi</label>
    </div>
    <div class="col-md-10">
        <input type="number" min="1901" max="{{ date('Y') + 10 }}" class="form-control" id="tahun" name="tahun"
            value="{{ old('tahun') ?? ($mobil->tahun ?? '') }}" placeholder="Tahun produksi" />
        @error('tahun')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="harga">Harga</label>
    </div>
    <div class="col-md-10">
        <input type="number" class="form-control" id="harga" name="harga"
            value="{{ old('harga') ?? ($mobil->harga ?? '') }}" placeholder="Harga mobil" />
        @error('harga')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="gambar">Gambar Mobil</label>
    </div>
    <div class="col-md-10">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="gambar" name="gambar">
            <label class="custom-file-label" for="gambar">Upload gambar</label>
        </div>
        @error('gambar')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>


@push('head')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@push('script')
    <!-- Select2 -->
    <script src="{{ asset('adminlte') }}/plugins/select2/js/select2.min.js"></script>
    <script>
        // Select2
        $(function() {
            $(".select-tipe").select2({
                tags: true,
                theme: 'bootstrap4'
            });
        });
    </script>
@endpush
