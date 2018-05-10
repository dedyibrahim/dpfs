

<script src="<?php echo base_url('assets/bootstrap/js/') ?>/bootstrap.min.js"></script>    
<link rel="stylesheet" media='all' href="<?php echo base_url('assets/bootstrap/css/') ?>bootstrap.min.css" >
<div class="col-md-7">
<br>    

    <button class="pull-right btn btn-primary fa fa-print" onclick="PrintDiv();" /> Cetak invoices</button> 
<br>
<br>

<script type="text/javascript">     
function PrintDiv() {    
var divToPrint = document.getElementById('divToPrint');
var popupWin = window.open('', '',);
popupWin.document.open();
popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
popupWin.document.close();
}
</script>
<div id="divToPrint">
<?php $data2 = $data->row_array();
       
 ?>    
    
<script src="<?php echo base_url('assets/bootstrap/js/') ?>/bootstrap.min.js"></script>    
<link rel="stylesheet" media="print" href="<?php echo base_url('assets/bootstrap/css/') ?>bootstrap.min.css" >
<style>
 @media print {
  *,
  *:before,enter code here
  *:after {
   
  }
  a,
  a:visited {
    text-decoration: underline;
  }
  a[href]:after {
    content: " (" attr(href) ")";
  }
  abbr[title]:after {
    content: " (" attr(title) ")";
  }
  a[href^="#"]:after,
  a[href^="javascript:"]:after {
    content: "";
  }
  pre,
  blockquote {
    border: 1px solid #999;

    page-break-inside: avoid;
  }
  thead {
    display: table-header-group;
  }
  tr,
  img {
    page-break-inside: avoid;
  }
  img {
    max-width: 100% !important;
  }
  p,
  h2,
  h3 {
    orphans: 3;
    widows: 3;
  }
  h2,
  h3 {
    page-break-after: avoid;
  }
  select {
    background: #fff !important;
  }
  .navbar {
    display: none;
  }
  .btn > .caret,
  .dropup > .btn > .caret {
    border-top-color: #000 !important;
  }
  .label {
    border: 1px solid #000;
  }
  .table {
    border-collapse: collapse !important;
  }
  .table td,
  .table th {
    background-color: #fff !important;
  }
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #ddd !important;
  }
}   
    
    
</style>

<table class="table table-condensed table-striped table-bordered">
<tr>
    <th colspan="4" style="text-align:center;">Bukti Pembayaran</th>        
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
<td><?php echo $pr_inv['harga']; ?></td>  
<td><?php echo $pr_inv['harga_total']; ?></td>  
</tr>

<?php
}
?> 

</table>
</div>  

</div>