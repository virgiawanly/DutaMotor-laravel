<div class="modal fade" id="pilihPembeliModal" tabindex="-1" aria-labelledby="pilihPembeliModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pilihPembeliModalLabel">Pilih Pembeli</h5>
            </div>
            <div class="modal-body">
                <table id="table-pilih-pembeli" class="table table-bordered table-sm table-hover table-striped">
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
                                    <button class="button-pilih-pembeli btn btn-success btn-sm" data-ktp-pembeli="{{$pembeli->ktp_pembeli}}" data-dismiss="modal" aria-label="Close"><i class="fas fa-check-circle mr-1"></i> Pilih</button>
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
