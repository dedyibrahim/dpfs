<div class="x_panel">
 <div class="x_title">
    <h2>EDIT DATA CUSTOMER</h2>
        <div class="clearfix">
     </div>
  </div>
<?php 
foreach ($query->result_array() as $data){
}
?>
    <form action="<?php echo base_url('C_pos/simpan_edit_customer/').$this->uri->segment(3); ?>" method="post" enctype="multipart/formdata">
    <input class="form-control" placeholder="nama customer" name="nama_customer" type="text" value="<?php echo $data['nama_customer']; ?>"><br>
    <input class="form-control" name="telp" placeholder="Telp" value="<?php echo $data['telp']; ?>" type="text"><br>
<textarea class="form-control" name="alamat" placeholder="Alamat" type="text"><?php echo $data['alamat']; ?></textarea><br>

    <div class="modal-footer">
  <button type="submit" name="simpan_customer" class="btn bg-green">Simpan Perubahan</button>
                        
</form></div>
</div>