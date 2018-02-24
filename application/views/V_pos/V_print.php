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
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td>Disc ".$data2['diskon']." %</td>";
echo "<td>Rp ".number_format($data['hasil_diskon'])."</td>";
echo "</tr>";
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td>SubTotal</td>";
echo "<td>Rp ".number_format($data['hasil_total'])."</td>";
echo "</tr>";
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td>PPN 10 %</td>";
echo "<td>Rp ".number_format($data['hasil_ppn'])."</td>";
echo "</tr>";
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td>Freight</td>";
echo "<td>Rp ".number_format($data['freight'])."</td>";
echo "</tr>";
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
?>
         
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
//use Mike42\Escpos\Printer;
//use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\CupsPrintConnector;

//use Mike42\Escpos\Printer;
//use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

//$connector = new NetworkPrintConnector("192.168.30.1",EPSON); // Add connector for your printer here.
//$printer = new Printer($connector);

//$profile = CapabilityProfile::load("simple");
//$connector = new WindowsPrintConnector("smb://computer/printer");
//$printer = new Printer($connector, $profile);
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\CapabilityProfile;
$profile = CapabilityProfile::load("simple");
$connector = new WindowsPrintConnector("smb://olan/EPSON-L355-Series");
$printer = new Printer($connector, $profile);

$printer -> initialize();
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> setTextSize(2, 2);
$printer -> text("NIAGARA WATERMART \n");
$printer -> setJustification();
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("JL.Muara Karang Blok L9T No.8 \n");
$printer -> text("Penjaringan Jakarta Utara, 14450 \n");
$printer -> text("Telp.021-6697706\n");
$printer -> setJustification();
$printer -> text("--------------------------------\n");
$printer -> text("Customer :".$data['nama_customer']."\n");    
$printer -> text("Hp/Telephone :".$data['telp']."\n");    
$printer -> text("Pengiriman :".$data['ship']."\n");    
$printer -> text("Pukul :".$data['waktu']."\n");    
$printer -> text("---------------------------------\n");
$printer -> text("Cashier :".$data['cashier']."\n");    
$printer -> text("No. :#".$data['id_invoices_customer_data']."\n");    
$printer -> text("---------------------------------\n");
$printer -> text("Nama     Harga    Qty   Jumlah \n");
$printer -> text("---------------------------------\n");
foreach ($query->result_array() as $data2){
$printer -> text("".$data2['nama_produk']." Rp.".number_format($data2['harga_produk'])."".$data2['qty_produk']." Rp.".number_format($data2['hasil_jml'])."\n");    
}
$printer -> text("---------------------------------\n");
$printer -> text("---------------------------------\n");
$printer -> text("Subtotal".number_format($data['hasil_total'])."/n");
$printer -> text("---------------------------------\n");
$printer -> text("PPN 10 %".number_format($data['hasil_ppn'])."/n");
$printer -> text("---------------------------------\n");
$printer -> text("Freight".number_format($data['freight'])."/n");
$printer -> text("---------------------------------\n");
$printer -> text("Total".number_format($data['total'])."/n");
$printer -> text("---------------------------------\n");
$printer -> text("Uang : Rp.".number_format($data['uang'])."/n");
$printer -> text("---------------------------------\n");
$printer -> text("Kembali :Rp.".number_format($data['kembalian'])."/n");
$printer -> text("---------------------------------\n");
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("Alamat :".$data['alamat']."\n");
$printer -> text("Terimakasih \n");
$printer -> text("Datang Kembali \n");
$printer -> setJustification();
$printer -> cut();
$printer -> pulse();
$printer -> close();