<div class="x_panel">
 <div class="x_content">
    <div class="x_title">
  
 <form action="<?php echo base_url('C_anamnesa')?>" method="post" enctype="multipart/formdata">
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
         <input  readonly="" type="text" value ="" class="form-control" placeholder="Kegiatan">
     </div>
       
      <div class="input-group date" id="datetimepicker6">
          <label>tanggal sampling</label>
          <input readonly="" class="form-control" type="text" name="tgl_sampling" placeholder="Tanggal sampling">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
       </div>
     
     <div class="form-group">
         <label>Nama pemilik</label>
         <input readonly="" type="text" class="form-control" placeholder="Nama Pemilik">
     </div>
     
    <div class="form-group">
        <label>Lokasi sampling</label>
         <input readonly="" type="text" class="form-control" placeholder="Lokasi Sampling">
       </div>

    <div class="form-group">
        <label>Asal sample</label>
         <select  readonly="" class="form-control">
                            <option>--Asal sample--</option>
                            <option>Budidaya</option>
                            <option>Hasil tangkapan</option>
                </select>
       </div>    
             
     
       <div class="form-group">
           <label>Jenis sample</label>
               
         <input readonly="" type="text" value ="" class="form-control" placeholder="Jenis Sample">
       </div>
       
       <div class="form-group">
           <label>Jumlah sample</label>
         <input readonly="" type="text" value ="" class="form-control" placeholder="Jumlah Sample">
       </div>
  
</div>
     <!------ asal sample------------>    
     <div class="col-md-6">
         <label>Bentuk sample</label>
        <div class="form-group">
            <input readonly="" type="text"  name="bentuk_sample" class="form-control" placeholder="bentuk sample"> 
        </div>
        <div class="form-group">
            <label>Kode sample</label>
           <input readonly="" type="text" class="form-control" placeholder="Kode Sampel">
        </div>
       <div class="form-group">
           <label>Gejala klinis</label>
         <input readonly="" type="text" class="form-control" placeholder="Gejala Klinis">
        </div>
      
        <div class="form-group">
            <label>keterangan lain-lain</label>
           <textarea readonly="" class="form-control" placeholder="Keterangan lain-lain"></textarea>
        </div>
         
         <div class="form-group">
           <label>Pelaksana_sampling 1</label>
         <input readonly="" type="text" class="form-control" placeholder="Pelaksana sampling 1">
        </div> 
         
         <div class="form-group">
           <label>Pelaksana sampling 2</label>
         <input readonly="" type="text" class="form-control" placeholder="Pelaksana sampling 2">
        </div> 
     </div>
        
         
   </div>
     
  
</form>
 
</div>
