<?php 
foreach ($query->result_array() as $data){
 
            
}?>
<?php 
foreach ($data_customer->result_array() as $customer){
 
            
}?>

  
<div class="x_panel">
 <div class="x_content">
    <div class="x_title">
  
 <form action="<?php echo base_url('C_lab_parasit/simpan')?>" method="post" enctype="multipart/formdata">
    <h2>Buku Nekropsi</h2>
    <a href="<?php echo base_url()?>C_lab_parasit/lhus/<?php echo $data['record_number_customer'];?>"><button type="button" class="btn btn-primary fa fa-print pull-right"> CETAK LHUS</button></a>
        <ul class="nav navbar-right panel_toolbox">
                    </ul>              
<div class="clearfix"></div>
</div>
<div class="col-md-6">
       
     <div class="form-group">
         <label>No Record</label>
         <input readonly="" name="record_number" type="text" value ="<?php echo $data['record_number_customer'];?>" class="form-control" placeholder="No.record">
     </div>
       
      <div class="form-group" id="datetimepicker6">
          <label>tanggal kegiatan</label>
          <input readonly="" value ="<?php echo $data['tgl_sampling'];?>" class="form-control" type="text" name="tgl_sampling" placeholder="Tanggal Kegiatan">
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
   <di<div class="col-md-6">  
     <div class="form-group">
        <label>Organ Target</label>
        <input type="text"  value ="<?php echo $data['nekropsi_parasit'];?>"  readonly="" class="form-control" placeholder="Organ Target">
       </div>
    
 <div class="form-group">
        <label>Jamur Yang Di temukan</label>
        <input type="text" value ="<?php echo $data['parasit_ditemukan'];?>" name="parasit_ditemukan" class="form-control" placeholder="Jamur Yang ditemukan">
       </div>
    
    <div class="form-group">
        <label>Jumlah Jamur</label>
        <input type="text" value ="<?php echo $data['jumlah_parasit'];?>" name="jumlah_parasit"  class="form-control" placeholder="Jumlah Jamur">
       </div>
      <?php $no = 1; foreach ($data_penganalis->result_array() as $penganalis){?>   
       <div class="form-group">
        <label>Penganalis <?php echo $no++ ?></label>
        <input type="text" readonly="" value="<?php echo $penganalis['nama']; ?> " class="form-control" placeholder="Analis">
       </div>
      <?php }?>
       </div>
    </div>
<div class="x_panel">
        <div class="x_content">
           <div class="col-xs-2 ">
               <a href="<?php echo base_url('C_lab_bakteri');?>"><button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button></a>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btn_parasit" class="btn btn-primary btn-block btn-flat">Simpan</button>
            </form>
          </div>
        </div>
</form>
 
</div>

