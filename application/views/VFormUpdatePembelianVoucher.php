<form action="<?php echo site_url('Welcome/UpdateDataPembelianVoucher'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $detail['id']; ?>" class="form-control">
        <label>Pilih Paket</label>
        <select class="form-control" name="nama_paket" required>
            <option selected disabled>Pilih Nama Paket</option>
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
        <label>Jumlah Voucher</label>
        <input type="number" class="form-control" name="jumlah_voucher" value="<?php echo $detail['jumlah_voucher']; ?>" placeholder="Jumlah Voucher">
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $detail['harga']; ?>" placeholder="Masukan Jumlah Harga">
    </div>
    <div class="form-group">
        <label>Status</label><br>
        <input type="radio" id="0" name="status" value="0" <?php if ($detail['status'] == "0") {
                                                                echo "checked";
                                                            } ?>>
        <label for="0">Belum Di Bayar</label><br>
        <input type="radio" id="1" name="status" value="1" <?php if ($detail['status'] == "1") {
                                                                echo "checked";
                                                            } ?>>
        <label for="1">Sudah Di Bayar</label><br>
        <input type="radio" id="2" name="status" value="2" <?php if ($detail['status'] == "2") {
                                                                echo "checked";
                                                            } ?>>
        <label for="2">Ditolak</label>
    </div>

    <!-- <div class="form-group">
        <label>Tanggal Beli</label>
        <input type="date" class="form-control" name="tgl_beli" value="<?php echo $detail['tgl_beli']; ?>" placeholder="Masukan Tanggal Beli">
    </div> -->

    <!-- <div class="form-group">
        <label>Tanggal Digunakan</label>
        <input type="date" class="form-control" name="tgl_digunakan" value="<?php echo $detail['tgl_digunakan']; ?>" placeholder="Masukan Tanggal Digunakan">
    </div> -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>