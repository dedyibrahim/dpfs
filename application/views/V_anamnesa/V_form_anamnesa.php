<div class="x_panel">
 <div class="x_content">
    <div class="x_title">
  
 <form action="<?php echo base_url('C_anamnesa')?>" method="post" enctype="multipart/formdata">
    <h2>Form Informasi Kegiatan Anamnesa</h2>
        <ul class="nav navbar-right panel_toolbox">
           <li><input class="form-control"  readonly="" name="record_number" placeholder="record number" type="text">
                </li>
                    </ul>              
<div class="clearfix"></div>
     
    </div> 
           
   <div class="col-md-6">
       
     <div class="form-group">
         
         <input type="text" value ="" class="form-control" placeholder="Kegiatan">
     </div>
       
      <div class="input-group date" id="datetimepicker6">
          <input class="form-control" type="text" name="tgl_sampling" placeholder="Tanggal sampling">
                            <span class="input-group-addon" style="">
                                    <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
     
     <div class="form-group">
         
         <input type="text" class="form-control" placeholder="Nama Pemilik">
     </div>
            <div class="form-group">
         
         <input type="text" class="form-control" placeholder="Lokasi Sampling">
     </div>
       <h4><div class="form-group">Asal Sample :</div></h4>
                   <div class="col-xs-3">
                       <h4><input checked="" value="Mampu"  name="asal_sample" type="radio"> Budidaya</h4>
                    </div>
                    <div class="col-xs-4">
                        <h4> <input value="Tidak Mampu"  name="asal_sample" type="radio"> Hasil Tangkapan</h4>
                   </div>
          
       
     
       <div class="form-group">
         
         <input type="text" value ="" class="form-control" placeholder="Jenis Sample">
     </div>
       <div class="form-group">
         
         <input type="text" value ="" class="form-control" placeholder="Jumlah Sample">
     </div>
       <h4><div class="form-group">Bentuk Sample</div></h4>
                   <div class="col-xs-3">
                       <h4><input checked="" value="Mampu"  name="bentuk_sample" type="radio"> Segar</h4>
                    </div>
                    <div class="col-xs-4">
                        <h4> <input value="Tidak Mampu"  name="bentuk_sample" type="radio"> Hidup</h4>
                   </div>
       <div class="col-xs-3">
                       <h4><input checked="" value="Mampu"  name="bentuk_sample" type="radio"> Beku</h4>
                    </div>
                    <div class="col-xs-4">
                        <h4> <input value="Tidak Mampu"  name="bentuk_sample" type="radio"> Kering</h4>
                   </div>
       <div class="col-xs-4">
                        <h4> <input value="Tidak Mampu"  name="bentuk_sample" type="radio"> Lainnya</h4>
                   </div>
       <div class="form-group">
         
         <input type="text" class="form-control" placeholder="Kode Sampel">
     </div>
       <div class="form-group">
         
         <input type="text" class="form-control" placeholder="Gejala Klinis">
     </div>
       
       
      
</form>
 
</div>
