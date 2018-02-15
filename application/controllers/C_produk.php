<?php
defined('BASEPATH') OR exit('No direct script access allowed');

<<<<<<< HEAD
class C_menu extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
         $this->load->library('session');
        
        $this->load->helper('url');
    }

        public function index()
	{
		$this->load->view('V_menu_awal');
	}
=======
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
                $this->load->view('produk/umum/V_header');
                $this->load->view('produk/umum/V_sidebar');
		$this->load->view('produk/umum/V_top_navigasi');
		$this->load->view('produk/V_produk');
                $this->load->view('produk/umum/V_footer');
		
                
   }
   public function tambah_produk_online(){
                $this->load->view('produk/umum/V_header');
                $this->load->view('produk/umum/V_sidebar');
		$this->load->view('produk/umum/V_top_navigasi');
		$this->load->view('produk/V_tambah_produk_online');
                $this->load->view('produk/umum/V_footer');
   }
   public function tambah_produk_offline(){
                $this->load->view('produk/umum/V_header');
                $this->load->view('produk/umum/V_sidebar');
		$this->load->view('produk/umum/V_top_navigasi');
		$this->load->view('produk/V_tambah_produk_offline');
                $this->load->view('produk/umum/V_footer');
   }
   
   public function simpan_produk(){
    if(isset($_POST['btnTambah'])){
         
         $config = [
                    'upload_path'    => './uploads/user/',
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
        $conf['new_image']      ='./uploads/user_thumb/';
        $conf['create_thumb']   = TRUE;
        $conf['maintain_ratio'] = TRUE;
        $conf['overwrite']      = TRUE;
        $conf['width']          = 400;
        $conf['height']         = 400;
        
        $this->load->library('image_lib',$conf);

        $this->image_lib->initialize($conf);
        $this->image_lib->resize();
        
        $daftar = array(
            'barcode'          => $this->input->post('barcode'),
            'nama_produk'      => $this->input->post('nama_produk'),
            'harga_produk'     => $this->input->post('harga_produk'),
            'stok_produk'     => $this->input->post('stok_produk'),
            'status'           => $this->input->post('status'),
            'milik'            => $this->input->post('milik'),
            'gambar'           => $this->upload->file_name,
        );
         
        $this->db->insert('produk',$daftar); 
                
        redirect('C_produk');
        
    }else{
        echo  $this->upload->display_errors();
    }
       
    }else{
        echo 'PROSES PENAMBAHAN PRODUK GAGAL';
    }
  }
  
public function json_produk(){
$table = 'produk';
$primaryKey = 'id_produk';
$columns = array(
	array( 'db' => 'nama_produk',       'dt' => 0 ),
	array( 'db' => 'harga_produk',      'dt' => 1 ),
	array( 'db' => 'stok_produk',       'dt' => 2 ),
	array( 'db' => 'status',            'dt' => 3 ),
       array( 'db'  => 'milik',           'dt' => 4 ),
       
            
        array( 'db' => 'id_produk',    
               'dt' => 5,
               'formatter' => function ( $d, $row) {
                return anchor('C_produk/lihat_produk/'.md5($d),'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-success' id='modal1' data-toggle='modal' data-target='.bs-example-modal-sm'").' '.
                       anchor('C_produk/edit_produk/'.md5($d),'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-warning'").' '.
                       anchor('C_produk/hapus_produk/'.md5($d),'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
                       
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
>>>>>>> 4959a128adcdb85deeb124b64d948caf3a493daf
}
