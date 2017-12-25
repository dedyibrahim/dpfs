<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_anamnesa extends CI_Controller {
    
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
        $this->load->model('Data_anamnesa');
        
    }

        public function index()
	{
           
            $this->load->view('V_anamnesa/umum/V_header');
            $this->load->view('V_anamnesa/umum/V_sidebar');
            $this->load->view('V_anamnesa/umum/V_top_navigasi');
            $this->load->view('V_anamnesa/V_form_anamnesa');
            $this->load->view('V_anamnesa/V_data_anamnesa');
            $this->load->view('V_anamnesa/umum/V_footer');
            
	}
        public function ambil_data(){
            $ambil = $this->uri->segment(3);
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
            
            $this->load->view('V_anamnesa/umum/V_header');
            $this->load->view('V_anamnesa/umum/V_sidebar');
            $this->load->view('V_anamnesa/umum/V_top_navigasi');
            $this->load->view('V_anamnesa/V_ambil_anamnesa',['data_customer'=>$data_customer,'query'=>$query]);
            $this->load->view('V_anamnesa/V_data_anamnesa');
            $this->load->view('V_anamnesa/umum/V_footer');   
        }


        public function json() {
        header('Content-Type: application/json');
        echo $this->Data_anamnesa->json();       
        }      
        
    public function simpan(){
     $cek_record = $this->input->post('record_number');
        
       $cek= $this->db->get_where('data_penerimaan_sample',['record_number_penerimaan_sample'=>$cek_record]);
    
       foreach ($cek->result_array() as $hasil_cek){
        
         $cek_kosong = $hasil_cek['record_number_penerimaan_sample'];
        }
       
        $gaada = $cek_kosong;
        
    if(isset($_POST['btn_anamnesa']) &&  $cek_kosong == null){
        
            $simpan_penerimaan_sample = array(
            'record_number_penerimaan_sample'         => $this->input->post('record_number'),
            'kegiatan'                                => $this->input->post('kegiatan'),
            'lokasi_sampling'                         => $this->input->post('lokasi_sampling'),
            'asal_sample'                             => $this->input->post('asal_sample'),
            'kode_sample'                             => $this->input->post('kode_sample'),
            'gejala_klinis'                           => $this->input->post('gejala_klinis'),
            'keterangan_lain_lain'                    => $this->input->post('keterangan_lain_lain'),
            'pelaksana1'                             => $this->input->post('pelaksana1'),
            'pelaksana2'                               => $this->input->post('pelaksana2'),
            );
            $this->db->insert('data_penerimaan_sample',$simpan_penerimaan_sample);
            
            redirect('C_anamnesa');
    }elseif($gaada = !null) {
        
            $update_penerimaan_sample = array(
            'record_number_penerimaan_sample'         => $this->input->post('record_number'),
            'kegiatan'                                => $this->input->post('kegiatan'),
            'lokasi_sampling'                         => $this->input->post('lokasi_sampling'),
            'asal_sample'                             => $this->input->post('asal_sample'),
            'kode_sample'                             => $this->input->post('kode_sample'),
            'gejala_klinis'                           => $this->input->post('gejala_klinis'),
            'keterangan_lain_lain'                    => $this->input->post('keterangan_lain_lain'),
            'pelaksana1'                             => $this->input->post('pelaksana1'),
            'pelaksana2'                               => $this->input->post('pelaksana2'),
            );
            $this->db->where('record_number_penerimaan_sample', $cek_record);
            $this->db->update('data_penerimaan_sample',$update_penerimaan_sample);
           redirect('C_anamnesa');
           
        
        }else{
            
            echo 'gagal menginsert dan update data' ;
      
        }
    }
  public function cetak_anamnesa(){
            
                          
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

$html = '<span align="center" style="font-size: 15px;" ><u>INFORMASI ANAMNESA SAMPEL</u></span><br>';

$html.='<div style="text-align:left; line-height: 25px;">
Kegiatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {kegiatan}<br>
Tanggal sampling&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {tgl_sampling}<br>
<<<<<<< HEAD
Nama Pemilik&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {nama_customer}<br>
lokasi sampling&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {lokasi_sampling}<br>
asal sample&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {asal_sample}<br>
Jenis Sample&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {data_sample}<br>
Jumlah Sample&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {jumlah_sample}<br>
Bentuk Sample&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {bentuk}<br>
kode sample&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {kode_sample}<br>
gejala klinis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {gejala_klinis}<br>

keterangan lain_lain&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {keterangan_lain_lain}<br>
=======
Kegiatan : {kegiatan}<br>
lokasi sampling : {lokasi_sampling}<br>
asal sample : {asal_sample}<br>
kode sample : {kode_sample}<br>
gejala klinis : {gejala_klinis}<br>
keterangan lain_lain : {keterangan_lain_lain}<br>
pelaksana1 : {pelaksana1}<br>
pelaksana2 : {pelaksana2}<br>
>>>>>>> 9077eec93ac010e32f3eeedc6c65be22059c9c39

</div>';

$html.='<div style="text-align:left; line-height: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Petugas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelanggan,<br><br><br>';

$html.='<div style="text-align:left; line-height: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{diberikan_oleh}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{diterima_oleh},<br>';

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