<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_pos extends CI_Controller {
  public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('datatables');
        $this->load->helper('printer_helper'); 
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('M_customer');
        
   }
   public function index(){
    $id_inv = $this->db->get('data_invoices')->num_rows();
    redirect('C_pos/penjualan/'.$id_inv);          
   }
   public function penjualan(){
                $this->load->view('V_pos/umum/V_header');
                $this->load->view('V_pos/umum/V_sidebar');
		$this->load->view('V_pos/umum/V_top_navigasi');
		$this->load->view('V_pos/V_pos');
                $this->load->view('V_pos/umum/V_footer');
   }
 public function data_penjualan(){
                $this->load->view('V_pos/umum/V_header');
                $this->load->view('V_pos/umum/V_sidebar');
		$this->load->view('V_pos/umum/V_top_navigasi');
		$this->load->view('V_pos/V_data_penjualan');
                $this->load->view('V_pos/umum/V_footer');
   }
   public function get_allcustomer(){
        $kode = $this->input->post('customer',TRUE); //variabel kunci yang di bawa dari input text id kode
        $term =strtolower ($_GET['term']); // tambahan baris untuk filtering data
        $query =$this->M_customer->get_allcustomer($term); //query model
 
        $customer    =  array();
        foreach ($query as $d) {
            $json[]     = array(
                'label'                 => $d->nama_customer, //variabel array yg dibawa ke label ketikan kunci
                'id_customer'           => $d->id_customer , //variabel yg dibawa ke id nama
                'nama_customer'         => $d->nama_customer , //variabel yg dibawa ke id nama
                'alamat'                => $d->alamat, //variabel yang dibawa ke id ibukota
                'telp'                  => $d->telp, //variabel yang dibawa ke id ibukota
            );
        }
        echo json_encode($json);      //data array yang telah kota deklarasikan dibawa menggunakan json
    }
    public function get_allproduk(){
        $kode = $this->input->post('nama_produk',TRUE); //variabel kunci yang di bawa dari input text id kode
        $term =strtolower($_GET['term']); // tambahan baris untuk filtering data
        $query =$this->M_customer->get_allproduk($term); //query model
 
        $customer    =  array();
        foreach ($query as $d) {
            $json[]     = array(
                'label'                   => $d->nama_produk, //variabel array yg dibawa ke label ketikan kunci
                'id_produk'               => $d->id_produk, //variabel yang dibawa ke id ibukota
                'nama_produk'             => $d->nama_produk , //variabel yg dibawa ke id nama
                'harga_produk'            => $d->harga_produk , //variabel yg dibawa ke id nama
            );
        }
        echo json_encode($json);      //data array yang telah kota deklarasikan dibawa menggunakan json
    }
    
    
    public function simpan_customer(){
        
        if(isset($_POST['simpan_customer'])){
            
            $daftar = array(
            'nama_customer'      => $this->input->post('nama_customer'),
            'alamat'             => $this->input->post('alamat'),
            'telp'               => $this->input->post('telp'),
           );
            $this->db->insert('customer',$daftar);
            
           redirect('C_pos');
        }else{
            redirect('C_pos');
        }
        
    }
    public function simpan_data_barcode_sementara(){
      $id_produk = $_POST['id_produk'];
      
      $cek = $this->db->get_where('data_barcode_sementara',['id_produk'=>$id_produk]);
    
      foreach ($cek->result_array() as $cekid_produk){
          
          $cekproduk = $cekid_produk['id_produk'];
      }
      
      
        if( $id_produk == $cekproduk){
           
         echo "cek kembali produk";
       
        }elseif ($_POST['nama_produk'] != NULL){
           
            $daftar = array(
            'nama_produk'      => $this->input->post('nama_produk'),
            'id_produk'        => $this->input->post('id_produk'),
            'harga_produk'     => $this->input->post('harga_produk'),
           );
            $this->db->insert('data_barcode_sementara',$daftar);
           
      // }
       
      }
      
       
    }
  
   public function load_data_barcode_sementara(){
    $this->db->select('*');
    $this->db->from('data_barcode_sementara');
    $this->db->join('produk', 'produk.id_produk = data_barcode_sementara.id_produk');
    $query = $this->db->get();
       
       $total = 0;
       $total_sementara = 0;
       $ppn = 1;
       $data=0;
       $data_ppn=0;
       foreach ($query->result_array() as $data){
           
       
           $hasil_jumlah = $data['harga_produk']*$data['qty_produk'];
           
           echo "<tr align='center' class='sembunyikan".$data['id_data_barcode_sementara']."'><td>";
           echo $data['nama_produk'];
           echo "</td>";
           
           echo "<td>";
           echo "Rp.".number_format($data['harga_produk']);
           echo "</td>";
           
           if( $data['stok_produk'] < $data['qty_produk']){
           
           echo "<td >";
           echo " <input type='text'  class='col-md-2 col-sm-12 col-xs-12 form-control parsley-error' id='qty_produk".$data['id_data_barcode_sementara']."' onmouseout='input_qty(".$data['id_data_barcode_sementara'].")'    value='0' placeholder='Qty' >";
           echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Stok ".$data['stok_produk']." </strong>
                  </div>";
           echo "</td>";
           
           echo "<td>";
           echo "<input type='text' class='col-md-2 col-sm-12 col-xs-12 form-control'  Readonly=''   value='0' placeholder='Hasil' >";
           echo "</td>";
            
           }else{
          
           echo "<td>";
           echo "<input type='text'  class='col-md-2 col-sm-12 col-xs-12 form-control' id='qty_produk".$data['id_data_barcode_sementara']."' onmouseout='input_qty(".$data['id_data_barcode_sementara'].")'    value='".$data['qty_produk']."' placeholder='Qty' >";
           echo "</td>";
           
           echo "<td>";
           echo "<input type='text'  class='col-md-2 col-sm-12 col-xs-12 form-control' readonly='' value='Rp.".number_format($hasil_jumlah)."' placeholder='Hasil' >";
           echo "</td>";
           
           $input_hasil = array(
               
             'hasil_jml'=>$hasil_jumlah,  
           );
           $this->db->update('data_barcode_sementara',$input_hasil, array('id_produk' => $data['id_produk']));    
     
           
           }
                      
           echo "<td>";
           echo "<a onclick='hapus(".$data['id_data_barcode_sementara'].")'><button class='btn btn-danger fa fa-close'></button></a>"."<br>";
           echo "</td>";
                 
         
         
        
         $total_sementara += $hasil_jumlah;
         $total += $hasil_jumlah;
        
         if ($data['ppn']==10){
               
            $ppn = 1.1;
            $data_ppn = $total_sementara*10/100; 
           }
         }
         
         $input_total = $this->db->get('data_barcode_sementara');
         
         
        
         if($data['diskon'] == $data['diskon']){
             
             $nilaidiskon = $data['diskon'];
             
         }
           
         $hasil_kurang_diskon = $total_sementara*$nilaidiskon/100;
         $hasil_total = $total-$hasil_kurang_diskon;
         
        foreach ($input_total->result_array() as $id_total){
             
            $id = $id_total['id_produk'];
            
             $input_hasil_total = array(
               
             'hasil_total'=>$hasil_total,   
             'hasil_diskon'=>$hasil_kurang_diskon,   
          
             );
           $this->db->update('data_barcode_sementara',$input_hasil_total, array('id_produk' => $id));    
     
         }
              //diskon//
            
           echo "<tr align='center' ><td>";
           echo "";
           echo "</td>";
           
           echo "<td>";
           echo "";
           echo "</td>";
           
           echo "<td>";
           echo "";
           echo "</td>";
           
           echo "<td> ";
           echo "<input type='text' id='valdiskon' onmouseout='input_diskon()' class='col-md-2 col-sm-12 col-xs-12 form-control'  value='".$data['diskon']."'></div>";
           echo "</td>";
           
           echo "<td>";
           echo "Diskon";
           echo "</td>";
        
        //Diskon//
         
         
         
        //PPN//
            
           echo "<tr align='center' ><td>";
           echo "";
           echo "</td>";
           
           echo "<td>";
           echo "";
           echo "</td>";
           
           echo "<td>";
           echo "";
           echo "</td>";
           
           echo "<td> ";
           echo "<input type='text' readonly='' class='col-md-2 col-sm-12 col-xs-12 form-control'  value='Rp. ".number_format($data_ppn)."'></div>";
           echo "</td>";
          
           foreach ($input_total->result_array() as $id_total){
             
         $id = $id_total['id_produk'];
          $input_hasil_ppn = array(
               
             'hasil_ppn'=>$data_ppn,
           );
           $this->db->update('data_barcode_sementara',$input_hasil_ppn, array('id_produk' =>$id));    
          }
           echo "<td>";
           echo "PPN 10 %";
           echo "</td>";
        
        //PPN//
        
            //FREIGHT//
            
           echo "<tr align='center' ><td>";
           echo "";
           echo "</td>";
           
           echo "<td>";
           echo "";
           echo "</td>";
           
           echo "<td>";
           echo "";
           echo "</td>";
           
           echo "<td> ";
           echo "<input type='text' onmouseout='input_freight()' id='freight' class='col-md-2 col-sm-12 col-xs-12 form-control' value='".$data['freight']."' ></div>";
           echo "</td>";
           
           echo "<td>";
           echo "Freight";
           echo "</td>";
        
        //FREIGHT//
        
           echo "<tr align='center' style='background-color:#ec971f; color:#FFFFFF;'><td>";
           echo "";
           echo "</td>";
           
           echo "<td>";
           echo "";
           echo "</td>";
           
           echo "<td>";
           echo  "";
           echo "</td>";
           
           echo "<td style='width: 10px; font-size:18px;'>";
           echo "Rp. ".number_format($total*$ppn-$hasil_kurang_diskon+$data['freight']);
           $total_kirim = $total*$ppn-$hasil_kurang_diskon+$data['freight'];
           echo "<input type='hidden'  class='col-md-2 col-sm-12 col-xs-12 form-control' id='subtotal' value='".$total_kirim."'  >";
           
             
           echo "</td>";
           
           echo "<td style='font-size:16px;'>";
           echo "TOTAL";
           echo "</td>";
     
//UANG//
            
           echo "<tr align='center' ><td>";
           echo "";
           echo "</td>";
           
           echo "<td>";
           echo "";
           echo "</td>";
           
           echo "<td>";
           echo "";
           echo "</td>";
           
           echo "<td> ";
           echo "<input type='text' id='nominal' onmouseout='input_nominal()'  class='col-md-2 col-sm-12 col-xs-12 form-control' value='".$data['uang']."'  ></div>";
           echo "</td>";
           
           echo "<td>";
           echo "Nominal uang";
           echo "</td>";
        
        //UANG//
//KEMBALIAN
           echo "<tr align='center' style='background-color:#1ABB9C; color:#FFFFFF;'><td>";
           echo "";
           echo "</td>";
           
           echo "<td>";
           echo "";
           echo "</td>";
           
           echo "<td>";
           echo  "";
           echo "</td>";
           
           echo "<td style='width: 90px; font-size:25px;'>";
           $total_banget = $total*$ppn-$hasil_kurang_diskon+$data['freight'];
           $kembalian =  $data['uang'] - $total_banget;
           
           if($data['uang']==0){
              
            echo 'Rp.0';
            echo "<input type='hidden'  class='col-md-2 col-sm-12 col-xs-12 form-control' id='kembalian' value='0'  >";
            
           }else{
           echo "Rp. ".number_format($kembalian);
           echo "<input type='hidden'  class='col-md-2 col-sm-12 col-xs-12 form-control' id='kembalian' value='".$kembalian."'  >";
           }
           
           echo "</td>";
           
           echo "<td style='font-size:16px;'>";
           echo "KEMBALIAN";
           echo "</td>";   
   
 //KEMBALIAN          
         }
   
   public function hapus_data_barcode_sementara(){
       
       $id = $_GET['id_data_barcode_sementara'];
       $this->db->delete('data_barcode_sementara', array('id_data_barcode_sementara' => $id));
       
   }
   public function input_qty(){
    
     $id_data_barcode_sementara = $_POST['id_data_barcode_sementara'];
     
     $update_qty_barcode= array(
     'qty_produk'        => $_POST['qty_produk'],
     'hasil_jml'         => $_POST['hasil_jml'],
                                );
     $this->db->update('data_barcode_sementara',$update_qty_barcode, array('id_data_barcode_sementara' => $id_data_barcode_sementara));    
      
       
   }
   
    public function input_ppn(){
    
   $pengulangan = $this->db->get('data_barcode_sementara');   
   
   
   foreach ($pengulangan->result_array() as $data){
      
       $id = $data['id_data_barcode_sementara'];
       
       $input = array(
           
           'ppn' => $_POST['ppn'],
           
       );
      
    $this->db->update('data_barcode_sementara',$input, array('id_data_barcode_sementara' => $id));    
   
     }
       
   }
    public function input_freight(){
    
   $pengulangan = $this->db->get('data_barcode_sementara');   
   
   
   foreach ($pengulangan->result_array() as $data){
      
       $id = $data['id_data_barcode_sementara'];
       
       $input = array(
           
           'freight' => $_POST['freight'],
           
       );
      
    $this->db->update('data_barcode_sementara',$input, array('id_data_barcode_sementara' => $id));    
   
     }
       
   }
   public function input_nominal(){
    
   $pengulangan = $this->db->get('data_barcode_sementara');   
   
   
   foreach ($pengulangan->result_array() as $data){
      
       $id = $data['id_data_barcode_sementara'];
       
       $input = array(
           
           'uang' => $_POST['nominal'],
           
       );
      
    $this->db->update('data_barcode_sementara',$input, array('id_data_barcode_sementara' => $id));    
   
     }
       
   }
   public function input_diskon(){
       

     
   $pengulangan = $this->db->get('data_barcode_sementara');   
 
   
 foreach ($pengulangan->result_array() as $data){
      
       $id = $data['id_data_barcode_sementara'];
       
       $input = array(
           
           'diskon' => $_POST['diskon'],
           
       );
      
    $this->db->update('data_barcode_sementara',$input, array('id_data_barcode_sementara' => $id));    
   
     }
       
   
 }
 
 public function  input_barcode() {
     
    $barcode = $_GET['foo'];
  
    $data = $this->db->get_where('produk',['barcode'=>$barcode]);   
 
    foreach ($data->result_array() as $simpan){
     
        $id_produk_tersimpan = $this->db->get_where('data_barcode_sementara',['id_produk'=>$simpan['id_produk']]);
        
        foreach ($id_produk_tersimpan->result_array() as $data_id){
            
            $id_fiks = $data_id['id_produk'];
        }
        
        
      if( $simpan['id_produk'] == $id_fiks){
     
          
      }else{  
        
     $data_simpan=array(
         'id_produk' =>$simpan['id_produk'],
         'nama_produk' =>$simpan['nama_produk'],
         'harga_produk' =>$simpan['harga_produk'],
     );  
      $this->db->insert('data_barcode_sementara',$data_simpan);   
    }
   } 
 }
 
 public function simpan_invoices(){
    $cek = $_POST['id_inv'];
    
    $query = $this->db->get_where('data_customer_invoices');
     
    foreach ($query->result_array() as $hasil){
        
        $hasil_cek = $hasil['id_invoices_customer_data']; 
        
    }
    
    if($hasil_cek == $_POST['id_inv'] ){
    
        
    }elseif ($_POST['subtotal'] != 0  ) {
      
      if($this->input->post('id_inv')== 0 || $this->input->post('id_inv')== $this->input->post('id_inv')){
         
         $data_barcode = $this->db->get('data_barcode_sementara');
        
         foreach ($data_barcode->result_array() as $data){
             
             $simpan_data = array(
              
            'id_invoices_produk'   =>    $_POST['id_inv'],     
            'id_produk'            =>    $data['id_produk'], 
            'nama_produk'          =>    $data['nama_produk'], 
            'harga_produk'         =>    $data['harga_produk'], 
            'hasil_jml'            =>    $data['hasil_jml'], 
            'qty_produk'           =>    $data['qty_produk'], 
            'ppn'                  =>    $data['ppn'], 
            'diskon'               =>    $data['diskon'], 
            'freight'              =>    $data['freight'], 
            'uang'                 =>    $data['uang'], 
            'hasil_ppn'            =>    $data['hasil_ppn'], 
            'hasil_total'          =>    $data['hasil_total'], 
            'hasil_diskon'          =>    $data['hasil_diskon'], 
                 
             );
             
           $this->db->insert('data_produk_invoices',$simpan_data);  
             
         }
         
          $data_jumlah_invoices= array(
            'id_invoices_jumlah' => $this->input->post('id_inv'), 
            'total'              => $this->input->post('subtotal'), 
            'kembalian'          => $this->input->post('kembalian'), 
               
              );
         
          $this->db->insert('data_jumlah_invoices',$data_jumlah_invoices);
         
         $data_invoices= array(
            'invoices_record' => $this->input->post('id_inv'), 
           );
         $this->db->insert('data_invoices',$data_invoices);
         
         $valid =  $this->session->all_userdata();

         
         $simpan_data_customer_invoices= array(
            'id_invoices_customer_data' => $this->input->post('id_inv'), 
            'nama_customer'             => $this->input->post('customer'), 
            'telp'                      => $this->input->post('telp'), 
            'alamat'                    => $this->input->post('alamat'), 
            'ship'                      => $this->input->post('tampil_ship'), 
            'catatan'                   => $this->input->post('catatan'), 
            'cashier'                   => $valid['nama'], 
         );
          $this->db->insert('data_customer_invoices',$simpan_data_customer_invoices);
       
        $this->db->empty_table('data_barcode_sementara'); 
         }
    
   }
 }
 
   public function cetak_struk(){
 //   $id = $this->uri->segment(3);
 
// $this->db->select('*');
//$this->db->where('id_invoices_customer_data',$id);
//$this->db->from('data_customer_invoices');
//$this->db->join('data_jumlah_invoices', 'data_jumlah_invoices.id_invoices_jumlah = data_customer_invoices.id_invoices_customer_data');
//$this->db->join('data_produk_invoices', 'data_produk_invoices.id_invoices_produk = data_customer_invoices.id_invoices_customer_data');
//$query = $this->db->get();

//foreach ($query->result_array() as $data){
    
  //  echo $data['nama_produk'];
   // echo $data['harga_produk'];
   // echo $data['qty_produk'];
    
    
//}
       
//$this->load->view('V_pos/umum/V_print');
//$this->load->view('V_pos/V_print');
        redirect('C_pos');
}
public function load_preview(){
    
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
}

}
