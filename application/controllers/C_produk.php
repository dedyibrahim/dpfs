<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_produk extends CI_Controller {
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
        $this->load->library('session');
  
  }
   public function index(){
      
       redirect('C_produk/produk_toko');          
  }
   public function produk_toko(){
                $this->load->view('produk/umum/V_header');
                $this->load->view('produk/umum/V_sidebar');
		$this->load->view('produk/umum/V_top_navigasi');
		$this->load->view('produk/V_produk_toko');
                $this->load->view('produk/umum/V_footer');
  } public function produk_pabrik(){
                $this->load->view('produk/umum/V_header');
                $this->load->view('produk/umum/V_sidebar');
		$this->load->view('produk/umum/V_top_navigasi');
		$this->load->view('produk/V_produk_pabrik');
                $this->load->view('produk/umum/V_footer');
  }
  public function produk_mau_habis(){
                $this->load->view('produk/umum/V_header');
                $this->load->view('produk/umum/V_sidebar');
		$this->load->view('produk/umum/V_top_navigasi');
		$this->load->view('produk/V_produk_mau_habis');
                $this->load->view('produk/umum/V_footer');
  }
  public function produk_habis(){
                $this->load->view('produk/umum/V_header');
                $this->load->view('produk/umum/V_sidebar');
		$this->load->view('produk/umum/V_top_navigasi');
		$this->load->view('produk/V_produk_habis');
                $this->load->view('produk/umum/V_footer');
  }
   public function tambah_produk(){
                $query = $this->db->get('layout_menu');
                $this->load->view('produk/umum/V_header');
                $this->load->view('produk/umum/V_sidebar');
		$this->load->view('produk/umum/V_top_navigasi');
		$this->load->view('produk/V_tambah_produk',['query'=>$query]);
                $this->load->view('produk/umum/V_footer');
   }
  public function data_penjualan_produk(){
                $this->load->view('produk/umum/V_header');
                $this->load->view('produk/umum/V_sidebar');
		$this->load->view('produk/umum/V_top_navigasi');
		$this->load->view('produk/V_data_penjualan_produk');
                $this->load->view('produk/umum/V_footer');
   }
   public function simpan_produk(){
    if(isset($_POST['btnTambah'])){
         
         $config = [
                    'upload_path'    => './uploads/produk/',
                    'allowed_types' => 'jpg|gif|png|zip|pdf',
                    'max_size'      =>'200000000'
                   ];
           $config['upload_path']; 
           $config['overwrite'] = TRUE;
           
            $field_name ="gambar";
            $this->upload->initialize($config);                
            $this->load->library('upload', $config);
    
    if ($this->upload->do_upload($field_name)){

        $image_data                = $this->upload->data();
        $config2['image_library']  ='gd2';
        $config2['source_image']   = $this->upload->upload_path.$this->upload->file_name;
        $config2['maintain_ratio'] = TRUE;
        $config2['overwrite']      = TRUE;
        $config2['width']          = 800;
        $config2['height']         = 800;
         
        $this->load->library('image_lib',$config2);
        $this->image_lib->initialize($config2);
        $this->image_lib->resize();

////membuat thumbnail ////

        $conf['image_library']  ='gd2';
        $conf['source_image']   = $this->upload->upload_path.$this->upload->file_name;
        $conf['new_image']      ='./uploads/produk_thumb/';
        $conf['create_thumb']   = TRUE;
        $conf['maintain_ratio'] = TRUE;
        $conf['overwrite']      = TRUE;
        $conf['width']          = 400;
        $conf['height']         = 400;
        
        
        $this->image_lib->initialize($conf);
        $this->image_lib->resize();
        
        $record_produk = array(
            'record_data_produk'        => $this->input->post('id_produk'),
        );
        
        $this->db->insert('data_produk',$record_produk); 
        
        $daftar_toko = array(
            'id_produk'        =>$this->input->post('id_produk'),
            'barcode'          =>$this->input->post('barcode'),
            'nama_produk'      =>$this->input->post('nama_produk'),
            'harga_produk'     =>$this->input->post('harga_produk'),
            'stok_toko'        =>$this->input->post('stok_toko'),
            'berat'            =>$this->input->post('berat'),
            'status'           =>$this->input->post('status'),
            'milik'            =>$this->input->post('milik'),
            'gambar0'           =>$this->upload->file_name,
            'kategori'         =>$this->input->post('kategori'),
            'deskripsi'        =>$this->input->post('deskripsi'),
        );
         
        $this->db->insert('data_produk_ditoko',$daftar_toko); 
        
         $daftar_pabrik = array(
            'id_produk'        =>$this->input->post('id_produk'),
            'barcode'          =>$this->input->post('barcode'),
            'nama_produk'      =>$this->input->post('nama_produk'),
            'harga_produk'     =>$this->input->post('harga_produk'),
            'stok_pabrik'      =>$this->input->post('stok_pabrik'),
            'berat'            =>$this->input->post('berat'),
            'status'           =>$this->input->post('status'),
            'milik'            =>$this->input->post('milik'),
            'gambar0'           =>$this->upload->file_name,
             'kategori'        =>$this->input->post('kategori'),
            'deskripsi'        =>$this->input->post('deskripsi'),
        );
         
        $this->db->insert('data_produk_dipabrik',$daftar_pabrik); 
        
        redirect('C_produk');
        
    }else{
        echo  $this->upload->display_errors();
    }
       
    }else{
        echo 'PROSES PENAMBAHAN PRODUK GAGAL';
    }
  }
  
public function json_produk_toko(){
$this->load->model('Data_produk');
   header('Content-Type: application/json');
  echo $this->Data_produk->json_produk_toko();       
 
}

public function json_produk_pabrik(){
 $this->load->model('Data_produk');
   header('Content-Type: application/json');
  echo $this->Data_produk->json_produk_pabrik();       
 
}


public function data_json_penjualan_produk(){
  $this->load->model('Data_penjualan');
   header('Content-Type: application/json');
  echo $this->Data_penjualan->json_penjualan_produk();       
 }
 
 function hapus_produk(){
      
   
    $id_produk = $this->uri->segment(3);
    
    $query = $this->db->get_where('data_produk_ditoko',['id_produk'=>$id_produk]);
    
    foreach ($query->result_array() as $hapus_gbr ){
   }   
       
   unlink(FCPATH.'uploads/produk/'.$hapus_gbr['gambar']);
   unlink(FCPATH.'uploads/produk_thumb/'.$hapus_gbr['gambar']);
   
    $this->db->delete('data_produk_ditoko',['id_produk'=>$id_produk]);
    $this->db->delete('data_produk_dipabrik',['id_produk'=>$id_produk]);
    
    redirect('C_produk/produk_toko');
    
 }
 

public function simpan_mutasi(){

    
 if(isset($_POST['btnToko'])){
   $tarik = $this->db->get_where('data_produk_dipabrik',['id_produk'=>  $this->input->post('id_produk')]); 
    
   foreach ($tarik->result_array() as $validasi){
   }
   if( $this->input->post('mut_stok_pabrik')== NULL){
 
    echo "<script>alert('Maaf anda tidak boleh membuat perubahan dengan kondisi yang kosong');javascript:history.go(-1);</script>";
   }else{
   
   if($this->input->post('mut_stok_pabrik')> $validasi['stok_pabrik']){
       
     echo "<script>alert('Maaf anda tidak boleh memotong stok lebih besar dari pabrik');javascript:history.go(-1);</script>";
  
       
   }else{
   
    $data = array(
    'id_produk'         =>$this->input->post('id_produk'),
    'mut_stok_pabrik'   =>$this->input->post('mut_stok_pabrik'),
    'status_konfirmasi' =>'ON PROCESS',
     'waktu'            => date("m/"."d/"."Y"),
   );
    $this->db->insert('mut_pabrik_toko',$data);
    
    redirect('C_produk/mut_pabrik_toko/'.$this->input->post('id_produk'));
}
   }
}
if(isset($_POST['btnPabrik'])){
   $tarik = $this->db->get_where('data_produk_ditoko',['id_produk'=>  $this->input->post('id_produk')]); 
    
   foreach ($tarik->result_array() as $validasi){
   }
    if( $this->input->post('mut_stok_toko')== NULL){
 
    echo "<script>alert('Maaf anda tidak boleh membuat perubahan dengan kondisi yang kosong');javascript:history.go(-1);</script>";
   
    }else{
  
   if($this->input->post('mut_stok_toko')> $validasi['stok_toko']){
       
     echo "<script>alert('Maaf anda tidak boleh memotong stok lebih besar dari toko');javascript:history.go(-1);</script>";
  
      
   }else{
   
    $data = array(
    'id_produk' =>$this->input->post('id_produk'),
    'mut_stok_toko' =>$this->input->post('mut_stok_toko'),
    'status_konfirmasi' =>'ON PROCESS',
    'waktu' => date("m/"."d/"."Y"),
   );
    $this->db->insert('mut_toko_pabrik',$data);
    
    redirect('C_produk/mut_toko_pabrik/'.$this->input->post('id_produk'));
   }
  }
 }
}
public function data_json_mut_pabrik_toko(){
  $this->load->model('Data_mutasi');
  header('Content-Type: application/json');
  echo $this->Data_mutasi->json_mut_pabrik_toko_produk();       
 }
 
 public function data_json_mut_toko_pabrik(){
  $this->load->model('Data_mutasi');
   header('Content-Type: application/json');
  echo $this->Data_mutasi->json_mut_toko_pabrik_produk();       
 }
 public function data_json_produk_mau_habis(){
  $this->load->model('Data_produk');
   header('Content-Type: application/json');
  echo $this->Data_produk->json_produk_mau_habis();       
 }
 public function data_json_produk_habis(){
  $this->load->model('Data_produk');
   header('Content-Type: application/json');
  echo $this->Data_produk->json_produk_habis();       
 }
public function mut_pabrik_toko(){
    $id = $this->uri->segment(3);
    $this->db->select('*');
    $this->db->where('data_produk_dipabrik.id_produk',$id);
    $this->db->from('data_produk_dipabrik');
    $this->db->join('data_produk_ditoko', 'data_produk_ditoko.id_produk = data_produk_dipabrik.id_produk');
    $query = $this->db->get();
    
            $this->load->view('produk/umum/V_header');
            $this->load->view('produk/umum/V_sidebar');
            $this->load->view('produk/umum/V_top_navigasi');
            $this->load->view('produk/mutasi/V_data_mut_pabrik_toko',['query'=>$query]);
            $this->load->view('produk/umum/V_footer');
       }

public function mut_toko_pabrik(){
    $id = $this->uri->segment(3);
    $this->db->select('*');
    $this->db->where('data_produk_dipabrik.id_produk',$id);
    $this->db->from('data_produk_dipabrik');
    $this->db->join('data_produk_ditoko', 'data_produk_ditoko.id_produk = data_produk_dipabrik.id_produk');
    $query = $this->db->get();
    
            $this->load->view('produk/umum/V_header');
            $this->load->view('produk/umum/V_sidebar');
            $this->load->view('produk/umum/V_top_navigasi');
            $this->load->view('produk/mutasi/V_data_mut_toko_pabrik',['query'=>$query]);
            $this->load->view('produk/umum/V_footer');
       }

       public function lapor_mutasi(){
          if(isset($_POST['btnToko'])){
               $variabel =  $this->input->post('tanggal');
               $tanggal = explode(" ",$variabel);
               $tanggal1 = $tanggal[0];
               $tanggal2 = $tanggal[2];
               $this->db->select('');
               $this->db->from('mut_pabrik_toko');
               $this->db->order_by('id_mut_pabrik_toko','DESC');
               $this->db->join('data_produk_ditoko', 'data_produk_ditoko.id_produk = mut_pabrik_toko.id_produk');
               $this->db->where('waktu >=',$tanggal1);
               $this->db->where('waktu <=',$tanggal2);
               
              $query = $this->db->get();
              $str ="<p align='center' style='font-size:20px' > LAPORAN MUTASI DARI PABRIK KE TOKO<br>".$tanggal1." - ".$tanggal2."</p>";
              $str .= "<table style ='border: 2px solid #ddd; width:100%;'>";
              $str .="<tr style ='background:#1ABB9C; font-size:15px; '  ><td>No</td>"
                  . "<td  align='center'>Id Mutasi</td>"
                  . "<td align='center' >Nama</td>"
                  . "<td align='center' >Kode</td>"
                  . "<td align='center' >Waktu</td>"
                  . "<td align='center' >Jumlah Mutasi</td>"
                  . "<td align='center' >Stok toko</td>"
                  . "<td align='center' >Status</td></tr>";
                      
                $no =1;
               foreach ($query->result_array() as $data){
               $str .= "<tr style ='background:#ddd; font-size:15px; '><td align=center>".$no++."</td>";
               $str .="<td align=center>".$data['id_mut_pabrik_toko']."</td>"; 
               $str .="<td align=center>".$data['nama_produk']."</td>"; 
               $str .="<td align=center>".$data['barcode']."</td>"; 
               $str .="<td align=center>".$data['waktu']."</td>"; 
               $str .="<td align=center>".$data['mut_stok_pabrik']."</td>"; 
               $str .="<td align=center>".$data['stok_toko']."</td>"; 
               $str .="<td align=center>".$data['status_konfirmasi']."</td></tr>"; 
               }
               $str .= "</table><br>";
               $valid =  $this->session->all_userdata();
               $level    = $valid['nama'];

               $str .= "<table style ='width:100%; '>";
               $str .="<tr style ='font-size:20px; text-align:center;'><td>Pembuat</td><td>Mengetahui</td><td>Mengetahui</td></tr>";
               $str .="<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>"; 
               $str .="<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>"; 
               $str .="<tr style ='font-size:20px; text-align:center; '><td>".$level."</td><td>Lieany M</td><td>Sigit Angdrew</td></tr>";
               $str .= "</table>";


               
       $dompdf = new DOMPDF();
       $dompdf->load_html($str);
       $dompdf->set_paper("A4");
       $dompdf->render();
       $dompdf->stream('laporan'.'.pdf', array('Attachment'=>0));    
               
           }
           
        if(isset($_POST['btnPabrik'])){
               $variabel =  $this->input->post('tanggal');
               $tanggal = explode(" ",$variabel);
               $tanggal1 = $tanggal[0];
               $tanggal2 = $tanggal[2];
               $this->db->select('');
               $this->db->from('mut_toko_pabrik');
               $this->db->order_by('id_mut_toko_pabrik','DESC');
               $this->db->join('data_produk_dipabrik', 'data_produk_dipabrik.id_produk = mut_toko_pabrik.id_produk');
               $this->db->where('waktu >=',$tanggal1);
               $this->db->where('waktu <=',$tanggal2);
               
              $query = $this->db->get();
              
              
              $str ="<p align='center' style='font-size:20px' > LAPORAN MUTASI DARI TOKO KE PABRIK<br>".$tanggal1." - ".$tanggal2."</p>";
              $str .= "<table style ='border: 2px solid #ddd; width:100%;'>";
              $str .="<tr style ='background:#1ABB9C; font-size:15px; '  ><td>No</td>"
                  . "<td  align='center'>Id Mutasi</td>"
                  . "<td align='center' >Nama</td>"
                  . "<td align='center' >Kode</td>"
                  . "<td align='center' >Waktu</td>"
                  . "<td align='center' >Jumlah Mutasi</td>"
                  . "<td align='center' >Stok Pabrik</td>"
                  . "<td align='center' >Status</td></tr>";
                      
                        
                     
                $no =1;
               foreach ($query->result_array() as $data){
               $str .= "<tr style ='background:#ddd; font-size:15px; '><td align=center>".$no++."</td>";
               $str .="<td align=center>".$data['id_mut_toko_pabrik']."</td>"; 
               $str .="<td align=center>".$data['nama_produk']."</td>"; 
               $str .="<td align=center>".$data['barcode']."</td>"; 
               $str .="<td align=center>".$data['waktu']."</td>"; 
               $str .="<td align=center>".$data['mut_stok_toko']."</td>"; 
               $str .="<td align=center>".$data['stok_pabrik']."</td>"; 
               $str .="<td align=center>".$data['status_konfirmasi']."</td></tr>"; 
               }
               $str .= "</table><br>";
               $valid =  $this->session->all_userdata();
               $level    = $valid['nama'];

             $str .= "<table style ='width:100%; '>";
               $str .="<tr style ='font-size:20px; text-align:center;'><td>Pembuat</td><td>Mengetahui</td><td>Mengetahui</td></tr>";
               $str .="<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>"; 
               $str .="<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>"; 
               $str .="<tr style ='font-size:20px; text-align:center; '><td>".$level."</td><td>Lieany M</td><td>Sigit Angdrew</td></tr>";
               $str .= "</table>";


               
       $dompdf = new DOMPDF();
       $dompdf->load_html($str);
       $dompdf->set_paper("A4");
       $dompdf->render();
       $dompdf->stream('laporan'.'.pdf', array('Attachment'=>0));    
               
           }
           
           
       }
       
       public function edit_produk($id){
        
     
               $this->db->select('');
               $this->db->from('data_produk_ditoko');
               $this->db->join('data_produk_dipabrik', 'data_produk_dipabrik.id_produk = data_produk_ditoko.id_produk');
               $this->db->where('data_produk_ditoko.id_produk',$id);
               $query = $this->db->get();
               $kategori = $this->db->get('layout_menu');
        
        $this->load->view('produk/umum/V_header');
        $this->load->view('produk/umum/V_sidebar');
        $this->load->view('produk/umum/V_top_navigasi');
        $this->load->view('produk/V_edit_produk',['query'=>$query,'kategori'=>$kategori]);
        $this->load->view('produk/umum/V_footer');    
           
       }
       
    public function edit_produk_simpan(){
      if(isset($_POST['btnEdit'])){
         
        
        $id_produk = $this->input->post('id_produk');  
        
        $daftar_toko = array(
            'barcode'          => $this->input->post('barcode'),
            'nama_produk'      => $this->input->post('nama_produk'),
            'harga_produk'     => $this->input->post('harga_produk'),
            'stok_toko'        => $this->input->post('stok_toko'),
            'berat'            => $this->input->post('berat'),
            'status'           => $this->input->post('status'),
            'milik'            => $this->input->post('milik'),
            'kategori'         => $this->input->post('kategori'),
            'deskripsi'        => $this->input->post('deskripsi'),
       );
         
        $this->db->update('data_produk_ditoko',$daftar_toko,array('id_produk'=>$id_produk)); 
        
         $daftar_pabrik = array(
            'barcode'          => $this->input->post('barcode'),
            'nama_produk'      => $this->input->post('nama_produk'),
            'harga_produk'     => $this->input->post('harga_produk'),
            'stok_pabrik'      => $this->input->post('stok_pabrik'),
            'berat'            => $this->input->post('berat'),
            'status'           => $this->input->post('status'),
            'milik'            => $this->input->post('milik'),
            'kategori'         => $this->input->post('kategori'),
            'deskripsi'        => $this->input->post('deskripsi'),
        );
         
        $this->db->update('data_produk_dipabrik',$daftar_pabrik,array('id_produk'=>$id_produk)); 
       
        redirect('C_produk');
               
         }
       
       }
    public function lihat_produk($id){
               $this->db->select('');
               $this->db->from('data_produk_ditoko');
               $this->db->join('data_produk_dipabrik', 'data_produk_dipabrik.id_produk = data_produk_ditoko.id_produk');
               $this->db->where('data_produk_ditoko.id_produk',$id);
               $query = $this->db->get();
        $this->load->view('produk/umum/V_header');
        $this->load->view('produk/umum/V_sidebar');
        $this->load->view('produk/umum/V_top_navigasi');
        $this->load->view('produk/V_lihat_produk',['query'=>$query]);
        $this->load->view('produk/umum/V_footer');    
           
       }
 public function upload_produk_excel(){
 require_once APPPATH."/third_party/PHPExcel.php";
 require_once APPPATH."/third_party/PHPExcel/IOFactory.php";
    
   $fileName = $this->input->post('file', TRUE);

  $config['upload_path'] = './uploads/'; 
  $config['file_name'] = $fileName;
  $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
  $config['max_size'] = 10000;

  $this->load->library('upload', $config);
  $this->upload->initialize($config); 
  
  if (!$this->upload->do_upload('file')) {
   $error = array('error' => $this->upload->display_errors());
   echo  $this->upload->display_errors();   
//redirect('Welcome'); 
  } else {
   $media = $this->upload->data();
   $inputFileName = './uploads/'.$media['file_name'];
   
   try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
   } catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
   }

   $sheet = $objPHPExcel->getSheet(0);
   $highestRow = $sheet->getHighestRow();
   $highestColumn = $sheet->getHighestColumn();

   for ($row = 2; $row <= $highestRow; $row++){  
     $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
       NULL,
       TRUE,
       FALSE);
    
    $id_inv = $this->db->get_where('data_produk')->num_rows(); 
     
    
     $record_produk = array(
            'record_data_produk'        => $id_inv,
        );
     $this->db->insert('data_produk',$record_produk); 
        
     $data = array(
     "id_produk"        => $id_inv ,
     "barcode"          => !empty($rowData[0][1])?$rowData[0][1]:'&nbsp;',
     "nama_produk"      => !empty($rowData[0][2])?$rowData[0][2]:'&nbsp;',
     "harga_produk"     => !empty($rowData[0][3])?$rowData[0][3]:'&nbsp;',
     "stok_toko"        => !empty($rowData[0][4])?$rowData[0][4]:'&nbsp;',
     "milik"            => !empty($rowData[0][6])?$rowData[0][6]:'&nbsp;',
     "status"           => !empty($rowData[0][7])?$rowData[0][7]:'&nbsp;',
     "deskripsi"        => !empty($rowData[0][6])?$rowData[0][8]:'&nbsp;',
     "berat"            => !empty($rowData[0][7])?$rowData[0][9]:'&nbsp;',
    );
     $this->db->insert("data_produk_ditoko",$data);
     
     $data = array(
     "id_produk"        => $id_inv ,
     "barcode"          => !empty($rowData[0][1])?$rowData[0][1]:'&nbsp;',
     "nama_produk"      => !empty($rowData[0][2])?$rowData[0][2]:'&nbsp;',
     "harga_produk"     => !empty($rowData[0][3])?$rowData[0][3]:'&nbsp;',
     "stok_pabrik"      => !empty($rowData[0][5])?$rowData[0][5]:'&nbsp;',
     "milik"            => !empty($rowData[0][6])?$rowData[0][6]:'&nbsp;',
     "status"           => !empty($rowData[0][7])?$rowData[0][7]:'&nbsp;',
     "deskripsi"        => !empty($rowData[0][6])?$rowData[0][8]:'&nbsp;',
     "berat"            => !empty($rowData[0][7])?$rowData[0][9]:'&nbsp;',
     
         );
     $this->db->insert("data_produk_dipabrik",$data);
     
     unlink(FCPATH.'uploads/'.$media['file_name']);
    
     
   }
   
   redirect('C_produk/tambah_produk');  
     
  }  
 }
public function edit_penjualan($id){
         $kirim_status_edit = array(
          'status'=>'EDIT'
          );
         $this->db->update('data_customer_invoices',$kirim_status_edit,array('id_invoices_customer_data'=>$id));  
         redirect('C_produk/data_penjualan_produk');
         
         
         
 
}

public function lapor_penjualan(){
                   
         
          if(isset($_POST['btnLapor_penjualan'])){
         $variabel =  $this->input->post('tanggal');
         $tanggal = explode(" ",$variabel);
         $tanggal1 = $tanggal[0];
         $tanggal2 = $tanggal[2];
         $this->db->where('tanggal >=',$tanggal1);
         $this->db->where('tanggal <=',$tanggal2);
         $this->db->select('data_produk_invoices.nama_produk,data_produk_invoices.harga_produk,data_produk_invoices.hasil_jml,data_produk_invoices.qty_produk,data_produk_invoices.tanggal');
         $query = $this->db->get('data_produk_invoices');
         $jumlah = 0; 
                  
             $str ="<p align='center' style='font-size:20px' >LAPORAN PENJUALAN <br>".$tanggal1." - ".$tanggal2."</p>";
              $str .= "<table style ='border: 2px solid #ddd; width:100%;'>";
              $str .="<tr style ='background:#1ABB9C; font-size:15px; '  ><td>No</td>"
                  . "<td align='center' >Nama</td>"
                  . "<td align='center' >Haraga/Pcs</td>"
                  . "<td align='center' >Qty</td>"
                  . "<td align='center' >Total harga</td>"
                  . "<td align='center' >Tanggal</td>";
                      
                $no =1;
               foreach ($query->result_array() as $data){
               $str .= "<tr style ='background:#ddd; font-size:12px; '><td align=center>".$no++."</td>";
               $str .="<td align=center>".$data['nama_produk']."</td>"; 
               $str .="<td align=center>Rp. ".number_format($data['harga_produk'])."</td>"; 
               $str .="<td align=center>".$data['qty_produk']."</td>"; 
               $str .="<td align=center>Rp. ".number_format($data['hasil_jml'])."</td>"; 
               $str .="<td align=center>".$data['tanggal']."</td></tr>"; 
                   $jumlah += $data['hasil_jml'];
            
               }
               
               $str .="<tr><td></td>";
               $str .="<td></td>";
               $str .="<td></td>";
               $str .="<td></td>";
               $str .="<td>Rp ".number_format($jumlah)."</td>";
               $str .="<td>Total Penjualan </td></tr>";
              
               $str .= "</table><br>";
               $valid =  $this->session->all_userdata();
               $level    = $valid['nama'];
               $str .= "<table style ='width:100%; '>";
               $str .="<tr style ='font-size:20px; text-align:center;'><td>Pembuat</td><td>Mengetahui</td><td>Mengetahui</td></tr>";
               $str .="<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>"; 
               $str .="<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>"; 
               $str .="<tr style ='font-size:20px; text-align:center; '><td>".$level."</td><td>Lieany M</td><td>Sigit Angdrew</td></tr>";
               $str .= "</table>";

               
      $dompdf = new DOMPDF();
      $dompdf->load_html($str);
      $dompdf->set_paper("A4");
      $dompdf->render();
      $dompdf->stream('laporan'.'.pdf', array('Attachment'=>0));    
               
           }
     }
 
}

