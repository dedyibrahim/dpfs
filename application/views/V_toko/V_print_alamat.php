<body onload="window.print();"></body>

<?php $data2 = $data->row_array();?>    
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    font-size:13px; 
    border-collapse: collapse;
   
}

#customers td, #customers th {
    border: 1px dashed #000;
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
<table id="customers">
<tr>
    <th colspan="2" style="text-align:center;"><p align ="center"><img style="width:100px; height:45px; " src="<?php echo  base_url('assets/toko/images/home/logo.png') ?>"></p></th>        
</tr>

<tr>
    <td colspan="3" style="text-align:center;"><H3>PENGIRIM<H3></td>        
</tr>
<tr>
    <td colspan="3" style="text-align:center;"><H4>NIAGARAWATERMART <BR>JL.MUARA KARANG BLOK L9 T NO.8<BR> KEC.PENJARINGAN KEL.PLUIT JAKARTA UTARA <BR> TELP:021-6697706<BR>EMAIL:CUSTOMER.CARE@NIAGARA.CO.ID</H4></td>        
</tr>
<tr>
    <td colspan="2" style="text-align:center;"><H4>TUJUAN PENGIRIMAN</H4></td>
</tr>
<tr>
    <td colspan="2"><H4>Nama lengkap :<?php  echo  $data2['nama_depan']."&nbsp;".$data2['nama_belakang']."<br>".$data2['nama_kota']."<br>".$data2['nama_provinsi']."<br>".$data2['alamat_lengkap']."<br> Nomor kontak : ".$data2['nomor_kontak']; ?></H4></td>
</tr>
</table>
