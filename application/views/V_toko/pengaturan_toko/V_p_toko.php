<div class="x_panel">
<div class="x_title">
   <h2>PENGATURAN TOKO</h2>
     <div class="clearfix"></div>
                  </div>
 <?php 
$data_cek = $this->db->get('pengaturan_toko');

foreach ($data_cek->result_array() as $hasil_cek){
}
if($hasil_cek['alamat'] != NULL) {
?>
<form action="<?php echo base_url('C_toko/edit_pengaturan') ?>" method="post" enctype="multipart/form-data">
   
     <div class="col-md-6">
      <div class="form-group has-feedback">
          <label>Alamat : </label>
          <textarea readonly="" class="form-control" name="alamat"><?php echo$hasil_cek['alamat']; ?></textarea>
         <span class="fa fa-location-arrow form-control-feedback" placeholder="Alamat" ></span>
      </div>
     
      <div class="form-group has-feedback">
         <label>Email : </label>
         <input readonly="" type="hidden" class="form-control" name="id_edit" value="<?php echo $hasil_cek['id_pengaturan']; ?>" placeholder="Email">
         <input readonly="" type="text" class="form-control" name="email" value="<?php echo $hasil_cek['email']; ?>" placeholder="Email">
         <span class="fa fa-map form-control-feedback"></span>
      </div>
     <div class="form-group has-feedback">
              <label>Contact : </label>
              <input readonly="" type="text" class="form-control" value="<?php echo $hasil_cek['contact']; ?>" name="contact" placeholder="Contact">
         <span class="fa fa-text-width form-control-feedback"></span>
      </div>
        
       <div class="x_content">
            <hr>  
           <div class="col-xs-2 pull-right">
               <button type="submit" name="btn_edit_pengaturan" class="btn btn-warning"><span class="fa fa-edit"> Edit</button>
          </div>
     
         
        </div>
     </div>    
   
             
         </div>     
 </form>


    
<?php } else {
?> 
<form action="<?php echo base_url('C_toko/simpan_pengaturan_toko') ?>" method="post" enctype="multipart/form-data">
   
     <div class="col-md-6">
      <div class="form-group has-feedback">
          <label>Alamat : </label>
          <textarea class="form-control" name="alamat"></textarea>
         <span class="fa fa-location-arrow form-control-feedback" placeholder="Alamat" ></span>
      </div>
     
      <div class="form-group has-feedback">
         <label>Email : </label>
        <input type="text" class="form-control" name="email" placeholder="Email">
         <span class="fa fa-map form-control-feedback"></span>
      </div>
     <div class="form-group has-feedback">
              <label>Contact : </label>
      <input type="text" class="form-control" name="contact" placeholder="Contact">
         <span class="fa fa-text-width form-control-feedback"></span>
      </div>
        
       <div class="x_content">
            <hr>  
           <div class="col-xs-2 pull-left">
               <button type="reset" class="btn btn-warning"><span class="fa fa-close"> Batal</button>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btn_pengaturan" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
          </div>
        </div>
     </div>    
   
             
         </div>     
 </form>
    
    
    
<?php }
 ?>   
    
    
</div>
</div>