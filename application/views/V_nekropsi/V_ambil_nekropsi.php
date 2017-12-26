<?php 
foreach ($query->result_array() as $data){
 
            
}?>
<?php 
foreach ($data_customer->result_array() as $customer){
 
            
}?>

<div class="x_panel">
 <div class="x_content">
    <div class="x_title">
  
 <form action="<?php echo base_url('C_nekropsi/simpan')?>" method="post" enctype="multipart/formdata">
    <h2>Buku Nekropsi</h2>
        <ul class="nav navbar-right panel_toolbox">
                    </ul>              
<div class="clearfix"></div>
</div>
<div class="col-md-6">
       
     <div class="form-group">
         <label>No.Record</label>
         <input readonly="" name="record_number" type="text" value ="<?php echo $data['record_number_customer'];?>" class="form-control" placeholder="No.record">
     </div>
      
    <div class="form-group" >
          <label>Pemilik</label>
          <input readonly="" value ="<?php echo $customer['nama_customer'];?>" class="form-control" type="text" placeholder="Tanggal Kegiatan">
         
       </div>
     
      <div class="form-group" >
          <label>tanggal kegiatan</label>
          <input readonly="" value ="<?php echo $data['tgl_sampling'];?>" class="form-control" type="text" placeholder="Tanggal Kegiatan">
         
       </div>
     
     <div class="form-group">
         <label>Kode Sample</label>
         <input readonly="" value ="<?php echo $data['kode_sample'];?>" type="text" class="form-control" placeholder="Kode Sample">
     </div>
    <div class="form-group">
         <label>Gejala Klinis</label>
         <input readonly="" value ="<?php echo $data['gejala_klinis'];?>" type="text" class="form-control" placeholder="Gejala Klinis">
     </div>
</div>
   <div class="col-md-6">  
     <div class="form-group">
        <label>Ukuran</label>
        <input type="text" value ="<?php echo $data['panjang'];?>" name="panjang" class="form-control" placeholder="Panjang"><br>
        <input type="text" value ="<?php echo $data['berat'];?>"  name="berat"  class="form-control" placeholder="Berat">
       </div>
    
 <div class="form-group">
        <label>Organ Target</label>
        <input type="text" <?php if ($data['identifikasi_parasit']!= 'Parasit'){echo 'readonly=""';}else if($data['nekropsi_parasit']== null ){ echo "value=''";}else {echo "value=".$data['nekropsi_parasit'];};?> name="nekropsi_parasit" class="form-control" placeholder="Parasit"><br>
        <input type="text" <?php if ($data['identifikasi_bakteri']!= 'Bakteri'){echo 'readonly=""';}else if($data['nekropsi_bakteri']== null ){ echo "value=''";}else {echo "value=".$data['nekropsi_bakteri'];};?> name="nekropsi_bakteri" class="form-control" placeholder="Bakteri"><br>
        <input type="text" <?php if ($data['identifikasi_jamur']!= 'Jamur'){echo 'readonly=""';}else if($data['nekropsi_jamur']== null ){ echo "value=''";}else {echo "value=".$data['nekropsi_jamur'];};?>  name="nekropsi_jamur" class="form-control" placeholder="Jamur"><br>
        <input type="text" <?php if ($data['identifikasi_virus']!= 'Virus'){echo 'readonly=""';}else if($data['nekropsi_virus']== null ){ echo "value=''";}else {echo "value=".$data['nekropsi_virus'];};?>  name="nekropsi_virus"class="form-control" placeholder="Virus">
       </div>
    
    <div class="form-group">
        <label>Analis</label>
        <input type="text" value ="<?php echo $data['analis_nekropsi'];?>" name="analis_nekropsi" class="form-control" placeholder="Analis">
       </div>
      </div>
    </div>
    
</div>
<div class="x_panel">
        <div class="x_content">
           <div class="col-xs-2 ">
               <a href="<?php echo base_url('C_anamnesa');?>"><button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button></a>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btn_anamnesa" class="btn btn-primary btn-block btn-flat">Simpan</button>
            </form>
          </div>
        </div>
</form>
 
</div>
