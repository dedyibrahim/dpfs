   


<?php $databaru = $data->row_array() ?>


    
<div class="x_panel">
<div class="x_title">
<h2>PENJUALAN DITOLAK <?php echo $no_inv; ?></h2>

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
