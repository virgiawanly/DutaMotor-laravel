@extends('admin.layouts.app')

@section('content-header')
    <h1>Pembelian Cash</h1>
@endsection

@section('content')

    <div class="card card-primary card-outline">
        <div class="card-header d-flex align-items-center justify-content-between">
            <a href="/transaksi/cash/beli-baru" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> Pembelian
                Baru
            </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table-transaksi-cash" class="table table-bordered table-sm table-hover table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Cash</th>
                        <th>KTP Pembeli</th>
                        <th>Pembeli</th>
                        <th>Mobil</th>
                        <th>Tipe</th>
                        <th>Harga Mobil</th>
                        <th>Jumlah Bayar</th>
                        <th>Tgl Transaksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_transaksi as $key => $transaksi)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $transaksi->kode_cash }}</td>
                            <td>{{ $transaksi->pembeli->ktp_pembeli }}</td>
                            <td><span
                                    title="{{ $transaksi->pembeli->nama }}">{{ Str::limit($transaksi->pembeli->nama, 20) }}</span>
                            </td>
                            <td>{{ $transaksi->mobil->merek }} - {{ $transaksi->mobil->model }}
                                ({{ $transaksi->mobil->tahun }})</td>
                            <td>{{ $transaksi->mobil->tipe }}</td>
                            <td>Rp. {{ number_format($transaksi->mobil->harga) }}</td>
                            <td>Rp. {{ number_format($transaksi->cash_bayar) }}</td>
                            <td>{{ date('d/m/Y', strtotime($transaksi->cash_tgl)) }}</td>
                            <td>
                                <a href="/transaksi/cash/{{ $transaksi->kode_cash }}/cetak-nota" target="_blank"
                                    title="Cetak nota" class="btn btn-sm btn-success mb-0"><i class="fas fa-print"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@push('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    @if (session('print-nota'))
        {!! session('print-nota') !!}
    @endif
@endpush

@push('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('adminlte') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        // SweetAlert Toast
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        // DataTable Initialization
        $(function() {
            $('#table-transaksi-cash').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

        });
    </script>

    @if (session('success'))
        <script>
            // SweetAlert Toast
            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            })
        </script>
    @endif
@endpush
