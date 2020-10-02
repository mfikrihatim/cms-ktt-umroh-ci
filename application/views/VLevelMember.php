<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2 class="box-title">Data Level Member</h2>
                <div class="box-header">
                    <button type="button" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#myModal">
                        <div class="col-md-3 col-sm-4"></div></a>TAMBAH DATA</h3>
                    </button>

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
                            <th>Kode Level</th>
                            <th>Nama Level</th>
                            <!-- <th>Is Active</th> -->
                        </tr>
                        <?php
                        if (!empty($DataLevelMember)) {
                            foreach ($DataLevelMember as $ReadDS) {
                        ?>
                                <tr>
                                    <td><?php echo $ReadDS->id; ?></td>
                                    <td><?php echo $ReadDS->kd_level; ?></td>
                                    <td><?php echo $ReadDS->nama_level; ?></td>
                                    <!-- <td><?php echo $ReadDS->is_active; ?></td> -->

                                    <td>
                                        <a href="<?php echo site_url('Welcome/DataLevelMember/' . $ReadDS->id . '/view') ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Welcome/DeleteDataLevelMember/' . $ReadDS->id) ?>"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">

                                    <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button> -->
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Tambah Data Level Member</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fa fa-minus"></i></button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                                    <i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <form action="<?php echo site_url('Welcome/AddDataLevelMember'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Kode Level</label>
                                                <input type="text" class="form-control" name="kd_level" placeholder="Masukan Nama Level Member">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Level</label>
                                                <input type="text" class="form-control" name="nama_level" placeholder="Masukan Nama Nama Level">
                                            </div>

                                            <input type="hidden" name="created_by" class="form-control">
                                            <input type="hidden" name="created_date" class="form-control">
                                            <input type="hidden" name="is_active" class="form-control" value="1">


                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                        </form>




                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>