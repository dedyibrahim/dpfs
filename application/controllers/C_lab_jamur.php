<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lab_jamur extends CI_Controller {
    
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
        $this->load->model('Data_lab_jamur');
        
    }
  
    public function index()
	{
            $this->load->view('V_lab_jamur/umum/V_header');
            $this->load->view('V_lab_jamur/umum/V_sidebar');
            $this->load->view('V_lab_jamur/umum/V_top_navigasi');
            $this->load->view('V_lab_jamur/V_form_jamur');
            $this->load->view('V_lab_jamur/V_data_jamur');
            $this->load->view('V_lab_jamur/umum/V_footer');
            
	}
     public function json() {
        header('Content-Type: application/json');
        echo $this->Data_lab_jamur->json();
    
}
   public function ambil_data(){
            $ambil = $this->uri->segment(3);    
            $this->db->select('*');
            $this->db->from('customer_fpps');
            $this->db->where('record_number_customer',$ambil);
            $this->db->join('jenis_sample','record_number_sample = record_number_customer');
            $this->db->join('record_number','project_id = record_number_customer');
            $this->db->join('kaji_ulang_permintaan','record_number_kaji_ulang = record_number_customer');
            $this->db->join('data_nekropsi_jamur','record_number_jamur = record_number_customer');
            $this->db->join('parameter_penyakit','record_number_parameter = record_number_customer');
            $this->db->join('penjelasan_penerimaan_fpps','record_number_penjelasan = record_number_customer');
            $this->db->join('data_penerimaan_sample','record_number_penerimaan_sample = record_number_customer','left');
            $this->db->join('data_lab_jamur','record_number_lab_jamur = record_number_customer','left');
            $query = $this->db->get();
           
            foreach($query->result_array() as $cetak);{
             $id_customer = $cetak['id_customer_fpps_customer'];
             }

            $customer_id = $id_customer;
            $data_customer = $this->db->get_where('customer',['id_customer'=>$customer_id]);
            
            $data_penganalis = $this->db->get_where('data_penganalis',['record_number_penganalis'=>$ambil]);
            
            $this->load->view('V_lab_jamur/umum/V_header');
            $this->load->view('V_lab_jamur/umum/V_sidebar');
            $this->load->view('V_lab_jamur/umum/V_top_navigasi');
           $this->load->view('V_lab_jamur/V_ambil_jamur',['data_customer'=>$data_customer,'query'=>$query,'data_penganalis'=>$data_penganalis]);
            $this->load->view('V_lab_jamur/V_data_jamur');
            $this->load->view('V_lab_jamur/umum/V_footer');   
        }
        
      public function simpan(){
     $cek_record = $this->input->post('record_number');
        
       $cek= $this->db->get_where('data_lab_jamur',['record_number_lab_jamur'=>$cek_record]);
    
       foreach ($cek->result_array() as $hasil_cek){
        
         $cek_kosong = $hasil_cek['record_number_lab_jamur'];
        }
       
        $gaada = $cek_kosong;
        
    if(isset($_POST['btn_jamur']) &&  $cek_kosong == null){
        
            $daftar = array(
            'record_number_lab_jamur'      => $this->input->post('record_number'),
            'jamur_ditemukan'          => $this->input->post('jamur_ditemukan'),
            'jumlah_jamur'             => $this->input->post('jumlah_jamur'),
           );
            $this->db->insert('data_lab_jamur',$daftar);
            
            redirect('C_lab_jamur');
        }elseif($gaada = !null) {
        
            $daftar = array(
            'record_number_lab_bakteri'      => $this->input->post('record_number'),
            'bakteri_ditemukan'          => $this->input->post('bakteri_ditemukan'),
            'jumlah_bakteri'             => $this->input->post('jumlah_bakteri'),
           );
            $this->db->where('record_number_lab_jamur', $cek_record);
            $this->db->update('data_lab_jamur',$daftar);
           redirect('C_lab_jamur');
           
        
        }else{
            
            echo 'gagal menginsert dan update data' ;
      
        }   
      }
}