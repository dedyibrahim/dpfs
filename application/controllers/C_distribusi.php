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
        $this->load->model('Data_anamnesa');
        
    }

        public function index()
	{
           
            $this->load->view('V_distribusi/umum/V_header');
            $this->load->view('V_distribusi/umum/V_sidebar');
            $this->load->view('V_distribusi/umum/V_top_navigasi');
            $this->load->view('V_distribusi/V_form_distribusi');
            $this->load->view('V_distribusi/V_data_distribusi');
            $this->load->view('V_distribusi/umum/V_footer');
            
	     
        }
}