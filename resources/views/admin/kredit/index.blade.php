@extends('admin.layouts.app')

@section('content')

    <div class="card card-primary card-outline">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title">Data Kredit</h3>
            <div class="card-tools ml-auto">
                <a href="/transaksi/kredit/pendaftaran-kredit">
                    <button class="btn btn-primary">Pendaftaran Kredit Baru</button>
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table-kredit" class="table table-bordered table-sm table-hover table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Cash</th>
                        <th>KTP Pembeli</th>
                        <th>Pembeli</th>
                        <th>Kode Mobil</th>
                        <th>Merek</th>
                        <th>Model (Tahun)</th>
                        <th>Tipe</th>
                        <th>Harga Mobil</th>
                        <th>Jumlah Bayar</th>
                        <th>Tgl Transaksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_kredit as $key => $kredit)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $kredit->kode_cash }}</td>
                            <td>{{ $kredit->pembeli->ktp_pembeli }}</td>
                            <td><span title="{{$kredit->pembeli->nama}}">{{ Str::limit($kredit->pembeli->nama, 20) }}</span></td>
                            <td>{{ $kredit->mobil->kode_mobil }}</td>
                            <td>{{ $kredit->mobil->merek }}</td>
                            <td>{{ $kredit->mobil->model }} ({{ $kredit->mobil->tahun }})</td>
                            <td>{{ $kredit->mobil->tipe }}</td>
                            <td>Rp. {{ number_format($kredit->mobil->harga) }}</td>
                            <td>Rp. {{ number_format($kredit->cash_bayar) }}</td>
                            <td>{{ date('d/m/Y', strtotime($kredit->cash_tgl)) }}</td>
                            <td>
                                <a href="/transaksi/cash/{{$kredit->kode_cash}}/cetak-nota" target="_blank" title="Cetak nota" class="btn btn-sm btn-success mb-0"><i class="fas fa-print"></i></a>
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
            $('#table-kredit').DataTable({
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
