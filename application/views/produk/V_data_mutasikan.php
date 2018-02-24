<?php 
foreach ($query->result_array() as $data){
}

?>

<div class="x_panel">
                  <div class="x_title">
                    <h2>BUAT PERMUTASIAN ANTARA PABRIK DAN TOKO</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      </ul>
                    <div class="clearfix"></div>
                  </div>
           <div class="col-md-6">
               <form action="<?php echo base_url('C_produk/simpan_mutasi')  ?>" method="POST" enctype="multipart/form-data">  
                    <p>BUAT PERMUTASIAN ANTARA PABRIK DAN TOKO</P>
                       <div class="divider-dashed"></div>      
                        <label class="col-sm-7 control-label">STOK PABRIK</label>
                         <div class="col-sm-10">
                              <input type="hidden" name="id_produk" readonly="" value="<?php echo $data['id_produk'];?>" class="form-control">
                              <input type="text" readonly="" value="<?php echo $data['stok_pabrik'];?>" class="form-control">
                        </div>
                        
                        <label class="col-sm-7   control-label">STOK TOKO TERSEDIA</label>

                        <div class="col-sm-10">
                              <input type="text" value="<?php echo $data['stok_toko']; ?>" readonly="" class="form-control">
                        </div>
                        
                        <label class="col-sm-7 control-label">PENAMBAHAN STOK KE TOKO</label>

                        <div class="col-sm-10">
                            <input name="mut_stok_pabrik" type="text"  class="form-control">
                        </div>
                            <div class="clearfix"></div>
                        <hr>  
                   <div class="col-xs-4 pull-right">
                       <button type="submit" name="btnToko" class="btn bg-green btn-block btn-flat"><span class="fa fa-save"> Simpan</span></button>
                   </div>
                 </form>
                        
                      </div>
            
    
                <div class="col-md-6">
                   <form action="<?php echo base_url('C_produk/simpan_mutasi')  ?>" method="POST" enctype="multipart/form-data">  
                     <p>BUAT PERMUTASIAN ANTARA TOKO DAN PABRIK</P>
                       <div class="divider-dashed"></div>      
                        <label class="col-sm-7 control-label">STOK PABRIK</label>
                         <div class="col-sm-10">
                              <input type="hidden" name="id_produk" readonly="" value="<?php echo $data['id_produk'];?>" class="form-control">
                            <input type="text" readonly="" value="<?php echo $data['stok_pabrik'];?>" class="form-control">
                        </div>
                        
                        <label class="col-sm-7   control-label">STOK TOKO TERSEDIA</label>

                        <div class="col-sm-10">
                        <input type="text" value="<?php echo $data['stok_toko']; ?>" readonly="" class="form-control">
                        </div>
                        
                        <label class="col-sm-7 control-label">PENGEMBALIAN STOK KE PABRIK</label>

                        <div class="col-sm-10">
                            <input type="text" name="mut_stok_toko"  class="form-control">
                        </div>
                        <div class="clearfix"></div>
                        <hr>  
                   <div class="col-xs-4 pull-right">
                         <button type="submit" name="btnPabrik" class="btn bg-green btn-block btn-flat"><span class="fa fa-save"> Simpan</span></button>
                 </div>
                   </form>   
                      </div>
                      
                  
                      </div></div>
