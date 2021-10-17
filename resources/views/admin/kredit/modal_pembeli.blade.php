<!-- Modal Pembeli -->
<div class="modal fade" id="pilihPembeliModal" tabindex="-1" aria-labelledby="pilihPembeliModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                                    <button class="btn btn-success btn-sm" data-dismiss="modal" aria-label="Close"
                                        data-ktp-pembeli="{{ $pembeli->ktp_pembeli }}"
                                        data-nama-pembeli="{{ $pembeli->nama }}"
                                        data-no-telp="{{ $pembeli->no_telp }}" data-alamat="{{ $pembeli->alamat }}"
                                        onclick="setDisplayPembeli()">Pilih</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        const openModalPembeli = () => {
            event.preventDefault();
            $('#pilihPembeliModal').modal('show');
        }

        const setDisplayPembeli = () => {
            $('input#display_ktp_pembeli').val(event.target.getAttribute('data-ktp-pembeli'));
            $('input#display_nama_pembeli').val(event.target.getAttribute('data-nama-pembeli'));
            $('input#display_no_telp').val(event.target.getAttribute('data-no-telp'));
            $('textarea#display_alamat_pembeli').val(event.target.getAttribute('data-alamat'));
        }
    </script>
@endpush
