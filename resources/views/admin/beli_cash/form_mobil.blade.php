<div class="mobil-section">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="kode_mobil">Kode Mobil</label>
                <div class="input-group">
                    <input type="text" id="kode_mobil" class="form-control" readonly placeholder="Kode mobil"
                        aria-label="Kode Mobil" aria-describedby="button-ktp-addon" name="kode_mobil"
                        value="{{ old('kode_mobil') ?? '' }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-ktp-addon" data-toggle="modal"
                           data-target="#pilihMobilModal">Pilih Mobil</button>
                    </div>
                </div>
                @error('kode_mobil')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <img src="{{asset('img/default.svg')}}" id="display_gambar_mobil" class="img-fluid img-thumbnail" alt="">
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="display_merek_mobil">Merek</label>
                        <input type="text" class="form-control" id="display_merek_mobil" placeholder="-" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="display_model_mobil">Model</label>
                        <input type="text" class="form-control" id="display_model_mobil" placeholder="-" readonly />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="display_tipe_mobil">Tipe</label>
                        <input type="text" class="form-control" id="display_tipe_mobil" placeholder="-" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="display_warna_mobil">Warna</label>
                        <input type="text" class="form-control" id="display_warna_mobil" placeholder="-" readonly />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="display_tahun_mobil">Tahun Produksi</label>
                        <input type="text" class="form-control" id="display_tahun_mobil" placeholder="-" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="display_harga_mobil">Harga</label>
                        <input type="text" class="form-control" id="display_harga_mobil" placeholder="-" readonly />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
