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
        $this->load->model('Data_distribusi');
        
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
        
        redirect('C_distribusi');
       
        }elseif ($ok==!null || $ok == 0) {
            
        $this->db->delete('status_distribusi_bakteri',['record_number_status_distribusi'=>$query]);
        redirect('C_distribusi');  
            
        }else{
            
            redirect('C_distribusi');
            
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
        
        redirect('C_distribusi');
       
        }elseif ($ok==!null || $ok == 0) {
            
        $this->db->delete('status_distribusi_jamur',['record_number_status_distribusi'=>$query]);
        redirect('C_distribusi');  
            
        }else{
            
            redirect('C_distribusi');
            
        }
    }
}