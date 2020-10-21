<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Pembelian Voucher</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form action="<?php echo site_url('Welcome/AddDataPembelianVoucher'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
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
                <input type="number" class="form-control" name="jumlah_voucher" placeholder="Masukan Jumlah Voucher " required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga" placeholder="Masukan Harga Voucher" required>
            </div>
            <div class="form-group" required>
                <label>Status</label><br>
                <input type="radio" id="0" name="status" value="0">
                <label for="0">Belum Di Bayar</label><br>
                <input type="radio" id="1" name="status" value="1">
                <label for="1">Sudah Di Bayar</label><br>
                <input type="radio" id="2" name="status" value="2">
                <label for="2">Ditolak</label>

            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>