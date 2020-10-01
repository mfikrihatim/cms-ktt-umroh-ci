<form action="<?php echo site_url('Welcome/UpdateDataAdmin'); ?>" method="post" enctype="multipart/form-data">
  <!-- Staff -->
  <!-- Username -->
  <div class="form-group">
    <label>Nama Admin</label>
    <input type="hidden" name="id" value="<?php echo $detail['id']; ?>" class="form-control">
    <input type="text" class="form-control" name="nama" value="<?php echo $detail['nama']; ?>" placeholder="Nama Admin">
  </div>
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" name="username" value="<?php echo $detail['username']; ?>" placeholder="Username">
  </div>
  <!-- Password -->
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" value="<?php echo $detail['password']; ?>" id="exampleInputPassword1" placeholder="Password">
  </div>




  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>