<div class="container ">
    <div class="col-sm-12" style="margin:10px;">
        <div class="col-sm-4">    
     <select class="form-control">
        <option>Sedang di Proses</option>
        <option>Sudah dalam Proses</option>
        <option>Sudah dikirm</option>
        <option>Ditolak</option>
      </select></div>
        <div class="col-sm-4">
    <div class="input-group date" data-provide="datepicker">
        <input type="date" class="form-control">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>
 </div>
        <div class="col-sm-2">
            <button class="btn btn-success"><span class="fa fa-search"></span> Cari Transaksi anda  </button>
        </div>
        
</div>
</div>

<div class="container  konfirmasi_bayar" >
<?php 
$i=0;
foreach ($data_konfirmasi->result_array() as $konfirmasi_pembayaran ) {    
$pemisah_panel = $konfirmasi_pembayaran['no_invoices'];

$pemisah =  explode("/", $pemisah_panel);
$i++;
?>

    
<div class="panel panel-default" id="panel1">
<div class="panel-heading">
    <a href="<?php echo base_url('Toko/print_invoices/'.$konfirmasi_pembayaran['no_invoices']) ?>"<button class="btn btn-success btn-xs pull-right"><span class="fa fa-print"></span> PRINT INVOICES</button></a>
<h4 data-toggle="collapse" data-target="#<?php echo $pemisah[5]; ?>" class="panel-title">Transaksi No.invoices <?php  echo $konfirmasi_pembayaran['no_invoices'];  ?></h4>
</div>
<div id="<?php echo $pemisah[5]; ?>" class="  panel-collapse collapse <?php if ($i == 1){ echo"in"; } else { } ?>">
<div class="panel-body">
<div class="col-sm-4">
<div id="bukti_upload">

<form method="post" id="myForm" action="#" enctype="multipart/form-data" onsubmit="return uploadBuktibayar(<?php echo $pemisah[5]; ?>)">
<label>Upload Bukti bayar :</label> <br>
<img style="width:300px;" class="" src="<?php echo base_url('uploads/bukti_bayar/'.$konfirmasi_pembayaran['gambar_pembayaran']); ?>"<br>
<br/>
<label>Jumlah bayar</label>

<input  class="form-control" value="<?php echo $konfirmasi_pembayaran['jumlah_dibayarkan']?>" readonly="" type="text" name="jumlah_bayar">

</form>
</div>
</div>
<div class="col-sm-8">
<table style="width:100%; text-align: center; " class="table-striped table-bordered table-hover table-responsive">
<tr style="">
<td>Nama produk</td>
<td>Qty</td>
<td>Harga</td>
<td>Harga total</td>
</tr>

<?php 
$data_produk = $this->db->get_where('data_toko_penjualan_produk',array('no_invoices'=>$konfirmasi_pembayaran['no_invoices']));

foreach ($data_produk->result_array() as $data_order){
?> 
<tr>
<td><?php echo $data_order['nama_produk'];?></td>
<td><?php echo $data_order['qty'];?></td>
<td><?php echo $data_order['harga'];?></td>
<td><?php echo $data_order['harga_total'];?></td>
</tr>   





<?php  }

?>

<tr>
<td></td>
<td></td>
<td>Sub total</td>
<td><?php echo $konfirmasi_pembayaran['sub_total']; ?></td>
</tr>
<?php if ($konfirmasi_pembayaran['nilai_diskon'] != 0){ ?>
<tr>
<td></td>
<td></td>
<td>Diskon <?php echo  $konfirmasi_pembayaran['nilai_diskon'] ?> %</td>
<td><?php echo  $konfirmasi_pembayaran['hasil_diskon'] ?></td>
</tr>
<?php }?>
<tr>
<td></td>
<td></td>
<td>Total</td>
<td><?php echo  $konfirmasi_pembayaran['total'] ?></td>
</tr>

<tr>
<td></td>
<td></td>
<td>Ongkos kirim</td>
<td><?php echo  $konfirmasi_pembayaran['ongkos_kirim'] ?></td>
</tr>
<tr>
<td></td>
<td></td>
<td>Total bayar</td>
<td><?php echo  $konfirmasi_pembayaran['total_bayar'] ?></td>
</tr>
</table>
    
</div>

<div class="col-sm-12">
    <h3 align="center"><span class="fa fa-envelope"></span> Status pesanan</h3>    
    
<?php if ($konfirmasi_pembayaran['status_penjualan'] != 'Di Tolak'){  ?>
<div class="row bs-wizard" style="border-bottom:0;">
<div class="col-xs-4 bs-wizard-step  complete"><!-- complete -->
<div class="text-center bs-wizard-stepnum">Sedang di proses</div>
<div class="progress"><div class="progress-bar"></div></div>
<a href="#" class="bs-wizard-dot"></a>
<div class="bs-wizard-info text-center">Pesanan sedang di proses</div>
</div>

<div class="col-xs-4 bs-wizard-step <?php if($konfirmasi_pembayaran['status_penjualan'] == "Sudah di Proses" || $konfirmasi_pembayaran['status_penjualan'] == "Selesai" ) { echo "complete"; } ?> "><!-- complete -->
<div class="text-center bs-wizard-stepnum">Sudah dalam proses</div>
<div class="progress"><div class="progress-bar"></div></div>
<a href="#" class="bs-wizard-dot"></a>
<div class="bs-wizard-info text-center">Pesanan sudah di proses penjual</div>
</div>

<div class="col-xs-4 bs-wizard-step <?php if($konfirmasi_pembayaran['status_penjualan'] == "Selesai" ) { echo "complete"; } ?>  "><!-- active -->
<div class="text-center bs-wizard-stepnum">Sudah dikirim</div>
<div class="progress"><div class="progress-bar"></div></div>
<a href="#" class="bs-wizard-dot"></a>
<div class="bs-wizard-info text-center">Pesanan sudah dikrim</div>
</div>
</div>
<?php } else { ?> 
<h4 align="center" style="color:#900">
<span class="fa fa-refresh "></span> pesanan anda di tolak dengan alasan<br><?php echo $konfirmasi_pembayaran['alasan_penolakan']; ?><br>team kami akan segera menghubungi agan untuk proses selanjutnya<br>
</h4>  
<?php } ?>  
</div>    
    
</div>
</div>
</div>
    
    
<?php } ?>

<?php if(!empty($konfirmasi_pembayaran['no_invoices'])?$konfirmasi_pembayaran['no_invoices']:'' !=''){


}else{
?>

<div class="container">
<h3 align="center">Tidak ada pembayaran yang harus di konfirmasi <span class="fa fa-warning"></span></h3>

</div>
<?php } ?>
</div>