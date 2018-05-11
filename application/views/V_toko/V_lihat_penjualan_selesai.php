<script type="text/javascript">

function simpan_resi(){
var no_inv = $("#no_inv").val();
var resi   = $("#resi").val();

$.ajax({
    
    type:"POST",
    url:"<?php echo base_url('C_toko/simpan_resi'); ?>",
    data:"no_inv="+no_inv+"&resi="+resi,
               
         success:function(html){
              swal({
               title:"", 
               text:"Data  Resi berhasil di simpan",
               timer:1500,
               type:"success",
               showCancelButton :false,
               showConfirmButton :false
                });
                
              window.location.replace("<?php echo base_url('C_toko/konfirmasi_penjualan');  ?>");
        
              }
            
}); 
    
    
}
 
</script>    


<?php $databaru = $data->row_array() ?>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Masukan Resi Pengiriman Milik <?php echo  $databaru['nama_depan']."&nbsp;".$databaru['nama_belakang'] ?></h4>
                        </div>
                        <div class="modal-body">
                             <input class="form-control" id="resi"  name="nomor_resi" placeholder="Resi" type="text"><br>
                             <input class="form-control"  name="telp" placeholder="Jasa kirim" readonly="" value="<?php echo $databaru['nama_kurir']; ?>" type="text"><br>
                             <input class="form-control"  name="telp" placeholder="Service kirim" readonly="" value="<?php echo $databaru['jenis_service']; ?>" type="text"><br>
                             <input class="form-control" id="no_inv"  name="telp" placeholder="Service kirim" readonly="" value="<?php echo $no_inv ?>" type="hidden"><br>
                       </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default"data-dismiss="modal">Close</button>
                            <button type="button" name="simpan_resi" onclick="simpan_resi();" class="btn bg-green">SIMPAN RESI</button>
                        </form>
                        </div>
               </div>
           </div>
    </div >
    
<div class="x_panel">
<div class="x_title">
<h2>KONFIRMASI PENJUALAN <?php echo $no_inv; ?></h2>
<button class="btn btn-warning pull-right " data-toggle="modal" data-target=".bs-example-modal-sm"><span class="fa fa-pencil"></span> EDIT RESI</button>
<button onclick="window.open('<?php echo base_url('C_toko/print_invoices/'.$no_inv); ?>')"class="btn btn-success pull-right"><span class="fa fa-print"></span> PRINT INVOICES</button>

<div class="clearfix"></div>
</div>
<table  style="width: 100%;" class="table-condensed table-responsive  table-bordered table-striped table-hover">
<tr style="text-align: center">
<td>Nama Produk</td>
<td>Qty</td>
<td>Berat</td>
<td>Harga</td>
<td>Harga Total</td>
</tr>   
<?php 

foreach ($data->result_array() as $order_baru){


?>    
<tr style="text-align: center">   
<td><?php echo $order_baru['nama_produk'];?></td>
<td><?php echo $order_baru['qty'];?></td>
<td><?php echo $order_baru['berat'];?></td>
<td><?php echo "Rp." . number_format($order_baru['harga'])?></td>
<td><?php echo "Rp." . number_format($order_baru['harga_total'])?></td>
<tr>




<?php
}
?>
<tr style="text-align: center">   
<td></td>
<td></td>
<td></td>
<td>Subtotal :</td>
<td><?php echo "Rp." . number_format($order_baru['sub_total']) ?></td>

<?php if ($order_baru['nilai_diskon'] != 0 ) { ?>
<tr style="text-align: center">   
<td></td>
<td></td>
<td></td>
<td>Diskon <?php echo $order_baru['nilai_diskon']  ?> %</td>
<td><?php echo "Rp." .number_format($order_baru['hasil_diskon']) ?></td>
<tr>      
<?php } ?>

<tr>       
<tr style="text-align: center">   
<td></td>
<td></td>
<td></td>
<td>Total :</td>
<td><?php echo "Rp.". number_format($order_baru['total']) ?></td>
<tr>

<tr style="text-align: center">   
<td></td>
<td></td>
<td></td>
<td>Ongkos kirim:</td>
<td><?php echo "Rp.". number_format($order_baru['ongkos_kirim']) ?></td>
<tr>     
<tr style="text-align: center">   
<td></td>
<td></td>
<td></td>
<td>Total bayar:</td>
<td><?php echo "Rp.". number_format($order_baru['total_bayar']) ?></td>
<tr>      

</table>
<div class="clearfix"></div>

<div style="border:1px #ccc  solid; margin-top:5px; " class="col-md-12">
<h4 align="center"> DATA PEMBELI </h4>
<div style="border:1px #ccc  solid; margin:0 auto; float:none;  padding: 5px; " class="col-md-8">
<div class="clearfix"></div>
<h4>Alamat pengiriman</h4>
<table style="width: 100%; " class="table-bordered table-condensed table-responsive table-striped table-hover">
<tr><td>Nama customer</td><td><?php echo  $order_baru['nama_depan']."&nbsp;".$order_baru['nama_belakang'] ?></td></tr>
<tr><td>Nomor kontak</td><td><?php echo  $order_baru['nomor_kontak'] ?></td></tr>
<tr><td>Alamat lengkap</td><td><?php echo  $order_baru['alamat_lengkap'] ?></td></tr>
<tr><td>Nama Kota</td><td><?php echo  $order_baru['nama_kota'] ?></td></tr>
<tr><td>Nama Provinsi</td><td><?php echo  $order_baru['nama_provinsi'] ?></td></tr>

</table>
</div>

</div><br>

</div>
