<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_nekropsi extends CI_Controller {
    
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
        
    }
  
    public function index()
	{
            $this->load->view('V_nekropsi/umum/V_header');
            $this->load->view('V_nekropsi/umum/V_sidebar');
            $this->load->view('V_nekropsi/umum/V_top_navigasi');
            $this->load->view('V_nekropsi/V_form_nekropsi');
            $this->load->view('V_nekropsi/V_data_nekropsi');
            $this->load->view('V_nekropsi/umum/V_footer');
            
	}
  public function json() {
        header('Content-Type: application/json');
        echo $this->Data_nekropsi->json();
    
     }
     public function ambil_data(){
            $ambil = $this->uri->segment(3);    
            $this->db->select('*');
            $this->db->from('customer_fpps');
            $this->db->where('record_number_customer',$ambil);
            $this->db->join('jenis_sample','record_number_sample = record_number_customer');
            $this->db->join('record_number','project_id = record_number_customer');
            $this->db->join('data_penerimaan_sample','record_number_penerimaan_sample = record_number_customer','left');
            $this->db->join('data_nekropsi','record_number_nekropsi = record_number_customer','left');
            $query = $this->db->get();
           
            foreach($query->result_array() as $cetak);{
             $id_customer = $cetak['id_customer_fpps_customer'];
             }

            $customer_id = $id_customer;
            $data_customer = $this->db->get_where('customer',['id_customer'=>$customer_id]);
            
            $this->load->view('V_nekropsi/umum/V_header');
            $this->load->view('V_nekropsi/umum/V_sidebar');
            $this->load->view('V_nekropsi/umum/V_top_navigasi');
            $this->load->view('V_nekropsi/V_ambil_nekropsi',['data_customer'=>$data_customer,'query'=>$query]);
            $this->load->view('V_nekropsi/V_data_nekropsi');
            $this->load->view('V_nekropsi/umum/V_footer');   
        }
        
        
        public function simpan (){
       $cek_record = $this->input->post('record_number');
        
       $cek= $this->db->get_where('data_nekropsi',['record_number_nekropsi'=>$cek_record]);
    
       foreach ($cek->result_array() as $hasil_cek){
        
         $cek_kosong = $hasil_cek['record_number_nekropsi'];
        }
       
        $gaada = $cek_kosong;
        
    if(isset($_POST['btn_anamnesa']) &&  $cek_kosong == null){
        
            $simpan_nekropsi = array(
            'record_number_nekropsi'        => $this->input->post('record_number'),
            'panjang'                       => $this->input->post('panjang'),
            'berat'                         => $this->input->post('berat'),
            'nekropsi_parasit'              => $this->input->post('nekropsi_parasit'),
            'nekropsi_bakteri'              => $this->input->post('nekropsi_bakteri'),
            'nekropsi_jamur'                => $this->input->post('nekropsi_jamur'),
            'nekropsi_virus'                => $this->input->post('nekropsi_virus'),
            'analis_nekropsi'                => $this->input->post('analis_nekropsi'),
            );
            $this->db->insert('data_nekropsi',$simpan_nekropsi);
            
            redirect('C_nekropsi');
    }elseif($gaada = !null) {
        
            $update_nekropsi = array(
            'record_number_nekropsi'        => $this->input->post('record_number'),
            'panjang'                       => $this->input->post('panjang'),
            'berat'                         => $this->input->post('berat'),
            'nekropsi_parasit'              => $this->input->post('nekropsi_parasit'),
            'nekropsi_bakteri'              => $this->input->post('nekropsi_bakteri'),
            'nekropsi_jamur'                => $this->input->post('nekropsi_jamur'),
            'nekropsi_virus'                => $this->input->post('nekropsi_virus'),
             'analis_nekropsi'                => $this->input->post('analis_nekropsi'),
            );
            $this->db->where('record_number_nekropsi', $cek_record);
            $this->db->update('data_nekropsi',$update_nekropsi);
           redirect('C_nekropsi');
           
        
        }else{
            
            echo 'gagal menginsert dan update data' ;
      
        }
            
            echo print_r($_POST);
    }
}