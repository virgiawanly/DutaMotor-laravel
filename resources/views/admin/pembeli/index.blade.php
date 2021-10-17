@extends('admin.layouts.app')

@section('content-header')
    <h1>Data Pembeli</h1>
@endsection


@section('content')

    <div class="card card-primary card-outline">
        <div class="card-header">
            <a href="/pembeli/register-pembeli" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> Tambah Pembeli</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table-mobil" class="table table-bordered table-sm table-hover table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>KTP Pembeli</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_pembeli as $key => $pembeli)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $pembeli->ktp_pembeli }}</td>
                            <td>{{ $pembeli->nama }}</td>
                            <td><span title="{{ $pembeli->alamat }}">{{ Str::limit($pembeli->alamat, 100) }}</span></td>
                            <td>{{ $pembeli->no_telp }}</td>
                            <td>
                                <a href="{{ route('pembeli.edit', $pembeli->ktp_pembeli) }}">
                                    <button class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="Edit pembeli">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>
                                <form class="d-inline" action="{{ route('pembeli.destroy', $pembeli->ktp_pembeli) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" onclick="confirmDelete(event)"
                                        data-placement="top" title="Hapus mobil" type="submit">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
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
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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

        // SweetAlert Modal Confirm Delete
        const confirmDelete = (event) => {
            event.preventDefault();
            var form = event.target.closest("form");
            Swal.fire({
                title: 'Hapus Pembeli?',
                text: "Kamu yakin ingin menghapus data pembeli ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }

        // DataTable Initialization
        $(function() {
            $('#table-mobil').DataTable({
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
