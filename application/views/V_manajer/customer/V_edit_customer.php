
    
<?php foreach ($data_customer->result_array() as $data){
    
}
?>
<div class="x_panel">
<div class="x_title">
                    <h2>EDIT DATA <?php echo $data['nama_customer'];?></h2>
                   
                    <div class="clearfix"></div>
                  </div>
<form action="<?php echo base_url('C_manajer/update_customer'); ?>" method="post" enctype="multipart/form-data">
   
     <div class="col-md-6">
      <div class="form-group has-feedback">
          <input type="hidden" class="form-control" value="<?php echo $data['id_customer'];?>" name="id_customer" >
       
          <input type="text" class="form-control" value="<?php echo $data['nama_customer'];?>" name="nama_customer" >
        <span class="fa fa-edit form-control-feedback"></span>
      </div>
    
      <div class="form-group has-feedback">
          <textarea class="form-control" name="alamat"> <?php echo $data['alamat'];?></textarea>
        <span class="fa fa-edit form-control-feedback"></span>
      </div>
         
        <div class="form-group has-feedback">
          <input type="text" class="form-control" value="<?php echo $data['telp'];?>" name="telp" >
        <span class="fa fa-edit form-control-feedback"></span>
      </div>
          <div class="form-group has-feedback">
          <input type="text" class="form-control" value="<?php echo $data['contact_person'];?>" name="contact_person" >
        <span class="fa fa-edit form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
          <input type="text" class="form-control" value="<?php echo $data['telp_fax'];?>" name="telp_fax">
        <span class="fa fa-edit form-control-feedback"></span>
      </div>   
     </div> 
         
                  
        <div class="x_content">
           <div class="col-xs-2 pull-left">
              <button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btnEdit" class="btn btn-primary btn-block btn-flat">Simpan</button>
          </div>
        </div>
                      
</div>


</div>
                    
                 