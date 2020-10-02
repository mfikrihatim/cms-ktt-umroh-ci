<div class="box">
     <div class="box-header with-border">
         <h3 class="box-title">Tambah Data Member</h3>
         <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                 <i class="fa fa-minus"></i></button>
             <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                 <i class="fa fa-times"></i></button>
         </div>
     </div>
     <div class="box-body">
     <form action="<?php echo site_url('Welcome/AddDataMember'); ?>" method="post" enctype="multipart/form-data">
        
         <div class="form-group">
             <label>Pilih Voucher</label>
             <select class="form-control" name="id_voucher" required>
                 <option selected disabled>Pilih Voucher</option>
                 <?php
                //  $voucher = $this->MSudi->GetData('tb_voucher');
                 foreach ($no_voucher as $ReadDS) {
                 ?>
                     <option value="<?php echo $ReadDS->id; ?>"><?php echo $ReadDS->no_voucher; ?></option>
                 <?php
                 }
                 ?>
             </select>
         </div>
         <div class="form-group">
             <label>Nama</label>
             <input type="text" class="form-control" name="nama" placeholder="Masukan Nama ">
         </div>
         <div class="form-group">
             <label>Username</label>
             <input type="text" class="form-control" name="username" placeholder="Masukan Username">
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1">Password</label>
             <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Masukan Password">
         </div>
         <div class="box-body pad">
              		<label>Alamat</label>
                    <textarea id="editor1" name="alamat" rows="10" cols="80">
                                            
                    </textarea>
            </div>
          
         <div class="form-group">
             <label>No Telepon</label>
             <input type="number" class="form-control" name="no_telp_hp" placeholder="Masukan No Telepon">
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1">email</label>
             <input type="email" class="form-control" name="email" id="exampleInputemail1" placeholder="Masukan email">
         </div>
         <div class="form-group">
             <label>Kota Lahir</label>
             <input type="text" class="form-control" name="kota_lahir" placeholder="Masukan Kota Lahir">
         </div>
         <div class="form-group">
             <label>Tanggal Lahir</label>
             <input type="date" class="form-control" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1">Jenis Kelamin</label>
             <input type="text" class="form-control" name="jk" id="exampleInputPassword1" placeholder="Masukan Jenis Kelamin">
         </div>
         <div class="form-group">
             <label>Nama Bank</label>
             <input type="text" class="form-control" name="nama_bank" placeholder="Masukan Nama Bank">
         </div>
         <div class="form-group">
             <label>Nomor Rekening</label>
             <input type="number" class="form-control" name="nomor_rekening" placeholder="Masukan Nama Rekening">
         </div>
         <div class="form-group">
             <label>Atas Nama</label>
             <input type="text" class="form-control" name="atas_nama" placeholder="Masukan Atas Nama">
         </div>
         <div class="form-group">
             <label>Pin</label>
             <input type="password" class="form-control" name="pin" placeholder="Masukan PIN">
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1">ID Upline</label>
             <input type="number" class="form-control" name="id_upline" id="exampleInputPassword1" placeholder="Masukan ID Upline">
         </div>
         <div class="form-group">
             <label>Posisi</label>
             <input type="text" class="form-control" name="posisi" placeholder="Masukan Nama Posisi">
         </div>
         <div class="form-group">
             <label>Level</label>
             <input type="number" class="form-control" name="level" placeholder="Masukan Level">
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1">Tanggal Insert</label>
             <input type="date" class="form-control" name="tgl_insert" id="exampleInputPassword1" placeholder="Masukan Tanggal Insert">
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1">List Upline</label>
             <input type="number" class="form-control" name="list_id_upline" id="exampleInputPassword1" placeholder="Masukan ID Upline">
         </div>
         <div class="form-group">
             <label>ID Member</label>
             <input type="number" class="form-control" name="id_number" placeholder="Masukan Nama Posisi">
         </div>
         <div class="form-group">
             <label>Kota</label>
             <input type="text" class="form-control" name="kota" placeholder="Masukan Kota">
         </div>
         <div class="form-group">
             <label>Kode Pos</label>
             <input type="number" class="form-control" name="kodepos" placeholder="Masukan Kode Pos">
         </div>
         <div class="form-group">
             <label>Pekerjaan</label>
             <input type="text" class="form-control" name="pekerjaan" placeholder="Masukan Pekerjaan">
         </div>
         <div class="form-group">
             <label>Ahli Waris</label>
             <input type="text" class="form-control" name="ahli_waris" placeholder="Masukan Nama Ahli Waris">
         </div>
         <div class="form-group">
             <label>Hubungan Ahli Waris</label>
             <input type="text" class="form-control" name="hubungan_ahli_waris" placeholder="Hubungan Ahli Waris">
         </div>
         <div class="form-group">
             <label>Ibu Kandung</label>
             <input type="text" class="form-control" name="ibu_kandung" placeholder="Masukan Nama Ibu Kandung">
         </div>
         <div class="form-group">
             <label>NPWP</label>
             <input type="number" class="form-control" name="npwp" placeholder="Masukan NPWP">
         </div>
         <div class="form-group">
             <label>No Paspor</label>
             <input type="number" class="form-control" name="no_paspor" placeholder="Masukan No PASPOR">
         </div>
         <div class="form-group">
             <label>Tanggal Dikeluarkan Paspor</label>
             <input type="date" class="form-control" name="tgl_dikeluarkan_pas">
         </div>
         <div class="form-group">
             <label>Tanggal Expired Paspor</label>
             <input type="date" class="form-control" name="tgl_expired_pas">
         </div>
         <div class="form-group">
             <label>Tempat Paspor Di keluarkan</label>
             <input type="text" class="form-control" name="tempat_dikeluarkan_pas" placeholder="Masukan Tempat Paspor Dikeluarkan">
         </div>
         <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="pernah_umroh" id="pernah_umroh" value="0" checked>
                      Tidak Pernah
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="pernah_umroh" id="pernah_umroh" value="1">
                      Pernah
                    </label>
                  </div>
                </div>
            
         <div class="form-group">
             <label>Kali Umroh</label>
             <input type="number" class="form-control" name="kali_umroh" placeholder="Berapa Kali Umroh">
         </div>
         <div class="form-group">
             <label>Tanggal Terakhir Berangkat</label>
             <input type="date" class="form-control" name="tgl_terakhir_berangkat" >
         </div>
         <div class="form-group">
             <label>Tanggal Rencana Umroh</label>
             <input type="date" class="form-control" name="tgl_rencana_umroh">
         </div>
         <div class="form-group">
             <label>Paket</label>
             <input type="text" class="form-control" name="paket" placeholder="Masukan Paket">
         </div>
         <div class="form-group">
             <label>Nama Mahram</label>
             <input type="text" class="form-control" name="nama_mahram" placeholder="Masukan Nama Mahram">
         </div>
           <div class="form-group">
             <label>Hubungan Mahram</label>
             <input type="text" class="form-control" name="hubungan_mahram" placeholder="Masukan Hubungan Mahram">
         </div>

         <div class="form-group">
             <label>Nama Referensi</label>
             <input type="text" class="form-control" name="nama_referensi" placeholder="Masukan Nama Referensi">
         </div>
         <div class="form-group">
             <label>No Telfon Referensi</label>
             <input type="number" class="form-control" name="nohp_referensi" placeholder="Masukan No Telfon Referensi">
         </div>
         <div class="form-group">
             <label>ID Referensi</label>
             <input type="number" class="form-control" name="id_referensi" >
         </div>



         <div class="form-group">
             <label for="exampleInputFile">Foto</label>
             <input type="file" name="userfile" />

             <!-- <p class="help-block">Example block-level help text here.</p> -->
         </div>


         <input type="hidden" name="created_by" class="form-control">
         <input type="hidden" name="created_date" class="form-control">
         <input type="hidden" name="is_active" class="form-control" value="1">


         <div class="box-footer">
             <button type="submit" class="btn btn-primary">Submit</button>
         </div>

</form>
</div>
</div>