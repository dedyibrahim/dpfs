<?php 
foreach ($query->result_array() as $data){
 
            
}?>
<?php 
foreach ($data_customer->result_array() as $customer){
 
            
}?>

  
<div class="x_panel">
 <div class="x_content">
    <div class="x_title">
  
 <form action="<?php echo base_url('C_anamnesa')?>" method="post" enctype="multipart/formdata">
    <h2>Buku Nekropsi</h2>
        <ul class="nav navbar-right panel_toolbox">
                    </ul>              
<div class="clearfix"></div>
</div>
<div class="col-md-6">
       
     <div class="form-group">
         <label>No Record</label>
         <input readonly="" type="text" value ="" class="form-control" placeholder="No.record">
     </div>
       
      <div class="input-group date" id="datetimepicker6">
          <label>tanggal kegiatan</label>
          <input readonly="" class="form-control" type="text" name="tgl_sampling" placeholder="Tanggal Kegiatan">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
       </div>
     
     <div class="form-group">
         <label>Kode Sample</label>
         <input readonly="" type="text" class="form-control" placeholder="Kode Sample">
     </div>
    <div class="form-group">
         <label>Gejala Klinis</label>
         <input readonly="" type="text" class="form-control" placeholder="Gejala Klinis">
     </div>
</div>
   <div class="col-md-6">  
     <div class="form-group">
        <label>UKURAN</label>
        <input type="text" class="form-control" placeholder="Panjang"><br>
         <input type="text" class="form-control" placeholder="Berat">
       </div>
    
 <div class="form-group">
        <label>Organ Target</label>
        <input type="text" class="form-control" placeholder="Parasit"><br>
        <input type="text" class="form-control" placeholder="Bakteri"><br>
        <input type="text" class="form-control" placeholder="Jamur"><br>
        <input type="text" class="form-control" placeholder="Virus"><br>
       </div>
    
    <div class="form-group">
        <label>Analis</label>
         <input type="text" class="form-control" placeholder="Analis">
       </div>
      </div>
    </div>
