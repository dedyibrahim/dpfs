<div class="x_panel">
<div class="x_title">
    <h2>TAMBAHKAN PRODUK OFFLINE</h2>
        <div class="clearfix"></div>
            </div>
<form action="<?php echo base_url('C_produk/simpan_produk'); ?> " method="post" enctype="multipart/form-data">
   
    <div class="col-md-6">
      <div class="form-group has-feedback">
          <input type="text" class="form-control" name="barcode" placeholder="Kode Barcode">
        <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
      </div>
   <div class="form-group has-feedback">
       <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
    <div class="form-group has-feedback">
       <input type="text" class="form-control" name="harga_produk" placeholder="Harga Produk">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
     <div class="form-group has-feedback">
       <input type="text" class="form-control" name="stok_produk" placeholder="Stok Produk">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
   
        <div class="form-group has-feedback">
        <input type="text" readonly="" class="form-control" name="milik" placeholder="offline" value="offline">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>    
   <div class="form-group has-feedback">
         <select class="form-control" name="status">
                    <option>Status</option>
                    <option>Aktif</option>
                    <option>Proses</option>
                    <option>Tidak_aktif</option>
                  </select>
     </div>
   </div>
        <div class="col-md-6">
            <div class="form-group has-feedback">
                <input type="file" class="form-control" name="gambar" placeholder="Masukan foto">
        <span class="fa fa-upload form-control-feedback"></span>
      </div>
     </div> 
   <div class="x_content">
           <div class="col-xs-2 pull-left">
              <button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>
          </div>
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btnTambah" class="btn btn-primary btn-block btn-flat">Mendaftar</button>
          </div>
        </div>
                      
  </form>
</div>
</div>