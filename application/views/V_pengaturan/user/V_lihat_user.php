<div class="x_panel">
<div class="x_title">
<h2>Lihat User</h2>
<div class="clearfix"></div>
 </div>
<?php 
foreach ($data_edit->result_array() as $data){
}
?>
   
     <div class="col-md-6">
      <div class="form-group has-feedback">
          <input type="text" readonly="" class="form-control" name="nama" placeholder="Full name" value="<?php echo $data['nama'] ?>">
         <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      <div class="form-group has-feedback">
          <input type="email" readonly="" class="form-control" name="email" placeholder="Email" value="<?php echo $data['email'] ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
     <div class="form-group has-feedback">
         <select class="form-control" disabled="" name="level">
                    <option ><?php echo $data['level'] ?></option>
                    <option>super admin</option>
                    <option>admin toko</option>
                    <option>admin pos</option>
                    <option>admin inventory</option>
                  </select>
      
     </div>
            
     <div class="form-group has-feedback">
         <select class="form-control" disabled="" name="status">
                    <option><?php echo $data['status'] ?></option>
                    <option>aktif</option>
                    <option>tidak</option>
                  </select>
      
     </div>
    </div>
        <div class="col-md-6">
        <div class="profile_pic">
            <img src="<?php echo base_url('uploads/user_thumb/'.$data['gambar']); ?>" alt="..." class="img-thumbnail profile_img">
              </div>
        </div>
            
        </div> 
  </div>