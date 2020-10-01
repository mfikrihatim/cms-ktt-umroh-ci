<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2 class="box-title">Data Member</h2>
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
                            <th>ID Voucher</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Kota Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto </th>
                            <th>Nama Bank</th>
                            <th>Nomor Rekening</th>
                            <th>Atas Nama</th>
                            <th>Pin</th>
                            <th>ID Upline</th>
                            <th>Posisi</th>
                            <th>Level</th>
                            <th>Tanggal Insert </th>
                            <th>List ID Upline</th>
                            <th>ID Member</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th>Update by</th>
                            <th>Update date</th>
                            <th>Delete By</th>
                            <th>Delete date</th>
                            <th>Is Avtive </th>
                        </tr>
                        <?php
                        if (!empty($DataMember)) {
                            foreach ($DataMember as $ReadDS) {
                        ?>
                                <tr>
                                    <td><?php echo $ReadDS->id; ?></td>
                                    <td><?php echo $ReadDS->id_voucher; ?></td>
                                    <td><?php echo $ReadDS->nama; ?></td>
                                    <td><?php echo $ReadDS->username; ?></td>
                                    <td><?php echo $ReadDS->password; ?></td>
                                    <td><?php echo $ReadDS->alamat; ?></td>
                                    <td><?php echo $ReadDS->no_telp_hp; ?></td>
                                    <td><?php echo $ReadDS->email; ?></td>
                                    <td><?php echo $ReadDS->kota_lahir; ?></td>
                                    <td><?php echo $ReadDS->tgl_lahir; ?></td>
                                    <td><?php echo $ReadDS->jk; ?></td>
                                    <td><img src="<?php echo base_url('./upload/Member/') . $ReadDS->foto; ?>" width="auto" height="100px"></td>
                                    <td><?php echo $ReadDS->nama_bank; ?></td>
                                    <td><?php echo $ReadDS->nomor_rekening; ?></td>
                                    <td><?php echo $ReadDS->atas_nama; ?></td>
                                    <td><?php echo $ReadDS->pin; ?></td>
                                    <td><?php echo $ReadDS->id_upline; ?></td>
                                    <td><?php echo $ReadDS->posisi; ?></td>
                                    <td><?php echo $ReadDS->level; ?></td>
                                    <td><?php echo $ReadDS->tgl_insert; ?></td>
                                    <td><?php echo $ReadDS->list_id_upline; ?></td>
                                    <td><?php echo $ReadDS->id_member; ?></td>
                                    <td><?php echo $ReadDS->created_by; ?></td>
                                    <td><?php echo $ReadDS->created_at; ?></td>
                                    <td><?php echo $ReadDS->updated_by; ?></td>
                                    <td><?php echo $ReadDS->updated_at; ?></td>
                                    <td><?php echo $ReadDS->deleted_by; ?></td>
                                    <td><?php echo $ReadDS->deleted_at; ?></td>
                                    <td><?php echo $ReadDS->is_active; ?></td>

                                    <td>
                                        <a href="<?php echo site_url('Welcome/DataMember/' . $ReadDS->id . '/view') ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Welcome/DeleteDataMember/' . $ReadDS->id) ?>"><i class="fa fa-fw fa-trash"></i></a>
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
                                            <h3 class="box-title">Tambah Data Member</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fa fa-minus"></i></button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                                    <i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <form action="<?php echo site_url('Welcome/AddDataMember'); ?>" method="post" enctype="multipart/form-data">
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
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama ">
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="Masukan Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Masukan Password">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat">
                                            </div>
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input type="text" class="form-control" name="no_telp_hp" placeholder="Masukan No Telepon">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">email</label>
                                                <input type="email" class="form-control" name="email" id="exampleInputemail1" placeholder="Masukan email">
                                            </div>
                                            <div class="form-group">
                                                <label>Kota Lahir</label>
                                                <input type="text" class="form-control" name="kota_lahir" placeholder="Masukan Kota Lahir">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Jenis Kelamin</label>
                                                <input type="text" class="form-control" name="jk" id="exampleInputPassword1" placeholder="Masukan Jenis Kelamin">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Bank</label>
                                                <input type="text" class="form-control" name="nama_bank" placeholder="Masukan Nama Bank">
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Rekening</label>
                                                <input type="number" class="form-control" name="nomor_rekening" placeholder="Masukan Nama Rekening">
                                            </div>
                                            <div class="form-group">
                                                <label>Atas Nama</label>
                                                <input type="text" class="form-control" name="atas_nama" placeholder="Masukan Atas Nama">
                                            </div>
                                            <div class="form-group">
                                                <label>Pin</label>
                                                <input type="password" class="form-control" name="pin" placeholder="Masukan PIN">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">ID Upline</label>
                                                <input type="number" class="form-control" name="id_upline" id="exampleInputPassword1" placeholder="Masukan ID Upline">
                                            </div>
                                            <div class="form-group">
                                                <label>Posisi</label>
                                                <input type="text" class="form-control" name="posisi" placeholder="Masukan Nama Posisi">
                                            </div>
                                            <div class="form-group">
                                                <label>Level</label>
                                                <input type="number" class="form-control" name="level" placeholder="Masukan Level">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tanggal Insert</label>
                                                <input type="date" class="form-control" name="tgl_insert" id="exampleInputPassword1" placeholder="Masukan Tanggal Insert">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">List Upline</label>
                                                <input type="number" class="form-control" name="list_id_upline" id="exampleInputPassword1" placeholder="Masukan ID Upline">
                                            </div>
                                            <div class="form-group">
                                                <label>ID Member</label>
                                                <input type="number" class="form-control" name="id_number" placeholder="Masukan Nama Posisi">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Foto</label>
                                                <input type="file" name="userfile" />

                                                <!-- <p class="help-block">Example block-level help text here.</p> -->
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