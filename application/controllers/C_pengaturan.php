<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pengaturan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
         
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('html');
        $this->load->helper('url');
    }

        public function index()
	{
           
            redirect('C_pengaturan/data_user');
           
	}
        public function data_user()
	{
           
            $this->load->view('V_pengaturan/umum/V_header');
            $this->load->view('V_pengaturan/umum/V_sidebar');
            $this->load->view('V_pengaturan/umum/V_top_navigasi');
            $this->load->view('V_pengaturan/user/V_data_user');
            $this->load->view('V_pengaturan/umum/V_footer');
           
	}
public function json_user(){
$table = 'user';
$primaryKey = 'id_user';
$columns = array(
	array( 'db' => 'nama',       'dt' => 0 ),
	array( 'db' => 'email',      'dt' => 1 ),
	array( 'db' => 'level',       'dt' => 2 ),
	array( 'db' => 'status',            'dt' => 3 ),
       array( 'db'  => 'tanggal_daftar',           'dt' => 4 ),
       
            
        array( 'db' => 'id_user',    
               'dt' => 5,
               'formatter' => function ( $d, $row) {
                return anchor('C_pengaturan/lihat_user/'.md5($d),'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-success' id='modal1' data-toggle='modal' data-target='.bs-example-modal-sm'").' '.
                       anchor('C_pengaturan/edit_user/'.md5($d),'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-warning'").' '.
                       anchor('C_pengaturan/hapus_user/'.md5($d),'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
                       
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
public function tambah_user(){
           
            $this->load->view('V_pengaturan/umum/V_header');
            $this->load->view('V_pengaturan/umum/V_sidebar');
            $this->load->view('V_pengaturan/umum/V_top_navigasi');
            $this->load->view('V_pengaturan/user/V_daftar_user');
            $this->load->view('V_pengaturan/umum/V_footer');
           
	}

public function simpan_user(){
    
    if($_POST['password1'] != $_POST['password2'] ){
        
         echo 'Password tidak sama';
         
    }
    else if(isset($_POST['btnDaftar'])){
                    $config = [
                    'upload_path'    => './uploads/user/',
                    'allowed_types' => 'jpg|gif|png|zip|pdf',
                    'max_size'      =>'200000000'
                              ];

            $field_name ="gambar";
            $this->upload->initialize($config);                
            $this->load->library('upload', $config);

    if ($this->upload->do_upload($field_name)){

        $image_data                = $this->upload->data();
        $config2['image_library']  ='gd2';
        $config2['source_image']   = $this->upload->upload_path.$this->upload->file_name;
        $config2['maintain_ratio'] = TRUE;
        $config2['width']          = 800;
        $config2['height']         = 800;
        
        $this->load->library('image_lib',$config2);
        $this->image_lib->initialize($config2);
        $this->image_lib->resize();

////membuat thumbnail ////

        $conf['image_library']  ='gd2';
        $conf['source_image']   =$this->upload->upload_path.$this->upload->file_name;
        $conf['new_image']      ='./uploads/user_thumb/';
        $conf['create_thumb']   = TRUE;
        $conf['overwrite']      =TRUE;
        $conf['maintain_ratio'] = TRUE;
        $conf['width']          = 400;
        $conf['height']         = 400;
        
        $this->load->library('image_lib',$conf);

        $this->image_lib->initialize($conf);
        $this->image_lib->resize();
        
        $daftar = array(
            'nama'      => $this->input->post('nama'),
            'email'     => $this->input->post('email'),
            'level'     => $this->input->post('level'),
            'status'    => $this->input->post('status'),
            'password'  => md5($this->input->post('password1')),
            'gambar'    => $this->upload->file_name,
        );
         
        $this->db->insert('user',$daftar); 
                
        redirect('C_pengaturan/data_user');
     
        
    }else{
        echo  $this->upload->display_errors();
    }
        
    }else{
        echo 'DAFTAR GAGAL';
    }
    
}
}