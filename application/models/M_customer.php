<?php
class M_customer extends CI_Model{
    public function __construct() {
        parent::__construct();
$this->load->helper('url');
  $this->load->helper('form');
       $this->load->database();
             
    }
 function get_allcustomer($term) {
$this->db->from('customer');
$this->db->limit(5);
$this->db->like("nama_customer",$term); //untuk filter
$query = $this->db->get();

//cek apakah ada data
if ($query->num_rows() > 0) { //jika ada maka jalankan
return $query->result();
}

}
}