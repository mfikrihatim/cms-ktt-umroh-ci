<form action="<?php echo site_url('Welcome/UpdateDataMember'); ?>" method="post" enctype="multipart/form-data">
    <!-- Staff -->
    <!-- Username -->
    <div class="form-group">
        <label>Pilih Voucher</label>
        <select class="form-control" name="id_voucher" required>
            <option selected disabled>Pilih Voucher</option>
            <?php
            $voucher = $this->MSudi->GetData('tb_voucher');
            foreach ($voucher as $ReadDS) {
            ?>
                <option value="<?php echo $ReadDS->id; ?>"><?php echo $ReadDS->no_voucher; ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="hidden" name="id" value="<?php echo $detail['id']; ?>" class="form-control">
        <input type="text" class="form-control" name="nama" value="<?php echo $detail['nama']; ?>" placeholder="Masukan Nama ">
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $detail['username']; ?>" placeholder="Masukan Username">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $detail['password']; ?>" id="exampleInputPassword1" placeholder="Masukan Password">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" class="form-control" name="alamat" value="<?php echo $detail['alamat']; ?>" placeholder="Masukan Alamat">
    </div>
    <div class="form-group">
        <label>No Telepon</label>
        <input type="text" class="form-control" name="no_telp_hp" value="<?php echo $detail['no_telp_hp']; ?>" placeholder="Masukan No Telepon">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $detail['email']; ?>" id="exampleInputemail1" placeholder="Masukan email">
    </div>
    <div class="form-group">
        <label>Kota Lahir</label>
        <input type="text" class="form-control" name="kota_lahir" value="<?php echo $detail['kota_lahir']; ?>" placeholder="Masukan Kota Lahir">
    </div>
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $detail['tgl_lahir']; ?>" placeholder="Masukan Tanggal Lahir">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Jenis Kelamin</label>
        <input type="text" class="form-control" name="jk" value="<?php echo $detail['jk']; ?>" id="exampleInputPassword1" placeholder="Masukan Jenis Kelamin">
    </div>
    <div class="form-group">
        <label>Nama Bank</label>
        <input type="text" class="form-control" name="nama_bank" value="<?php echo $detail['nama_bank']; ?>" placeholder="Masukan Nama Bank">
    </div>
    <div class="form-group">
        <label>Nomor Rekening</label>
        <input type="number" class="form-control" name="nomor_rekening" value="<?php echo $detail['nomor_rekening']; ?>" placeholder="Masukan Nama Rekening">
    </div>
    <div class="form-group">
        <label>Atas Nama</label>
        <input type="text" class="form-control" name="atas_nama" value="<?php echo $detail['atas_nama']; ?>" placeholder="Masukan Atas Nama">
    </div>
    <div class="form-group">
        <label>Pin</label>
        <input type="password" class="form-control" name="pin" value="<?php echo $detail['pin']; ?>" placeholder="Masukan PIN">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">ID Upline</label>
        <input type="number" class="form-control" name="id_upline" value="<?php echo $detail['id_upline']; ?>" id="exampleInputPassword1" placeholder="Masukan ID Upline">
    </div>
    <div class="form-group">
        <label>Posisi</label>
        <input type="text" class="form-control" name="posisi" value="<?php echo $detail['posisi']; ?>" placeholder="Masukan Nama Posisi">
    </div>
    <div class="form-group">
        <label>Level</label>
        <input type="number" class="form-control" name="level" value="<?php echo $detail['level']; ?>" placeholder="Masukan Level">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Tanggal Insert</label>
        <input type="date" class="form-control" name="tgl_insert" value="<?php echo $detail['tgl_insert']; ?>" id="exampleInputPassword1" placeholder="Masukan Tanggal Insert">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">List Upline</label>
        <input type="number" class="form-control" name="list_id_upline" value="<?php echo $detail['list_id_upline']; ?>" id="exampleInputPassword1" placeholder="Masukan ID Upline">
    </div>
    <div class="form-group">
        <label>ID Member</label>
        <input type="number" class="form-control" name="id_number" value="<?php echo $detail['id_member']; ?>" placeholder="Masukan Nama Posisi">
    </div>
    <div class="form-group">
             <label>Kota</label>
             <input type="text" class="form-control" name="kota" value="<?php echo $detail['kota']; ?>"placeholder="Masukan Kota">
         </div>
         <div class="form-group">
             <label>Kode Pos</label>
             <input type="number" class="form-control" name="kodepos" value="<?php echo $detail['kodepos']; ?>"placeholder="Masukan Kode Pos">
         </div>
         <div class="form-group">
             <label>Pekerjaan</label>
             <input type="text" class="form-control" name="pekerjaan" value="<?php echo $detail['pekerjaan']; ?>"placeholder="Masukan Pekerjaan">
         </div>
         <div class="form-group">
             <label>Ahli Waris</label>
             <input type="text" class="form-control" name="ahli_waris" value="<?php echo $detail['ahli_waris']; ?>" placeholder="Masukan Nama Ahli Waris">
         </div>
         <div class="form-group">
             <label>Hubungan Ahli Waris</label>
             <input type="text" class="form-control" name="hubungan_ahli_waris" value="<?php echo $detail['hubungan_ahli_waris']; ?>"placeholder="Hubungan Ahli Waris">
         </div>
         <div class="form-group">
             <label>Ibu Kandung</label>
             <input type="text" class="form-control" name="ibu_kandung" value="<?php echo $detail['ibu_kandung']; ?>" placeholder="Masukan Nama Ibu Kandung">
         </div>
         <div class="form-group">
             <label>NPWP</label>
             <input type="number" class="form-control" name="npwp" value="<?php echo $detail['npwp']; ?>" placeholder="Masukan NPWP">
         </div>
         <div class="form-group">
             <label>No Paspor</label>
             <input type="number" class="form-control" name="no_paspor" value="<?php echo $detail['no_paspor']; ?>" placeholder="Masukan No PASPOR">
         </div>
         <div class="form-group">
             <label>Tanggal Dikeluarkan Paspor</label>
             <input type="date" class="form-control" name="tgl_dikeluarkan_pas" value="<?php echo $detail['tgl_dikeluarkan_pas']; ?>">
         </div>
         <div class="form-group">
             <label>Tanggal Expired Paspor</label>
             <input type="date" class="form-control" name="tgl_expired_pas" value="<?php echo $detail['tgl_expired_pas']; ?>">
         </div>
         <div class="form-group">
             <label>Tempat Paspor Di keluarkan</label>
             <input type="text" class="form-control" name="tempat_dikeluarkan_pas"  value="<?php echo $detail['tempat_dikeluarkan_pas']; ?> " placeholder="Masukan Tempat Paspor Dikeluarkan">
         </div>
         <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="pernah_umroh" id="pernah_umroh" value="0" <?php if($detail['pernah_umroh']=='0') echo 'checked'?>>
                      Tidak Pernah
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="pernah_umroh" id="pernah_umroh" value="1"<?php if($detail['pernah_umroh']=='1') echo 'checked'?>>
                      Pernah
                    </label>
                  </div>
                </div>
            
         <div class="form-group">
             <label>Kali Umroh</label>
             <input type="number" class="form-control" name="kali_umroh" placeholder="Berapa Kali Umroh" value="<?php echo $detail['kali_umroh']; ?>">
         </div>
         <div class="form-group">
             <label>Tanggal Terakhir Berangkat</label>
             <input type="date" class="form-control" name="tgl_terakhir_berangkat"value="<?php echo $detail['tgl_terakhir_berangkat']; ?>" >
         </div>
         <div class="form-group">
             <label>Tanggal Rencana Umroh</label>
             <input type="date" class="form-control" name="tgl_rencana_umroh" value="<?php echo $detail['tgl_rencana_umroh']; ?>">
         </div>
         <div class="form-group">
             <label>Paket</label>
             <input type="text" class="form-control" name="paket" placeholder="Masukan Paket" value="<?php echo $detail['paket']; ?>">
         </div>
         <div class="form-group">
             <label>Nama Mahram</label>
             <input type="text" class="form-control" name="nama_mahram" placeholder="Masukan Nama Mahram" value="<?php echo $detail['nama_mahram']; ?>">
         </div>
           <div class="form-group">
             <label>Hubungan Mahram</label>
             <input type="text" class="form-control" name="hubungan_mahram" placeholder="Masukan Hubungan Mahram" value="<?php echo $detail['hubungan_mahram']; ?>">
         </div>

         <div class="form-group">
             <label>Nama Referensi</label>
             <input type="text" class="form-control" name="nama_referensi" placeholder="Masukan Nama Referensi" value="<?php echo $detail['nama_referensi']; ?>">
         </div>
         <div class="form-group">
             <label>No Telfon Referensi</label>
             <input type="number" class="form-control" name="nohp_referensi" placeholder="Masukan No Telfon Referensi" value="<?php echo $detail['nohp_referensi']; ?>">
         </div>
         <div class="form-group">
             <label>ID Referensi</label>
             <input type="number" class="form-control" name="id_referensi" value="<?php echo $detail['id_referensi']; ?>" >
         </div>


    <div class="form-group">
        <td><img src="<?php echo base_url('./upload/Member/') . $detail['foto']; ?>" width="auto" height="100px"></td>
        <label for="exampleInputFile">Foto</label>
        <input type="file" name="userfile" />

        <!-- <p class="help-block">Example block-level help text here.</p> -->
    </div>






    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>