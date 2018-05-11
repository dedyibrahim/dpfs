 <link href="<?php echo base_url('assets/toko/'); ?>css/bootstrap.min.css" rel="stylesheet">
    
<p>Anda mendapat pesanan baru store nigara, silahkan di proses secepatnya</p>
 
<?php 
foreach ($data_bukti_bayar->result_array() as  $data_order){
    
}

?>



<table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
    <thead>
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#168A35; font-weight:bold;text-align:left;padding:7px;color:#fff" colspan="2">Rincian Pesanan</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
       <br>
          <b>Nama Kustomer:</b> <?php echo $data_order['nama_depan'].$data_order['nama_belakang'] ?><br>
          <b>No_invoices  :</b> <?php echo $data_order['no_invoices'] ?><br>
      </tr>
    </tbody>
  </table>
<br>
<o>Dengan bukti bayar terlampir: </o>