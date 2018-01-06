<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">DATA USER</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Kecilin">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Tutup">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
<div class="box-body" style="">
   
<?php 
foreach ($data_user->result_array() as $tampil ){
    
?>
            
            
   <div class="col-md-6">
      <div class="form-group has-feedback ">
          <input type="text" class="form-control" name="nama"  placeholder="Full name" readonly="" value="<?php echo $tampil['nama']; ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email" readonly="" value="<?php echo $tampil['email']; ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
          <input type="email" class="form-control" name="level" placeholder="level" readonly="" value="<?php echo $tampil['level']; ?>">
        <span class="fa fa-backward form-control-feedback"></span>
      </div>
    
            
       <div class="form-group has-feedback">
          <input type="email" class="form-control" name="status" placeholder="status" readonly="" value="<?php echo $tampil['status']; ?>">
        <span class="fa fa-backward form-control-feedback"></span>
      </div>
    
      
    
        </div>
        <div class="col-md-6">
            <div class="form-group has-feedback">
                <p align="center "><img src="<?php echo base_url('uploads/user/') ?><?php echo $tampil['gambar'];?> " style="width: auto; height:250px;  " > 
                </p></div>
            
        </div> 
      

       </div>
        <div class="box-footer with-border">
          <div class="col-xs-2 pull-left">
              <a href="<?php echo base_url('C_daftar'); ?>" ><button class="btn btn-warning btn-block btn-flat">Back</button></a>
          </div>
     
      </div>
<?php } ?>  
</div></div>

