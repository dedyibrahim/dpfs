<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_produk extends CI_Controller {
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
        $this->load->library('session');
        $this->load->helper('url');
       // $this->load->model('Mdata_produk');
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
   public function tambah_produk(){
                $this->load->view('produk/umum/V_header');
                $this->load->view('produk/umum/V_sidebar');
		$this->load->view('produk/umum/V_top_navigasi');
		$this->load->view('produk/V_tambah_produk');
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
        
        $this->load->library('image_lib',$conf);

        $this->image_lib->initialize($conf);
        $this->image_lib->resize();
        
        $daftar_toko = array(
            'id_produk'        => $this->input->post('id_produk'),
            'barcode'          => $this->input->post('barcode'),
            'nama_produk'      => $this->input->post('nama_produk'),
            'harga_produk'     => $this->input->post('harga_produk'),
            'stok_toko'        => $this->input->post('stok_toko'),
            'status'           => $this->input->post('status'),
            'milik'            => $this->input->post('milik'),
            'gambar'           => $this->upload->file_name,
        );
         
        $this->db->insert('data_produk_ditoko',$daftar_toko); 
        
         $daftar_pabrik = array(
            'id_produk'        => $this->input->post('id_produk'),
            'barcode'          => $this->input->post('barcode'),
            'nama_produk'      => $this->input->post('nama_produk'),
            'harga_produk'     => $this->input->post('harga_produk'),
            'stok_pabrik'      => $this->input->post('stok_pabrik'),
            'status'           => $this->input->post('status'),
            'milik'            => $this->input->post('milik'),
            'gambar'           => $this->upload->file_name,
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
$table = 'data_produk_ditoko';
$primaryKey = 'id_produk';
$columns = array(
	array( 'db' => 'nama_produk',       'dt' => 0 ),
	array( 'db' => 'harga_produk',      'dt' => 1 ),
	array( 'db' => 'stok_toko',       'dt' => 2 ),
	array( 'db' => 'status',            'dt' => 3 ),
       array( 'db'  => 'milik',             'dt' => 4 ),
       
            
        array( 'db' => 'id_produk',    
               'dt' => 5,
               'formatter' => function ( $d, $row) {
                return anchor('C_produk/lihat_produk/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-success' id='modal1' data-toggle='modal' data-target='.bs-example-modal-sm'").' '.
                       anchor('C_produk/edit_produk/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-warning'").' '.
                       anchor('C_produk/hapus_produk/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
                       
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

public function json_produk_pabrik(){
$table = 'data_produk_dipabrik';
$primaryKey = 'id_produk';
$columns = array(
	array( 'db' => 'nama_produk',       'dt' => 0 ),
	array( 'db' => 'harga_produk',      'dt' => 1 ),
	array( 'db' => 'stok_pabrik',       'dt' => 2 ),
	array( 'db' => 'status',            'dt' => 3 ),
       array( 'db'  => 'milik',             'dt' => 4 ),
       
            
        array( 'db' => 'id_produk',    
               'dt' => 5,
               'formatter' => function ( $d, $row) {
                return anchor('C_produk/lihat_produk/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-success' id='modal1' data-toggle='modal' data-target='.bs-example-modal-sm'").' '.
                       anchor('C_produk/edit_produk/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-warning'").' '.
                       anchor('C_produk/hapus_produk/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
                       
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

public function data_json_penjualan(){
  $this->load->model('Data_penjualan');
   header('Content-Type: application/json');
  echo $this->Data_penjualan->json_penjualan();       
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
 
}
