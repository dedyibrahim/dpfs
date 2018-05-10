<?php 
foreach ($query->result_array() as $data){
}
?>
<div class="x_panel">
<div class="x_title">
    <h2>EDIT PRODUK</h2>
        <div class="clearfix"></div>
            </div>
   <form action="<?php echo base_url('C_produk/edit_produk_simpan'); ?> " method="post" enctype="multipart/form-data">
  
    <input type="hidden" class="form-control" name="id_produk" value="<?php echo $data['id_produk']; ?>">
    <input type="hidden" class="form-control" name="hapus_gambar" value="<?php echo $data['gambar0']; ?>">
     <div class="col-md-6">
      <div class="form-group has-feedback">
          <label>Barcode</label>
           <input type="text" class="form-control" value="<?php echo $data['barcode']; ?>" name="barcode" placeholder="Kode Barcode">
        <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
      </div>
   <div class="form-group has-feedback">
        <label>Nama Produk</label>
         <input type="text" class="form-control"value="<?php echo $data['nama_produk']; ?>" name="nama_produk" placeholder="Nama Produk">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
    <div class="form-group has-feedback">
       <label>Harga_produk</label>
       <input type="text" class="form-control" value="<?php echo $data['harga_produk']; ?>" name="harga_produk" placeholder="Harga Produk">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
    
        <div class="form-group has-feedback">
         <label>Stok Toko</label>
       <input type="text" class="form-control" value="<?php echo $data['stok_toko']; ?>" name="stok_toko" placeholder="Stok Toko">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
     
        <div class="form-group has-feedback">
        <label>Stok Pabrik</label>
         <input type="text" class="form-control" value="<?php echo $data['stok_pabrik']; ?>" name="stok_pabrik" placeholder="Stok Pabrik">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
         
        
        <div class="form-group has-feedback">
        <label>Berat Produk</label>
       <input type="text" class="form-control" value="<?php echo $data['berat']; ?>" name="berat" placeholder="Gram">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
         
         <label>Kategori</label>
        <select class="form-control" name="kategori">
        <option label="Kategori"><?php echo $data['kategori']; ?></option>
        <?php foreach($kategori->result_array() as $data2){ ?>   
        <option><?php echo $data2['menu']; }?></option>
         
        </select>
        

        <div class="form-group has-feedback">
          <label>Kepemilikan</label>
            
         <select class="form-control" name="milik">
                    <option ><?php  echo $data['milik']; ?></option>
                    <option>Online</option>
                    <option>Offline</option>
                  </select>
     </div>   
    
   <div class="form-group has-feedback">
        <label>Status Produk</label>
         <select class="form-control" name="status">
                   <option ><?php echo $data['status']; ?></option>
                    <option>Aktif</option>
                    <option>Proses</option>
                    <option>Tidak_aktif</option>
                  </select>
     </div>
</div>

        <div class="col-md-6">
          
       <div class="form-group has-feedback">
         <label>Tambahkan Deskripsi produk</label>
         <textarea class="form-control" name="deskripsi" rows="21px" placeholder="Deskripsi"><?php  echo $data['deskripsi']; ?></textarea>
      </div>       
     </div>
    
   <div class="x_content">
           <div class="col-xs-2 pull-left">
              <button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>
          </div>
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btnEdit" class="btn btn-success btn-block btn-flat">Mendaftar</button>
          </div>
        </div>
                      
  </form>
</div>
</div>