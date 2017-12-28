<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lab_bakteri extends CI_Controller {
    
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
        $this->load->model('Data_lab_bakteri');
        
    }
  
    public function index()
	{
            $this->load->view('V_lab_bakteri/umum/V_header');
            $this->load->view('V_lab_bakteri/umum/V_sidebar');
            $this->load->view('V_lab_bakteri/umum/V_top_navigasi');
            $this->load->view('V_lab_bakteri/V_form_bakteri');
            $this->load->view('V_lab_bakteri/V_data_bakteri');
            $this->load->view('V_lab_bakteri/umum/V_footer');
            
	}
        
        public function json() {
        header('Content-Type: application/json');
        echo $this->Data_lab_bakteri->json();
    
     }
       public function ambil_data(){
            $ambil = $this->uri->segment(3);    
            $this->db->select('*');
            $this->db->from('customer_fpps');
            $this->db->where('record_number_customer',$ambil);
            $this->db->join('jenis_sample','record_number_sample = record_number_customer');
            $this->db->join('record_number','project_id = record_number_customer');
            $this->db->join('kaji_ulang_permintaan','record_number_kaji_ulang = record_number_customer');
            $this->db->join('data_nekropsi_bakteri','record_number_bakteri = record_number_customer');
            $this->db->join('parameter_penyakit','record_number_parameter = record_number_customer');
            $this->db->join('penjelasan_penerimaan_fpps','record_number_penjelasan = record_number_customer');
            $this->db->join('data_penerimaan_sample','record_number_penerimaan_sample = record_number_customer','left');
            $query = $this->db->get();
           
            foreach($query->result_array() as $cetak);{
             $id_customer = $cetak['id_customer_fpps_customer'];
             }

            $customer_id = $id_customer;
            $data_customer = $this->db->get_where('customer',['id_customer'=>$customer_id]);
            
            $this->load->view('V_lab_bakteri/umum/V_header');
            $this->load->view('V_lab_bakteri/umum/V_sidebar');
            $this->load->view('V_lab_bakteri/umum/V_top_navigasi');
            $this->load->view('V_lab_bakteri/V_ambil_bakteri',['data_customer'=>$data_customer,'query'=>$query]);
            $this->load->view('V_lab_bakteri/V_data_bakteri');
            $this->load->view('V_lab_bakteri/umum/V_footer');   
        }
 
        
       public function simpan(){
        
        if(isset($_POST['btn_bakteri'])){
            
            $daftar = array(
            'record_number_lab_bakteri'      => $this->input->post('record_number'),
            'bakteri_ditemukan'          => $this->input->post('bakteri_ditemukan'),
            'jumlah_bakteri'             => $this->input->post('jumlah_bakteri'),
           );
            $this->db->insert('data_lab_bakteri',$daftar);
            
            redirect('C_lab_bakteri');
        }else{
            redirect('C_lab_bakteri');
        }
        
    }  
}