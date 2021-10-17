   <!-- Toggle status pembeli -->
   <div class="row">
       <div class="col">
           <div class="form-group">
               <label>Status Pembeli</label>
               <div>
                   <div class="custom-control custom-radio custom-control-inline">
                       <input type="radio" value="0" id="existing-customer-radio" name="daftar_pembeli_baru"
                           class="custom-control-input" {{ old('daftar_pembeli_baru') == 0 ? 'checked' : '' }}
                           onchange="checkStatusPembeli()">
                       <label class="custom-control-label" for="existing-customer-radio">Sudah
                           ada</label>
                   </div>
                   <div class="custom-control custom-radio custom-control-inline">
                       <input type="radio" value="1" id="newCustomerRadio" name="daftar_pembeli_baru"
                           class="custom-control-input" {{ old('daftar_pembeli_baru') == 1 ? 'checked' : '' }}
                           onchange="checkStatusPembeli()">
                       <label class="custom-control-label" for="newCustomerRadio">Daftar
                           Baru</label>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <!-- Pembeli yang sudah ada -->
   <div class="existing-customer-section">
       <div class="row">
           <div class="col">
               <div class="form-group">
                   <label for="display_ktp_pembeli">KTP Pembeli</label>
                   <div class="input-group">
                       <input type="text" id="display_ktp_pembeli" class="form-control" readonly
                           placeholder="No. KTP pembeli" aria-label="No. KTP pembeli"
                           aria-describedby="button-ktp-addon" name="ktp_pembeli_lama"
                           value="{{ old('ktp_pembeli_lama') ?? '-' }}">
                       <div class="input-group-append">
                           <button class="btn btn-outline-secondary" type="button" id="button-ktp-addon"
                               data-toggle="modal" data-target="#pilihPembeliModal">Pilih Pembeli</button>
                       </div>
                   </div>
                   @error('ktp_pembeli_lama')
                       <small class="text-danger">{{ $message }}</small>
                   @enderror
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-md-6">
               <div class="form-group">
                   <label>Nama Lengkap</label>
                   <input type="text" class="form-control" id="display_nama_pembeli" name="display_nama_pembeli"
                       readonly value="{{ old('display_nama_pembeli') ?? '-' }}" placeholder="Nama pembeli" />
               </div>
           </div>
           <div class="col-md-6">
               <div class="form-group">
                   <label for="display_no_telp">No. Telepon</label>
                   <input type="text" class="form-control" id="display_no_telp" name="display_no_telp" readonly
                       value="{{ old('display_no_telp') ?? '-' }}" placeholder="e.g 0812 xxxx xxxx" />
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col">
               <div class="form-group">
                   <label for="display_alamat_pembeli">Alamat</label>
                   <textarea name="display_alamat_pembeli" class="form-control" id="display_alamat_pembeli" rows="4"
                       placeholder="Alamat pembeli" readonly>{{ old('display_alamat_pembeli') ?? '-' }}</textarea>
               </div>
           </div>
       </div>
   </div>

   <!-- Pembeli baru -->
   <div class="new-customer-section">
       <div class="row">
           <div class="col">
               <div class="form-group">
                   <label for="nama">Nama Lengkap</label>
                   <input type="text" class="form-control" id="nama" name="nama"
                       value="{{ old('nama') ?? ($pembeli->nama ?? '') }}" placeholder="Nama pembeli" />
                   @error('nama')
                       <small class="text-danger">{{ $message }}</small>
                   @enderror
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-md-6">
               <div class="form-group">
                   <label for="ktp_pembeli">KTP Pembeli</label>
                   <input type="text" class="form-control" id="ktp_pembeli" name="ktp_pembeli"
                       value="{{ old('ktp_pembeli') ?? ($pembeli->ktp_pembeli ?? '') }}"
                       placeholder="No. KTP pembeli" />
                   @error('ktp_pembeli')
                       <small class="text-danger">{{ $message }}</small>
                   @enderror
               </div>
           </div>
           <div class="col-md-6">
               <div class="form-group">
                   <label for="no_telp">No. Telepon</label>
                   <input type="text" class="form-control" id="no_telp" name="no_telp"
                       value="{{ old('no_telp') ?? ($pembeli->no_telp ?? '') }}" placeholder="No. telepon pembeli" />
                   @error('no_telp')
                       <small class="text-danger">{{ $message }}</small>
                   @enderror
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col">
               <div class="form-group">
                   <label for="alamat">Alamat</label>
                   <textarea name="alamat" class="form-control" id="alamat" rows="4"
                       placeholder="Alamat lengkap pembeli">{{ old('alamat') ?? ($pembeli->alamat ?? '') }}</textarea>
                   @error('alamat')
                       <small class="text-danger">{{ $message }}</small>
                   @enderror
               </div>
           </div>
       </div>
   </div>


   @push('script')
       <script>
           const checkStatusPembeli = () => {
               if ($('#existing-customer-radio').is(':checked')) {
                   $('.new-customer-section').addClass('d-none');
                   $('.existing-customer-section').removeClass('d-none');
               } else if ($('#newCustomerRadio').is(':checked')) {
                   $('.existing-customer-section').addClass('d-none');
                   $('.new-customer-section').removeClass('d-none');
               }
           }
       </script>
   @endpush
