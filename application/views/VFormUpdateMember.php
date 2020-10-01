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
        <td><img src="<?php echo base_url('./upload/Member/') . $detail['foto']; ?>" width="auto" height="100px"></td>
        <label for="exampleInputFile">Foto</label>
        <input type="file" name="userfile" />

        <!-- <p class="help-block">Example block-level help text here.</p> -->
    </div>






    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>