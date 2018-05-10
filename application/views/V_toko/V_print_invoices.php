<body onload="window.print();"></body>


<?php $data2 = $data->row_array();?>    
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    font-size:13px; 
    border-collapse: collapse;
   
}

#customers td, #customers th {
    border: 1px solid #000;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 5px;
    padding-bottom: 5px;
    text-align: left;
    background-color: #ccc;
    color: black;
}
</style>
<table style="width:100%;"  id="customers">
<tr>
    <th colspan="2" style="text-align:center;">Bukti Pembayaran</th>        
<th colspan="2" style="text-align:center;"><p align ="center"><img src="<?php echo  base_url('assets/toko/images/home/logo.png') ?>"></p></th>        
</tr>
<tr>
    <td colspan="4"></td>   
</tr> 
<tr>
    <td  width="30px" style="text-align:center;">No.Transaksi</td>        
    <td colspan="3" style="text-align:center;"><?php echo $no_inv; ?></td>        
</tr>
<tr>
    <td  style="text-align:center;">Waktu Transaksi</td>        
    <td colspan="3" style="text-align:center;"> <?php echo $data2['waktu_transaksi'] ?></td>        
</tr>
<tr>
    <td colspan="4"></td>   
</tr>   
<tr>
<th colspan="">Nama Customer</th>

<th colspan="4">Nama Penjual</th>
</tr>
<tr>
<td colspan=""><?php  echo $data2['nama_depan']."&nbsp;".$data2['nama_belakang']."<br>".$data2['nama_kota']."<br>".$data2['nama_provinsi']."<br>".$data2['alamat_lengkap']; ?></td>

<td colspan="4">Niagara Store</td>
</tr>
<tr>
    <td colspan="4"></td>   
</tr>   
<tr>
<th>Nama Produk</th> 
<th>Qty</th> 
<th>Harga</th> 
<th>Total Harga</th> 
</tr>


    
 <?php 
foreach ($data->result_array() as $pr_inv){
?>
<tr>
<td><?php echo $pr_inv['nama_produk']; ?></td>  
<td><?php echo $pr_inv['qty']; ?></td>  
<td>Rp. <?php echo number_format($pr_inv['harga']); ?></td>  
<td>Rp. <?php echo number_format($pr_inv['harga_total']); ?></td>  
</tr>

<?php
}
?> 
<tr>
<td></td>   
<td></td>   
<td>Subtotal</td>   
<td>Rp. <?php echo number_format($data2['sub_total']); ?></td>   
</tr>

<?php  if(!empty($data2['kode_diskon'])?$data2['kode_diskon']:NULL !=NULL){ ?>
<tr >
<td></td>
<td></td>
<td>Diskon <?php echo $data2['nilai_diskon'] ?> % </td>   
<td>Rp.<?php echo number_format($data2['hasil_diskon']); ?></td>   
</tr>
<?php } ?>

<tr>
<td></td>   
<td></td>   
<td>Total</td>   
<td>Rp. <?php echo number_format($data2['total']); ?></td>   
</tr>
<tr>
<td></td>   
<td></td>   
<td>Ongkos kirim</td>   
<td>Rp. <?php echo number_format($data2['ongkos_kirim']); ?></td>   
</tr>

<tr>
<td></td>   
<td></td>   
<td>Total bayar</td>   
<td>Rp. <?php echo number_format($data2['total_bayar']); ?></td>   
</tr>

</table>
