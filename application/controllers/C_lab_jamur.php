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
        $this->load->model('Data_nekropsi');
        
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
  
}