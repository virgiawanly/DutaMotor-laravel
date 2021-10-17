@extends('admin.layouts.app')


@section('content')
    @if ($data_mobil->count() < 1)
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-exclamation-circle mr-2"></i> Tidak ada mobil untuk dijual. Lihat <a href="/mobil"
                class="text-dark">Menu Data Mobil</a>
        </div>
    @endif
    <form action="{{ route('cash.store') }}" method="POST" onsubmit="return confirm('Simpan data pembelian?')"
        enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Pembelian Mobil Cash</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @include('admin.beli_cash.form_pembeli')

                <hr>

                @include('admin.beli_cash.form_mobil')

                <hr>

                <!-- Transaksi -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body text-white bg-info text-center">
                                <h3 class="display-4 display-harga-rupiah">Rp. 0</h3>
                            </div>
                            <div class="card-footer">
                                <span class="display-harga-terbilang">Nol Rupiah</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cash_bayar">Total Bayar</label>
                            <input type="number" min="0" class="form-control" id="cash_bayar" name="cash_bayar"
                                value="{{ old('cash_bayar') ?? '' }}" placeholder="Rp" />
                            @error('cash_bayar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.form-controls -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer d-flex align-items-center">
                <div class="ml-auto">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
    </form>
    <!-- /.card -->

    <!-- Modal Pembeli -->
    @include('admin.beli_cash.modal_pembeli')

    <!-- Modal Mobil -->
    @include('admin.beli_cash.modal_mobil')

@endsection

@push('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
        const setDisplayMobil = (data) => {
            let mobil = (data !== null) ? data.data : {};
            $('input#kode_mobil').val(mobil.kode_mobil);
            $('input#display_merek_mobil').val(mobil.merek);
            $('input#display_model_mobil').val(mobil.model);
            $('input#display_tipe_mobil').val(mobil.tipe);
            $('input#display_warna_mobil').val(mobil.warna);
            $('input#display_tahun_mobil').val(mobil.tahun);
            $('input#display_harga_mobil').val(mobil.harga);
            $('input#cash_bayar').val(mobil.harga).trigger('keyup');
            $('img#display_gambar_mobil').attr('src', mobil.gambar);
        }

        const fetchMobil = (kode_mobil) => {
            if (kode_mobil) {
                $.ajax('/api/mobil/get-single/' + kode_mobil, {
                    dataType: 'json',
                    beforeSend: function() {
                        setDisplayMobil(null);
                    },
                    success: function(data) {
                        setDisplayMobil(data)
                    },
                    error: function(error) { // error callback
                        setDisplayMobil(null);
                        console.log(error);
                    }
                });
            } else {
                setDisplayMobil(null);
            }
        }

        const setDisplayPembeli = (data) => {
            let pembeli = (data !== null) ? data.data : {};
            $('input#display_ktp_pembeli').val(pembeli.ktp_pembeli);
            $('input#display_nama_pembeli').val(pembeli.nama);
            $('input#display_no_telp').val(pembeli.no_telp);
            $('textarea#display_alamat_pembeli').val(pembeli.alamat);
        }

        const fetchPembeli = (ktp_pembeli) => {
            if (ktp_pembeli) {
                $.ajax('/api/pembeli/get-single/' + ktp_pembeli, {
                    dataType: 'json',
                    beforeSend: function() {
                        setDisplayPembeli(null);
                    },
                    success: function(data) {
                        setDisplayPembeli(data)
                    },
                    error: function(error) { // error callback
                        setDisplayPembeli(null);
                        console.log(error);
                    }
                });
            } else {
                setDisplayPembeli(null);
            }
        }

        const rupiahFormatter = new Intl.NumberFormat('id-ID');

        function terbilang(bilangan) {

            bilangan = String(bilangan);
            var angka = new Array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
            var kata = new Array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan');
            var tingkat = new Array('', 'Ribu', 'Juta', 'Milyar', 'Triliun');

            var panjang_bilangan = bilangan.length;

            /* pengujian panjang bilangan */
            if (panjang_bilangan > 15) {
                kaLimat = "Diluar Batas";
                return kaLimat;
            }

            /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
            for (i = 1; i <= panjang_bilangan; i++) {
                angka[i] = bilangan.substr(-(i), 1);
            }

            i = 1;
            j = 0;
            kaLimat = "";


            /* mulai proses iterasi terhadap array angka */
            while (i <= panjang_bilangan) {

                subkaLimat = "";
                kata1 = "";
                kata2 = "";
                kata3 = "";

                /* untuk Ratusan */
                if (angka[i + 2] != "0") {
                    if (angka[i + 2] == "1") {
                        kata1 = "Seratus";
                    } else {
                        kata1 = kata[angka[i + 2]] + " Ratus";
                    }
                }

                /* untuk Puluhan atau Belasan */
                if (angka[i + 1] != "0") {
                    if (angka[i + 1] == "1") {
                        if (angka[i] == "0") {
                            kata2 = "Sepuluh";
                        } else if (angka[i] == "1") {
                            kata2 = "Sebelas";
                        } else {
                            kata2 = kata[angka[i]] + " Belas";
                        }
                    } else {
                        kata2 = kata[angka[i + 1]] + " Puluh";
                    }
                }

                /* untuk Satuan */
                if (angka[i] != "0") {
                    if (angka[i + 1] != "1") {
                        kata3 = kata[angka[i]];
                    }
                }

                /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
                if ((angka[i] != "0") || (angka[i + 1] != "0") || (angka[i + 2] != "0")) {
                    subkaLimat = kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " ";
                }

                /* gabungkan variabe sub kaLimat (untuk Satu blok 3 angka) ke variabel kaLimat */
                kaLimat = subkaLimat + kaLimat;
                i = i + 3;
                j = j + 1;

            }

            /* mengganti Satu Ribu jadi Seribu jika diperlukan */
            if ((angka[5] == "0") && (angka[6] == "0")) {
                kaLimat = kaLimat.replace("Satu Ribu", "Seribu");
            }

            return kaLimat + "Rupiah";
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

            fetchMobil($('input#kode_mobil').val());
            fetchMobil($('input#ktp_pembeli_lama').val());
        });

        $('.button-pilih-mobil').on('click', function() {
            fetchMobil($(this).data('kode-mobil'));
        });

        $('.button-pilih-pembeli').on('click', function() {
            fetchPembeli($(this).data('ktp-pembeli'));
        });

        $('input#cash_bayar').on('keyup', function() {
            $('.display-harga-rupiah').text('Rp. ' + rupiahFormatter.format($(this).val()));
            $('.display-harga-terbilang').text(terbilang($(this).val()));
        });
    </script>
@endpush
