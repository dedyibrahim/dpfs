<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_distribusi extends CI_Controller {
    
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
        $this->load->model('Data_distribusi_bakteri');
        
    }

        public function index()
	{
           
            $this->load->view('V_distribusi/umum/V_header');
            $this->load->view('V_distribusi/umum/V_sidebar');
            $this->load->view('V_distribusi/umum/V_top_navigasi');
            $this->load->view('V_distribusi/V_data_distribusi');
            $this->load->view('V_distribusi/umum/V_footer');
            
	     
        }
        
    public function json_bakteri() {
    
        header('Content-Type: application/json');
        echo $this->Data_distribusi_bakteri->json_bakteri();       
    }
    public function set_terdistribusi(){
        $data_set = "<a class='btn btn-sm btn-danger' href='C_distribusi/gagal_distribusi/'".$this->uri->segment(3)."'>TERDISTRIBUSI</a>";
        
        $set = array(
            'record_number_status_distribusi'            => $this->uri->segment(3),
            'status_bakteri'    => $data_set,
        );
         
        $this->db->insert('status_distribusi_bakteri',$set);
        
        redirect('C_distribusi');
        
    }
}