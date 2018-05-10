 <link href="<?php echo base_url('assets/toko/'); ?>css/bootstrap.min.css" rel="stylesheet">
    
<p>Terima kasih atas minat Anda pada produk Niagara Store. Pesanan Anda telah diterima dan akan diproses setelah pembayaran dikonfirmasi.</p>
 
<table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
    <thead>
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#168A35; font-weight:bold;text-align:left;padding:7px;color:#fff" colspan="2">Rincian Pesanan</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px"><b>No. Pesanan:</b> <?php echo $data_order['no_invoices']; ?><br>
          <b>Tanggal ditambahkan:</b> <?php echo $data_order['tanggal_ditambahkan'] ?><br>
          <b>Metode Pembayaran:</b> <?php echo $data_order['metode_pembayaran'] ?><br>
          <b>Metode Pengiriman:</b> Pengiriman dengan <?php echo $data_order['nama_kurir']."&nbsp;".$data_order['jenis_service'];  ?>        </td>
      </tr>
    </tbody>
  </table>

<table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
    <thead>
      <tr>
                <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#168A35;font-weight:bold;text-align:left;padding:7px;color:#ccc">Alamat Pengiriman</td>
              </tr>
    </thead>
    <tbody>
      <tr>
          <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
           <?php echo $data_order['nomor_kontak']; ?><br>
           <?php echo $data_order['nama_provinsi']; ?><br>
           <?php echo $data_order['nama_kota']; ?><br>
           <?php echo $data_order['alamat_lengkap']; ?>  
          </td><td>
              </tr>
    </tbody>
  </table>

<table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
    <thead>
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd; background-color:#168A35; font-weight:bold;text-align:left;padding:7px;color:#fff">Instruksi</td>
      </tr>
    </thead>
    <tbody>
      <tr>
   <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">Intruksi Transfer Bank<br>
<br>
Silahkan melakukan pembayaran dengan mentransfer ke rekening di bawah ini, sesuai dengan nominal order Anda.<br>
<br>
Nama Bank:  BCA  ( KCP Muara Karang - Pluit )<br>
No. Rekening: PT. Angkasindo Dunia<br>
Atas nama: 0697089008<br>
<br>
Nama Bank:  Bank Mandiri ( KCP Muara Karang )<br>
No. Rekening: PT. Angkasindo Dunia<br>
Atas nama: 1150004051720<br>
<br>
<br>
Pesanan Anda tidak akan dikirim sampai Kami menerima pembayaran Anda.</td>
      </tr>
    </tbody>
  </table>

      <?php $ongkir=  $this->session->all_userdata(); ?>
        <table  style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px"  border="0"   class=" table-condensed table-striped table-responsive table-hover table-bordered">
					
				             
                                            <tr>
                                                        <td  style="text-align:center; background-color:#168A35;   font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;font-weight:bold;padding:7px;color:#fff"><b>Nama Produk</td>
					 		<td style="text-align:center; background-color:#168A35;   font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;font-weight:bold;padding:7px;color:#fff" ><b>Qty</td>
							<td style="text-align:center; background-color:#168A35;   font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;font-weight:bold;padding:7px;color:#fff" ><b>Berat</td>
							<td style="text-align:center; background-color:#168A35;   font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;font-weight:bold;padding:7px;color:#fff" ><b>Harga</td>
							<td style="text-align:center; background-color:#168A35;   font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;font-weight:bold;padding:7px;color:#fff" ><b>Harga Total</td>
                                             </tr>
					
 <?php $i = 1;
       $berat_total = 0;
 ?>
<?php foreach ($this->cart->contents() as $items): ?>
           
                                        
					<tr class="rem1"  >
                                           	<td class="invert"><?php echo $items['name']; ?></td>
						<td class="invert"><?php echo $items['qty']; ?></td>
						<td class="invert"><?php echo $items['berat']*$items['qty']; ?> Gram</td>
						
						<td class="invert">Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
						<td class="invert">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
						
					</tr>

<?php    
         $berat_sementara  = $items['berat']*$items['qty']; 
      
         $berat_total += $berat_sementara;  
     
?>                                        
<?php $i++; ?>

<?php endforeach; ?>			
                                        <tr class="rem1">
                                            <td class="invert"></td>
                                            <td class="invert">Berat Total : </td>
                                            <td class="invert" ><?php echo $berat_total; ?> Gram</td>
                                            <td class="invert">Sub Total</td>   
                                            <td class="invert">Rp.<?php echo number_format($this->cart->total()); ?></td>   
                                         </tr>
                                         
                                         <?php if(!empty($ongkir['diskon_voucher'])?$ongkir['diskon_voucher']:NULL !=NULL){ ?>
                                         <tr class="rem1">
                                            <td class="invert"></td>
                                            <td class="invert"></td>
                                            <td class="invert"></td>
                                            <td class="invert">Diskon <?php echo $ongkir['diskon_voucher'] ?> % </td>   
                                            <td class="invert">Rp.<?php echo number_format($hasil_kupon); ?></td>   
                                         </tr>
                                         <?php } ?>
                                         <tr class="rem1">
                                            <td class="invert"></td>
                                            <td class="invert"></td>
                                            <td class="invert"></td>
                                            <td class="invert">Total</td>   
                                            <td class="invert">Rp.<?php echo number_format($hasil_total); ?></td>   
                                         </tr>
                                         
                                         <tr class="rem1">
                                            <td class="invert"></td>
                                            <td class="invert"></td>
                                            <td class="invert" align="center"></td>
                                            <td class="invert">Ongkos Kirim</td>   
                                            <td class="invert">Rp.<?php echo number_format(!empty($ongkir['ongkos_terpilih'])?$ongkir['ongkos_terpilih']:0);?></td>   
                                         </tr>
                                         <tr class="rem1">
                                            <td class="invert"></td>
                                            <td class="invert"></td>
                                            <td class="invert"></td>
                                           <td class="invert">Total Bayar</td>   
                                           <td class="invert">Rp.<?php echo number_format($hasil_total+!empty($ongkir['ongkos_terpilih'])?$ongkir['ongkos_terpilih']:0); ?></td>   
                                         </tr> 
				</table>
        
        
    </center>
