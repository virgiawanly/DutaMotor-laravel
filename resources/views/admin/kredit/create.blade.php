@extends('admin.layouts.app')


@section('content')
    @if ($data_mobil->count() < 1)
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-exclamation-circle mr-2"></i> Tidak ada mobil untuk dijual. Lihat <a href="/mobil"
                class="text-dark">Menu Data Mobil</a>
        </div>
    @endif
    <form action="{{ route('cash.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Pembelian Mobil Cash</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <!-- Toggle status pembeli -->
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Status Pembeli</label>
                            <div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="existing-customer-radio" name="daftar_pembeli_baru"
                                        class="custom-control-input"
                                        {{ old('daftar_pembeli_baru') == 0 ? 'checked' : '' }}
                                        onchange="checkStatusPembeli()">
                                    <label class="custom-control-label" for="existing-customer-radio">Sudah
                                        ada</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="newCustomerRadio" name="daftar_pembeli_baru"
                                        class="custom-control-input"
                                        {{ old('daftar_pembeli_baru') == 1 ? 'checked' : '' }}
                                        onchange="checkStatusPembeli()">
                                    <label class="custom-control-label" for="newCustomerRadio">Daftar
                                        Baru</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pembeli yang sudah ada -->
                <div class="existing-customer-section">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="display_ktp_pembeli">KTP Pembeli</label>
                                <div class="input-group">
                                    <input type="text" id="display_ktp_pembeli" class="form-control" readonly
                                        placeholder="No. KTP pembeli" aria-label="No. KTP pembeli"
                                        aria-describedby="button-ktp-addon" name="ktp_pembeli_lama"
                                        value="{{ old('ktp_pembeli_lama') ?? '-' }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-ktp-addon"
                                            data-toggle="modal" data-target="#pilihPembeliModal">Pilih Pembeli</button>
                                    </div>
                                </div>
                                @error('ktp_pembeli_lama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="display_nama_pembeli"
                                    name="display_nama_pembeli" readonly value="{{ old('display_nama_pembeli') ?? '-' }}"
                                    placeholder="Nama pembeli" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_no_telp">No. Telepon</label>
                                <input type="text" class="form-control" id="display_no_telp" name="display_no_telp"
                                    readonly value="{{ old('display_no_telp') ?? '-' }}"
                                    placeholder="e.g 0812 xxxx xxxx" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="display_alamat_pembeli">Alamat</label>
                                <textarea name="display_alamat_pembeli" class="form-control" id="display_alamat_pembeli"
                                    rows="4" placeholder="Alamat pembeli"
                                    readonly>{{ old('display_alamat_pembeli') ?? '-' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pembeli baru -->
                <div class="new-customer-section">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ old('nama') ?? ($pembeli->nama ?? '') }}" placeholder="Nama pembeli" />
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ktp_pembeli">KTP Pembeli</label>
                                <input type="text" class="form-control" id="ktp_pembeli" name="ktp_pembeli"
                                    value="{{ old('ktp_pembeli') ?? ($pembeli->ktp_pembeli ?? '') }}"
                                    placeholder="No. KTP pembeli" />
                                @error('ktp_pembeli')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_telp">No. Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp"
                                    value="{{ old('no_telp') ?? ($pembeli->no_telp ?? '') }}"
                                    placeholder="No. telepon pembeli" />
                                @error('no_telp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="4"
                                    placeholder="Alamat lengkap pembeli">{{ old('alamat') ?? ($pembeli->alamat ?? '') }}</textarea>
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="mobil-section">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="kode_mobil">Kode Mobil</label>
                                <div class="input-group">
                                    <input type="text" id="kode_mobil" class="form-control" readonly
                                        placeholder="Kode mobil" aria-label="Kode Mobil" aria-describedby="button-ktp-addon"
                                        name="kode_mobil" value="{{ old('kode_mobil') ?? '' }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-ktp-addon"
                                            data-toggle="modal" onclick="openModalMobil()"
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_merek_mobil">Merek</label>
                                <input type="text" class="form-control" id="display_merek_mobil"
                                    name="display_merek_mobil" value="{{ old('display_merek_mobil') ?? '-' }}"
                                    placeholder="Merek mobil" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_model_mobil">Model</label>
                                <input type="text" class="form-control" id="display_model_mobil"
                                    name="display_model_mobil" value="{{ old('display_model_mobil') ?? '-' }}"
                                    placeholder="Model mobil" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_tipe_mobil">Tipe</label>
                                <input type="text" class="form-control" id="display_tipe_mobil" name="display_tipe_mobil"
                                    value="{{ old('display_tipe_mobil') ?? '-' }}" placeholder="Tipe Mobil" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_warna_mobil">Warna</label>
                                <input type="text" class="form-control" id="display_warna_mobil"
                                    name="display_warna_mobil" value="{{ old('display_warna_mobil') ?? '-' }}"
                                    placeholder="Warna" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_tahun_mobil">Tahun Produksi</label>
                                <input type="text" class="form-control" id="display_tahun_mobil"
                                    name="display_tahun_mobil" value="{{ old('display_tahun_mobil') ?? '-' }}"
                                    placeholder="Harga mobil" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_harga_mobil">Harga</label>
                                <input type="text" class="form-control" id="display_harga_mobil"
                                    name="display_harga_mobil" value="{{ old('display_harga_mobil') ?? '-' }}"
                                    placeholder="Harga mobil" readonly />
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Transaksi -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Lama Kredit</label>
                            <div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="kredit1th" name="lama_kredit"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="kredit1th">1 Tahun</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="kredit2Tahun" name="lama_kredit"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="kredit2Tahun">2 Tahun</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="kredit3Tahun" name="lama_kredit"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="kredit3Tahun">3 Tahun</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash_bayar">Jumlah DP</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" value="0" id="dp20" name="lama_kredit"
                                            class="custom-control-input" checked>
                                        <label class="custom-control-label" for="dp20">20%</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" value="1" id="dp25" name="lama_kredit"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="dp25">25%</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" value="1" id="dp30" name="lama_kredit"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="dp30">30%</label>
                                    </div>
                                </div>
                                <input type="number" min="0" class="form-control" id="cash_bayar" name="cash_bayar"
                                    value="{{ old('cash_bayar') ?? '' }}" placeholder="" />
                            </div>
                            @error('cash_bayar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash_bayar">Jumlah DP</label>
                            <input type="number" min="0" class="form-control" readonly id="cash_bayar" name="cash_bayar"
                                placeholder="" />
                            @error('cash_bayar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Lama Kredit</label>
                            <div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="kredit1th" name="lama_kredit"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="kredit1th">1 Tahun</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="kredit2th" name="lama_kredit"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="kredit2th">2 Tahun</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="kredit3th" name="lama_kredit"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="kredit3th">3 Tahun</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.form-controls -->
            </div>

            <!-- /.card-body -->
            <div class="card-footer d-flex align-items-center">
                <div class="ml-auto">
                    <button class="btn btn-primary" type="submit">Simpan Transaksi</button>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
    </form>
    <!-- /.card -->

    <!-- Modal Mobil -->
    <div class="modal fade" id="pilihPembeliModal" tabindex="-1" aria-labelledby="pilihPembeliModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pilihPembeliModalLabel">Pilih Pembeli</h5>
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
                                            onclick="setDisplayPembeli()">Pilih</button>
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

    <!-- Modal Mobil -->
    <div class="modal fade" id="pilihMobilModal" tabindex="-1" aria-labelledby="pilihMobilModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pilihMobilModalLabel">Pilih Modal</h5>
                    <a href="/mobil/tambah-mobil" type="button" class="btn btn-primary">
                        Tambah Mobil
                    </a>
                </div>
                <div class="modal-body">
                    <table id="table-pilih-mobil" class="table table-sm table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Mobil</th>
                                <th scope="col">Mobil</th>
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
                                    <td> <img src="{{ asset($mobil->url_gambar()) }}" width="100px" height="50px"
                                            class="rounded" style="object-fit: cover; object-position: center"
                                            loading="lazy">
                                    </td>
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
                                            data-tahun-mobil="{{ $mobil->tahun }}"
                                            data-warna-mobil="{{ $mobil->warna }}"
                                            data-harga-mobil="{{ $mobil->harga }}"
                                            onclick="setDisplayMobil()">Pilih</button>
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
@endsection

@push('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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

        const setDisplayPembeli = () => {
            $('input#display_ktp_pembeli').val(event.target.getAttribute('data-ktp-pembeli'));
            $('input#display_nama_pembeli').val(event.target.getAttribute('data-nama-pembeli'));
            $('input#display_no_telp').val(event.target.getAttribute('data-no-telp'));
            $('textarea#display_alamat_pembeli').val(event.target.getAttribute('data-alamat'));
        }

        const setDisplayMobil = () => {
            $('input#kode_mobil').val(event.target.getAttribute('data-kode-mobil'));
            $('input#display_merek_mobil').val(event.target.getAttribute('data-merek-mobil'));
            $('input#display_model_mobil').val(event.target.getAttribute('data-model-mobil'));
            $('input#display_tipe_mobil').val(event.target.getAttribute('data-tipe-mobil'));
            $('input#display_warna_mobil').val(event.target.getAttribute('data-warna-mobil'));
            $('input#display_tahun_mobil').val(event.target.getAttribute('data-tahun-mobil'));
            $('input#display_harga_mobil').val(event.target.getAttribute('data-harga-mobil'));
        }

        const checkStatusPembeli = () => {
            if ($('#existing-customer-radio').is(':checked')) {
                $('.new-customer-section').addClass('d-none');
                $('.existing-customer-section').removeClass('d-none');
            } else if ($('#newCustomerRadio').is(':checked')) {
                $('.existing-customer-section').addClass('d-none');
                $('.new-customer-section').removeClass('d-none');
            }
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

            checkStatusPembeli();
        });
    </script>
@endpush
