<div class="x_panel">
                  <div class="x_title">
                    <h2>UPLOAD PRODUK DALAM BENTUK EXCEL ATAU CSV</h2>
                    <a href="<?php echo base_url('assets/dataexcel/format.xls'); ?>"><button class="btn btn-primary pull-right">DOWNLOAD FORMAT EXCEL <span class="fa fa-download"></span></button></a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form action="<?php echo base_url('C_produk/upload_produk_excel');?>"  class="dropzone dz-clickable"><div class="dz-default dz-message"><span>SILAHKAN UPLOAD FILE DISINI</span></div></form>
                    <br>
                    <br>
                    <br>
                    <br>
                  </div>
                </div>

<div class="x_panel">
<div class="x_title">
    <h2>TAMBAHKAN PRODUK</h2>
        <div class="clearfix"></div>
            </div>
  <?php  
 $id_inv = $this->db->get('data_produk')->num_rows();
  ?>    
   <form action="<?php echo base_url('C_produk/simpan_produk'); ?> " method="post" enctype="multipart/form-data">
  
   <input type="hidden" class="form-control" name="id_produk" value="<?php echo $id_inv; ?>">
    <div class="col-md-6">
      <div class="form-group has-feedback">
          <label>Barcode</label>
          <input type="text" class="form-control" name="barcode" placeholder="Kode Barcode">
        <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
      </div>
   <div class="form-group has-feedback">
        <label>Nama Produk</label>
         <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
    <div class="form-group has-feedback">
        <label>Harga Produk</label>
       <input type="text" class="form-control" name="harga_produk" placeholder="Harga Produk">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
    
        <div class="form-group has-feedback">
        <label>Stok Toko</label>
       <input type="text" class="form-control" name="stok_toko" placeholder="Stok Toko">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
     
        <div class="form-group has-feedback">
        <label>Stok Pabrik</label>
       <input type="text" class="form-control" name="stok_pabrik" placeholder="Stok Pabrik">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
        
        <div class="form-group has-feedback">
        <label>Berat Produk</label>
       <input type="text" class="form-control" name="berat" placeholder="Gram">
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
       
        <div class="form-group has-feedback">
        <label>Kategori</label>
        <select class="form-control" name="kategori">
        <option label="Kategori"></option>
        <?php foreach($query->result_array() as $data){ ?>   
        <option><?php echo $data['menu']; }?></option>
         
        </select>
        </div>
        
        <div class="form-group has-feedback">
          <label>Kepemilikan</label>
       <select class="form-control" name="milik">
                    <option label="Kepemilikan"></option>
                    <option>Online</option>
                    <option>Offline</option>
                  </select>
     </div>   
   <div class="form-group has-feedback">
          <label>Status Produk</label>
       <select class="form-control" name="status">
                   <option label="Status"></option>
                    <option>Aktif</option>
                    <option>Proses</option>
                    <option>Tidak_aktif</option>
                  </select>
     </div>
   </div>
        <div class="col-md-6">
             <label>Upload Gambar</label>
       
            <div class="form-group has-feedback">
                <input type="file" class="form-control" name="gambar" placeholder="Masukan foto">
        <span class="fa fa-upload form-control-feedback"></span>
      </div>
     
           <div class="form-group has-feedback">
         <label>Tambahkan Deskripsi produk</label>
         <textarea class="form-control" name="deskripsi" rows="21px" placeholder="Deskripsi"></textarea>
      </div>       
     </div> 
   <div class="x_content">
           <div class="col-xs-2 pull-left">
              <button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>
          </div>
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btnTambah" class="btn btn-success btn-block btn-flat">Mendaftar</button>
          </div>
        </div>
                      
  </form>
</div>
</div>