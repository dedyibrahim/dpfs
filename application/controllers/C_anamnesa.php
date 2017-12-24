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
            
            $query =  $this->db->get_where('customer_fpps',['record_number_customer'=>$ambil]);
            
            foreach($query->result_array() as $cetak);{
            $id_customer = $cetak['id_customer_fpps_customer'];
            $record= $cetak['record_number_customer'];
            }
            
            $customer_id = $id_customer;
            $data_customer = $this->db->get_where('customer',['id_customer'=>$customer_id]);
            
            $record_number_customer= $record;
            $sample = $this->db->get_where('jenis_sample',['record_number_sample'=>$record_number_customer]);
            
            $this->load->view('V_anamnesa/umum/V_header');
            $this->load->view('V_anamnesa/umum/V_sidebar');
            $this->load->view('V_anamnesa/umum/V_top_navigasi');
            $this->load->view('V_anamnesa/V_ambil_anamnesa',['data_customer'=>$data_customer,'query'=>$query,'sample'=>$sample]);
            $this->load->view('V_anamnesa/V_data_anamnesa');
            $this->load->view('V_anamnesa/umum/V_footer');   
        }


        public function json() {
        header('Content-Type: application/json');
        echo $this->Data_anamnesa->json();       
        }      
        
        public function simpan(){
       $cek_record = $this->input->post('record_number');
        
       $cek= $this->db->get_where('penerimaan_sample',['record_number_penerimaan_sample'=>$cek_record]);
    
       foreach ($cek->result_array() as $hasil_cek){
        
         $cek_kosong = $hasil_cek['record_number_penerimaan_sample'];
        }
       
        $gaada = $cek_kosong;
       
    if(isset($_POST['btn_anamnesa']) &&  $cek_kosong == null){
            $simpan_penerimaan_sample = array(
            'record_number_penerimaan_sample'                  => $this->input->post('record_number'),
            'no_urut'                                          => $this->input->post('no_urut'),
            'kode_contoh_uji'                                  => $this->input->post('kode_contoh_uji'),
            'bakteri_penerimaan_sample'                         => !empty($this->input->post('bakteri_penerimaan_sample'))? $this->input->post('bakteri_penerimaan_sample'):0,
            'parasit_penerimaan_sample'                         => !empty($this->input->post('parasit_penerimaan_sample')?'parasit_penerimaan_sample':0),
            'jamur_penerimaan_sample'                           => !empty($this->input->post('jamur_penerimaan_sample')?'jamur_penerimaan_sample':0),
            'virus_penerimaan_sample'                           => !empty($this->input->post('virus_penerimaan_sample')?'virus_penerimaan_sample':0),
            'logam_penerimaan_sample'                           => !empty($this->input->post('logam_penerimaan_sample')?'logam_penerimaan_sample':0),
            'other_penerimaan_sample'                           => !empty($this->input->post('other_penerimaan_sample')?'other_penerimaan_sample':0),
               );
            $this->db->insert('penerimaan_sample',$simpan_penerimaan_sample);
            
            redirect('C_anamnesa/insert');
        }elseif($gaada = !null) {
        
            $update_penerimaan_sample = array(
            'record_number_penerimaan_sample'                  => $this->input->post('record_number'),
            'no_urut'                                          => $this->input->post('no_urut'),
            'kode_contoh_uji'                                  => $this->input->post('kode_contoh_uji'),
            'bakteri_penerimaan_sample'                         => !empty($this->input->post('bakteri_penerimaan_sample'))? $this->input->post('bakteri_penerimaan_sample'):0,
            'parasit_penerimaan_sample'                         => !empty($this->input->post('parasit_penerimaan_sample')?'parasit_penerimaan_sample':0),
            'jamur_penerimaan_sample'                           => !empty($this->input->post('jamur_penerimaan_sample')?'jamur_penerimaan_sample':0),
            'virus_penerimaan_sample'                           => !empty($this->input->post('virus_penerimaan_sample')?'virus_penerimaan_sample':0),
            'logam_penerimaan_sample'                           => !empty($this->input->post('logam_penerimaan_sample')?'logam_penerimaan_sample':0),
            'other_penerimaan_sample'                           => !empty($this->input->post('other_penerimaan_sample')?'other_penerimaan_sample':0),
           );
            $this->db->where('record_number_penerimaan_sample', $cek_record);
            $this->db->update('penerimaan_sample',$update_penerimaan_sample);
           redirect('C_anamnesa/update');
           
        
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

$html = '<span align="center" style="font-size: 19px;" ><u>INFORMASI ANAMNESA SAMPEL</u></span><br>';

$html.='<div style="text-align:left; line-height: 25px;">Nama Pelanggan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {nama_customer}<br>
Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {alamat}<br>
Telp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {telp}<br>
Jumlah Sample&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {jumlah_sample}<br>
Deskripsi Sample&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {deskripsi_sample}<br>
Dalam bentuuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {bentuk}<br>
Tanggal penerimaan sample&nbsp;&nbsp;: {tgl_penerimaan}<br>
Tanggal sampling&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {tgl_sampling}<br></div>';

$html.='<div style="text-align:left; line-height: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Petugas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelanggan,<br><br><br>';

$html.='<div style="text-align:left; line-height: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{diberikan_oleh}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{diterima_oleh},<br>';



$ambil = $this->uri->segment(3);    
$this->db->select('*');
$this->db->from('customer_fpps');
$this->db->where('record_number_customer',$ambil);
$this->db->join('jenis_sample','record_number_sample = record_number_customer');
$this->db->join('record_number','project_id = record_number_customer');
$this->db->join('kaji_ulang_permintaan','record_number_kaji_ulang = record_number_customer');
$this->db->join('penguji_subkontrak','record_number_penguji_subkontrak = record_number_customer');
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
     $html = str_replace('{kesesuaian_metode}',$cetak['kesesuaian_metode'],$html);
     $html = str_replace('{kesesuaian_biaya}',$cetak['kesesuaian_biaya'],$html);
     $html = str_replace('{nama_lab_subkontrak}',$cetak['nama_lab_subkontrak'],$html);
     $html = str_replace('{kesimpulan}',$cetak['kesimpulan'],$html);
     $html = str_replace('{parameter_penyakit_ikan}',$cetak['parameter_penyakit_ikan'],$html);
     $html = str_replace('{diberikan_oleh}',$cetak['diberikan_oleh'],$html);
     $html = str_replace('{diterima_oleh}',$cetak['diterima_oleh'],$html);
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