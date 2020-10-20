<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2 class="box-title">Data Pembelian Voucher</h2>
                <div class="box-header">
                    <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddPembelianVoucher'); ?>">
                            <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-plus"></i></div>
                        </a></h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID </th>
                            <th>ID Member</th>
                            <th>Nama Paket</th>
                            <th>Jumlah Voucher</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Tanggal Insert</th>
                        </tr>
                        <?php
                        if (!empty($DataPembelianVoucher)) {
                            foreach ($DataPembelianVoucher as $ReadDS) {
                        ?>
                                <tr>
                                    <td><?php echo $ReadDS->id; ?></td>
                                    <td><?php echo $ReadDS->id_member; ?></td>
                                    <td><?php echo $ReadDS->nama_paket; ?></td>
                                    <td><?php echo $ReadDS->jumlah_voucher; ?></td>
                                    <td>Rp.<?php echo $ReadDS->harga; ?></td>
                                    <td><?php echo $ReadDS->status; ?></td>
                                    <td><?php echo $ReadDS->tgl_insert; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('Welcome/DataPembelianVoucher/' . $ReadDS->id . '/view') ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Welcome/DeleteDataPembelianVoucher/' . $ReadDS->id) ?>"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>