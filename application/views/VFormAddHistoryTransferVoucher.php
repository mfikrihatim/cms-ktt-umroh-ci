<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Transfer Voucher</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form action="<?php echo site_url('Welcome/AddDataHistoryTransferVoucher'); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>ID Voucher</label>
                <select class="form-control" name="id_voucher" required>
                    <option selected disabled>Pilih Voucher</option>
                    <?php
                    //  $kategori = $this->MSudi->GetDataWhere('tbl_master_komisi', 'is_active', 1)->result();
                    foreach ($id_voucher as $ReadDS) {
                    ?>
                        <option value="<?php echo $ReadDS->id; ?>"><?php echo $ReadDS->no_voucher; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>ID Penerima</label>
                <input type="text" class="form-control" name="id_penerima" placeholder="Masukan ID Penerima ">
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>