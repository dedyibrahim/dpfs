<?php 
foreach ($query->result_array() as $data){
 
            
}?>
<?php 
foreach ($data_customer->result_array() as $customer){
 
            
}?>

  
 <form action="<?php echo base_url('C_anamnesa/simpan')?>" method="post" enctype="multipart/formdata">
<div class="x_panel">
 <div class="x_content">
    <div class="x_title">
    <h2>Informasi Kegiatan Anamnesa</h2>
        <ul class="nav navbar-right panel_toolbox">
           <li><input class="form-control"  readonly="" name="record_number" placeholder="record number" type="text">
                </li>
                    </ul>              
        <div class="clearfix"></div>
    </div>
     
<div class="col-md-6">
       
     <div class="form-group">
         <label>Kegiatan</label>
         <input type="text" value ="" class="form-control" placeholder="Kegiatan">
     </div>
       
      <div class="form-group">
          <label>tanggal sampling</label>
          <input class="form-control" value="<?php echo $data['tgl_sampling'];?>" readonly="" type="text" name="tgl_sampling" placeholder="Tanggal sampling">
              
       </div>
     
     <div class="form-group">
         <label>Nama pemilik</label>
         <input type="text" value="<?php echo $customer['nama_customer'];?>" readonly="" class="form-control" placeholder="Nama Pemilik">
     </div>
     
    <div class="form-group">
        <label>Lokasi sampling</label>
         <input type="text" class="form-control" placeholder="Lokasi Sampling">
       </div>

    <div class="form-group">
        <label>Asal sample</label>
         <select class="form-control">
                            <option>--Asal sample--</option>
                            <option>Budidaya</option>
                            <option>Hasil tangkapan</option>
                </select>
       </div>    
             
     
       <div class="form-group">
           <label>Jenis sample</label>
               
           <input type="text" value="<?php echo $data['data_sample'];?>" readonly="" value ="" class="form-control" placeholder="Jenis Sample">
       </div>
       
       <div class="form-group">
           <label>Jumlah sample</label>
           <input type="text" value="<?php echo $data['jumlah_sample'];?>" readonly="" class="form-control" placeholder="Jumlah Sample">
       </div>
  
</div>
     <!------ asal sample------------>    
     <div class="col-md-6">
         <label>Bentuk sample</label>
        <div class="form-group">
            <input type="text" value="<?php echo $data['bentuk'];?>"  readonly="" name="bentuk_sample" class="form-control" placeholder="bentuk sample"> 
        </div>
        <div class="form-group">
            <label>Kode sample</label>
           <input type="text" class="form-control" placeholder="Kode Sampel">
        </div>
       <div class="form-group">
           <label>Gejala klinis</label>
         <input type="text" class="form-control" placeholder="Gejala Klinis">
        </div>
      
        <div class="form-group">
            <label>keterangan lain-lain</label>
           <textarea class="form-control" placeholder="Keterangan lain-lain"></textarea>
        </div>
          
     </div>
        
         
   </div>
     
  
</form>
 
</div>

     
     <div class="x_panel">
        <div class="x_content">
           <div class="col-xs-2 ">
               <a href="<?php echo base_url('C_anamnesa');?>"><button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button></a>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btn_anamnesa" class="btn btn-primary btn-block btn-flat">Simpan</button>
          
          </div>
        </div>
</form>
 
</div>
