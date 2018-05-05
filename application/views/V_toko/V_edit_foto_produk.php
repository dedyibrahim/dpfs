<script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.min.js"></script>
 
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/');?>vendors/datatables/datatables/media/js/jquery.js"></script>

<?php foreach ($data_produk->result_array() as $datap){
    
    
} ?>   
<div class="x_panel">
<div class="x_title">
   <h2>TAMBAHKAN FOTO PRODUK </h2>
     <div class="clearfix"></div>
</div>
 <div class="col-md-12">
<div class="col-md-6">
    
    <label>Nama :</label>
    
    <input type="text" readonly="" class=" form-control" value="<?php echo $datap['nama_produk']; ?>">
  <label>Tambahkan Foto Produk :</label>

 <input type="file" class="form-control" name="files" id="files" multiple />
 <input type="hidden" class="form-control" name="id_produk" id="id_produk" value="<?php echo $this->uri->segment(3); ?>" />
 
 <div style="clear:both"></div>
 <br />
 <br />
 <div id="uploaded_images"></div>



     
</div>
 </div>   
 </div>
<script type="text/javascript">
$('#files').change(function(){
  
  var id_produk = $('#id_produk').val();
  var files    = $('#files')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension,['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else if(count >= 4){
      error += "Maksimal upload hannya 4 foto "
  
   } else {
    form_data.append("files[]", files[count]);
    form_data.append("id_produk[]", id_produk);
  }
  }
  if(error == '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>C_toko/simpan_edit_produk", //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
     $('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
    },
    success:function(data)
    {
     $('#uploaded_images').html(data);
     $('#files').val('');
      window.location="<?php  echo base_url("C_toko/tambah_foto_produk")?>";
           
    }
   })
  }
  else
  {
   alert(error);
  }
 });


</script> 