<form action="<?php echo site_url('Welcome/UpdateDataMasterKomisi'); ?>" method="post" enctype="multipart/form-data">
    <!-- Staff -->
    <!-- Username -->
    <div class="form-group">
        <label>Nama Komisi</label>
        <input type="hidden" name="id_komisi" value="<?php echo $detail['id_komisi']; ?>" class="form-control">
        <input type="text" class="form-control" name="nama_komisi" value="<?php echo $detail['nama_komisi']; ?>" placeholder="Nama Kategori">
    </div>
    <div class="form-group">
                <label>Kategori Komisi</label>
                <select class="form-control" name="id_kategori_komisi" required>
                    <option selected disabled>Pilih Kategori</option>
                    <?php
                    //  $kategori = $this->MSudi->GetDataWhere('tbl_master_komisi', 'is_active', 1)->result();
                    foreach ($kategori as $ReadDS) {
                    ?>
                        <option value="<?php echo $ReadDS->id; ?>"><?php echo $ReadDS->nama_kategori; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Level Member</label>
                <select class="form-control" name="kd_level_member" required>
                    <option selected disabled>Pilih Level Member</option>
                    <?php
                    //  $kategori = $this->MSudi->GetDataWhere('tbl_master_komisi', 'is_active', 1)->result();
                    foreach ($level_member as $ReadDS) {
                    ?>
                        <option value="<?php echo $ReadDS->id; ?>"><?php echo $ReadDS->kd_level; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Target</label>
                <input type="text" class="form-control" name="target" placeholder="Target Jumlah Orang "  value="<?php echo $detail['target']; ?>">
            </div>
            <div class="form-group">
                <label>Level Target</label>
                <select class="form-control" name="kd_level_target" required>
                    <option selected disabled>Pilih Level target</option>
                    <?php
                    //  $kategori = $this->MSudi->GetDataWhere('tbl_master_komisi', 'is_active', 1)->result();
                    foreach ($level_target as $ReadDS) {
                    ?>
                        <option value="<?php echo $ReadDS->id; ?>"><?php echo $ReadDS->kd_level; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            
            <div class="form-group">
                <label>Target Harian</label>
                <input type="number" class="form-control" name="target_hari" placeholder="Target Harian" value="<?php echo $detail['target_hari']; ?>">
            </div>
        
            <div class="form-group">
                <label>Target Bonus</label>
                <input type="text" class="form-control" name="target_bonus" placeholder="Target Bonus" value="<?php echo $detail['target_bonus']; ?>">
            </div>
            <div class="form-group">
                <label>Nominal Ujroh Satuan</label>
                <input type="number" class="form-control" name="nominal_ujroh_satuan" placeholder="Nominal Komisi Per Jamaah"  value="<?php echo $detail['nominal_ujroh_satuan']; ?>">
            </div>
        


    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>