<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2 class="box-title">Data Member</h2>
                <div class="box-header">
                    <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddMember'); ?>">
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
                            <th>Kota</th>
                            <th>Kode Pos</th>
                            <th>Pekerjaan</th>
                            <th>Ahli Waris</th>
                            <th>hubungan Ahli Waris</th>
                            <th>Ibu kandung</th>
                            <th>NPWP</th>
                            <th>No Paspor</th>
                            <th>Tanggal Dikeluarkan Paspor</th>
                            <th>Tanggal Expired Paspor</th>
                            <th>Tempat Paspor dikeluarkan</th>
                            <th>Pernah Umroh</th>
                            <th>Kali Umroh</th>
                            <th>Tanggal Terakhir Berangkat</th>
                            <th>Tanggal Rencana Umroh</th>
                            <th>Paket</th>
                            <th>Nama Mahram</th>
                            <th>Hubungan Mahram</th>
                            <th>Nama Referensi</th>
                            <th>No Hp Referensi</th>
                            <th>ID Referensi</th>
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
                                    <td><?php echo $ReadDS->kota; ?></td>
                                    <td><?php echo $ReadDS->kodepos; ?></td>
                                    <td><?php echo $ReadDS->pekerjaan; ?></td>
                                    <td><?php echo $ReadDS->ahli_waris; ?></td>
                                    <td><?php echo $ReadDS->hubungan_ahli_waris; ?></td>
                                    <td><?php echo $ReadDS->ibu_kandung; ?></td>
                                    <td><?php echo $ReadDS->npwp; ?></td>
                                    <td><?php echo $ReadDS->no_paspor; ?></td>
                                    <td><?php echo $ReadDS->tgl_dikeluarkan_pas; ?></td>
                                    <td><?php echo $ReadDS->tgl_expired_pas; ?></td>
                                    <td><?php echo $ReadDS->tempat_dikeluarkan_pas; ?></td>
                                    <td><?php echo $ReadDS->pernah_umroh; ?></td>
                                    <td><?php echo $ReadDS->kali_umroh; ?></td>
                                    <td><?php echo $ReadDS->tgl_terakhir_berangkat; ?></td>
                                    <td><?php echo $ReadDS->tgl_rencana_umroh; ?></td>
                                    <td><?php echo $ReadDS->paket; ?></td>
                                    <td><?php echo $ReadDS->nama_mahram; ?></td>
                                    <td><?php echo $ReadDS->hubungan_mahram; ?></td>
                                    <td><?php echo $ReadDS->nama_referensi; ?></td>
                                    <td><?php echo $ReadDS->nohp_referensi; ?></td>
                                    <td><?php echo $ReadDS->id_referensi; ?></td>
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
                </div>