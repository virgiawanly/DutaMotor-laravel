<div class="form-group row">
    <div class="col-md-2">
        <label for="ktp_pembeli">KTP Pembeli</label>
    </div>
    <div class="col-md-10">
        <div class="input-group">
            <input type="text" id="ktp_pembeli" class="form-control" onkeypress="openModalPembeli()" onchange="openModalPembeli()" autocomplete="off" placeholder="No. KTP pembeli" aria-label="No. KTP pembeli"
                aria-describedby="button-ktp-addon" name="ktp_pembeli" value="{{old('ktp_pembeli') ?? ''}}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-ktp-addon" data-toggle="modal"
                    data-target="#pilihPembeliModal">Pilih Pembeli</button>
            </div>
        </div>
        @error('ktp_pembeli')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="nama_pembeli">Nama Pembeli</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" value="{{old('nama_pembeli') ?? '-'}}"
            placeholder="Nama pembeli" readonly />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="no_telp">No. Telepon</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{old('no_telp') ?? '-'}}" placeholder="Nama pembeli"
            readonly />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="alamat">Alamat</label>
    </div>
    <div class="col-md-10">
        <textarea class="form-control" name="alamat" style="resize: none" placeholder="Alamat" id="alamat" rows="3"
            readonly>{{old('alamat') ?? '-'}}</textarea>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="kode_mobil">Kode Mobil</label>
    </div>
    <div class="col-md-10">
        <div class="input-group">
            <input type="text" id="kode_mobil" class="form-control" onkeypress="openModalMobil()" onchange="openModalPembeli()" autocomplete="off" placeholder="Kode mobil" aria-label="Kode Mobil"
                aria-describedby="button-ktp-addon" name="kode_mobil" value="{{old('kode_mobil') ?? ''}}">
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

<div class="form-group row">
    <div class="col-md-2">
        <label for="merek_mobil">Merek</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="merek_mobil" name="merek_mobil" value="{{old('merek_mobil') ?? '-'}}"
            placeholder="Merek mobil" readonly />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="model_mobil">Model</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="model_mobil" name="model_mobil" value="{{old('model_mobil') ?? '-'}}" placeholder="Model mobil"
            readonly />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="tipe_mobil">Tipe</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="tipe_mobil" name="tipe_mobil" value="{{old('tipe_mobil') ?? '-'}}" placeholder="Tipe Mobil"
            readonly />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="warna_mobil">Warna</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="warna_mobil" name="warna_mobil" value="{{old('warna_mobil') ?? '-'}}" placeholder="Warna"
            readonly />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="harga_mobil">Harga</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" id="harga_mobil" name="harga_mobil" value="{{old('harga_mobil') ?? '-'}}" placeholder="Harga mobil"
            readonly />
    </div>
</div>

<hr>

<div class="form-group row">
    <div class="col-md-2">
        <label for="cash_tgl">Tanggal Pembelian</label>
    </div>
    <div class="col-md-10">
        <input type="date" class="form-control" id="cash_tgl" name="cash_tgl"
            value="{{ old('cash_tgl') ?? ($pembeli->cash_tgl ?? '') }}" placeholder="Tanggal Pembelian" />
        @error('cash_tgl')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="cash_bayar">Jumlah Bayar</label>
    </div>
    <div class="col-md-10">
        <input type="number" min="0" class="form-control" id="cash_bayar" name="cash_bayar"
            value="{{ old('cash_bayar') ?? ($pembeli->cash_bayar ?? '') }}" placeholder="RP" />
        @error('cash_bayar')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pilihPembeliModal" tabindex="-1" aria-labelledby="pilihPembeliModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pilihPembeliModalLabel">Pilih Pembeli</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-pilih-pembeli" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">KTP Pembeli</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_pembeli as $key => $pembeli)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $pembeli->ktp_pembeli }}</td>
                                <td>{{ $pembeli->nama }}</td>
                                <td>{{ $pembeli->no_telp }}</td>
                                <td>
                                    <button class="btn btn-success" data-dismiss="modal" aria-label="Close"
                                        data-ktp-pembeli="{{ $pembeli->ktp_pembeli }}"
                                        data-nama-pembeli="{{ $pembeli->nama }}"
                                        data-no-telp="{{ $pembeli->no_telp }}"
                                        data-alamat="{{ $pembeli->alamat }}"
                                        onclick="changePembeli()">Pilih</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pilihMobilModal" tabindex="-1" aria-labelledby="pilihMobilModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pilihMobilModalLabel">Pilih Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-pilih-mobil" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Mobil</th>
                            <th scope="col">Merek</th>
                            <th scope="col">Model</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_mobil as $key => $mobil)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $mobil->kode_mobil }}</td>
                                <td>{{ $mobil->merek }}</td>
                                <td>{{ $mobil->model }}</td>
                                <td>{{ $mobil->tipe }}</td>
                                <td>{{ $mobil->warna }}</td>
                                <td>{{ $mobil->harga }}</td>
                                <td>
                                    <button class="btn btn-success" data-dismiss="modal" aria-label="Close"
                                        data-kode-mobil="{{ $mobil->kode_mobil }}"
                                        data-merek-mobil="{{ $mobil->merek }}"
                                        data-model-mobil="{{ $mobil->model }}"
                                        data-tipe-mobil="{{ $mobil->tipe }}"
                                        data-warna-mobil="{{ $mobil->warna }}"
                                        data-harga-mobil="{{ $mobil->harga }}"
                                        onclick="changeMobil()">Pilih</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


@push('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
@endpush

@push('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

    <script>
        const openModalPembeli = () => {
            event.preventDefault();
            $('#pilihPembeliModal').modal('show');
        }

        const openModalMobil = () => {
            event.preventDefault();
            $('#pilihMobilModal').modal('show');
        }

        const changePembeli = () => {
            document.querySelector('input#ktp_pembeli').value = event.target.getAttribute('data-ktp-pembeli');
            document.querySelector('input#nama_pembeli').value = event.target.getAttribute('data-nama-pembeli');
            document.querySelector('input#no_telp').value = event.target.getAttribute('data-no-telp');
            document.querySelector('textarea#alamat').value = event.target.getAttribute('data-alamat');
        }

        const changeMobil = () => {
            document.querySelector('input#kode_mobil').value = event.target.getAttribute('data-kode-mobil');
            document.querySelector('input#merek_mobil').value = event.target.getAttribute('data-merek-mobil');
            document.querySelector('input#model_mobil').value = event.target.getAttribute('data-model-mobil');
            document.querySelector('input#tipe_mobil').value = event.target.getAttribute('data-tipe-mobil');
            document.querySelector('input#warna_mobil').value = event.target.getAttribute('data-warna-mobil');
            document.querySelector('input#harga_mobil').value = event.target.getAttribute('data-harga-mobil');
        }

        // DataTable Initialization
        $(function() {
            $('#table-pilih-pembeli').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#table-pilih-mobil').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

        });
    </script>
@endpush
