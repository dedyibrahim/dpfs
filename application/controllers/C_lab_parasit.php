<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lab_parasit extends CI_Controller {
    
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
        $this->load->model('Data_nekropsi');
       $this->load->model('Data_lab_parasit');
       $this->load->model('Data_lab_virus');
    
    }
  
    public function index()
	{
            $this->load->view('V_lab_parasit/umum/V_header');
            $this->load->view('V_lab_parasit/umum/V_sidebar');
            $this->load->view('V_lab_parasit/umum/V_top_navigasi');
            $this->load->view('V_lab_parasit/V_form_parasit');
            $this->load->view('V_lab_parasit/V_data_parasit');
            $this->load->view('V_lab_parasit/umum/V_footer');
            
	}
       public function json() {
        header('Content-Type: application/json');
        echo $this->Data_lab_parasit->json();
    
}  

 public function ambil_data(){
            $ambil = $this->uri->segment(3);    
            $this->db->select('*');
            $this->db->from('customer_fpps');
            $this->db->where('record_number_customer',$ambil);
            $this->db->join('jenis_sample','record_number_sample = record_number_customer');
            $this->db->join('record_number','project_id = record_number_customer');
            $this->db->join('kaji_ulang_permintaan','record_number_kaji_ulang = record_number_customer');
            $this->db->join('data_nekropsi_parasit','record_number_parasit = record_number_customer');
            $this->db->join('parameter_penyakit','record_number_parameter = record_number_customer');
            $this->db->join('penjelasan_penerimaan_fpps','record_number_penjelasan = record_number_customer');
            $this->db->join('data_penerimaan_sample','record_number_penerimaan_sample = record_number_customer','left');
            $this->db->join('data_lab_parasit','record_number_lab_parasit = record_number_customer','left');
            $query = $this->db->get();
           
            foreach($query->result_array() as $cetak);{
             $id_customer = $cetak['id_customer_fpps_customer'];
             }

            $customer_id = $id_customer;
            $data_customer = $this->db->get_where('customer',['id_customer'=>$customer_id]);
            
            $data_penganalis = $this->db->get_where('data_penganalis',['record_number_penganalis'=>$ambil]);
            
            $this->load->view('V_lab_parasit/umum/V_header');
            $this->load->view('V_lab_parasit/umum/V_sidebar');
            $this->load->view('V_lab_parasit/umum/V_top_navigasi');
            $this->load->view('V_lab_parasit/V_ambil_parasit',['data_customer'=>$data_customer,'query'=>$query,'data_penganalis'=>$data_penganalis]);
            $this->load->view('V_lab_parasit/V_data_parasit');
            $this->load->view('V_lab_parasit/umum/V_footer');   
        }

 
   public function simpan(){
     $cek_record = $this->input->post('record_number');
        
       $cek= $this->db->get_where('data_lab_parasit',['record_number_lab_parasit'=>$cek_record]);
    
       foreach ($cek->result_array() as $hasil_cek){
        
         $cek_kosong = $hasil_cek['record_number_lab_parasit'];
        }
       
        $gaada = $cek_kosong;
        
    if(isset($_POST['btn_parasit']) &&  $cek_kosong == null){
        
            $daftar = array(
            'record_number_lab_parasit'  => $this->input->post('record_number'),
            'parasit_ditemukan'          => $this->input->post('parasit_ditemukan'),
            'jumlah_parasit'             => $this->input->post('jumlah_parasit'),
           );
            $this->db->insert('data_lab_parasit',$daftar);
            
            redirect('C_lab_parasit');
    }elseif($gaada = !null) {
        
            $daftar = array(
            'record_number_lab_parasit'  => $this->input->post('record_number'),
            'parasit_ditemukan'          => $this->input->post('parasit_ditemukan'),
            'jumlah_parasit'             => $this->input->post('jumlah_parasit'),
           );
            $this->db->where('record_number_lab_parasit', $cek_record);
            $this->db->update('data_lab_parasit',$daftar);
           redirect('C_lab_parasit');
           
        
        }else{
            
            echo 'gagal menginsert dan update data' ;
      
        }
   }
   
   public  function lhus(){
            
            
                                    
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

$html = '<span align="center" style="font-size: 15px;" ><u>LAPORAN HASIL UJI SEMENTARA (LHUS)</u></span><br>';

$html.='<div style="text-align:left; line-height: 25px;">';

$html.='Bidang pengujian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Bakteri<br>
kode sample&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {kode_sample}<br>
Jenis Sample&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {data_sample}<br>
Tanggal pengujian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {tgl_sampling}<br>';
$html.='<table border="1" width="600px">
    <tr>
        <th width="50px" style="text-align:center">No.</th>
        <th width="100px" style="text-align:center">Organ Target</th>
        <th width="100px" style="text-align:center">Metode Uji</th>
        <th width="200px" style="text-align:center">Hasil Uji</th>
        <th width="50px" style="text-align:center">Ket.*</th>
        <th width="90px" style="text-align:center">Nama Analis</th>
        <th width="90px" style="text-align:center">Paraf</th>
    </tr>
    <tr>
        <td style="text-align:center">1</td>
        <td>{organ_target}</td>
        <td style="text-align:center"></td>
        <td style="text-align:center">{bakteri_ditemukan}</td>
        <td style="text-align:center">{jumlah_bakteri}</td>
        <td style="text-align:center">{nama}</td>
        <td style="text-align:center"></td>
    </tr>
    <tr>
        <td style="text-align:center"></td>
        <td></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
    </tr>
    <tr>
        <td style="text-align:center"></td>
        <td></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
    </tr>
    <tr>
        <td style="text-align:center"></td>
        <td></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
    </tr>
    </table>';

$html.='<div style="text-align: right"><br><br>Mamuju {tgl_sampling}<br>';
$html.='<div style="text-align: right">Mengetahui :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$html.='<div style="text-align: right">Penyelia terkait&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br>';
$html.='<div style="text-align: right">{nama}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br>';
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
$this->db->join('data_lab_parasit','record_number_lab_parasit = record_number_customer','left');
$this->db->join('data_nekropsi_parasit','record_number_parasit = record_number_customer','left');
  $this->db->join('data_penganalis','record_number_penganalis= record_number_customer','left');
    
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
     $html = str_replace('{diberikan_oleh}',$cetak['diberikan_oleh'],$html);
     $html = str_replace('{diterima_oleh}',$cetak['diterima_oleh'],$html);
     $html = str_replace('{kegiatan}',$cetak['kegiatan'],$html);
     $html = str_replace('{lokasi_sampling}',$cetak['lokasi_sampling'],$html);
     $html = str_replace('{asal_sample}',$cetak['asal_sample'],$html);
     $html = str_replace('{kode_sample}',$cetak['kode_sample'],$html);
     $html = str_replace('{gejala_klinis}',$cetak['gejala_klinis'],$html);
     $html = str_replace('{keterangan_lain_lain}',$cetak['keterangan_lain_lain'],$html);
     $html = str_replace('{pelaksana1}',$cetak['pelaksana1'],$html);
     $html = str_replace('{pelaksana2}',$cetak['pelaksana2'],$html);
     $html = str_replace('{bakteri_ditemukan}',$cetak['parasit_ditemukan'],$html);
     $html = str_replace('{jumlah_bakteri}',$cetak['jumlah_parasit'],$html);
      $html = str_replace('{jumlah_bakteri}',$cetak['jumlah_parasit'],$html);
     $html = str_replace('{organ_target}',$cetak['nekropsi_parasit'],$html);
      $html = str_replace('{nama}',$cetak['nama'],$html);
     $html = str_replace('{jabatan}',$cetak['jabatan'],$html);

}
foreach ($data_customer->result_array() as $data_cs){
     $html = str_replace('{nama_customer}',$data_cs['nama_customer'],$html);
     $html = str_replace('{alamat}',$data_cs['alamat'],$html);
      $html = str_replace('{telp}',$data_cs['telp'],$html);
     
   }
$pdf->writeHTML($html, true, false, true, false, '');
   
$pdf->Output($keluar.'.pdf', 'I');

  
            
        }
     
}