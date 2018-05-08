<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_toko extends CI_Controller{

public function __construct() {
parent::__construct();
$this->load->helper('form');
$this->load->library('session');
$this->load->library('upload');
$this->load->library('form_validation');
$this->load->library('datatables');
$this->load->database();
$this->load->helper('html');
$this->load->helper('url');
}
public function index(){
$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
//$this->load->view('');
$this->load->view('V_toko/umum/V_footer');
}
public function lyt_menu(){
$cek = $this->db->get_where('layout_menu')->num_rows();
if(isset($_POST['btnlytmenu'])){

if($cek >=10  || $this->input->post('kategori') == NULL ){
echo "<script>alert('Maaf Maksimal kategori 10 Dan tidak boleh Kosong');javascript:history.go(-1);</script>";
}else{
$data = array(
'menu' => $this->input->post('kategori')  
);
$this->db->insert('layout_menu',$data);

redirect('C_toko/lyt_menu');

} 
}
$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/lyt_menu/V_layout_menu');
$this->load->view('V_toko/umum/V_footer');
}
public function data_json_layout_menu(){
$this->load->model('Data_toko');
header('Content-Type: application/json');
echo $this->Data_toko->json_layout_menu();       
}
public function data_json_voucher(){
$this->load->model('Data_toko');
header('Content-Type: application/json');
echo $this->Data_toko->json_voucher();       
}
public function produk_lyt_home(){
$this->load->model('Data_toko');
header('Content-Type: application/json');
echo $this->Data_toko->data_lyt_home();       
}
public function foto_produk(){
$this->load->model('Data_toko');
header('Content-Type: application/json');
echo $this->Data_toko->data_foto_produk();       
}

public function data_penjualan_masuk(){
$this->load->model('Data_toko');
header('Content-Type: application/json');
echo $this->Data_toko->data_penjualan_masuk();       
}

public function data_penjualan_selesai(){
$this->load->model('Data_toko');
header('Content-Type: application/json');
echo $this->Data_toko->data_penjualan_selesai();       
}

public function data_konfirmasi_penjualan(){
$this->load->model('Data_toko');
header('Content-Type: application/json');
echo $this->Data_toko->data_konfirmasi_penjualan();       
}
public function hapus_menu($id){
$this->db->delete('layout_menu',array('id_layout_menu'=>$id));
redirect('C_toko/lyt_menu');
}
public function sldr_atas(){
if(isset($_POST['btnsldratas'])){

$config = [
'upload_path'    => './uploads/sldr_atas/',
'allowed_types' => 'jpg|gif|png|zip|pdf',
'max_size'      =>'2000000'
];
$config['upload_path']; 
$config['overwrite'] = TRUE;

$field_name ="gambar";
$this->upload->initialize($config);                
$this->load->library('upload', $config);

if ($this->upload->do_upload($field_name)){


$slider = array(
'teks'             =>$this->input->post('teks'),
'gambar'           =>$this->upload->file_name,
);

$this->db->insert('slider_atas',$slider); 


redirect('C_toko/sldr_atas');

}else{
echo  $this->upload->display_errors();
}
}else{
$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/sldr_atas/V_data_slider');
$this->load->view('V_toko/umum/V_footer');
}

}
public function data_json_sldr_atas(){
$this->load->model('Data_toko');
header('Content-Type: application/json');
echo $this->Data_toko->json_sldr_atas();       

}
public function data_lyt_home(){
$this->load->model('Data_toko');
header('Content-Type: application/json');
echo $this->Data_toko->json_lyt_home();       

}

public function hapus_slider_atas(){

$id  = $this->uri->segment(3);

$query = $this->db->get_where('slider_atas',['id_slider_atas'=>$id]);

foreach ($query->result_array() as $hapus_gbr ){
}   

unlink(FCPATH.'uploads/sldr_atas/'.$hapus_gbr['gambar']);

$this->db->delete('slider_atas',['id_slider_atas'=>$id]);

redirect('C_toko/sldr_atas');


}
public function pengaturan_toko(){
$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/pengaturan_toko/V_p_toko');
$this->load->view('V_toko/umum/V_footer');



}
public function simpan_pengaturan_toko(){

if(isset($_POST['btn_pengaturan'])){
$data_simpan = array(
'alamat'     =>$this->input->post('alamat'),
'contact'    =>$this->input->post('contact'),
'email'      =>$this->input->post('email'),
);
$this->db->insert('pengaturan_toko',$data_simpan);
}

redirect('C_toko/pengaturan_toko');

}
public function edit_pengaturan(){
if(isset($_POST['btn_edit_pengaturan'])){
$id_edit = $this->input->post('id_edit');
$data_simpan = array(
'alamat'     =>'',
'contact'    =>'',
'email'      =>'',
);
$this->db->update('pengaturan_toko',$data_simpan,array('id_pengaturan'=>$id_edit));
}

redirect('C_toko/pengaturan_toko');


}


public function voucher_toko(){
$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/V_voucher_toko');
$this->load->view('V_toko/umum/V_footer');
}

public function simpan_kode_voucher(){
if(isset($_POST['btnsimpanvoucher'])){
$data_diskon = array(

'kode_voucher'=> $this->input->post('kode_voucher'),
'diskon_voucher'=> $this->input->post('nilai_diskon'),
);
$this->db->insert('kode_voucher',$data_diskon);
}
redirect('C_toko/voucher_toko');
}
public function hapus_voucher(){

$id  = $this->uri->segment(3);

$this->db->delete('kode_voucher',['id_voucher'=>$id]);

redirect('C_toko/voucher_toko');


}
public function lyt_home(){

$kategori = $this->db->get_where("layout_menu",array('menu !=' =>"Home"));


$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/V_lyt_home',['kategori'=>$kategori]);
$this->load->view('V_toko/umum/V_footer');



}

public function set_home(){

$id = $this->uri->segment(3);

$data = $this->db->get_where('data_produk_ditoko',array('id_produk'=>$id));
$cek  = $this->db->get_where('layout_home', array('id_produk'=>$id))->row_array(); 

if($id != $cek['id_produk']){

foreach ($data->result_array()  as $datahome){

$set_home = array(

'id_produk'=>$datahome["id_produk"],

);
$this->db->insert('layout_home',$set_home);


}

echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("","Set Home berhasil.","success");';
echo '}, 1000);</script>';
redirect('C_toko/lyt_home'); 


}else{

echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("","Sebelumnya data sudah di set.","warning");';
echo '}, 1000);</script>';
redirect('C_toko/lyt_home'); 

}

}

public function hapus_home(){
$id = $this->uri->segment(3);
$this->db->delete('layout_home',array('id_produk'=>$id));
$this->lyt_home();  

}

public function tambah_foto_produk(){


$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/V_tambah_foto_produk');
$this->load->view('V_toko/umum/V_footer');

}
public function edit_foto_produk(){
$id = $this->uri->segment(3);

$data_produk = $this->db->get_where('data_produk_ditoko',array('id_produk'=>$id));



$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/V_edit_foto_produk',['data_produk'=>$data_produk]);
$this->load->view('V_toko/umum/V_footer');

}
public function simpan_edit_produk(){

sleep(3);
if($_FILES["files"]["name"] != ''){

$output = '';
$config["upload_path"]        = './uploads/produk/';
$config["allowed_types"]      = 'gif|jpg|png';
$config['encrypt_name']       = TRUE;
$config['maintain_ratio'] = TRUE;
$config['overwrite']      = TRUE;
$config['width']          = 800;
$config['height']         = 800;
$config['create_thumb']   = TRUE;

$this->load->library('upload', $config);
$this->upload->initialize($config);


for($count = 0; $count<count($_FILES["files"]["name"]); $count++) {

$_FILES["file"]["name"]     = $_FILES["files"]["name"][$count];
$_FILES["file"]["type"]     = $_FILES["files"]["type"][$count];
$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
$_FILES["file"]["error"]    = $_FILES["files"]["error"][$count];
$_FILES["file"]["size"]     = $_FILES["files"]["size"][$count];
if($this->upload->do_upload('file')){

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


foreach ($_POST['id_produk'] as $id_produk){
}     

$data = $this->upload->data();

$data_upload_toko = array(
'gambar'.$count =>$data['file_name'],
);

$this->db->update('data_produk_ditoko',$data_upload_toko,array('id_produk'=>$id_produk));

$this->db->update('data_produk_dipabrik',$data_upload_toko,array('id_produk'=>$id_produk));

}
}
echo $output;   
}

}
public function penjualan_masuk(){
    
    
$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/V_penjualan_masuk');
$this->load->view('V_toko/umum/V_footer');
 
    
}
public function penjualan_selesai(){
    
    
$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/V_penjualan_selesai');
$this->load->view('V_toko/umum/V_footer');
 
    
}

public function lihat_penjualan_baru() {
$no_inv =  $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5)."/".$this->uri->segment(6)."/".$this->uri->segment(7)."/".$this->uri->segment(8);


$this->db->select('*');
$this->db->from('data_toko_penjualan');
$this->db->join('data_toko_penjualan_produk', 'data_toko_penjualan_produk.no_invoices = data_toko_penjualan.no_invoices');
$this->db->join('data_customer_toko', 'data_customer_toko.id_customer_toko = data_toko_penjualan.id_customer_toko');
$this->db->where(array('data_toko_penjualan_produk.no_invoices'=>$no_inv));
$data = $this->db->get();
$data2 = $data->row_array();

if($data2['nama_produk'] != ''){

$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/V_lihat_penjualan_baru',['data'=>$data,'no_inv'=>$no_inv]);
$this->load->view('V_toko/umum/V_footer');
    

}else{
    redirect('C_404');
    
}
}

public function print_invoices(){
$no_inv =  $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5)."/".$this->uri->segment(6)."/".$this->uri->segment(7)."/".$this->uri->segment(8);
$this->db->select('*');
$this->db->from('data_toko_penjualan');
$this->db->join('data_toko_penjualan_produk', 'data_toko_penjualan_produk.no_invoices = data_toko_penjualan.no_invoices');
$this->db->join('data_customer_toko', 'data_customer_toko.id_customer_toko = data_toko_penjualan.id_customer_toko');
$this->db->where(array('data_toko_penjualan_produk.no_invoices'=>$no_inv));
$data = $this->db->get();
$data2 = $data->row_array();

if($data2['nama_produk'] != ''){

$this->load->view('V_toko/V_print_invoices',['data'=>$data,'no_inv'=>$no_inv]);

}else{
redirect('C_404');
}

}

public function print_alamat(){
$no_inv =  $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5)."/".$this->uri->segment(6)."/".$this->uri->segment(7)."/".$this->uri->segment(8);
$this->db->select('*');
$this->db->from('data_toko_penjualan');
$this->db->join('data_toko_penjualan_produk', 'data_toko_penjualan_produk.no_invoices = data_toko_penjualan.no_invoices');
$this->db->join('data_customer_toko', 'data_customer_toko.id_customer_toko = data_toko_penjualan.id_customer_toko');
$this->db->where(array('data_toko_penjualan_produk.no_invoices'=>$no_inv));
$data = $this->db->get();
$data2 = $data->row_array();

if($data2['nama_produk'] != ''){

$this->load->view('V_toko/V_print_alamat',['data'=>$data,'no_inv'=>$no_inv]);

}else{
redirect('C_404');
}

}

public function terima_pesanan(){
$no_inv =  $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5)."/".$this->uri->segment(6)."/".$this->uri->segment(7)."/".$this->uri->segment(8);
if(isset($no_inv)!= NULL){

$update_penjualan = array(
      
  'status_penjualan' => 'Sudah di Proses',
  );
$this->db->update('data_toko_penjualan',$update_penjualan,array('no_invoices'=>$no_inv));

redirect('C_toko/penjualan_masuk');

}
}
public function konfirmasi_penjualan(){
$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/V_konfirmasi_penjualan');
$this->load->view('V_toko/umum/V_footer');
}


public function lihat_konfirmasi_penjualan() {
$no_inv =  $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5)."/".$this->uri->segment(6)."/".$this->uri->segment(7)."/".$this->uri->segment(8);


$this->db->select('*');
$this->db->from('data_toko_penjualan');
$this->db->join('data_toko_penjualan_produk', 'data_toko_penjualan_produk.no_invoices = data_toko_penjualan.no_invoices');
$this->db->join('data_customer_toko', 'data_customer_toko.id_customer_toko = data_toko_penjualan.id_customer_toko');
$this->db->where(array('data_toko_penjualan_produk.no_invoices'=>$no_inv));
$data = $this->db->get();
$data2 = $data->row_array();

if($data2['nama_produk'] != ''){

$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/V_lihat_konfirmasi_penjualan',['data'=>$data,'no_inv'=>$no_inv]);
$this->load->view('V_toko/umum/V_footer');
    

}else{
    redirect('C_404');
    
}
}


public function simpan_resi(){

 if(isset($_POST['resi'])){   
  $id = $this->input->post("no_inv");  
  $update_resi = array(
      'resi'             =>$this->input->post("resi"),
      'status_penjualan' =>'Selesai',
  );  
   $this->db->update('data_toko_penjualan',$update_resi,array('no_invoices'=>$id));
}
}

public function lihat_penjualan_selesai() {
$no_inv =  $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5)."/".$this->uri->segment(6)."/".$this->uri->segment(7)."/".$this->uri->segment(8);


$this->db->select('*');
$this->db->from('data_toko_penjualan');
$this->db->join('data_toko_penjualan_produk', 'data_toko_penjualan_produk.no_invoices = data_toko_penjualan.no_invoices');
$this->db->join('data_customer_toko', 'data_customer_toko.id_customer_toko = data_toko_penjualan.id_customer_toko');
$this->db->where(array('data_toko_penjualan_produk.no_invoices'=>$no_inv));
$data = $this->db->get();
$data2 = $data->row_array();

if($data2['nama_produk'] != ''){

$this->load->view('V_toko/umum/V_header');
$this->load->view('V_toko/umum/V_sidebar');
$this->load->view('V_toko/umum/V_top_navigasi');
$this->load->view('V_toko/V_lihat_penjualan_selesai',['data'=>$data,'no_inv'=>$no_inv]);
$this->load->view('V_toko/umum/V_footer');
    

}else{
    redirect('C_404');
    
}
}
}
