<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">EDIT DATA USER</h3>

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
    
    <form action="<?php echo base_url('C_daftar/simpan_perubahan/'.$this->uri->segment(3)); ?>" method="post" enctype="multipart/form-data">
   
        <input type="hidden" name="id_user" class="form-control"  value="<?php echo $tampil['id_user']; ?>">
   
        <div class="col-md-6">
      
         <div class="form-group has-feedback <?php echo form_error('nama'); ?>">
          <input type="text" class="form-control" name="nama" placeholder="Full name" value="<?php echo $tampil['nama']; ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback <?php echo form_error('email'); ?>">
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $tampil['email']; ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
     <div class="form-group has-feedback <?php echo form_error('level'); ?>">
         <select class="form-control" name="level">
                    <option></option>
                    <option>--level--</option>
                    <option>admin</option>
                    <option>user</option>
                  </select>
      
     </div>
            
     <div class="form-group has-feedback <?php echo form_error('status'); ?>">
         <select class="form-control" name="status" >
                     <option></option>
                     <option>--status--</option>
                    <option>aktif</option>
                    <option>tidak</option>
                  </select>
      
     </div>
      
     
            
    <div class="form-group has-feedback <?php echo form_error('password1'); ?>">
        <input type="password" name="password1" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback <?php echo form_error('password2'); ?>">
          <input type="password"  name="password2" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
            
  
        </div>
        <div class="col-md-6">
            <div class="form-group has-feedback <?php echo form_error('gambar'); ?>">
                <input type="file" class="form-control" name="gambar"  placeholder="Masukan foto" >
        <span class="fa fa-upload form-control-feedback"></span>
      </div>
            
        </div> 
      
        
       </div>
        <div class="box-footer with-border">
          <div class="col-xs-2 pull-left">
              <button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="simpanPerubahan" class="btn btn-primary btn-block btn-flat">Simpan Perubahan</button>
          </div>
      </div>
    </form>
     
  </div>
<?php } ?>  


