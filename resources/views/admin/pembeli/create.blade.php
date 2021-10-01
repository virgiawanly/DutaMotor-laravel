@extends('admin.layouts.app')

@section('content')

    <div class="card card-secondary card-outline">
        <form action="{{ route('pembeli.store') }}" method="POST">
            <div class="card-header">
                <h3 class="card-title">Form Register Pembeli</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @csrf
                @include('admin.pembeli.form-controls')
                <!-- /.form-controls -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer d-flex align-items-center">
                <div class="ml-auto">
                    <button class="btn btn-primary" type="submit">Simpan Data</button>
                </div>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
