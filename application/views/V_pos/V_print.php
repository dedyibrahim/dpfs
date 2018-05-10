<body onload="window.print()"></body>

<div class="col-md-3" style="font-size:12xp; ">
<?php
$id = $this->uri->segment(3);
 
$this->db->select('*');
$this->db->where('id_invoices_customer_data',$id);
$this->db->from('data_customer_invoices','left');
$this->db->join('data_jumlah_invoices', 'data_jumlah_invoices.id_invoices_jumlah = data_customer_invoices.id_invoices_customer_data','left');
$this->db->join('data_produk_invoices', 'data_produk_invoices.id_invoices_produk = data_customer_invoices.id_invoices_customer_data','left');
$query = $this->db->get();    
foreach ($query->result_array() as $data){
}
if($query->result_array() == NULL){
echo "<h2>ADA KESALAHAN MOHON PERHATIKAN KEMBALI</h2><br><H1> :-(</H1>";    
    
}else{
echo "<p align='center'>TOKO NIAGARA WATERMART<br>JL.Muara Karang Blok L9 T No.8 Penjaringan <br> Jakarta Utara, 14450, Telp.021-6697706</p>";
echo "<p align='center'><hr></p>";
echo "customer &nbsp;&nbsp;&nbsp; : ".$data['nama_customer']."<br>";    
echo "Telp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ".$data['telp']."<br>";    
echo "Pengiriman : ".$data['ship']."<br>";    
echo "Pukul &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ".$data['waktu']."<br>";    
echo "Kasir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ".$data['cashier']."<br>";    
echo "No.Struk &nbsp;: #".$data['id_invoices_customer_data']."<br>";    
echo "<p align='center'><hr></p>";
foreach ($query->result_array() as $data2){

 echo "<div>".$data2['nama_produk']."<br>".number_format($data2['harga_produk'])." X ".$data2['qty_produk']." =  Rp ".number_format($data2['hasil_jml'])."</div><br>";
}
echo "<br><table>";
if($data['diskon']!=NULL&$data['diskon']!=0){
echo "<tr>";
echo "<td>Disc ".$data2['diskon']." %</td>";
echo "<td>: Rp ".number_format($data['hasil_diskon'])."</td>";
echo "</tr>";
}else{}
echo "<tr>";
echo "<td>SubTotal</td>";
echo "<td>: Rp ".number_format($data['hasil_total'])."</td>";
echo "</tr>";

if($data['hasil_ppn']!=NULL & $data['hasil_ppn']!=0){
echo "<tr>";
echo "<td>PPN 10 %</td>";
echo "<td>: Rp ".number_format($data['hasil_ppn'])."</td>";
echo "</tr>";
}else{}
if($data['freight']!=NULL & $data['freight']!=0){
echo "<tr>";
echo "<td>Freight</td>";
echo "<td>: Rp ".number_format($data['freight'])."</td>";
echo "</tr>";
}else{}
echo "<tr>";
echo "<td>Total</td>";
echo "<td>: Rp ".number_format($data['total'])."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Uang</td>";
echo "<td>: Rp ".number_format($data['uang'])."</td>";
echo "</tr>";


echo "<tr>";
echo "<td>Kembali</td>";
echo "<td>: Rp ".number_format($data['kembalian'])."</td>";
echo "</tr></table>";
echo "<hr>"
. "<p align='center'>Terimakasih Telah berbelanja di Store Niagarawatermart,<br>Datang kembali<br>www.store.niagara.co.id</p>";

}?>
</div>