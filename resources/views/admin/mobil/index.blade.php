@extends('admin.layouts.app')

@section('content')

    <div class="card card-primary card-outline">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title">Data Mobil</h3>
            <div class="card-tools ml-auto">
                <a href="/mobil/tambah-mobil">
                    <button class="btn btn-primary">Tambah Mobil</button>
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table-mobil" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Mobil</th>
                        <th>Gambar</th>
                        <th>Merek</th>
                        <th>Model</th>
                        <th>Tipe</th>
                        <th>Warna</th>
                        <th>Tahun</th>
                        <th>Harga</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_mobil as $key => $mobil)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $mobil->kode_mobil }}</td>
                            <td class="text-center">
                                <a href="{{ $mobil->url_gambar() }}" target="_blank">
                                    <img src="{{ asset($mobil->url_gambar()) }}" width="100px" height="50px"
                                        class="rounded" style="object-fit: cover; object-position: center"
                                        loading="lazy">
                                </a>
                            </td>
                            <td>{{ $mobil->merek }}</td>
                            <td>{{ $mobil->model }}</td>
                            <td>{{ $mobil->tipe }}</td>
                            <td>{{ $mobil->warna }}</td>
                            <td>{{ $mobil->tahun }}</td>
                            <td>{{ 'Rp ' . number_format($mobil->harga) }}</td>
                            <td>
                                <a href="{{ route('mobil.edit', $mobil->kode_mobil) }}">
                                    <button class="btn btn-warning" data-toggle="tooltip" data-placement="top"
                                        title="Edit mobil">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>
                                <form class="d-inline" action="{{ route('mobil.destroy', $mobil->kode_mobil) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" data-toggle="tooltip" onclick="confirmDelete(event)"
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

        // SweetAlert Modal Confirm Delete
        const confirmDelete = (event) => {
            event.preventDefault();
            var form = event.target.closest("form");
            Swal.fire({
                title: 'Hapus Mobil?',
                text: "Kamu yakin ingin menghapus data mobil ini?",
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
                "lengthChange": false,
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
