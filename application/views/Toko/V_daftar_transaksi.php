
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