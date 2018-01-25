<?php 
foreach ($query->result_array() as $data){
 
            
}?>
<?php 
foreach ($data_customer->result_array() as $customer){
 
            
}?>

<form action="<?php echo base_url('C_manajer/simpan_penganalis')?>" method="post" enctype="multipart/formdata">
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">BUAT NAMA PENGANALIS</h4>
                        </div>
                        <div class="modal-body">
                       
  <div class="form-group">
           <input type="text" name="nama" class="form-control" placeholder="Nama">
   </div>
    
      <div class="form-group">
          <input class="form-control" name="jabatan" placeholder="Jabatan"   type="text">
     </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default"data-dismiss="modal">Close</button>
                            <button type="submit" name="simpan_penganalis" class="btn btn-primary ">Save</button>
                        </div>
               </div>
           </div>
    </div>
</form>
<script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.min.js"></script>
 <link href="<?php echo base_url()?>assets/jquery/jquery-ui.css" rel="stylesheet">
 <script type="text/javascript">
     $(function () {
        $("#nama").autocomplete({
            minLength:0,
            delay:0,
            source:'<?php echo site_url('C_manajer/get_allpenganalis'); ?>',   //nama source kita ambil langsung memangil fungsi get_allkota
             select:function(event, ui){
                $('#nama').val(ui.item.nama);
                $('#jabatan').val(ui.item.jabatan);
                }
            }
                    );
        });
    </script>
<form action="<?php echo base_url('C_manajer/data_penganalis')?>" method="post" enctype="multipart/formdata">
<div class="x_panel">
 <div class="x_content">
    <div class="x_title">
                       
    <h2>PEMBUATAN SURAT TUGAS PENGUJIAN</h2>
    <a href="<?php echo base_url();?>C_manajer/cetak_stp/<?php echo $data['record_number_customer']?>"><button type="button" class="btn pull-right btn-primary">CETAK <span class="fa fa-print"></button></a>
                       
        <ul class="nav navbar-right panel_toolbox">
                    </ul>              
<div class="clearfix"></div>
</div>
   <div class="col-md-6">
        <div class="col-md-12">
  
      <div class="col-md-6">
       <div class="form-group">
        <label>Nama</label>
        <input type="hidden"  name="record_number" class="form-control" value="<?php echo $data['record_number_customer'];?>">
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
       </div>
      </div>
      <div class="col-md-6">   
   
    <label>Jabatan</label>
          <div class="input-group">
         <input readonly="" id="jabatan" name="jabatan" class="form-control"  placeholder="Jabatan" type="text">
              <span class="input-group-btn">
                 <button type="button"  id="modal1" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="fa fa-plus"></span></button>
                 <button type='submit' name="data_penganalis" id="modal1" class="btn btn-primary" ><span class="fa fa-save"></span></button>
               <form>    
 
              </span>
        </div>
      </div>
    </div>
       
       <!--------------------PENGULANGAN JADUL-------------------->      
   <?php foreach($data_penganalis->result_array() as $penganalis){
       
     ?>
<div class="col-md-12">
  
   <div class="col-md-6">
       <div class="form-group">
        <label>Nama Terpilih</label>
        <input type="text"  readonly=""value=" <?php echo $penganalis['nama']; ?> "class="form-control" placeholder="Nama">
       </div>
   </div>
 <div class="col-md-6">
      <label>Jabatan</label>
     <div class="input-group">
         <input readonly="" value=" <?php echo $penganalis['jabatan']; ?> " class="form-control"  placeholder="Jabatan" type="text">
              <span class="input-group-btn">
                  <a href="<?php echo base_url('C_manajer/hapus/'); ?><?php echo $penganalis['id_data_penganalis']; ?>/<?php echo $penganalis['record_number_penganalis']; ?>"><button type="button" class="btn btn-flat btn-danger"><span class="fa fa-minus"></span></button></a>
               <form>    
 
              </span>
        </div>
   </div>
</div>       
  <?php 
   }
   ?>
   </div>   
   
 <div class="col-md-6">
     <h3><p align='center'>PEMBUATAN SURAT TUGAS PENGUJIAN UNTUK<br><?php echo $customer['nama_customer'];?></p> </h3>  
     <h4><p align='center'>NO : ...../STP/ SKIPM/MMJ/...../.....</p> </h4>  
     <br><br>    
 <h4><p align='left'>Jenis Sample: <?php echo $data['data_sample']; ?></p> </h4>  
 <h4><p align='left'>No.FPPS:<?php echo $data['record_number_customer'];?>/FPPS/SKIPM-MMJ/...../<?php echo date('Y')?></p> </h4>  
 <h4><p align='left'>Kode Sample:<?php echo $data['kode_sample']; ?></p> </h4>  
  <h4><p align='center'>PARAMETER YANG DI AMBIL</p> </h4>  
     <br><br>    
 <h4><p align='left'>Jenis Sample: <?php echo $data['identifikasi_virus']; ?></p> </h4>  
 <h4><p align='left'>Jenis Sample: <?php echo $data['identifikasi_bakteri']; ?></p> </h4>  
 <h4><p align='left'>Jenis Sample: <?php echo $data['identifikasi_parasit']; ?></p> </h4>  
 <h4><p align='left'>Jenis Sample: <?php echo $data['identifikasi_jamur']; ?></p> </h4>  
         
  </div> 
 </div>
</div>   