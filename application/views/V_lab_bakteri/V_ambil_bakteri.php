<?php 
foreach ($query->result_array() as $data){
 
            
}?>
<?php 
foreach ($data_customer->result_array() as $customer){
 
            
}?>

  
<div class="x_panel">
 <div class="x_content">
    <div class="x_title">
  
 <form action="<?php echo base_url('C_lab_bakteri/simpan')?>" method="post" enctype="multipart/formdata">
    <h2>Buku Nekropsi</h2>
    <a href="<?php echo base_url()?>C_lab_bakteri/lhus/<?php echo $data['record_number_customer'];?>"><button type="button" class="btn btn-primary fa fa-print pull-right"> CETAK LHUS</button></a>
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
        <input type="text"  value ="<?php echo $data['nekropsi_bakteri'];?>"  readonly="" class="form-control" placeholder="Organ Target">
       </div>
    
 <div class="form-group">
        <label>Bakteri Yang Di temukan</label>
        <input type="text" value ="<?php echo $data['bakteri_ditemukan'];?>" name="bakteri_ditemukan" class="form-control" placeholder="Bakteri Yang ditemukan">
       </div>
    
    <div class="form-group">
        <label>Jumlah Bakteri</label>
        <input type="text" value ="<?php echo $data['jumlah_bakteri'];?>" name="jumlah_bakteri"  class="form-control" placeholder="Jumlah Bakteri">
       </div>
           
       <div class="form-group">
        <label>Analis</label>
        <input type="text" readonly="" class="form-control" placeholder="Analis">
       </div>
   </div>
    </div>
<div class="x_panel">
        <div class="x_content">
           <div class="col-xs-2 ">
               <a href="<?php echo base_url('C_lab_bakteri');?>"><button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button></a>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btn_bakteri" class="btn btn-primary btn-block btn-flat">Simpan</button>
            </form>
          </div>
        </div>
</form>
 
</div>

