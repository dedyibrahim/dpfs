
<script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#modal1").click(function(){
          $("#modal-info").show();
        });
   
    });
    </script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#close").click(function(){
          $("#modal-info").hide();
        });
   
    });
    </script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#bakteri").click(function(){
        
          $("#show_bakteri").toggle();
        });
   
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#logam").click(function(){
        
          $("#show_logam").toggle();
        });
   
    });
    </script>
    
<div class="modal modal-info fade in" id="modal-info" style="display: block; display: none; ;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Input Customer</h4>
              </div>
                
              <div class="modal-body">
               <form action="<?php echo base_url('C_fpps/simpan_customer');?>" method="post" enctype="multipart/formdata">
                <input class="form-control"  placeholder="nama customer" name="nama_customer" type="text"><br>
                <input class="form-control"  name="alamat" placeholder="Alamat" type="text"><br>
                <input class="form-control"  name="telp" placeholder="Telp" type="text"><br>
                <input class="form-control"  name="project_id" placeholder="Project Id" type="text"><br>
                <input class="form-control"  name="contact_person" placeholder="Contact Person" type="text"><br>
                <input class="form-control"  name="telp_fax" placeholder="Telp/Fax" type="text">
    
              </div>
              <div class="modal-footer">
                  <button type="button" id="close"  class="btn btn-outline pull-left">close</button>
                 <button type="submit" name="simpan_customer" class="btn btn-outline">Simpan Customer</button>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
 <link href="<?php echo base_url()?>assets/jquery/jquery-ui.css" rel="stylesheet">
  <script>
     $(function () {
        $("#customer").autocomplete({
            minLength:0,
            delay:0,
            source:'<?php echo site_url('C_fpps/get_allcustomer'); ?>',   //nama source kita ambil langsung memangil fungsi get_allkota
             select:function(event, ui){
                $('#customer').val(ui.item.nama_customer);
                $('#id_customer').val(ui.item.id_customer);
                $('#nama_customer').val(ui.item.nama_customer);
                $('#alamat').val(ui.item.alamat);
                $('#telp').val(ui.item.telp);
                $('#project_id').val(ui.item.project_id);
                $('#contact_person').val(ui.item.contact_person);
                $('#telp_fax').val(ui.item.telp_fax);
                }
            }
                    );
        });
    </script>
<div class="x_panel">
<div class="x_title">
  
 <!--------- end input customer--------------->     
     
 <form action="<?php echo base_url('C_fpps/simpan_fpps');?>" method="post" enctype="multipart/formdata">
    <h2>Form FPPS</h2>
        <ul class="nav navbar-right panel_toolbox">
           <li><input type="text" class="form-control" value="<?php echo $record;?>" readonly="" name="record_number" placeholder="record number" ></i></a>
                </li>
                    </ul>              
<div class="clearfix"></div>
 </div>
    <div class="col-md-6">
      <div class="input-group">
          <input class="form-control" id="id_customer"   name="id_customer" type="hidden">
          <input class="form-control" id="customer"  placeholder="nama customer" name="nama_customer" type="text">
              <span class="input-group-btn">
                 <button type="button" id="modal1" class="btn btn-primary"><span class="fa fa-plus"></span></button>
               </span>
        </div>
       <div class="form-group has-feedback">
          <input class="form-control" readonly="" id="alamat" name="alamat" placeholder="Alamat" type="text">
        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
          <input class="form-control" readonly="" id="telp" name="telp" placeholder="Telp" type="text">
        <span class="fa fa-tty form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
          <input class="form-control" readonly="" id="project_id" name="project_id" placeholder="Project Id" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
       
  </div>
    
    <div class="col-md-6">
      <div class="form-group has-feedback">
          <input class="form-control" readonly="" id="contact_person" name="contact_person" placeholder="Contact Person" type="text">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
          <input class="form-control"readonly="" id="telp_fax" name="telp_fax" placeholder="Telp/Fax" type="text">
        <span class="fa fa-tty form-control-feedback"></span>
      </div>
  </div>
 
</div>
    
<!--------------jenis sample ---------------->
    <div class="x_panel">

    <div class="col-md-6">
      <div class="input-group">
          <input class="form-control" id="data_sample"  placeholder="Jenis Sample" name="data_sample" type="text">
              <span class="input-group-btn">
                 <button type="button" id="" class="btn btn-primary"><span class="fa fa-plus"></span></button>
               </span>
        </div>
        
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="jumlah_sample" name="jumlah_sample" placeholder="Jumlah Sample" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
        
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="deskripsi_sample" name="deskripsi_sample" placeholder="Deskripi Sample" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="bentuk" name="bentuk" placeholder="Bentuk" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
        
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="berat_isi" name="berat_isi" placeholder="Berat isi" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
        <div class="col-xs-6">
      <div class="input-group date" id="myDatepicker">
          <input class="form-control" name="tgl_penerimaan" type="text" placeholder="Tanggal penerimaan">
                            <span class="input-group-addon" style="">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
     </div>
        
     <div class="col-xs-6">
      <div class="input-group date" id="datetimepicker6">
          <input class="form-control" type="text" name="tgl_sampling"placeholder="Tanggal sampling">
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
                     <input checked="" value="Mampu"  name="kesiapan_personel" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input value="Tidak Mampu"  name="kesiapan_personel" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Kondisi Akomodasi</div>
                   <div class="col-xs-3">
                         <input checked="" value="Mampu" id="optionsRadios1" name="kondisi_akomodasi" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input value="Tidak Mampu" id="optionsRadios2" name="kondisi_akomodasi" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Beban pekerjaan</div>
                   <div class="col-xs-3">
                         <input checked="" value="Mampu"  name="beban_pekerjaan" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input value="Tidak Mampu"  name="beban_pekerjaan" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Kondisi peralatan</div>
                   <div class="col-xs-3">
                         <input checked="" value="Mampu"  name="kondisi_peralatan" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input value="Tidak Mampu" name="kondisi_peralatan" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Kesesuaian metode</div>
                   <div class="col-xs-3">
                         <input checked="" value="Mampu"  name="kesesuaian_metode" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input value="Tidak Mampu" name="kesesuaian_metode" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Kesesuaian biaya</div>
                   <div class="col-xs-3">
                         <input checked="" value="Mampu"  name="kesesuaian_biaya" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input value="Tidak Mampu"  name="kesesuaian_biaya" type="radio"> Tidak Mampu
                   </div>
          </div>
            
       </div>
 </div>


<!------------parameter penyakit--------->
<div class="x_panel">
    
 <div class="radio">
     <h4>Parameter penyakit</h4>
     <div class="col-md-1">
     <h4></h4>
       <div class="checkbox">
                <label>
                    <input value="Klinis" name="jenis_penyakit[]" type="checkbox"> Klinis<br>
                </label>
           <label>
                    <input value="TSV" name="jenis_penyakit[]" type="checkbox"> TSV<br>
                </label>
                <label>
                    <input value="IMNV" name="jenis_penyakit[]" type="checkbox"> IMNV<br>
                </label>
                <label>
                    <input value="KHV" name="jenis_penyakit[]" type="checkbox"> KHV<br>
                </label>
                <label>
                    <input value="VNN" name="jenis_penyakit[]" type="checkbox"> VNN<br>
                </label>
                <label>
                    <input value="Iridoviru" name="jenis_penyakit[]" type="checkbox"> Iridoviru<br>
                </label>
                <label>
                    <input value="Megalocity" name="jenis_penyakit[]" type="checkbox"> Megalocity <br>
                </label>
                <label>
                    <input value="Wsspv" name="jenis_penyakit[]" type="checkbox"> Wsspv<br>
                </label>
                
                          </div>    
      </div> 
     <div class="col-md-2">
     <h4></h4>
     
     <div class="checkbox" style="line-height: 10px; " >
                <label>
                    <input value="" id="bakteri" type="radio"> Identifikasi Bakteri
                </label>
           <div id="show_bakteri" style="display:none;">
               <label>
                    <input value="BAKTERI HPI / HPIK" name="bakteri[]" type="checkbox"> BAKTERI HPI / HPIK
                </label>
                <label>
                    <input value="E.Coli" name="bakteri[]" type="checkbox"> E.Coli
                </label><br>
                <label>
                    <input value="Salmonelia" name="bakteri[]" type="checkbox"> Salmonelia
                </label><br>
                <label>
                    <input value="TPC" name="bakteri[]" type="checkbox"> TPC
                </label>
               
           </div>    
          </div>    
      </div> 
     <div class="col-md-2">
     <h4></h4>
       <div class="checkbox">
                <label>
                    <input value="Identifikasi parasit" name="identifikasi_parasit[]" type="checkbox"> Identifikasi Parasit
                </label>
           <label>
                    <input value="identifikasi Jamur" name="identifikasi_parasit[]" type="checkbox"> Identifikasi Jamur
                </label>
                
                
                          </div>    
      </div> 
      <div class="col-md-2">
     <h4></h4>
       <div class="checkbox">
                <label>
                    <input value="" id="logam" type="radio"> Logam Berat (AAS)
                </label><br>
                <div id="show_logam" style="display:none;">
           
           <label>
                    <input value="HG" name="logam_berat[]" type="checkbox"> HG
                </label><br>
            <label>
                    <input value="PB" name="logam_berat[]" type="checkbox"> PB
                </label><br>
            <label>
                    <input value="CD" name="logam_berat[]" type="checkbox"> CD
                </label><br>
                
                 <label>
                    <input value="other" name="logam_berat[]" type="checkbox"> ...
                </label>
                </div>
       </div>    
      </div> 
     
     <!-----pengujian sub kontrak---->
     <div class="col-md-5">
         <h4>Untuk pengujian yang di subkontrakan </h4>
         <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="nama_lab_subkontrak" name="nama_lab_subkontrak" placeholder="Nama lab" type="text">
        <span class="fa fa-pencil form-control-feedback"></span>
      </div>
     </div>
        
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="parameter_penyakit_ikan" name="parameter_penyakit_ikan" placeholder="Parameter penyakit" type="text">
        <span class="fa fa-pencil form-control-feedback"></span>
      </div>
     </div>
         <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="kesimpulan" name="kesimpulan" placeholder="Kesimpulan" type="text">
        <span class="fa fa-pencil form-control-feedback"></span>
      </div>
     </div>
         
     </div>
    
</div>
</div>


<!--------------jenis sample ---------------->
<div class="x_panel">
        <div class="x_content">
            <div class="col-md-4">
      <div class="input-group">
          <input class="form-control" id="diberikan_oleh"  placeholder="Diberikan Oleh :" name="diberikan_oleh" type="text">
        </div>
        </div>
        <div class="col-md-4">
      <div class="input-group">
          <input class="form-control" id="diterima_oleh"  placeholder="Diterima Oleh :" name="diterima_oleh" type="text">
        </div>
        </div>
           <div class="col-xs-2 ">
              <button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btn_fpps" class="btn btn-primary btn-block btn-flat">Mendaftar</button>
          </form>
          </div>
        </div>

</div></div>