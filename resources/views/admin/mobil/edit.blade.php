@extends('admin.layouts.app')

@section('content')

    <div class="card card-secondary card-outline">
        <form action="{{ route('mobil.update', $mobil->kode_mobil) }}" method="POST" enctype="multipart/form-data">
            <div class="card-header">
                <h3 class="card-title">Form Edit Mobil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @csrf
                @method('PATCH')
                @include('admin.mobil.form-controls')
                <!-- /.form-controls -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer d-flex align-items-center">
                <div class="ml-auto">
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                </div>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
