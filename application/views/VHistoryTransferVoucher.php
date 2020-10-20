<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2 class="box-title">Data History Transfer Voucher</h2>
                <div class="box-header">
                    <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddHistoryTransferVoucher'); ?>">
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
                            <th>ID Voucher</th>
                            <th>ID Penerima</th>
                            <th>Tangaal Insert</th>

                        </tr>
                        <?php
                        if (!empty($DataHistoryTransferVoucher)) {
                            foreach ($DataHistoryTransferVoucher as $ReadDS) {
                        ?>
                                <tr>
                                    <td><?php echo $ReadDS->id; ?></td>
                                    <td><?php echo $ReadDS->id_member; ?></td>
                                    <td><?php echo $ReadDS->id_voucher; ?></td>
                                    <td><?php echo $ReadDS->id_penerima; ?></td>

                                    <td>
                                        <a href="<?php echo site_url('Welcome/DataHistoryTransferVoucher/' . $ReadDS->id . '/view') ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Welcome/DeleteDataHistoryTransferVoucher/' . $ReadDS->id) ?>"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>