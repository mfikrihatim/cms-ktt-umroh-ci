<form action="<?php echo site_url('Welcome/UpdateDataVoucher'); ?>" method="post" enctype="multipart/form-data">
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
    <!-- <div class="form-group">
        <label>No Voucher</label>
        <input type="hidden" name="id" value="<?php echo $detail['id']; ?>" class="form-control">
        <input type="text" class="form-control" name="nama" value="<?php echo $detail['nama']; ?>" placeholder="Masukan Nama ">
    </div> -->
    <div class="form-group">
        <label>No Voucher</label>
        <input type="text" class="form-control" name="no_voucher" value="<?php echo $detail['no_voucher']; ?>" placeholder="Masukan Username">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Status</label>
        <input type="number" class="form-control" name="status" value="<?php echo $detail['status']; ?>" id="exampleInputPassword1" placeholder="Masukan Status">
    </div>

    <div class="form-group">
        <label>Tanggal Beli</label>
        <input type="date" class="form-control" name="tgl_beli" value="<?php echo $detail['tgl_beli']; ?>" placeholder="Masukan Tanggal Beli">
    </div>

    <div class="form-group">
        <label>Tanggal Digunakan</label>
        <input type="date" class="form-control" name="tgl_digunakan" value="<?php echo $detail['tgl_digunakan']; ?>" placeholder="Masukan Tanggal Digunakan">
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>