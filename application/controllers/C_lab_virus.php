<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lab_virus extends CI_Controller {
    
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
        $this->load->model('Data_lab_virus');
        
    }
  
    public function index()
	{
            $this->load->view('V_lab_virus/umum/V_header');
            $this->load->view('V_lab_virus/umum/V_sidebar');
            $this->load->view('V_lab_virus/umum/V_top_navigasi');
            $this->load->view('V_lab_virus/V_form_virus');
            $this->load->view('V_lab_virus/V_data_virus');
            $this->load->view('V_lab_virus/umum/V_footer');
            
	}
        
       public function json() {
        header('Content-Type: application/json');
        echo $this->Data_lab_virus->json();
    
} 
public function ambil_data(){
            $ambil = $this->uri->segment(3);    
            $this->db->select('*');
            $this->db->from('customer_fpps');
            $this->db->where('record_number_customer',$ambil);
            $this->db->join('jenis_sample','record_number_sample = record_number_customer');
            $this->db->join('record_number','project_id = record_number_customer');
            $this->db->join('kaji_ulang_permintaan','record_number_kaji_ulang = record_number_customer');
            $this->db->join('data_nekropsi_virus','record_number_virus = record_number_customer','left');
            $this->db->join('parameter_penyakit','record_number_parameter = record_number_customer');
            $this->db->join('penjelasan_penerimaan_fpps','record_number_penjelasan = record_number_customer');
            $this->db->join('data_penerimaan_sample','record_number_penerimaan_sample = record_number_customer','left');
            $this->db->join('data_lab_virus','record_number_lab_virus = record_number_customer','left');
            $query = $this->db->get();
           
            foreach($query->result_array() as $cetak);{
             $id_customer = $cetak['id_customer_fpps_customer'];
             }

            $customer_id = $id_customer;
            $data_customer = $this->db->get_where('customer',['id_customer'=>$customer_id]);
            
            $data_penganalis = $this->db->get_where('data_penganalis',['record_number_penganalis'=>$ambil]);
            
            $this->load->view('V_lab_virus/umum/V_header');
            $this->load->view('V_lab_virus/umum/V_sidebar');
            $this->load->view('V_lab_virus/umum/V_top_navigasi');
            $this->load->view('V_lab_virus/V_ambil_virus',['data_customer'=>$data_customer,'query'=>$query,'data_penganalis'=>$data_penganalis]);
            $this->load->view('V_lab_virus/V_data_virus');
            $this->load->view('V_lab_virus/umum/V_footer');   
        }
          public function simpan(){
     $cek_record = $this->input->post('record_number');
        
       $cek= $this->db->get_where('data_lab_virus',['record_number_lab_virus'=>$cek_record]);
    
       foreach ($cek->result_array() as $hasil_cek){
        
         $cek_kosong = $hasil_cek['record_number_lab_virus'];
        }
       
        $gaada = $cek_kosong;
        
    if(isset($_POST['btn_virus']) &&  $cek_kosong == null){
        
            $daftar = array(
            'record_number_lab_virus'      => $this->input->post('record_number'),
            'virus_ditemukan'          => $this->input->post('virus_ditemukan'),
            'jumlah_virus'             => $this->input->post('jumlah_virus'),
           );
            $this->db->insert('data_lab_virus',$daftar);
            
            redirect('C_lab_virus');
        }elseif($gaada = !null) {
        
            $daftar = array(
            'record_number_lab_virus'      => $this->input->post('record_number'),
            'virus_ditemukan'          => $this->input->post('virus_ditemukan'),
            'jumlah_virus'             => $this->input->post('jumlah_virus'),
           );
            $this->db->where('record_number_lab_virus', $cek_record);
            $this->db->update('data_lab_virus',$daftar);
           redirect('C_lab_virus');
           
        
        }else{
            
            echo 'gagal menginsert dan update data' ;
      
        }   
      }

  
}