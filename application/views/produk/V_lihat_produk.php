<?php 
foreach ($query->result_array() as $data){
}
?>
<div class="x_panel">
<div class="x_title">
    <h2>LIHAT PRODUK</h2>
        <div class="clearfix"></div>
            </div>
     <div class="col-md-6">
      <div class="form-group has-feedback">
          <label>Barcode</label>
          <input type="text" readonly="" class="form-control" value="<?php echo $data['barcode']; ?>" name="barcode" placeholder="Kode Barcode">
        <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
      </div>
   <div class="form-group has-feedback">
        <label>Nama Produk</label>
         <input type="text" readonly="" class="form-control"value="<?php echo $data['nama_produk']; ?>" name="nama_produk" placeholder="Nama Produk">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
    <div class="form-group has-feedback">
       <label>Harga_produk</label>
       <input type="text" readonly="" class="form-control" value="<?php echo $data['harga_produk']; ?>" name="harga_produk" placeholder="Harga Produk">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
    
        <div class="form-group has-feedback">
         <label>Stok Toko</label>
       <input type="text" readonly="" class="form-control" value="<?php echo $data['stok_toko']; ?>" name="stok_toko" placeholder="Stok Toko">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
     
        <div class="form-group has-feedback">
        <label>Stok Pabrik</label>
         <input type="text" readonly="" class="form-control" value="<?php echo $data['stok_pabrik']; ?>" name="stok_pabrik" placeholder="Stok Pabrik">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
    
       <div class="form-group has-feedback">
        <label>Kategori</label>
         <input type="text" readonly="" class="form-control" value="<?php echo $data['kategori']; ?>" name="kategori" placeholder="Kategori">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
         
        <div class="form-group has-feedback">
          <label>Kepemilikan</label>
            
          <input type="text" readonly="" class="form-control" value="<?php echo $data['milik']; ?>" name="stok_pabrik" placeholder="Stok Pabrik">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
     
     </div>   
   <div class="form-group has-feedback">
        <label>Status Produk</label>
           <input type="text" readonly="" class="form-control" value="<?php echo $data['status']; ?>" name="stok_pabrik" placeholder="Stok Pabrik">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
     
     </div>
     <div class="form-group has-feedback">    
         <label>Deskripsi produk</label>
         <textarea class="form-control" readonly="" name="deskripsi" rows="15px" placeholder="Deskripsi"><?php  echo $data['deskripsi']; ?></textarea>
        </div>    
   </div>
       
     </div> 
   
 
</div>
</div>