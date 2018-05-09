<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Toko extends CI_Controller{
public function __construct() {
parent::__construct();
$this->load->helper('form');
$this->load->library('session');
$this->load->library('upload');
$this->load->library('Recaptcha');
$this->load->library('form_validation');
$this->load->library('datatables');
$this->load->database();
$this->load->helper('html');
$this->load->helper('url');
$this->load->library('cart');
}

public function index(){

$this->db->select('*');
$this->db->from('layout_home');
$this->db->join('data_produk_ditoko', 'data_produk_ditoko.id_produk = layout_home.id_produk');
$data = $this->db->get();    


$this->load->view('Toko/umum/V_header');   
$this->load->view('Toko/umum/V_slider');   
$this->load->view('Toko/V_home',['data'=>$data]);   
$this->load->view('Toko/umum/V_footer');   
}
public function buat_akun(){
$this->load->view('Toko/umum/V_header');   
$this->load->view('Toko/umum/V_menu');   
$this->load->view('Toko/V_buat_akun');   
$this->load->view('Toko/umum/V_footer');   
}

public function login_header(){
$data = array(
'username' => set_value('email'),
'password' => set_value('password'),
'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
'nama_depan'     => set_value('nama_depan'),
'nama_belakang'  => set_value('nama_belakang'),
'email'          => set_value('email'),
'password1'      => set_value('password1'),
'password2'      => set_value('password2'),

);
$this->load->view('Toko/V_login',$data); 

}

public function login(){
$cek =  $this->session->all_userdata();

if(!empty($cek['id_customer_toko'])?$cek['id_customer_toko']:'' == NULL  ){
$data = array(
'username' => set_value('email'),
'password' => set_value('password'),
'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
'nama_depan'     => set_value('nama_depan'),
'nama_belakang'  => set_value('nama_belakang'),
'email'          => set_value('email'),
'password1'      => set_value('password1'),
'password2'      => set_value('password2'),

);


$this->load->view('Toko/umum/V_header');   
$this->load->view('Toko/V_login',$data);   
$this->load->view('Toko/umum/V_footer');    

}else{
redirect('Toko');

}
}
public function kontak(){
$this->load->view('Toko/umum/V_header');   
$this->load->view('Toko/umum/V_menu');   
$this->load->view('Toko/V_kontak');   
$this->load->view('Toko/umum/V_footer');   
}
public function Kategori(){
$kategori = urldecode($this->uri->segment(3));

if($kategori == NULL){
redirect(base_url());    
}else{
$data = $this->db->get_where('data_produk_ditoko',array('kategori'=>$kategori,'milik'=>'Online','status'=>'Aktif','stok_toko !=' => 0));
$this->load->view('Toko/umum/V_header');   
$this->load->view('Toko/V_produk',['data'=>$data]);   
$this->load->view('Toko/umum/V_footer');   
}
}
public function detail(){

$id= $this->uri->segment(3);
if($this->uri->segment(3) != ''){

$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
"key: 4c7b7269c382193780ecc146dcb2fed3"
),
));

$responseprovinsi = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
$provinsi = $responseprovinsi;
}


$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
"key: 4c7b7269c382193780ecc146dcb2fed3"
),
));

$responsekota = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
$kota =  $responsekota;
}    


$data = $this->db->get_where('data_produk_ditoko',array('id_produk'=> base64_decode($id),'milik'=>'Online','status'=>'Aktif'));
$this->load->view('Toko/umum/V_header');   
$this->load->view('Toko/V_detail',['data'=>$data,'provinsi'=>$provinsi,'kota'=>$kota,]);
$this->load->view('Toko/umum/V_footer');   
}else{
redirect(base_url());  

}
}

public function addcart(){
$id_ambil   = $_GET['id_produk'];

$ambil_data = $this->db->get_where('data_produk_ditoko',array('id_produk'=>$id_ambil));

foreach ($ambil_data->result() as $data_produk){
}
$data = array(
'id'      => $data_produk->id_produk,
'qty'     => 1,
'price'   => $data_produk->harga_produk,
'name'    => $data_produk->nama_produk,
'gambar0' => $data_produk->gambar0,
'berat'   => $data_produk->berat,
);
$this->cart->insert($data);


echo print_r($data);
}
public function keranjang(){
$this->load->view('Toko/V_keranjang');   
}
public function checkout(){
$cek_customer     = $this->db->get_where('data_customer_toko',array('id_customer_toko'=> base64_decode($this->uri->segment(3))));      
foreach ($cek_customer->result_array() as $hasil_cek){
}
if($this->uri->segment(3)== NULL && $this->uri->segment(4)== NULL ){
redirect(base_url()); 
}elseif ($this->uri->segment(3) != base64_encode($hasil_cek['id_customer_toko'])) {
redirect(base_url()); 
} 

$valid =  $this->session->all_userdata();
if (!empty($valid['id_customer_toko'])?$valid['id_customer_toko']:'' != NULL) {

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
"key: 4c7b7269c382193780ecc146dcb2fed3"
),
));

$responseprovinsi = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
$provinsi = $responseprovinsi;
}


$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
"key: 4c7b7269c382193780ecc146dcb2fed3"
),
));

$responsekota = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
$kota =  $responsekota;
}
$ambil_nilai_diskon =  $this->session->all_userdata();

if(!empty($ambil_nilai_diskon['diskon_voucher'])?$ambil_nilai_diskon['diskon_voucher']:NULL !=NULL){
$hasil_kupon = $this->cart->total()*$ambil_nilai_diskon['diskon_voucher']/100;  


$this->session->set_userdata(['hasil_kupon'=>$hasil_kupon]);

}else{
$hasil_kupon = 0;  
}    


$hasil_total = $this->cart->total()-$hasil_kupon;  

$this->load->view('Toko/umum/V_header');   
$this->load->view('Toko/V_checkout_baru',['provinsi'=>$provinsi,'kota'=>$kota, 'hasil_total'=>$hasil_total,'hasil_kupon'=>$hasil_kupon]);   
$this->load->view('Toko/umum/V_footer');
}else{

redirect('Toko/login');    
}

}
public function hapus_cart(){
$id  = $this->input->get('id_produk');
$id_produk = md5($id);
$this->cart->remove($id_produk);
}
public function data_keranjang(){
$this->load->view('Toko/V_keranjang');   
}

public function update_qty_cart(){
$id  = $this->input->get('id_produk');
$id_produk = md5($id);
$qty = $this->input->get('qty_produk');

$data = array(
'rowid' => $id_produk,
'qty'   => $qty,
);
$this->cart->update($data);
}

public function daftar_customer(){
$this->form_validation->set_rules('nama_depan', ' ', 'trim|required');
$this->form_validation->set_rules('nama_belakang', ' ', 'trim|required');
$this->form_validation->set_rules('email', ' ', 'trim|required');
$this->form_validation->set_rules('password1', ' ', 'trim|required');
$this->form_validation->set_rules('password2', ' ', 'trim|required');
$this->form_validation->set_error_delimiters('<div class="text-danger"> ada error"</div>');

$recaptcha = $this->input->post('g-recaptcha-response');
$response = $this->recaptcha->verifyResponse($recaptcha);

if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
$this->login();
} else {
$cek_email = $this->input->post('email');
$kondisi = $this->db->get_where('data_customer_toko',array('email'=>$cek_email));

foreach ($kondisi->result_array() as $hasil){
}
$hasil_email =  !empty($hasil['email'])?$hasil['email'] : ' ';

if($hasil_email != $cek_email){

if(isset($_POST['btnRegister'])){

if($this->input->post('password1') == $this->input->post('password2')){ 

$data = array (
'nama_depan'    =>$this->input->post('nama_depan'),  
'nama_belakang' =>$this->input->post('nama_belakang'),  
'email'         =>$this->input->post('email'),  
'password1'     =>MD5($this->input->post('password1')),  
);
$this->db->insert('data_customer_toko',$data);
echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("","Pendaftaran berhasil gan .silahkan cek email agan untuk melakukan konfirmasi akun.","success");';
echo '}, 1000);</script>';
$this->login();

$config = Array(
'protocol' => 'smtp',
'smtp_host' => 'ssl://smtp.googlemail.com',
'smtp_port' => 465,
'smtp_user' => 'niagarawatermart@gmail.com', // change it to yours
'smtp_pass' => 'piyaos168', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);

$data_customer=  $this->session->all_userdata();

$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->from('niagarawatermart@gmail.com'); // change it to yours
$this->email->to($this->input->post('email'));// change it to yours
$this->email->subject('Konfirmasi akun niagarawatermart');

$link = "Terimakasih agan ".$this->input->post('nama_depan').",anda telah melakukan pendaftaran di store niagarawatermart <br>"
."dengan rincian akun sebagai berikut :<br>"
."Email : <b>".$this->input->post('email')."</b><br>"
."Password :<b> ".$this->input->post('password1')."</b><br>"
."untuk melakukan konfirmasi akun silahkan anda klik link dibawah ini <br>"
.base_url('Toko/konfirmasi_akun/'.  base64_encode($this->input->post('email')));"";

$this->email->message($link);


if($this->email->send())
{


}
else
{
show_error($this->email->print_debugger());
}



}else{
echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("","Password yang agan masukan tidak sama","error");';
echo '}, 1000);</script>';
$this->login();
}
}else{
echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("","Pendaftaran Gagal gan","error");';
echo '}, 1000);</script>';
$this->login();
}
}else{

echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("","Alamat email telah digunakan gan, silahkan gunakan email lain","error");';
echo '}, 1000);</script>';
$this->login();

}
}




}
public function login_customer(){
$cek =  $this->session->all_userdata();

if(!empty($cek['id_customer_toko'])?$cek['id_customer_toko']:NULL ==NULL){
if(isset($_POST['btnLogin'])){       
$this->form_validation->set_rules('email', ' ', 'trim|required');
$this->form_validation->set_rules('password', ' ', 'trim|required');
$this->form_validation->set_error_delimiters('<div class="text-danger"> ada error"</div>');

$recaptcha = $this->input->post('g-recaptcha-response');
$response = $this->recaptcha->verifyResponse($recaptcha);

if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
$this->login();
} else {
$email    = $this->input->post('email');
$password = $this->input->post('password');

$hasil = $this->db->get_where('data_customer_toko',array('email'=>$email,'password1'=>md5($password)));  
$hasil_cek = $hasil->row_array();



if($hasil->num_rows()==1 ){

if($hasil_cek['konfirmasi_akun'] == 'terkonfirmasi'){ 

$setsesi = $this->db->get_where('data_customer_toko',['email'=>$email]);
foreach ($setsesi->result() as $value) {
$sess_data= array(
'id_customer_toko'           =>$value->id_customer_toko,
'nama_depan'                 =>$value->nama_depan,
'nama_belakang'              =>$value->nama_belakang,
'email'                      =>$value->email,
);
$ok =  $this->session->set_userdata($sess_data);
}
echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("","Login berhasil","success");';
echo '}, 1000);</script>';

$this->index();     

}else{
echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("","Maaf gan Akun anda belum di konfirmasi silahkan cek email agan terlebih dahulu, jika masih kesulitan bisa hubungi kami.","warning");';
echo '}, 1000);</script>';

$this->login();        

}

}else{
echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("","Akun tersebut tidak tersedia gan.","error");';
echo '}, 1000);</script>';

$this->login();
}


}
}else{
redirect('Toko');  

} 
}else{
echo "udah login";
}
}
public function keluar(){
$this->session->sess_destroy();

redirect('Toko');
}
public function cost_pengiriman(){
$berat_total = 0; 
foreach ($this->cart->contents() as $items){

$berat_total += $items['berat']*$items['qty'];
}  
$id_customer =  $this->input->post('id_customer');
$this->db->select('data_customer_toko.provinsi_tujuan,kota_tujuan');
$data_ongkos = $this->db->get_where('data_customer_toko',['id_customer_toko'=>$id_customer])->row_array();
$asal = 155;
$id_kabupaten = $data_ongkos['kota_tujuan'];
$kurir        = $this->input->post('kurir');
$berat = $berat_total;
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
CURLOPT_HTTPHEADER => array(
"content-type: application/x-www-form-urlencoded",
"key: 4c7b7269c382193780ecc146dcb2fed3"
),
));

$responsecost = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
$data_cost = json_decode($responsecost,true);
if(!empty($data_cost['rajaongkir']['results'])?$data_cost['rajaongkir']['results'] : ' ' != ' ' ){
foreach ($data_cost['rajaongkir']['results'] as $data_kurir)

echo "<p align='center' id='nama_kurir'>".$data_kurir['name']."</p>";
foreach ($data_kurir['costs'] as $pilihan_service){

echo  $pilihan_service['service']." : &nbsp;&nbsp;&nbsp;";     
echo  $pilihan_service['description']."&nbsp;&nbsp;&nbsp;<br>";


foreach ($pilihan_service['cost'] as $data_harga){
echo "<input  class='ongkos_terpilih' type='radio' value='".$data_harga['value'].",".$pilihan_service['service']."'  name='ongkos'> Rp. ".number_format($data_harga['value'])."&nbsp;&nbsp;&nbsp;";
echo "Estimasi &nbsp;&nbsp;&nbsp;".$data_harga['etd']."&nbsp;&nbsp; Hari";
echo "<br>";    
}
}
}else{


}
}
echo "<div class='footer'><button onclick='kembali_alamat()' class='pull-left btn btn-primary'>Kembali  <span class='fa fa-angle-double-left'></span></button>"
. "<button onclick='simpan_kurir()' class='pull-right btn btn-primary right'>Lanjutkan dan simpan <span class='fa fa-angle-double-right'></button></div>"; 

}
public function cost_cek_detail(){

$asal = 155;
$id_kabupaten = $this->input->get('kota_tujuan');
$kurir = $this->input->get('kurir');
$berat = $this->input->get('berat_total');

$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
CURLOPT_HTTPHEADER => array(
"content-type: application/x-www-form-urlencoded",
"key: 4c7b7269c382193780ecc146dcb2fed3"
),
));

$responsecost = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
$data_cost = json_decode($responsecost,true);
if(!empty($data_cost['rajaongkir']['results'])?$data_cost['rajaongkir']['results'] : ' ' != ' ' ){
foreach ($data_cost['rajaongkir']['results'] as $data_kurir)

echo "<p align='center' id='nama_kurir'>".$data_kurir['name']."</p>";
foreach ($data_kurir['costs'] as $pilihan_service){

echo  $pilihan_service['service']." : &nbsp;&nbsp;&nbsp;";     
echo  $pilihan_service['description']."&nbsp;&nbsp;&nbsp;<br>";


foreach ($pilihan_service['cost'] as $data_harga){
echo " Rp. ".number_format($data_harga['value'])."&nbsp;&nbsp;&nbsp;";
echo "Estimasi &nbsp;&nbsp;&nbsp;".$data_harga['etd']."&nbsp;&nbsp; Hari";
echo "<br><br>";    
}
}
}else{


}
}

}


public function simpan_data_alamat(){
if(isset($_POST['nomor_kontak'])){
$id_customer  = $this->input->post('id_customer');

$data_alamat = array(
'nomor_kontak'    =>$this->input->post('nomor_kontak'),   
'provinsi_tujuan' =>$this->input->post('provinsi_tujuan'),
'kota_tujuan'     =>$this->input->post('kota_tujuan'),
'alamat_lengkap'  =>$this->input->post('alamat_lengkap'),   
'nama_kota'       =>$this->input->post('nama_kota'),   
'nama_provinsi'   =>$this->input->post('nama_provinsi'),   
);



$this->db->update('data_customer_toko',$data_alamat,array('id_customer_toko'=>$id_customer));
echo print_r ($data_alamat);
}else{

echo "gagal updatea";
}

if(isset($_POST['metode_pembayaran'])){

$metode_pembayaran = array(
'metode_pembayaran' => $this->input->post('metode_pembayaran'),
);
$this->session->set_userdata($metode_pembayaran);   

}else{


}

}


public function simpan_data_kurir(){
$variabel = $this->input->get('ongkos_terpilih');
$data = explode(',',$variabel);
$data1 = $data[0];
$data2 = $data[1];

$data_ongkos_kirim = array(
'ongkos_terpilih'  => $data1,
'service'          => $data2,
'nama_kurir'       => $this->input->get('nama_kurir')

);

$this->session->set_userdata($data_ongkos_kirim);


}
public function set_voucher(){
if(!empty($this->input->post('kode_voucher')?$this->input->post('kode_voucher') : NULL != NULL)){
$kode_voucher = $this->input->post('kode_voucher');
$cek_kode = $this->db->get_where('kode_voucher',array('kode_voucher'=>$kode_voucher));

foreach ($cek_kode->result_array() as $hasil_cek_kupon){
$set_voucher= array(
'kode_voucher'                   =>$hasil_cek_kupon['kode_voucher'],
'diskon_voucher'                 =>$hasil_cek_kupon['diskon_voucher'],

);
$this->session->set_userdata($set_voucher);  
}
$ambil_nilai_diskon =  $this->session->all_userdata();
} 


}
public function pencarian(){

$kata_kunci = $this->input->get('kunci');
$array = array('nama_produk' => $kata_kunci);
$this->db->like($array);
$this->db->where(array('milik'=>'Online','status'=>'Aktif','stok_toko !=' =>0,'kategori != '=>'','gambar0 != '=>''));
$hasil = $this->db->get('data_produk_ditoko');
$num_char = 70;
foreach ($hasil->result_array() as $hasil_cari){
$text =  $hasil_cari['nama_produk'];
echo "<a style='text-decoration: none;' href='".base_url('Toko/detail/'. base64_encode($hasil_cari['id_produk']))."'> 
<div class='col-md-3' style='margin-top:7px; '>
    <div class='product-image-wrapper'>
            <div class='single-products'>
                <div class='productinfo text-center' >
                              <img style='padding: 10px; height:200px; width:220px;  ' src='".base_url('uploads/produk_thumb/'.$hasil_cari['gambar0'])."' alt='' />
                             <div style='height:60px; padding:10px;  font-size:14px;   color:#666663; '>".substr($text, 0, $num_char)."</div>
                                 <div> <h4 align='center' style=' color:#666663;'>Rp.". number_format($hasil_cari['harga_produk'])."</h4></div>
                            </div>
                      </div>
                    </div>
         </div></a>";

}

}


public function ganti_kurir(){

$hapus_session = array('service', 'nama_kurir','ongkos_terpilih');
$this->session->unset_userdata($hapus_session);   
}
public function hapus_kupon(){

$hapus_session = array('kode_voucher','diskon_voucher');
$this->session->unset_userdata($hapus_session);   
}
public function simpan_order(){

$data_sesi   = $this->session->all_userdata();
$id_customer = $this->input->post('id_customer');

$no_invoices   = $this->db->get('data_toko')->num_rows();
$data_customer = $this->db->get_where('data_customer_toko',array('id_customer_toko'=>$id_customer))->row_array();

foreach ($this->cart->contents() as $produk){

$data_produk = array(
'no_invoices'           => 'AD/NW/'.date("Y/m/d/").$no_invoices,
'id_customer_penjualan_produk' =>$this->input->post('id_customer'), 
'nama_produk'      =>$produk['name'],
'qty'              =>$produk['qty'],
'berat'            =>$produk['berat'],
'harga'            =>$produk['price'],
'harga_total'      =>$produk['subtotal']  
);
$this->db->insert('data_toko_penjualan_produk',$data_produk);     
}


$records_penjualan = array(
'records_penjualan' => $no_invoices,
);
$this->db->insert('data_toko',$records_penjualan);

if(!empty($data_sesi['hasil_kupon'])?$data_sesi['hasil_kupon']:NULL !=NULL){

$hasil_kupon = $data_sesi['hasil_kupon'];
}else{

$hasil_kupon = 0;

}

$total = $this->cart->total()-$hasil_kupon;

$total_bayar = $total+$data_sesi['ongkos_terpilih'];

$data_order= array(   
'no_invoices'           => 'AD/NW/'.date("Y/m/d/").$no_invoices,
'id_customer_toko'      => $this->input->post('id_customer'), 
'metode_pembayaran'     => $data_sesi['metode_pembayaran'],
'nomor_kontak'          => $data_customer['nomor_kontak'],
'nama_provinsi'         => $data_customer['nama_provinsi'],
'nama_kota'             => $data_customer['nama_kota'],
'alamat_lengkap'        => $data_customer['alamat_lengkap'],
'status_penjualan'      => 'Dalam Proses',
'nama_kurir'            => $data_sesi['nama_kurir'],
'jenis_service'         => $data_sesi['service'],
'ongkos_kirim'          => $data_sesi['ongkos_terpilih'],
'tanggal_ditambahkan'   => date("Y/m/d"),
'sub_total'             => $this->cart->total(),
'kode_diskon'           => !empty($data_sesi['kode_voucher'])?$data_sesi['kode_voucher']:0,
'nilai_diskon'          => !empty($data_sesi['diskon_voucher'])?$data_sesi['diskon_voucher']:0,
'hasil_diskon'          =>  $hasil_kupon,
'total'                 => $total,
'total_bayar'           => $total+$data_sesi['ongkos_terpilih'],
'status_pembayaran'     => 'Belum bayar',
'gambar_pembayaran'     => '',

);

$this->db->insert('data_toko_penjualan',$data_order);


$config = Array(
'protocol' => 'smtp',
'smtp_host' => 'ssl://smtp.googlemail.com',
'smtp_port' => 465,
'smtp_user' => 'niagarawatermart@gmail.com', // change it to yours
'smtp_pass' => 'piyaos168', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);

$data_customer=  $this->session->all_userdata();

$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->from('niagarawatermart@gmail.com'); // change it to yours
$this->email->to($data_customer['email']);// change it to yours
$this->email->subject('Niagarawatermart');

$ambil_nilai_diskon =  $this->session->all_userdata();

if(!empty($ambil_nilai_diskon['diskon_voucher'])?$ambil_nilai_diskon['diskon_voucher']:NULL !=NULL){
$hasil_kupon = $this->cart->total()*$ambil_nilai_diskon['diskon_voucher']/100;  
}else{
$hasil_kupon = 0;  
}  
$hasil_total = $this->cart->total()-$hasil_kupon;  

$email_pesanan = $this->load->view('Toko/email_pesanan',['hasil_total'=>$hasil_total,'hasil_kupon'=>$hasil_kupon,'data_order'=>$data_order],TRUE);
$this->email->message($email_pesanan);


if($this->email->send())
{
// $this->cart->destroy(); 
//$this->session->unset_userdata(array('metode_pembayaran','alamat','ongkos_terpilih','service','nama_kurir','kode_voucher','diskon_voucher','hasil_kupon'));

echo 'email berhasil dikirim';
}
else
{
show_error($this->email->print_debugger());
}

echo print_r($data_order);

}

public function konfirmasi_akun(){

$parameter = base64_decode($this->uri->segment(3));
$data_konfirmasi = array(
'konfirmasi_akun' => 'terkonfirmasi',
);     
$this->db->update('data_customer_toko',$data_konfirmasi,array('email'=>$parameter));   

echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("","Konfirmasi akun berhasil silahkan Login","success");';
echo '}, 1000);</script>'; 
$this->login();

}
public function langkah_checkout(){

$this->load->view('Toko/V_langkah_checkout');

}
public function isi_checkout(){
$this->load->view('Toko/V_isi_checkout');
}

public function lihat_keranjang(){
$this->load->view('Toko/umum/V_header');   
$this->load->view('Toko/V_lihat_keranjang');   
$this->load->view('Toko/umum/V_footer');   



}
public function konfirmasi_bayar(){
$data_sesi = $this->session->all_userdata(); 
if(base64_decode($this->uri->segment(3)) != $data_sesi['id_customer_toko'] || $this->uri->segment(3) == NULL ){
redirect(base_url("C_404")); 


}else{
$data_konfirmasi = $this->db->get_where('data_toko_penjualan',array('id_customer_toko'=>  base64_decode($this->uri->segment(3)),'gambar_pembayaran'=>''));

$this->load->view('Toko/umum/V_header');   
$this->load->view('Toko/V_konfirmasi_bayar',['data_konfirmasi'=>$data_konfirmasi]);   
$this->load->view('Toko/umum/V_footer');  



} 

}
public function simpan_bukti_bayar(){

$no_invoices = $this->input->post('no_invoices');
$cek_bayar = $this->db->get_where('data_toko_penjualan',array('no_invoices'=>$no_invoices))->row_array();
echo $cek_bayar['total_bayar'];       
if($this->input->post('jumlah_bayar') < $cek_bayar['total_bayar']){ 

echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("","Konfirmasi bayar gagal karena kuran bayar gan.","error");';
echo '}, 1000);</script>';


}else{

$config['upload_path']          = './uploads/bukti_bayar/';
$config['allowed_types']        = 'gif|jpg|png';
$config['max_size']             = 1000000;
$config['encrypt_name']         = TRUE;
$config['overwrite']              = TRUE;
$this->upload->initialize($config);
$this->load->library('upload', $config);

if ( ! $this->upload->do_upload("bukti_bayar"))
{
$error = array('error' => $this->upload->display_errors());
echo print_r($error);

}else{


$configemail = Array(
'protocol' => 'smtp',
'smtp_host' => 'ssl://smtp.googlemail.com',
'smtp_port' => 465,
'smtp_user' => 'niagarawatermart@gmail.com', // change it to yours
'smtp_pass' => 'piyaos168', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);

$data_customer=  $this->session->all_userdata();

$this->load->library('email', $configemail);
$this->email->set_newline("\r\n");
$this->email->from('niagarawatermart@gmail.com'); // change it to yours
$this->email->to('niagarawatermart@gmail.com');// change it to yours
$this->email->cc('dedi_ibrahim@niagara.co.id');
$this->email->subject('Pesanan Baru Store Niagara  dengan No.invoices '.$this->input->post('no_inv'));
$this->email->attach('./uploads/bukti_bayar/'.$this->upload->file_name);

$this->db->select('*');
$this->db->from('data_toko_penjualan_produk');
$this->db->join('data_customer_toko', 'data_customer_toko.id_customer_toko = data_toko_penjualan_produk.id_customer_penjualan_produk');

$this->db->where('no_invoices',$this->input->post('no_inv'));
$data_bukti_bayar = $this->db->get();


$email_pesanan = $this->load->view('Toko/email_bukti_bayar',['data_bukti_bayar'=>$data_bukti_bayar],TRUE);
$this->email->message($email_pesanan);


if($this->email->send())
{
$this->cart->destroy(); 
$this->session->unset_userdata(array('metode_pembayaran','alamat','ongkos_terpilih','service','nama_kurir','kode_voucher','diskon_voucher','hasil_kupon'));
}
else
{
show_error($this->email->print_debugger());
}

$bukti_upload=  array(

'gambar_pembayaran'=> $this->upload->file_name,
'jumlah_dibayarkan' =>$this->input->post('jumlah_bayar'),

);

$this->db->update('data_toko_penjualan',$bukti_upload,array('no_invoices'=>$no_invoices));


}
}


}
public function daftar_transaksi(){
$data_sesi = $this->session->all_userdata(); 
if(base64_decode($this->uri->segment(3)) != $data_sesi['id_customer_toko'] || $this->uri->segment(3) == NULL ){
redirect(base_url("C_404")); 


}else{
$this->db->order_by("id_data_toko_penjualan", "desc");
$data_konfirmasi = $this->db->get_where('data_toko_penjualan',array('id_customer_toko'=>  base64_decode($this->uri->segment(3)),'gambar_pembayaran !='=>''));
$this->load->view('Toko/umum/V_header');   
$this->load->view('Toko/V_daftar_transaksi',['data_konfirmasi'=>$data_konfirmasi]);   
$this->load->view('Toko/umum/V_footer');  



} 

}

public  function alamat_baru(){
$id = $this->input->post('id_customer');   
$data_alamat_baru = array(
'nomor_kontak'    =>'',
'provinsi_tujuan' =>'',
'kota_tujuan'     =>'',
'alamat_lengkap'  =>'',
'nama_kota'       =>'',
'nama_provinsi'   =>'',  
);
$this->db->update('data_customer_toko',$data_alamat_baru,array('id_customer_toko'=>$id));
$this->session->unset_userdata(array('metode_pembayaran'));


}
public function cek_pesanan(){
$data_sesi = $this->session->all_userdata(); 
if(base64_decode($this->uri->segment(3)) != $data_sesi['id_customer_toko'] || $this->uri->segment(3) == NULL ){
redirect(base_url("C_404")); 


}else{
$this->db->order_by("id_data_toko_penjualan", "desc");
$data_konfirmasi = $this->db->get_where('data_toko_penjualan',array('id_customer_toko'=>  base64_decode($this->uri->segment(3)),'gambar_pembayaran !='=>''));
$this->load->view('Toko/umum/V_header');   
$this->load->view('Toko/V_cek_pesanan',['data_konfirmasi'=>$data_konfirmasi]);   
$this->load->view('Toko/umum/V_footer');  
    
    
}
}


}