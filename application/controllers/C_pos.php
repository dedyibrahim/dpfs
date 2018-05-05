<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_pos extends CI_Controller {
  public function __construct() {
        parent::__construct();
          require_once (APPPATH.'third_party/dompdf/dompdf_config.inc.php');
       
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
        $this->load->model('M_produk');
        
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
   public function edit_penjualan(){
                $this->load->view('V_pos/umum/V_header');
                $this->load->view('V_pos/umum/V_sidebar');
		$this->load->view('V_pos/umum/V_top_navigasi');
		$this->load->view('V_pos/V_edit_penjualan');
                $this->load->view('V_pos/umum/V_footer');
   }
   public function data_customer(){
                $this->load->view('V_pos/umum/V_header');
                $this->load->view('V_pos/umum/V_sidebar');
		$this->load->view('V_pos/umum/V_top_navigasi');
		$this->load->view('V_pos/customer/V_data_customer');
                $this->load->view('V_pos/umum/V_footer');
   }
   public function edit_customer($id){
     $query = $this->db->get_where('customer',['id_customer'=>$id]);
     $this->load->view('V_pos/umum/V_header');
     $this->load->view('V_pos/umum/V_sidebar');
     $this->load->view('V_pos/umum/V_top_navigasi');
     $this->load->view('V_pos/customer/V_edit_customer',["query"=>$query]);
     $this->load->view('V_pos/umum/V_footer');
           
   }
   public function get_allcustomer(){
        $kode = $this->input->post('customer',TRUE); //variabel kunci yang di bawa dari input text id kode
        $term =strtolower ($_GET['term']); // tambahan baris untuk filtering data
        $query =$this->M_customer->get_allcustomer($term); //query model
 
        $customer    =  array();
        foreach ($query as $d) {
            $json[]     = array(
                'label'              => $d->nama_customer, //variabel array yg dibawa ke label ketikan kunci
                'id_customer'        => $d->id_customer , //variabel yg dibawa ke id nama
                'nama_customer'      => $d->nama_customer , //variabel yg dibawa ke id nama
                'alamat'             => $d->alamat, //variabel yang dibawa ke id ibukota
                'telp'                => $d->telp, //variabel yang dibawa ke id ibukota
            );
        }
        echo json_encode($json);      //data array yang telah kota deklarasikan dibawa menggunakan json
    }
    public function get_allproduk(){
        $kode = $this->input->post('nama_produk',TRUE); //variabel kunci yang di bawa dari input text id kode
        $term =strtolower($_GET['term']); // tambahan baris untuk filtering data
        $query =$this->M_produk->get_allproduk($term); //query model
 
        $customer    =  array();
        foreach ($query as $d) {
            $json[]     = array(
                'label'                   => $d->nama_produk." Rp.".number_format($d->harga_produk), //variabel array yg dibawa ke label ketikan kunci
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
       
        }elseif ($_POST['id_produk'] != NULL){
           
            $daftar = array(
            'nama_produk'      => $this->input->post('nama_produk'),
            'id_produk'        => $this->input->post('id_produk'),
            'harga_produk'     => $this->input->post('harga_produk'),
            'qty_produk'      => 1,
           );
            $this->db->insert('data_barcode_sementara',$daftar);
           
     }
      
       
    }
   public function load_data_barcode_sementara(){
    $this->db->select('*');
    $this->db->from('data_barcode_sementara');
    $this->db->join('data_produk_ditoko', 'data_produk_ditoko.id_produk = data_barcode_sementara.id_produk');
    $query = $this->db->get();
    $this->db->order_by('id_data_barcode_sementara','ASC');
       
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
           
           if( $data['stok_toko'] < $data['qty_produk']){
           
           echo "<td >";
           echo " <input type='text'  class='col-md-2 col-sm-12 col-xs-12 form-control parsley-error' id='qty_produk".$data['id_data_barcode_sementara']."' onmouseout='input_qty(".$data['id_data_barcode_sementara'].")'    value='0' placeholder='Qty' >";
           echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Stok ".$data['stok_toko']." </strong>
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
  
    if($barcode == 0 || $barcode ==''){
    echo"asdasd";
        
    }else{
    
      $data = $this->db->get_where('data_produk_ditoko',['barcode'=>$barcode]);   
 
    foreach ($data->result_array() as $simpan){
     
        $id_produk_tersimpan = $this->db->get_where('data_barcode_sementara',['id_produk'=>$simpan['id_produk']]);
        
        foreach ($id_produk_tersimpan->result_array() as $data_id){
            
            $id_fiks = $data_id['id_produk'];
        }
        
        
      if( $simpan['id_produk'] == $id_fiks){
     
          
      }else{  
        
     $data_simpan=array(
         'id_produk'    =>$simpan['id_produk'],
         'nama_produk'  =>$simpan['nama_produk'],
         'harga_produk' =>$simpan['harga_produk'],
         'qty_produk'   =>1,
     );  
      $this->db->insert('data_barcode_sementara',$data_simpan);   
    }
   } 
 }
 
      }
 
 public function simpan_invoices(){
    $cek = $_POST['id_inv'];
    
     if ($_POST['subtotal'] != 0 && $this->input->post('customer') != NULL  ) {
      
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
            'tanggal'              =>    date("m/"."d/"."Y"), 
              
                 
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
            'penjualan'                 => $this->input->post('tampil_ship2'), 
            'catatan'                   => $this->input->post('catatan'), 
            'cashier'                   => $valid['nama'], 
            'status'                    => 'SELESAI', 
         );
          $this->db->insert('data_customer_invoices',$simpan_data_customer_invoices);
       
        $this->db->empty_table('data_barcode_sementara'); 
         }
    
   }
 }
 
   public function cetak_struk(){
   
$this->load->view('V_pos/umum/V_print');
$this->load->view('V_pos/V_print');
//redirect('C_pos');
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
public function data_json_penjualan(){
  $this->load->model('Data_penjualan');
   header('Content-Type: application/json');
  echo $this->Data_penjualan->json_penjualan_pos();       
 }
 public function data_edit_penjualan(){
  $this->load->model('Data_penjualan');
   header('Content-Type: application/json');
  echo $this->Data_penjualan->json_edit_pos();       
 }
 public function json_customer(){
$table = 'customer';
$primaryKey = 'id_customer';
$columns = array(
	array( 'db' => 'nama_customer',       'dt' => 0 ),
	array( 'db' => 'alamat',              'dt' => 1 ),
	array( 'db' => 'telp',                'dt' => 2 ),
       
            
        array( 'db' => 'id_customer',    
               'dt' => 3,
               'formatter' => function ( $d, $row) {
                return anchor('C_pos/edit_customer/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-warning'");
                       
            })
           
            );
       
            
           
$sql_details = array(
	'user' => $this->db->username,
	'pass' => $this->db->password,
	'db'   => $this->db->database,
	'host' => $this->db->hostname
);


$this->load->library('ssp');

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
}
public function simpan_edit_customer($id){
    
    $data = array(
    'nama_customer'=>$this->input->post('nama_customer'),    
    'telp'         =>$this->input->post('telp'),    
    'alamat'       =>$this->input->post('alamat'),    
    );
    
    $this->db->update('customer',$data,array('id_customer'=>$id));

    redirect('C_pos/data_customer');
    
}
public function lihat_penjualan(){
                $this->load->view('V_pos/umum/V_header');
                $this->load->view('V_pos/umum/V_sidebar');
		$this->load->view('V_pos/umum/V_top_navigasi');
		$this->load->view('V_pos/V_lihat_data_penjualan');
                $this->load->view('V_pos/umum/V_footer');    
}

public function edit_data_penjualan($id){
    
    $data_edit = $this->db->get_where('data_produk_invoices',['id_invoices_produk'=>$id]);
    
    
     foreach ($data_edit->result_array() as $data){
                
         
             $data_kirim = array(
              
            'id_invoices_produk'   =>    $id,     
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
            'hasil_diskon'          =>   $data['hasil_diskon'], 
                 
             );
             
            $this->db->insert('data_edit_produk_penjualan',$data_kirim);  
      }
      $this->db->delete('data_produk_invoices', array('id_invoices_produk'=>$id));
         
      redirect('C_pos/ubah_penjualan/'.$id);
      
    
}
 public function ubah_penjualan($id){
     $query = $this->db->get_where('data_customer_invoices',['id_invoices_customer_data'=>$id]);
     $this->load->view('V_pos/umum/V_header');
     $this->load->view('V_pos/umum/V_sidebar');
     $this->load->view('V_pos/umum/V_top_navigasi');
     $this->load->view('V_pos/V_ubah_penjualan',['query'=>$query]);
     $this->load->view('V_pos/umum/V_footer');
}
 public function data_edit_produk_penjualan(){
    $this->db->select('*');
    $this->db->from('data_edit_produk_penjualan');
    $this->db->join('data_produk_ditoko', 'data_produk_ditoko.id_produk = data_edit_produk_penjualan.id_produk');
    $query = $this->db->get();
       
       $total = 0;
       $total_sementara = 0;
       $ppn = 1;
       $data=0;
       $data_ppn=0;
       foreach ($query->result_array() as $data){
           
       
           $hasil_jumlah = $data['harga_produk']*$data['qty_produk'];
           
           echo "<tr align='center' class='sembunyikan".$data['id_data_edit_penjualan']."'><td>";
           echo $data['nama_produk'];
           echo "</td>";
           
           echo "<td>";
           echo "Rp.".number_format($data['harga_produk']);
           echo "</td>";
           
           if( $data['stok_toko'] < $data['qty_produk']){
           
           echo "<td >";
           echo " <input type='text'  class='col-md-2 col-sm-12 col-xs-12 form-control parsley-error' id='qty_produk".$data['id_data_edit_penjualan']."' onmouseout='input_qty(".$data['id_data_edit_penjualan'].")'    value='0' placeholder='Qty' >";
           echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Stok ".$data['stok_toko']." </strong>
                  </div>";
           echo "</td>";
           
           echo "<td>";
           echo "<input type='text' class='col-md-2 col-sm-12 col-xs-12 form-control'  Readonly=''   value='0' placeholder='Hasil' >";
           echo "</td>";
            
           }else{
          
           echo "<td>";
           echo "<input type='text'  class='col-md-2 col-sm-12 col-xs-12 form-control' id='qty_produk".$data['id_data_edit_penjualan']."' onmouseout='input_qty(".$data['id_data_edit_penjualan'].")'    value='".$data['qty_produk']."' placeholder='Qty' >";
           echo "</td>";
           
           echo "<td>";
           echo "<input type='text'  class='col-md-2 col-sm-12 col-xs-12 form-control' readonly='' value='Rp.".number_format($hasil_jumlah)."' placeholder='Hasil' >";
           echo "</td>";
           
           $input_hasil = array(
               
             'hasil_jml'=>$hasil_jumlah,  
           );
           $this->db->update('data_edit_produk_penjualan',$input_hasil, array('id_produk' => $data['id_produk']));    
     
           
           }
                      
           echo "<td>";
           echo "<a onclick='hapus(".$data['id_data_edit_penjualan'].")'><button class='btn btn-danger fa fa-close'></button></a>"."<br>";
           echo "</td>";
                 
         
         
        
         $total_sementara += $hasil_jumlah;
         $total += $hasil_jumlah;
        
         if ($data['ppn']==10){
               
            $ppn = 1.1;
            $data_ppn = $total_sementara*10/100; 
           }
         }
         
         $input_total = $this->db->get('data_edit_produk_penjualan');
         
         
        
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
            
           $this->db->update('data_edit_produk_penjualan',$input_hasil_total, array('id_produk' => $id));    
     
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
           $this->db->update('data_edit_produk_penjualan',$input_hasil_ppn, array('id_produk' =>$id));    
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
public function hapus_data_barcode_sementara_edit(){
       
       $id = $_GET['id_data_edit_penjualan'];
       $this->db->delete('data_edit_produk_penjualan', array('id_data_edit_penjualan' => $id));
       
   }
   public function input_qty_edit(){
    
     $id_data_edit_penjualan = $_POST['id_data_edit_penjualan'];
     
     $update_qty_barcode= array(
     'qty_produk'        => $_POST['qty_produk'],
     'hasil_jml'         => $_POST['hasil_jml'],
                                );
     $this->db->update('data_edit_produk_penjualan',$update_qty_barcode, array('id_data_edit_penjualan' => $id_data_edit_penjualan));    
      
       
   }
   
    public function input_ppn_edit(){
    
   $pengulangan = $this->db->get('data_edit_produk_penjualan');   
   
   
   foreach ($pengulangan->result_array() as $data){
      
       $id = $data['id_data_edit_penjualan'];
       
       $input = array(
           
           'ppn' => $_POST['ppn'],
           
       );
      
    $this->db->update('data_edit_produk_penjualan',$input, array('id_data_edit_penjualan' => $id));    
   
     }
       
   }
    public function input_freight_edit(){
    
   $pengulangan = $this->db->get('data_edit_produk_penjualan');   
   
   
   foreach ($pengulangan->result_array() as $data){
      
       $id = $data['id_data_edit_penjualan'];
       
       $input = array(
           
           'freight' => $_POST['freight'],
           
       );
      
    $this->db->update('data_edit_produk_penjualan',$input, array('id_data_edit_penjualan' => $id));    
   
     }
       
   }
   public function input_nominal_edit(){
    
   $pengulangan = $this->db->get('data_edit_produk_penjualan');   
   
   
   foreach ($pengulangan->result_array() as $data){
      
       $id = $data['id_data_edit_penjualan'];
       
       $input = array(
           
           'uang' => $_POST['nominal'],
           
       );
      
    $this->db->update('data_edit_produk_penjualan',$input, array('id_data_edit_penjualan' => $id));    
   
     }
       
   }
   public function input_diskon_edit(){
       
       

     
   $pengulangan = $this->db->get('data_edit_produk_penjualan');   
 
   
 foreach ($pengulangan->result_array() as $data){
      
       $id = $data['id_data_edit_penjualan'];
       
       $input = array(
           
           'diskon' => $_POST['diskon'],
           
       );
      
    $this->db->update('data_edit_produk_penjualan',$input, array('id_data_edit_penjualan' => $id));    
   
     }
       
   
 }
 public function  input_barcode_edit() {
     
    $barcode = $_GET['foo'];
  
    if($barcode == 0 || $barcode ==''){
  
    echo"asdasd";
        
    }else{
    
      $data = $this->db->get_where('data_produk_ditoko',['barcode'=>$barcode]);   
 
    foreach ($data->result_array() as $simpan){
     
        $id_produk_tersimpan = $this->db->get_where('data_edit_produk_penjualan',['id_produk'=>$simpan['id_produk']]);
        
        foreach ($id_produk_tersimpan->result_array() as $data_id){
            
            $id_fiks = $data_id['id_produk'];
        }
      if( $simpan['id_produk'] == $id_fiks){
       }else{  
        $data_simpan=array(
         'id_produk'    =>$simpan['id_produk'],
         'nama_produk'  =>$simpan['nama_produk'],
         'harga_produk' =>$simpan['harga_produk'],
         'qty_produk'   =>1,
     );  
      $this->db->insert('data_edit_produk_penjualan',$data_simpan);   
    }
   } 
  }
 }
 
 
 
 public function simpan_invoices_edit(){
    $cek = $_POST['id_inv'];
      $data_barcode = $this->db->get('data_edit_produk_penjualan');
        
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
            'hasil_diskon'         =>    $data['hasil_diskon'], 
            'tanggal'              =>    date("m/"."d/"."Y"), 
             );
             
           $this->db->insert('data_produk_invoices',$simpan_data);  
             
         }
         
          $data_jumlah_invoices= array(
            'id_invoices_jumlah' => $_POST['id_inv'], 
            'total'              => $this->input->post('subtotal'), 
            'kembalian'          => $this->input->post('kembalian'), 
               
              );
         
          $this->db->update('data_jumlah_invoices',$data_jumlah_invoices,array('id_invoices_jumlah'=>$_POST['id_inv']));
         
          
         $valid =  $this->session->all_userdata();

         
         $simpan_data_customer_invoices= array(
            'id_invoices_customer_data' => $_POST['id_inv'], 
            'nama_customer'             => $this->input->post('customer'), 
            'telp'                      => $this->input->post('telp'), 
            'alamat'                    => $this->input->post('alamat'), 
            'ship'                      => $this->input->post('tampil_ship'), 
            'penjualan'                 => $this->input->post('tampil_ship2'), 
            'catatan'                   => $this->input->post('catatan'), 
            'cashier'                   => $valid['nama'], 
            'status'                    => 'SELESAI', 
         );
          $this->db->update('data_customer_invoices',$simpan_data_customer_invoices,array('id_invoices_customer_data'=>$_POST['id_inv']));
       
        $this->db->empty_table('data_edit_produk_penjualan'); 
      
   
 }
 
 
 
 
 public function simpan_data_barcode_sementara_edit(){
    $id_produk = $_POST['id_produk'];
      $cek = $this->db->get_where('data_edit_produk_penjualan',['id_produk'=>$id_produk]);
      foreach ($cek->result_array() as $cekid_produk){
          $cekproduk = $cekid_produk['id_produk'];
      }
        if( $id_produk == $cekproduk){
           
         echo "cek kembali produk";
       
        }elseif ($_POST['id_produk'] != NULL){
           
            $daftar = array(
            'nama_produk'      => $this->input->post('nama_produk'),
            'id_produk'        => $this->input->post('id_produk'),
            'harga_produk'     => $this->input->post('harga_produk'),
            'qty_produk'      => 1,
           );
            $this->db->insert('data_edit_produk_penjualan',$daftar);
           
     }
      
 }
 
 public function cetak_A4(){
     
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
$str ="<h2>ADA KESALAHAN MOHON PERHATIKAN KEMBALI</h2><br><H1> :-(</H1>";    
    
}else{
 $str ="<p align='center'>TOKO NIAGARA WATERMART<br>JL.Muara Karang Blok L9 T No.8 Penjaringan <br> Jakarta Utara, 14450, Telp.021-6697706</p>";
 $str.="<p align='center'><hr></p>";
 $str.="customer &nbsp;&nbsp;&nbsp; : ".$data['nama_customer']."<br>";    
 $str.="Telp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ".$data['telp']."<br>";    
 $str.="Pengiriman : ".$data['ship']."<br>";    
 $str.="Pukul &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ".$data['waktu']."<br>";    
 $str.="Kasir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ".$data['cashier']."<br>";    
 $str.="No.Struk &nbsp;: #".$data['id_invoices_customer_data']."<br>";    
 $str.="<p align='center'><hr></p>";
foreach ($query->result_array() as $data2){

 $str.="<div>".$data2['nama_produk']."<br>".number_format($data2['harga_produk'])." X ".$data2['qty_produk']." =  Rp ".number_format($data2['hasil_jml'])."</div><br>";
}
$str.= "<br><table>";
if($data['diskon']!=NULL&$data['diskon']!=0){
$str.= "<tr>";
$str.= "<td>Disc ".$data2['diskon']." %</td>";
$str.= "<td>: Rp ".number_format($data['hasil_diskon'])."</td>";
$str.= "</tr>";
}else{}
$str.= "<tr>";
$str.= "<td>SubTotal</td>";
$str.= "<td>: Rp ".number_format($data['hasil_total'])."</td>";
$str.= "</tr>";

if($data['hasil_ppn']!=NULL & $data['hasil_ppn']!=0){
$str.= "<tr>";
$str.= "<td>PPN 10 %</td>";
$str.= "<td>: Rp ".number_format($data['hasil_ppn'])."</td>";
$str.= "</tr>";
}else{}
if($data['freight']!=NULL & $data['freight']!=0){
$str.= "<tr>";
$str.= "<td>Freight</td>";
$str.= "<td>: Rp ".number_format($data['freight'])."</td>";
$str.="</tr>";
}else{}
$str.= "<tr>";
$str.= "<td>Total</td>";
$str.= "<td>: Rp ".number_format($data['total'])."</td>";
$str.= "</tr>";

$str.= "<tr>";
$str.="<td>Uang</td>";
$str.= "<td>: Rp ".number_format($data['uang'])."</td>";
$str.= "</tr>";

$str.= "<tr>";
$str.= "<td>Kembali</td>";
$str.= "<td>: Rp ".number_format($data['kembalian'])."</td>";
$str.= "</tr></table>";
$str.= "<hr>"
. "<p align='center'>Terimakasih Telah berbelanja di Store Niagarawatermart,<br>Datang kembali<br>www.store.niagara.co.id</p>";

}
     
     
     
       $dompdf = new DOMPDF();
       $dompdf->load_html($str);
       $dompdf->set_paper("A4");
       $dompdf->render();
       $dompdf->stream('laporan'.'.pdf', array('Attachment'=>0));    
               
           
           
        
           
     }

}

                       
       
     
 


