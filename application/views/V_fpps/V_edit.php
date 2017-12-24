<?php
foreach ($query->result_array() as $customer){
}
?>
<?php
foreach ($data_customer->result_array() as $data_user){
}
?>
<?php echo $customer['identifikasi_bakteri'];?>
<?php echo $customer['identifikasi_virus'];?>
<?php echo $customer['identifikasi_logam'];?>
<?php echo $customer['identifikasi_parasit'];?>
<div class="x_panel">
<div class="x_title">
  
 <!--------- end input customer--------------->     
 <form action="<?php echo base_url('C_fpps/edit/'.$this->uri->segment(3));?>" method="post" enctype="multipart/formdata">
    <h2>Form FPPS</h2>
        <ul class="nav navbar-right panel_toolbox">
           <li><input type="text" class="form-control" value="<?php echo $customer['record_number_customer'];?>" readonly="" name="record_number" placeholder="record number" ></i></a>
                </li>
                    </ul>              
<div class="clearfix"></div>
 </div>
    <div class="col-md-6">
      <div class="form-group has-feedback">
          <input class="form-control" value="<?php echo $data_user['nama_customer'];?>" readonly="" id="customer"  placeholder="nama customer" name="nama_customer" type="text">
          <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
          <input class="form-control" value="<?php echo $data_user['alamat'];?>" readonly="" id="alamat" name="alamat" placeholder="Alamat" type="text">
        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
          <input class="form-control" value="<?php echo $data_user['telp'];?>" readonly="" id="telp" name="telp" placeholder="Telp" type="text">
        <span class="fa fa-tty form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
          <input class="form-control" value="<?php echo $data_user['project_id'];?>" readonly="" id="project_id" name="project_id" placeholder="Project Id" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
       
  </div>
    
    <div class="col-md-6">
      <div class="form-group has-feedback">
          <input class="form-control" value="<?php echo $data_user['contact_person'];?>" readonly="" id="contact_person" name="contact_person" placeholder="Contact Person" type="text">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
          <input class="form-control" value="<?php echo $data_user['telp_fax'];?>" readonly="" id="telp_fax" name="telp_fax" placeholder="Telp/Fax" type="text">
        <span class="fa fa-tty form-control-feedback"></span>
      </div>
  </div>
 
</div>
    
<!--------------jenis sample ---------------->
    <div class="x_panel">

    <div class="col-md-6">
         
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control" value="<?php echo $customer['data_sample'];?>" id="data_sample"  placeholder="Jenis Sample" name="data_sample" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
        
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control" value="<?php echo $customer['wadah'];?>"  id="wadah" name="wadah" placeholder="wadah" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
        
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control" value="<?php echo $customer['jumlah_sample'];?>" id="jumlah_sample" name="jumlah_sample" placeholder="Jumlah Sample" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
        
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control" value="<?php echo $customer['deskripsi_sample'];?>"  id="deskripsi_sample" name="deskripsi_sample" placeholder="Deskripi Sample" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
     <div class="col-xs-6">
       <select name="bentuk" class="form-control">
           <option><?php echo $customer['bentuk'] ?></option>
                           <option>--Asal sample--</option>
                            <option>Segar</option>
                            <option>Hidup</option>
                             <option>Beku</option>
                            <option>Kering</option>
                            <option>lainnya</option>
                </select>
      
     </div>
        
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control" value="<?php echo $customer['berat_isi'];?>"  id="berat_isi" name="berat_isi" placeholder="Berat isi" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
        <div class="col-xs-6">
      <div class="input-group date" id="myDatepicker">
          <input class="form-control" name="tgl_penerimaan" value="<?php echo $customer['tgl_penerimaan'];?>" type="text" placeholder="Tanggal penerimaan">
                            <span class="input-group-addon" style="">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
     </div>
        
     <div class="col-xs-6">
      <div class="input-group date" id="datetimepicker6">
          <input class="form-control" value="<?php echo $customer['tgl_sampling'];?>" type="text" name="tgl_sampling"placeholder="Tanggal sampling">
                            <span class="input-group-addon" style="">
                                    <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
     </div>
  <!--------------------------------------------------------------->     
    </div> 
        <div class="col-md-6">
            <h4>Kaji ulang permintaan</h4>
         <div class="radio">
            <div class="col-xs-4">Kesiapan personel</div>
                   <div class="col-xs-3">
                     <input <?php if ( $customer['kesiapan_personel'] == 'Mampu'){echo"checked=''";}else{};?>  value="Mampu"  name="kesiapan_personel" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input <?php if ( $customer['kesiapan_personel'] == 'Tidak Mampu'){echo"checked=''";}else{};?> value="Tidak Mampu"  name="kesiapan_personel" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Kondisi Akomodasi</div>
                   <div class="col-xs-3">
                         <input <?php if ( $customer['kondisi_akomodasi'] == 'Mampu'){echo"checked=''";}else{};?> value="Mampu" id="optionsRadios1" name="kondisi_akomodasi" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input <?php if ( $customer['kondisi_akomodasi'] == 'Tidak Mampu'){echo"checked=''";}else{};?> value="Tidak Mampu" id="optionsRadios2" name="kondisi_akomodasi" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Beban pekerjaan</div>
                   <div class="col-xs-3">
                         <input <?php if ( $customer['beban_pekerjaan'] == 'Mampu'){echo"checked=''";}else{};?> value="Mampu"  name="beban_pekerjaan" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input <?php if ( $customer['beban_pekerjaan'] == 'Tidak Mampu'){echo"checked=''";}else{};?> value="Tidak Mampu"  name="beban_pekerjaan" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Kondisi peralatan</div>
                   <div class="col-xs-3">
                         <input <?php if ( $customer['kondisi_peralatan'] == 'Mampu'){echo"checked=''";}else{};?> value="Mampu"  name="kondisi_peralatan" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input <?php if ( $customer['kondisi_peralatan'] == 'Tidak Mampu'){echo"checked=''";}else{};?>  value="Tidak Mampu" name="kondisi_peralatan" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Kesesuaian metode</div>
                   <div class="col-xs-3">
                         <input <?php if ( $customer['kesesuaian_metode'] == 'Mampu'){echo"checked=''";}else{};?> value="Mampu"  name="kesesuaian_metode" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input <?php if ( $customer['kesesuaian_metode'] == 'Tidak Mampu'){echo"checked=''";}else{};?> value="Tidak Mampu" name="kesesuaian_metode" type="radio"> Tidak Mampu
                   </div>
          </div>
            
            
       </div>
 </div>

<div class="x_panel">
    
 <div class="radio">
     <h4>Parameter penyakit</h4>
   <div class="col-md-2">
     <div class="checkbox">
      <label>
          <input value="Virus"  <?php if ( $customer['identifikasi_virus'] == 'Virus'){echo"checked=''";}else{};?>  name="identifikasi_virus" type="checkbox">Virus
      </label>
     </div>    
   </div> 
     
  <div class="col-md-2">
    <div class="checkbox">
        <label>
            <input value="Bakteri" <?php if ( $customer['identifikasi_bakteri'] == 'Bakteri'){echo"checked=''";}else{};?> name="identifikasi_bakteri" type="checkbox">Bakteri
        </label>
        </div>   
     </div> 
     
    <div class="col-md-2">
       <div class="checkbox">
                <label>
                    <input value="Parasit" <?php if ( $customer['identifikasi_parasit'] == 'Parasit'){echo"checked=''";}else{};?> name="identifikasi_parasit" type="checkbox">Parasit
                </label>
         </div>    
      </div> 
    <div class="col-md-2">
       <div class="checkbox">
                <label>
                    <input value="Logam" <?php if ( $customer['identifikasi_logam'] == 'Logam'){echo"checked=''";}else{};?> name="identifikasi_logam" type="checkbox"> Logam Berat
                </label>
         </div>
       </div>    
      
 </div> 
     
</div>

<!--------------jenis sample ---------------->
<div class="x_panel">
        <div class="x_content">
            <div class="col-md-4">
      <div class="input-group">
          <input class="form-control" value="<?php echo $customer['diberikan_oleh'];?>" id="diberikan_oleh"  placeholder="Diberikan Oleh :" name="diberikan_oleh" type="text">
        </div>
        </div>
        <div class="col-md-4">
      <div class="input-group">
          <input class="form-control"  value="<?php echo $customer['diterima_oleh'];?>" id="diterima_oleh"  placeholder="Diterima Oleh :" name="diterima_oleh" type="text">
        </div>
        </div>
           <div class="col-xs-2 ">
              <button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btn_fpps" class="btn btn-primary btn-block btn-flat">SIMPAN</button>
          </form>
          </div>
        </div>

</div></div>