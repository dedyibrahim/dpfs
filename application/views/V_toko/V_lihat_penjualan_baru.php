
    
<div class="x_panel">
<div class="x_title">
<h2>DATA PESANAN MASUK</h2>
<a href="<?php echo base_url('C_toko/terima_pesanan/'.$no_inv); ?>"><button class="btn btn-success pull-right"><span class="fa fa-plus"></span> TERIMA PESANAN</button></a>
<button type="button" class="btn btn-danger  pull-right " data-toggle="modal" data-target=".bs-example-modal-sm"><span class="fa fa-recycle"></span> TOLAK</button>
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
<?php $databaru = $data->row_array() ?>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Alasan penolakan orderan customer <?php echo  $databaru['nama_depan']."&nbsp;".$databaru['nama_belakang'] ?></h4>
                        </div>
                        <div class="modal-body">
                            <textarea id="alasan" class="form-control" id="alasan"  placeholder="Alasan penolakan . . ."></textarea><br>
                                              
                             <h4 align="center">Jika melakukan penolakan makan jumlah uang yang dibayarkan sebesar Rp.<?php echo number_format($databaru['total_bayar']); ?> harap di transfer kembali ke pemilik  <?php echo  $databaru['nama_depan']."&nbsp;".$databaru['nama_belakang'] ?></h4> 
                           <input class="form-control" id="no_inv"  name="telp" placeholder="Service kirim" readonly="" value="<?php echo $no_inv ?>" type="hidden"><br>
                            <input class="form-control" id="id_customer"  name="telp" placeholder="Service kirim" readonly="" value="<?php echo $databaru['id_customer_toko'] ?>" type="hidden"><br>
                            <input class="form-control" id="uang"  name="telp" placeholder="Service kirim" readonly="" value="<?php echo $databaru['total_bayar'] ?>" type="hidden"><br>
                           </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default"data-dismiss="modal">Close</button>
                            <button type="button" name="simpan_resi" onclick="tolak_pesanan();" class="btn  btn-danger ">IYA TOLAK</button>
                        </form>
                        </div>
               </div>
           </div>
    </div >
    <script type="text/javascript">
    function tolak_pesanan(){
       var alasan = $("#alasan").val();
       var no_inv = $("#no_inv").val();
       
       if(alasan != ''){
       
        $.ajax({
            type:"POST",
            url:"<?php echo base_url('C_toko/tolak_pesanan') ?>",
            data:"alasan="+alasan+"&no_inv="+no_inv, 
             
            success:function(html){
              swal({
               title:"STATUS PENOLAKAN ORDERAN", 
               text:"Data Penolakan berhasil disimpan",
               timer:1500,
               type:"success",
               showCancelButton :false,
               showConfirmButton :false
                });
                
              window.location.replace("<?php echo base_url('C_toko/penjualan_masuk');  ?>");
        
              }
        });
    } else {
    swal({
               title:"KESALAHAN", 
               text:"Anda Belum memberikan alasan penolakan !!",
               timer:1500,
               type:"error",
               showCancelButton :false,
               showConfirmButton :false
                });
    
    }
    
    }    
    </script>    