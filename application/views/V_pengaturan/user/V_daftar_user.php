<div class="x_panel">
<div class="x_title">
                    <h2>Daftar User</h2>
                   
                    <div class="clearfix"></div>
                  </div>
<form action="<?php echo base_url('C_pengaturan/simpan_user') ?>" method="post" enctype="multipart/form-data">
   
     <div class="col-md-6">
      <div class="form-group has-feedback">
          <input type="text" class="form-control" name="nama" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
     <div class="form-group has-feedback">
         <select class="form-control" name="level">
                    <option></option>
                    <option>super admin</option>
                    <option>admin toko</option>
                    <option>admin pos</option>
                    <option>admin inventory</option>
                  </select>
      
     </div>
            
     <div class="form-group has-feedback">
         <select class="form-control" name="status">
                    <option>status</option>
                    <option>aktif</option>
                    <option>tidak</option>
                  </select>
      
     </div>
      
     
            
    <div class="form-group has-feedback">
        <input type="password" name="password1" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" name="password2" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
        </div>
        <div class="col-md-6">
            <div class="form-group has-feedback">
                <input type="file" class="form-control" name="gambar" placeholder="Masukan foto">
        <span class="fa fa-upload form-control-feedback"></span>
      </div>
            
        </div> 
         
                  
        <div class="x_content">
            <hr>  
           <div class="col-xs-2 pull-left">
               <button type="reset" class="btn btn-warning"><span class="fa fa-close"> Batal</button>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btnDaftar" class="btn btn-success"><span class="fa fa-save"></span> Daftar</button>
          </div>
        </div>
                      
</form></div>