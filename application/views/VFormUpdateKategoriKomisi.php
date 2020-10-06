<form action="<?php echo site_url('Welcome/UpdateDataKategoriKomisi'); ?>" method="post" enctype="multipart/form-data">
    <!-- Staff -->
    <!-- Username -->
    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="hidden" name="id" value="<?php echo $detail['id']; ?>" class="form-control">
        <input type="text" class="form-control" name="nama_kategori" value="<?php echo $detail['nama_kategori']; ?>" placeholder="Nama Kategori">
    </div>
   
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>