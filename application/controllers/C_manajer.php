<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_manajer extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
         $this->load->helper('form');
         $this->load->library('session');
         $this->load->model('M_customer');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('datatables');
        $this->load->model('Data_manajer');
        $this->load->model('Data_distribusi');
        $this->load->model('Data_lhu');
        
    }
  
    public function index()
	{
            $this->load->view('V_manajer/umum/V_header');
            $this->load->view('V_manajer/umum/V_sidebar');
            $this->load->view('V_manajer/umum/V_top_navigasi');
            $this->load->view('V_manajer/V_form_manajer');
            $this->load->view('V_manajer/V_data_manajer');
            $this->load->view('V_manajer/umum/V_footer');
            
	}
        
    public function distribusi()
	{
            $this->load->view('V_manajer/umum/V_header');
            $this->load->view('V_manajer/umum/V_sidebar');
            $this->load->view('V_manajer/umum/V_top_navigasi');
            $this->load->view('V_manajer/V_data_distribusi');
            $this->load->view('V_manajer/umum/V_footer');
            
	}    
        
      public function simpan_penganalis(){
        
        if(isset($_POST['simpan_penganalis'])){
            
            $daftar = array(
            'nama'                => $this->input->post('nama'),
            'jabatan'             => $this->input->post('jabatan'),
           );
            $this->db->insert('penganalis',$daftar);
            
            redirect('C_manajer');
        }else{
            redirect('C_manajer');
        }
        
    }
    public function data_penganalis(){
        
        if(isset($_POST['data_penganalis'])){
            
            $daftar = array(
            'record_number_penganalis'   => $this->input->post('record_number'),
            'nama'                       => $this->input->post('nama'),
            'jabatan'                    => $this->input->post('jabatan'),
           );
            $this->db->insert('data_penganalis',$daftar);
            
            redirect('C_manajer/ambil_data/'.$this->input->post('record_number'));
        }else{
            redirect('C_manajer');
        }
        
    }
    public function get_allpenganalis(){
   
        $kode = $this->input->post('nama',TRUE); //variabel kunci yang di bawa dari input text id kode
        $term =strtolower ($_GET['term']); // tambahan baris untuk filtering data
        $query =$this->M_customer->get_allpenganalis($term); //query model
 
        $customer    =  array();
        foreach ($query as $d) {
            $json[]     = array(
                'label'                 => $d->nama, //variabel array yg dibawa ke label ketikan kunci
                'nama'                 => $d->nama , //variabel yg dibawa ke id nama
                'jabatan'               => $d->jabatan , //variabel yg dibawa ke id nama
            );
        }
        echo json_encode($json);      //data array yang telah kota deklarasikan dibawa menggunakan json
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Data_manajer->json();
    
     }
    
    public function ambil_data(){
            $ambil = $this->uri->segment(3);    
            $this->db->select('*');
            $this->db->from('customer_fpps');
            $this->db->where('record_number_customer',$ambil);
            $this->db->join('jenis_sample','record_number_sample = record_number_customer');
            $this->db->join('record_number','project_id = record_number_customer');
            $this->db->join('kaji_ulang_permintaan','record_number_kaji_ulang = record_number_customer');
            $this->db->join('parameter_penyakit','record_number_parameter = record_number_customer');
            $this->db->join('penjelasan_penerimaan_fpps','record_number_penjelasan = record_number_customer');
            $this->db->join('data_penerimaan_sample','record_number_penerimaan_sample = record_number_customer','left');
            $query = $this->db->get();
           
            foreach($query->result_array() as $cetak);{
             $id_customer = $cetak['id_customer_fpps_customer'];
             }

            $customer_id = $id_customer;
            $data_customer = $this->db->get_where('customer',['id_customer'=>$customer_id]);
            $data_penganalis = $this->db->get_where('data_penganalis',['record_number_penganalis'=>$ambil]);
            
            $this->load->view('V_manajer/umum/V_header');
            $this->load->view('V_manajer/umum/V_sidebar');
            $this->load->view('V_manajer/umum/V_top_navigasi');
            $this->load->view('V_manajer/V_ambil_manajer',['data_customer'=>$data_customer,'query'=>$query,'data_penganalis'=>$data_penganalis]);
            $this->load->view('V_manajer/V_data_manajer');
            $this->load->view('V_manajer/umum/V_footer');   
        }
    public function hapus(){
     $balik = $this->uri->segment(4);
     $hapus = $this->uri->segment(3);
    $this->db->delete('data_penganalis',['id_data_penganalis'=>$hapus]);
    redirect('C_manajer/ambil_data/'.$balik);
 }
 public function cetak_stp(){
                
$this->load->library('Mypdf');

$keluar= '/FPPS/SKIPM-MMJ/';

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);     
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetTitle($keluar);
$pdf->SetFont('helvetica', 'B', 20);
        
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('times', '', 12);

$pdf->AddPage();

$html ='<hr>';
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<span align="center">SURAT TUGAS PENGUJIAN (STP)'
        . '<br>No:{record_number_customer}/STP/SKIPM-MMJ/...../{tahun}</spam>';
$html.='Ditugaskan Kepada :<br>';


$ambil = $this->uri->segment(3);    

$data_penganalis = $this->db->get_where('data_penganalis',['record_number_penganalis'=>$ambil]);

foreach ($data_penganalis->result_array() as $penganalis){
    $html.='<table cellpadding="1"  style="clear: both; " nobr="true">
<tr style="background-color: #0073ea; ">
  <td border="1px;" align="center">No</td>
  <td border="1px;" align="center">Nama</td>
  <td border="1px;" align="center">Jabatan</td>
 </tr>
 <tr><td border="1px;" align="center">No</td>
  <td border="1px;" align="center">'.$penganalis['nama'].'</td>
  <td border="1px;" align="center">'.$penganalis['jabatan'].'</td>
  
 </tr>
   
</table>';
}

$html.='<div style="text-align:left; line-height: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Petugas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelanggan,<br><br><br>
<table cellpadding="1"  style="clear: both; " nobr="true">
<tr style="background-color: #0073ea; ">
  <td colspan="4"  border="1px;" align="center">PARAMETER TERPILIH</td>
 </tr>
 <tr>
  <td border="1px;" align="center">{identifikasi_parasit}</td>
  <td border="1px;" align="center">{identifikasi_bakteri}</td>
  <td border="1px;" align="center">{identifikasi_jamur}</td>
  <td border="1px;" align="center">{identifikasi_virus}</td>
 </tr>
   
</table>';
$html.='<div style="text-align:left; line-height: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{diberikan_oleh}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{diterima_oleh},<br>';


$ambil = $this->uri->segment(3);    
$this->db->select('*');
$this->db->from('customer_fpps');
$this->db->where('record_number_customer',$ambil);
$this->db->join('jenis_sample','record_number_sample = record_number_customer');
$this->db->join('record_number','project_id = record_number_customer');
$this->db->join('data_penerimaan_sample','record_number_penerimaan_sample = record_number_customer','left');
$this->db->join('kaji_ulang_permintaan','record_number_kaji_ulang = record_number_customer');
$this->db->join('parameter_penyakit','record_number_parameter = record_number_customer');
$this->db->join('penjelasan_penerimaan_fpps','record_number_penjelasan = record_number_customer');
$query = $this->db->get();
foreach($query->result_array() as $cetak);{
$id_customer = $cetak['id_customer_fpps_customer'];
}
$customer_id = $id_customer;
$data_customer = $this->db->get_where('customer',['id_customer'=>$customer_id]);
foreach($query->result_array() as $cetak);{
     $html = str_replace('{tahun}',date("Y"),$html);
     $html = str_replace('{data_sample}',$cetak['data_sample'],$html);
     $html = str_replace('{jumlah_sample}',$cetak['jumlah_sample'],$html);
     $html = str_replace('{record_number_customer}',$cetak['record_number_customer'],$html);
     $html = str_replace('{bentuk}',$cetak['bentuk'],$html);
     $html = str_replace('{tgl_penerimaan}',$cetak['tgl_penerimaan'],$html);
     $html = str_replace('{tgl_sampling}',$cetak['tgl_sampling'],$html);
     $html = str_replace('{deskripsi_sample}',$cetak['deskripsi_sample'],$html);
     $html = str_replace('{kesiapan_personel}',$cetak['kesiapan_personel'],$html);
     $html = str_replace('{kondisi_akomodasi}',$cetak['kondisi_akomodasi'],$html);
     $html = str_replace('{beban_pekerjaan}',$cetak['beban_pekerjaan'],$html);
     $html = str_replace('{kondisi_peralatan}',$cetak['kondisi_peralatan'],$html);
     $html = str_replace('{wadah}',$cetak['wadah'],$html);
     $html = str_replace('{kesesuaian_metode}',$cetak['kesesuaian_metode'],$html);
     $html = str_replace('{diberikan_oleh}',$cetak['diberikan_oleh'],$html);
     $html = str_replace('{diterima_oleh}',$cetak['diterima_oleh'],$html);
     $html = str_replace('{identifikasi_bakteri}',$cetak['identifikasi_bakteri'],$html);
     $html = str_replace('{identifikasi_parasit}',$cetak['identifikasi_parasit'],$html);
     $html = str_replace('{identifikasi_virus}',$cetak['identifikasi_virus'],$html);
     $html = str_replace('{identifikasi_jamur}',$cetak['identifikasi_jamur'],$html);
     $html = str_replace('{petugas_sampling}',$cetak['petugas_sampling'],$html);
     $html = str_replace('{lokasi_sampling}',$cetak['lokasi_sampling'],$html);
     $html = str_replace('{yang_menandatangani}',$cetak['yang_menandatangani'],$html);
     $html = str_replace('{penandatangan}',$cetak['penandatangan'],$html);

     
}
foreach ($data_customer->result_array() as $data_cs){
     $html = str_replace('{nama_customer}',$data_cs['nama_customer'],$html);
     $html = str_replace('{alamat}',$data_cs['alamat'],$html);
      $html = str_replace('{telp}',$data_cs['telp'],$html);
     
   }
ob_start();   
$pdf->writeHTML($html, true, false, true, false, '');
   
$pdf->Output('de'.'.pdf', 'I');


 } 
   public function json_bakteri() {
    
        header('Content-Type: application/json');
        echo $this->Data_distribusi->json_bakteri();       
    }
    
    public function json_jamur() {
    
        header('Content-Type: application/json');
        echo $this->Data_distribusi->json_jamur();       
    }
    
    public function json_parasit() {
    
        header('Content-Type: application/json');
        echo $this->Data_distribusi->json_parasit();       
    }
    public function json_virus() {
    
        header('Content-Type: application/json');
        echo $this->Data_distribusi->json_virus();       
    }
    
    public function set_terdistribusi_bakteri(){
        $query = $this->uri->segment(3);
     
        $cek = $this->db->get_where('status_distribusi_bakteri',['record_number_status_distribusi'=>$query]);
        
        foreach ($cek->result_array() as $hasil_cek){
            
            $ok = $hasil_cek['record_number_status_distribusi'];
            
        }
        
        
        if($ok== null){
            
        $data_set = "<a class='btn btn-sm btn-success  glyphicon glyphicon-ok'></a>";
        $set = array(
            'record_number_status_distribusi'  => $this->uri->segment(3),
            'status_bakteri'                   => $data_set,
        );
        $this->db->insert('status_distribusi_bakteri',$set);
        
        redirect('C_manajer/distribusi');
       
        }elseif ($ok==!null || $ok == 0) {
            
        $this->db->delete('status_distribusi_bakteri',['record_number_status_distribusi'=>$query]);
        redirect('C_manajer/distribusi');  
            
        }else{
            
            redirect('C_manajer/distribusi');
            
        }
        
       
        
    }
    public function set_terdistribusi_jamur(){
        $query = $this->uri->segment(3);
     
        $cek = $this->db->get_where('status_distribusi_jamur',['record_number_status_distribusi'=>$query]);
        
        foreach ($cek->result_array() as $hasil_cek){
            
            $ok = $hasil_cek['record_number_status_distribusi'];
            
        }
        if($ok== null){
            
        $data_set = "<a class='btn btn-sm btn-success  glyphicon glyphicon-ok'></a>";
        $set = array(
            'record_number_status_distribusi'  => $this->uri->segment(3),
            'status_jamur'                   => $data_set,
        );
        $this->db->insert('status_distribusi_jamur',$set);
        
        redirect('C_manajer/distribusi');
       
        }elseif ($ok==!null || $ok == 0) {
            
        $this->db->delete('status_distribusi_jamur',['record_number_status_distribusi'=>$query]);
        redirect('C_manajer');  
            
        }else{
            
            redirect('C_manajer/distribusi');
            
        }
    }
    public function set_terdistribusi_parasit(){
        $query = $this->uri->segment(3);
     
        $cek = $this->db->get_where('status_distribusi_parasit',['record_number_status_distribusi'=>$query]);
        
        foreach ($cek->result_array() as $hasil_cek){
            
            $ok = $hasil_cek['record_number_status_distribusi'];
            
        }
        
        
        if($ok== null){
            
        $data_set = "<a class='btn btn-sm btn-success  glyphicon glyphicon-ok'></a>";
        $set = array(
            'record_number_status_distribusi'  => $this->uri->segment(3),
            'status_parasit'                   => $data_set,
        );
        $this->db->insert('status_distribusi_parasit',$set);
        
        redirect('C_manajer/distribusi');
       
        }elseif ($ok==!null || $ok == 0) {
            
        $this->db->delete('status_distribusi_parasit',['record_number_status_distribusi'=>$query]);
        redirect('C_manajer/distribusi');  
            
        }else{
            
            redirect('C_manajer/distribusi');
            
        }
        
    }
     public function set_terdistribusi_virus(){
        $query = $this->uri->segment(3);
     
        $cek = $this->db->get_where('status_distribusi_virus',['record_number_status_distribusi'=>$query]);
        
        foreach ($cek->result_array() as $hasil_cek){
            
            $ok = $hasil_cek['record_number_status_distribusi'];
            
        }
        
        
        if($ok== null){
            
        $data_set = "<a class='btn btn-sm btn-success  glyphicon glyphicon-ok'></a>";
        $set = array(
            'record_number_status_distribusi'  => $this->uri->segment(3),
            'status_virus'                   => $data_set,
        );
        $this->db->insert('status_distribusi_virus',$set);
        
        redirect('C_manajer/distribusi');
       
        }elseif ($ok==!null || $ok == 0) {
            
        $this->db->delete('status_distribusi_virus',['record_number_status_distribusi'=>$query]);
        redirect('C_manajer/distribusi');  
            
        }else{
            
            redirect('C_manajer/distribusi');
            
        }
        
    }
    public function data_lhu () {
        
            $this->load->view('V_manajer/umum/V_header');
            $this->load->view('V_manajer/umum/V_sidebar');
            $this->load->view('V_manajer/umum/V_top_navigasi');
            $this->load->view('V_manajer/V_data_lhu');
            $this->load->view('V_manajer/umum/V_footer');
  
        
    }
    public function json_lhu() {
        header('Content-Type: application/json');
        echo $this->Data_lhu->json();
    
}
public function cetak_lhu(){
                
$this->load->library('Mypdf');

$keluar= '/FPPS/SKIPM-MMJ/';

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);     
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetTitle($keluar);
$pdf->SetFont('helvetica', 'B', 20);
        
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('times', '', 12);

$pdf->AddPage();

$html ='<hr>';
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<span align="center">LAPORAN HASIL UJI</span>';

$html.='<div style="text-align:left; line-height: 25px;">
Nomor LHU &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {record_number_customer}/LHU/SKIPM-MMJ/...../{tahun}<br>
Kode Contoh UJi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {kode_sample}<br>
Tanggal Diterima &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {tgl_penerimaan}<br>
Nama Pelanggan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {nama_customer}<br>
ALamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {alamat}<br>

<table cellpadding="1"  style="clear: both; " nobr="true">
<tr style="background-color: #0073ea; ">
  <td colspan="4"  border="1px;" align="center">PARAMETER TERPILIH</td>
 </tr>
 <tr>
  <td border="1px;" align="center">{identifikasi_parasit}</td>
  <td border="1px;" align="center">{identifikasi_bakteri}</td>
  <td border="1px;" align="center">{identifikasi_jamur}</td>
  <td border="1px;" align="center">{identifikasi_virus}</td>
 </tr>

</table>

<table cellpadding="1"  style="clear: both; " nobr="true">
<tr style="background-color: #0073ea; ">
  <td colspan="8"  border="1px;" align="center">DATA UJI YANG DITEMUKAN BERDASRAKAN PARAMETER</td>
 </tr>
 <tr>
  <td border="1px;" align="center">Bakteri </td>
  <td border="1px;" align="center">Jumlah</td>
  <td border="1px;" align="center">Virus </td>
 <td border="1px;" align="center">Jumlah </td>
  <td border="1px;" align="center">Parasit </td>
 <td border="1px;" align="center">Jumlah</td>
  <td border="1px;" align="center">Jamur</td>
 <td border="1px;" align="center">Jumlah</td>
  
</tr>
 <tr>
  <td border="1px;" align="center">{bakteri_ditemukan}</td>
  <td border="1px;" align="center">{jumlah_bakteri}</td>
  <td border="1px;" align="center">{virus_ditemukan}</td>
 <td border="1px;" align="center">{jumlah_virus}</td>
  <td border="1px;" align="center">{parasit_ditemukan}</td>
 <td border="1px;" align="center">{jumlah_parasit}</td>
  <td border="1px;" align="center">{jamur_ditemukan}</td>
 <td border="1px;" align="center">{jumlah_jamur}</td>
  
</tr>


</table>

Catatan : <br>
1.Hasil uji mewakili poulasi yang di ambil/hasil uji ini berlaku hannya untuk contoh uji<br>
2.Laporan Hasil uji ini terdiri dari 1 (satu)  lembar (stempel asli)<br>
3.Laporan hasil uji ini tidak boleh digandakan  Kecuali secara lengkap dan seijzin tertulis<br>Manager puncak Stasiun KIPM kelas II Mamuju stempel Copy<br>

</div>';



$html.='<div style="text-align:left; line-height: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Petugas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelanggan,<br><br><br>';

$html.='<div style="text-align:left; line-height: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{diberikan_oleh}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{diterima_oleh},<br>';


$ambil = $this->uri->segment(3);    
$this->db->select('*');
$this->db->from('customer_fpps');
$this->db->where('record_number_customer',$ambil);
$this->db->join('jenis_sample','record_number_sample = record_number_customer');
$this->db->join('record_number','project_id = record_number_customer');
$this->db->join('data_penerimaan_sample','record_number_penerimaan_sample = record_number_customer','left');
$this->db->join('kaji_ulang_permintaan','record_number_kaji_ulang = record_number_customer');
$this->db->join('parameter_penyakit','record_number_parameter = record_number_customer');
$this->db->join('penjelasan_penerimaan_fpps','record_number_penjelasan = record_number_customer');
$this->db->join('data_lab_bakteri','record_number_lab_bakteri = record_number_customer','left');
$this->db->join('data_lab_jamur','record_number_lab_jamur = record_number_customer','left');
$this->db->join('data_lab_virus','record_number_lab_virus = record_number_customer','left');
$this->db->join('data_lab_parasit','record_number_lab_parasit = record_number_customer','left');
$query = $this->db->get();
foreach($query->result_array() as $cetak);{
$id_customer = $cetak['id_customer_fpps_customer'];
}
$customer_id = $id_customer;
$data_customer = $this->db->get_where('customer',['id_customer'=>$customer_id]);
foreach($query->result_array() as $cetak);{
     $html = str_replace('{tahun}',date("Y"),$html);
     $html = str_replace('{data_sample}',$cetak['data_sample'],$html);
     $html = str_replace('{jumlah_sample}',$cetak['jumlah_sample'],$html);
     $html = str_replace('{record_number_customer}',$cetak['record_number_customer'],$html);
     $html = str_replace('{bentuk}',$cetak['bentuk'],$html);
     $html = str_replace('{tgl_penerimaan}',$cetak['tgl_penerimaan'],$html);
     $html = str_replace('{tgl_sampling}',$cetak['tgl_sampling'],$html);
     $html = str_replace('{deskripsi_sample}',$cetak['deskripsi_sample'],$html);
     $html = str_replace('{kesiapan_personel}',$cetak['kesiapan_personel'],$html);
     $html = str_replace('{kondisi_akomodasi}',$cetak['kondisi_akomodasi'],$html);
     $html = str_replace('{beban_pekerjaan}',$cetak['beban_pekerjaan'],$html);
     $html = str_replace('{kondisi_peralatan}',$cetak['kondisi_peralatan'],$html);
     $html = str_replace('{wadah}',$cetak['wadah'],$html);
     $html = str_replace('{kesesuaian_metode}',$cetak['kesesuaian_metode'],$html);
     $html = str_replace('{diberikan_oleh}',$cetak['diberikan_oleh'],$html);
     $html = str_replace('{diterima_oleh}',$cetak['diterima_oleh'],$html);
     $html = str_replace('{identifikasi_bakteri}',$cetak['identifikasi_bakteri'],$html);
     $html = str_replace('{identifikasi_parasit}',$cetak['identifikasi_parasit'],$html);
     $html = str_replace('{identifikasi_virus}',$cetak['identifikasi_virus'],$html);
     $html = str_replace('{identifikasi_jamur}',$cetak['identifikasi_jamur'],$html);
     $html = str_replace('{petugas_sampling}',$cetak['petugas_sampling'],$html);
     $html = str_replace('{lokasi_sampling}',$cetak['lokasi_sampling'],$html);
     $html = str_replace('{yang_menandatangani}',$cetak['yang_menandatangani'],$html);
     $html = str_replace('{penandatangan}',$cetak['penandatangan'],$html);
     $html = str_replace('{bakteri_ditemukan}',$cetak['bakteri_ditemukan'],$html);
     $html = str_replace('{jumlah_bakteri}',$cetak['jumlah_bakteri'],$html);
     $html = str_replace('{jamur_ditemukan}',$cetak['jamur_ditemukan'],$html);
     $html = str_replace('{jumlah_jamur}',$cetak['jumlah_jamur'],$html);
     $html = str_replace('{virus_ditemukan}',$cetak['virus_ditemukan'],$html);
     $html = str_replace('{jumlah_virus}',$cetak['jumlah_virus'],$html);
      $html = str_replace('{parasit_ditemukan}',$cetak['parasit_ditemukan'],$html);
     $html = str_replace('{jumlah_parasit}',$cetak['jumlah_parasit'],$html);
       $html = str_replace('{kode_sample}',$cetak['kode_sample'],$html);

     
}
foreach ($data_customer->result_array() as $data_cs){
     $html = str_replace('{nama_customer}',$data_cs['nama_customer'],$html);
     $html = str_replace('{alamat}',$data_cs['alamat'],$html);
      $html = str_replace('{telp}',$data_cs['telp'],$html);
     
   }
ob_start();   
$pdf->writeHTML($html, true, false, true, false, '');
   
$pdf->Output('de'.'.pdf', 'I');

}
   public function daftar_user()
	{
            
       
           
            $this->load->view('V_manajer/umum/V_header');
            $this->load->view('V_manajer/umum/V_sidebar');
            $this->load->view('V_manajer/umum/V_top_navigasi');
            $this->load->view('V_manajer/user/V_daftar');
            $this->load->view('V_manajer/umum/V_footer');
           
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
                return anchor('C_manajer/lihat_user/'.md5($d),'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-success'").' '.
                       anchor('C_manajer/edit_user/'.md5($d),'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-warning'").' '.
                       anchor('C_manajer/hapus_user/'.md5($d),'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
                       
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
public function lihat_user(){
     
    $valid =  $this->session->all_userdata();
    $level    = $valid['level'];
 
if($level == 'admin')
{
    
    $user = $this->uri->segment(3);
    $data_user = $this->db->get_where('user',['md5(id_user)'=>$user]);
  
      $this->load->view('V_manajer/umum/V_header');
      $this->load->view('V_manajer/umum/V_sidebar');
      $this->load->view('V_manajer/umum/V_top_navigasi');
      $this->load->view('V_manajer/user/V_lihat_user',['data_user' =>$data_user]);
      $this->load->view('V_manajer/umum/V_footer');
    
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
  
    $this->load->view('V_manajer/umum/V_header');
    $this->load->view('V_manajer/umum/V_sidebar');
    $this->load->view('V_manajer/umum/V_top_navigasi');
    $this->load->view('V_manajer/user/V_edit_user',['data_user' =>$data_user]);
    $this->load->view('V_manajer/umum/V_footer');
    
}else{
    
  echo 'ANDA TIDAK MEMILIKI AKSES KEHALAMAN INI'  ; 
}     
     

 }
  public function update_user(){
      
      $id=  $this->input->post('id_user');
    
            
    if($_POST['password1'] != $_POST['password2'] || $_POST['password1'] == null ||  $_POST['password2'] == null ){
        
         echo 'ADA KESALAHAN DALAM PASSWORD';
         
    }
    else if(isset($_POST['btnDaftar'])){
                 $field_name ="gambar";
   
        $this->load->library('upload',$config);
      
           
    if ($this->upload->do_upload($field_name)){

        $image_data = $this->upload->data();
        $config['image_library']  ='gd2';
        $config['source_image']   =$this->upload->upload_path.$this->upload->file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width']          = 800;
        $config['height']         = 800;
        //$config['upload_path']      ='./uploads/user/';
         
        $this->load->library('image_lib',$config2);
        $this->image_lib->initialize($config2);
        $this->image_lib->resize();

////membuat thumbnail ////

        $conf['image_library']  ='gd2';
        $conf['source_image']   =$this->upload->upload_path.$this->upload->file_name;
        $conf['new_image']      ='./uploads/user_thumb/';
        $conf['create_thumb']   = TRUE;
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
         
        $this->db->update('user',$daftar,array('id_user' => $id)); 
                
        redirect('C_manajer/daftar_user');
     
        
    }else{
        echo  $this->upload->display_errors();
    }
        
    }else{
        echo 'DAFTAR GAGAL';
    }
    
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
                
        redirect('C_manajer/daftar_user');
     
        
    }else{
        echo  $this->upload->display_errors();
    }
        
    }else{
        echo 'DAFTAR GAGAL';
    }
    
}
  
}