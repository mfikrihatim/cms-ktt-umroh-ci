<?php
  if($this->session->flashdata('message')){
    echo '<div class="alert alert-warning"><p class="text-center align-middle">';
    echo $this->session->flashdata('message');
    echo '</p></div>';
  }elseif($this->session->flashdata('update')){
    echo '<div class="alert alert-danger"><p class="text-center align-middle">';
    echo $this->session->flashdata('update');
    echo '</p></div>';
  }
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 class="box-title">Data Admin</h2>
        <div class="box-header">
        <button type="button" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#myModal"><div class="col-md-3 col-sm-4"></div></a>TAMBAH DATA</h3> </button>

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

                  <th>Nama Admin</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Created By</th>
                  <th>Created Date</th>
                  <th>Update by</th>
                  <th>Update date</th>
                  <th>Delete By</th>
                  <th>Delete date</th>
                  <th>Is Avtive </th>
                  <th>Tools</th>
                </tr>
                <?php
	if(!empty($DataAdmin))
	{
		foreach($DataAdmin as $ReadDS)
		{
	?>
      <tr>
          <td><?php echo $ReadDS->id; ?></td>
          <td><?php echo $ReadDS->nama; ?></td>
					<td><?php echo $ReadDS->username; ?></td>
          <td><?php echo $ReadDS->password; ?></td>
          <td><?php echo $ReadDS->created_by; ?></td>
          <td><?php echo $ReadDS->created_at; ?></td>
          <td><?php echo $ReadDS->updated_by; ?></td>
          <td><?php echo $ReadDS->updated_at; ?></td>
          <td><?php echo $ReadDS->deleted_by; ?></td>
          <td><?php echo $ReadDS->deleted_at; ?></td>
          <td><?php echo $ReadDS->is_active; ?></td>

					<td>
					<a href="<?php echo site_url('Welcome/DataAdmin/'.$ReadDS->id.'/view') ?>"><i class="fa fa-edit"></i></a>
					<a href="<?php echo site_url('Welcome/DeleteDataAdmin/'.$ReadDS->id) ?>"><i class="fa fa-fw fa-trash"></i></a>
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
		<h3 class="box-title">Tambah Data Admin</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
        <form action="<?php echo site_url('Welcome/AddDataAdmin'); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
                  <label>Nama Admin</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Admin">
                </div> 
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Masukan Nama Username">
                </div> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Masukan Password">
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
