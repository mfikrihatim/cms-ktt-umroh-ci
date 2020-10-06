<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2 class="box-title">Data Master Komisi</h2>
                <div class="box-header">
                    <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddMasterKomisi'); ?>">
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
                            <th>Nama Komisi</th>
                            <th>ID Kategori Komisi</th>
                            <th>ID Level Member</th>
                            <th>Target</th>
                            <th>ID Level Target</th>
                            <th>Target Hari</th>
                            <th>Target Bonus</th>
                            <th>Nominal Ujroh Satuan</th>
                        </tr>
                        <?php
                        if (!empty($DataMasterKomisi)) {
                            foreach ($DataMasterKomisi as $ReadDS) {
                        ?>
                                <tr>
                                    <td><?php echo $ReadDS->id_komisi; ?></td>
                                    <td><?php echo $ReadDS->nama_komisi; ?></td>
                                    <td><?php echo $ReadDS->id_kategori_komisi; ?></td>
                                    <td><?php echo $ReadDS->kd_level_member; ?></td>
                                    <td><?php echo $ReadDS->target; ?></td>
                                    <td><?php echo $ReadDS->kd_level_target; ?></td>
                                    <td><?php echo $ReadDS->target_hari; ?></td>
                                    <td><?php echo $ReadDS->target_bonus; ?></td>
                                    <td><?php echo $ReadDS->nominal_ujroh_satuan; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('Welcome/DataMasterKomisi/' . $ReadDS->id_komisi . '/view') ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Welcome/DeleteDataMasterKomisi/' . $ReadDS->id_komisi) ?>"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>