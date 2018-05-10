<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_informasi extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
       $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('datatables');
        $this->load->helper('url');
      
        
    }
    public function index(){
        
        redirect(base_url());  
    }
    public function tentang_kami(){
        
     $this->load->view('Toko/umum/V_header');
     $this->load->view('Toko/V_informasi');
     $this->load->view('Toko/umum/V_footer');
        
    }
     public function kebijakan_privasi(){
        
     $this->load->view('Toko/umum/V_header');
     $this->load->view('Toko/V_kebijakan_privasi');
     $this->load->view('Toko/umum/V_footer');
        
    }
    
}