<div class="x_panel">
<div class="x_title">
    <h2>DATA PENJUALAN</h2>
        <div class="clearfix"></div>
 
</div>
    <div class="col-md-5 center-margin" style="border: 1px solid;">   
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
echo "<p align='center'>---------------------------------------------------------------------------</p>";
echo "customer &nbsp;&nbsp;&nbsp; : ".$data['nama_customer']."<br>";    
echo "Telp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ".$data['telp']."<br>";    
echo "Pengiriman : ".$data['ship']."<br>";    
echo "Pukul &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ".$data['waktu'];    
echo "<p align='center'>---------------------------------------------------------------------------</p>";
echo "Kasir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ".$data['cashier']."<br>";    
echo "No.Struk &nbsp;: #".$data['id_invoices_customer_data']."<br>";    
echo "<p align='center'>---------------------------------------------------------------------------</p>";
echo "<table class='table table-striped'>";
echo "<tr>";
echo "<td>Nama</td>";
echo "<td>Harga</td>";
echo "<td>Qty</td>";
echo "<td>Jumlah</td>";
echo "</tr>";
foreach ($query->result_array() as $data2){

echo "<tr>";
echo "<td>".$data2['nama_produk']."</td>";
echo "<td>Rp ".number_format($data2['harga_produk'])."</td>";
echo "<td>".$data2['qty_produk']."</td>";
echo "<td>Rp ".number_format($data2['hasil_jml'])."</td>";
echo "</tr>";
}
if($data['diskon']!=NULL&$data['diskon']!=0){
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td>Disc ".$data2['diskon']." %</td>";
echo "<td>Rp ".number_format($data['hasil_diskon'])."</td>";
echo "</tr>";
}else{}
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td>SubTotal</td>";
echo "<td>Rp ".number_format($data['hasil_total'])."</td>";
echo "</tr>";

if($data['hasil_ppn']!=NULL & $data['hasil_ppn']!=0){
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td>PPN 10 %</td>";
echo "<td>Rp ".number_format($data['hasil_ppn'])."</td>";
echo "</tr>";
}else{}
if($data['freight']!=NULL & $data['freight']!=0){
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td>Freight</td>";
echo "<td>Rp ".number_format($data['freight'])."</td>";
echo "</tr>";
}else{}
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td>Total</td>";
echo "<td>Rp ".number_format($data['total'])."</td>";
echo "</tr>";

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td>Uang</td>";
echo "<td>Rp ".number_format($data['uang'])."</td>";
echo "</tr>";


echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td>Kembali</td>";
echo "<td>Rp ".number_format($data['kembalian'])."</td>";
echo "</tr>";
echo "</table>";
echo "<hr><p align='center'>Terimakasih,<br>Datang kembali</p>";

}
?></div>
</div></div>