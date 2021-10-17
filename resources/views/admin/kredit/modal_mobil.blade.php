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
                                 <td> <img src="{{ asset($mobil->url_gambar()) }}" width="50px" height="30px"
                                         class="rounded" style="object-fit: cover; object-position: center"
                                         loading="lazy">
                                 </td>
                                 <td>{{ $mobil->merek }}</td>
                                 <td>{{ $mobil->model }}</td>
                                 <td>{{ $mobil->tipe }}</td>
                                 <td>{{ $mobil->warna }}</td>
                                 <td>{{ $mobil->harga }}</td>
                                 <td>
                                     <button class="btn btn-success btn-sm" data-dismiss="modal" aria-label="Close"
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

 @push('script')
     <script>
         const openModalMobil = () => {
             event.preventDefault();
             $('#pilihMobilModal').modal('show');
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
     </script>
 @endpush
