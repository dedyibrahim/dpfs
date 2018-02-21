<?php

<<<<<<< HEAD
=======
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


>>>>>>> 14d1d82bc012879be249bb8be7b3003fc6524ee5
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;
use Mike42\Escpos\EscposImage;

<<<<<<< HEAD
$connector = new CupsPrintConnector("es");
$printer = new Printer($connector);

/* Initialize */
=======
$connector = new CupsPrintConnector("Epson-TM-Slip"); // Add connector for your printer here.
$printer = new Printer($connector);
>>>>>>> 14d1d82bc012879be249bb8be7b3003fc6524ee5
$printer -> initialize();
$printer -> selectPrintMode(Printer::MODE_EMPHASIZED);
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

<<<<<<< HEAD
/* Text */
$printer -> text("NIAGARA WATERMART");
$printer -> cut();
=======
foreach ($query->result_array() as $data2){

//$printer -> text("".$data2['nama_produk']." Rp.".number_format($data2['harga_produk'])."".$data2['qty_produk']." Rp.".number_format($data2['hasil_jml'])."\n");    
$printer -> text("--------------------------------\n");
}
$printer -> cut(Printer::CUT_FULL);
//$printer -> cut();
>>>>>>> 14d1d82bc012879be249bb8be7b3003fc6524ee5

$printer -> pulse();
$printer -> close();
