<form action="<?php echo site_url('Welcome/UpdateDataHistoryTransferVoucher'); ?>" method="post" enctype="multipart/form-data">
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
        <label>ID Penerima</label>
        <input type="hidden" name="id" value="<?php echo $detail['id']; ?>" class="form-control">
        <input type="text" class="form-control" name="id_penerima" value="<?php echo $detail['id_penerima']; ?>" placeholder="Masukan ID Penerima">
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