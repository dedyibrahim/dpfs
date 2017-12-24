<?php 
foreach ($query->result_array() as $data){
 
            
}?>
<?php 
foreach ($data_customer->result_array() as $customer){
 
            
}?>
<?php 
foreach ($sample->result_array() as $_sample){
 
            
}?>
<div class="x_panel" >
 <div class="x_content">
    <div class="x_title">
  
 <form action="<?php echo base_url('C_anamnesa/simpan')?>" method="post" enctype="multipart/formdata">
    <h2>Form Anamnesa</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><input class="form-control" value="<?php echo  $data['record_number_customer'];?>"  readonly="" name="record_number" placeholder="record number" type="text">
                </li>
                    </ul>              
<div class="clearfix"></div>
     
    </div> 
           
   <div class="col-md-6">
       
     <div class="form-group">
         <label>Nama Customer</label>
         <input type="text" value ="<?php echo  $customer['nama_customer'];?>" class="form-control" readonly="" placeholder="Nama customer">
     </div>
     <div class="form-group">
         <label>Jenis Sample</label>
         <input type="text" class="form-control" value="<?php echo $_sample['data_sample'];?>" readonly="" placeholder="Jenis Sample">
     </div>
       <div class="col-md-6">   
     <div class="form-group">
         <label>Kode Contoh Uji</label>
            <input type="text" name="kode_contoh_uji" class="form-control" placeholder="kode contoh uji">
     </div></div>
       <div class="col-md-6"> 
      <div class="form-group">
         <label>Nomor urut</label>
         <input type="text" name="no_urut" class="form-control" placeholder="Nomor urut">
     </div>     
       </div>
        </div>
    <div class="col-md-6">
        <label>Kode Jenis Contoh uji : </label><br>
         
                <label>
                    <input value="1" name="bakteri_penerimaan_sample" type="checkbox"> Bakteri<br>
                </label>
                 <label>
                    <input value="1" name="parasit_penerimaan_sample" type="checkbox"> Parasit<br>
                </label>
                <label>
                    <input value="1" name="jamur_penerimaan_sample" type="checkbox"> Jamur<br>
                </label>
                <label>
                    <input value="1" name="virus_penerimaan_sample" type="checkbox"> Virus<br>
                </label>
                <label>
                    <input value="1" name="air_penerimaan_sample" type="checkbox"> KUalitas air<br>
                </label>
               <label>
                   <input value="1" name="logam_penerimaan_sample" type="checkbox"> Logam berat<br>
                </label>
        <label>
            <input type="text" name="other_penerimaan_sample" class="form-control" placeholder="Lainnya"></label>
     </div>
    </div>    
       
 </div>
<div class="x_panel">
        <div class="x_content">
           <div class="col-xs-2 ">
              <button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btn_anamnesa" class="btn btn-primary btn-block btn-flat">Simpan</button>
          
          </div>
        </div>
</form>
 
</div>
