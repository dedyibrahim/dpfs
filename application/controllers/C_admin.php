<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {
    
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
           
            $this->load->view('V_admin/umum/V_header');
            $this->load->view('V_admin/umum/V_sidebar');
            $this->load->view('V_admin/umum/V_top_navigasi');
            $this->load->view('V_admin/V_content');
            $this->load->view('V_admin/umum/V_footer');
           
	}
         public function daftar_user()
	{
           
            $this->load->view('V_admin/umum/V_header');
            $this->load->view('V_admin/umum/V_sidebar');
            $this->load->view('V_admin/umum/V_top_navigasi');
            $this->load->view('V_admin/user/V_daftar');
            $this->load->view('V_admin/umum/V_footer');
           
	}
        public function daftar(){
    
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

        $image_data = $this->upload->data();
        $config2['image_library']  ='gd2';
        $config2['source_image']   =$this->upload->upload_path.$this->upload->file_name;
        $config2['maintain_ratio'] = TRUE;
        $config2['width']          = 800;
        $config2['height']         = 800;
        
        $this->load->library('image_lib',$config2);
        $this->image_lib->initialize($config2);
        $this->image_lib->resize();

////membuat thumbnail ////

        $conf['image_library'] ='gd2';
        $conf['source_image'] =$this->upload->upload_path.$this->upload->file_name;
        $conf['new_image']='./uploads/user_thumb/';
        $conf['create_thumb'] = TRUE;
        $conf['overwrite']=TRUE;
        $conf['maintain_ratio'] = TRUE;
        $conf['width']         = 400;
        $conf['height']       = 400;
        
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
                
        redirect('C_admin/daftar_user');
     
        
    }else{
        echo  $this->upload->display_errors();
    }
        
    }else{
        echo 'DAFTAR GAGAL';
    }
    
}
public function data_user(){
$table = 'user';
$primaryKey = 'id_user';
$columns = array(
	array( 'db' => 'nama',      'dt' => 0 ),
	array( 'db' => 'email',      'dt' => 1 ),
	array( 'db' => 'level',     'dt' => 2 ),
	array( 'db' => 'status',    'dt' => 3 ),
	
        array( 'db' => 'gambar',    
               'dt' => 4,
               'formatter' => function ( $d, $row) {
          
       $image = array(
        'src'   => 'uploads/user_thumb/'.$d,
        'alt'   => '',
        'width' => '100',
        'height'=> '80',
       );
         return  img($image);
               
                       
            }),
            
        array( 'db' => 'id_user',    
               'dt' => 5,
               'formatter' => function ( $d, $row) {
                return anchor('C_admin/lihat_user/'.md5($d),'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-success'").' '.
                       anchor('C_admin/edit_user/'.md5($d),'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-warning'").' '.
                       anchor('C_admin/hapus/'.md5($d),'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
                       
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

function hapus(){
      
    //$this->db->where('md5id_user',$id_user);
  
    $id_user = $this->uri->segment(3);
    
    $query = $this->db->get_where('user',['md5(id_user)'=>$id_user]);
    
    foreach ($query->result_array() as $hapus_gbr ){
   }   
       
   unlink(FCPATH.'uploads/user/'.$hapus_gbr['gambar']);
   unlink(FCPATH.'uploads/user_thumb/'.$hapus_gbr['gambar']);
   
    $this->db->delete('user',['md5(id_user)'=>$id_user]);
    
    redirect('C_admin/daftar_user');
    
 }
public function lihat_user(){
     
    $valid =  $this->session->all_userdata();
    $level    = $valid['level'];
 
if($level == 'admin')
{
    
    $user = $this->uri->segment(3);
    $data_user = $this->db->get_where('user',['md5(id_user)'=>$user]);
  
    $this->load->view('umum/V_header');
    $this->load->view('umum/V_sidebar');
    $this->load->view('umum/V_content');
    $this->load->view('user/V_lihat_user',['data_user' =>$data_user]);
    $this->load->view('umum/V_footer');
    
}else{
    
  echo 'ANDA TIDAK MEMILIKI AKSES KEHALAMAN INI'  ; 
}     
     
     
 }
 
 
 public function edit_user(){
    $valid =  $this->session->all_userdata();
    $level    = $valid['level'];
 
    if($level == 'admin')
             {
     
    $user = $this->uri->segment(3);
    $data_user = $this->db->get_where('user',['md5(id_user)'=>$user]);
  
    $this->load->view('umum/V_header');
    $this->load->view('umum/V_sidebar');
    $this->load->view('umum/V_content');
    $this->load->view('user/V_edit_user',['data_user' =>$data_user]);
    $this->load->view('umum/V_footer');
    
}else{
    
  echo 'ANDA TIDAK MEMILIKI AKSES KEHALAMAN INI'  ; 
}     
     

 }
 
 public function simpan_perubahan(){
 
  if(isset($_POST['simpanPerubahan'])){
            $nama                   = ['required' =>'has-error'];
            $email                  = ['required' =>'has-error'];
            $password1              = ['required' =>'has-error'];
            $password2              = ['required' =>'has-error'];
            $status                 = ['required' =>'has-error'];
            $level                  = ['required' =>'has-error'];
            $gambar                 = ['required' =>'has-error'];
            
                        $this->form_validation->
                                     set_rules ('nama',
                                     $this->model->labels['nama'],
                                     'required',$nama );
               
                        $this->form_validation->
                                     set_rules ('email',
                                     $this->model->labels['email'],
                                     'required',$email);
                      
                        $this->form_validation->
                                     set_rules ('password1',
                                     $this->model->labels['password1'],
                                     'required',$password1);
                      
                        $this->form_validation->
                                     set_rules ('password2',
                                     $this->model->labels['password2'],
                                     'required',$password2);
                        
                       $this->form_validation->
                                     set_rules ('status',
                                     $this->model->labels['status'],
                                     'required',$status );

                        $this->form_validation->
                                     set_rules ('level',
                                     $this->model->labels['level'],
                                     'required',$level);
                      
                        $this->form_validation->
                                     set_rules ('gambar',
                                     $this->model->labels['gambar'],
                                     'required',$gambar );
                            
  if($this->form_validation->run()== TRUE){ 
     
  echo 'VALIDASI BERHASIL';
    
   }else{
    
    $user = $this->input->post('id_user');
   
    $data_user = $this->db->get_where('user',['md5(id_user)'=>$user]);
    
    $this->load->view('umum/V_header');
    $this->load->view('umum/V_sidebar');
    $this->load->view('umum/V_content');
    $this->load->view('user/V_edit_user',['data_user' =>$data_user]);
    $this->load->view('umum/V_footer');   
   
   
    }    

   
  

}
 }

     
}