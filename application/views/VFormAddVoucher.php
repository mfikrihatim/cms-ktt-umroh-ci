<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Voucher</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form action="<?php echo site_url('Welcome/AddDataVoucher'); ?>" method="post" enctype="multipart/form-data">
            <!-- <div class="form-group">
                <label>Pilih Member</label>
                <select class="form-control" name="id_member_pemilik" required>
                    <option selected disabled>Pilih Member</option>
                    <?php
                    //  $voucher = $this->MSudi->GetData('tb_voucher');
                    foreach ($member as $ReadDS) {
                    ?>
                        <option value="<?php echo $ReadDS->id; ?>"><?php echo $ReadDS->nama; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div> -->

            <div class="form-group">
                <label>No Voucher</label>
                <input type="text" class="form-control" name="no_voucher" placeholder="Masukan No Voucher ">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control" name="status" placeholder="Masukan Status ">
            </div>
            <!-- <div class="form-group">
                <label>Tanggal Beli</label>
                <input type="date" class="form-control" name="tgl_beli" placeholder="Masukan Tanggal Beli">
            </div> -->
            <!-- <div class="form-group">
                <label>Tanggal Digunakan</label>
                <input type="date" class="form-control" name="tgl_digunakan" placeholder="Masukan Tanggal Digunakan">
            </div> -->
            <input type="hidden" name="id_admin" class="form-control">



            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>