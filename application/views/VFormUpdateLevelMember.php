<form action="<?php echo site_url('Welcome/UpdateDataLevelMember'); ?>" method="post" enctype="multipart/form-data">
    <!-- Staff -->
    <!-- Username -->
    <div class="form-group">
        <label>Kode Level</label>
        <input type="hidden" name="id" value="<?php echo $detail['id']; ?>" class="form-control">
        <input type="text" class="form-control" name="kd_level" value="<?php echo $detail['kd_level']; ?>" placeholder="Kode Level">
    </div>
    <div class="form-group">
        <label>Nama Level</label>
        <input type="text" class="form-control" name="nama_level" value="<?php echo $detail['nama_level']; ?>" placeholder="Username">
    </div>
    <!-- Password -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>