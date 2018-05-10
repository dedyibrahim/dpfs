<?php
class M_produk extends CI_Model{
    public function __construct() {
        parent::__construct();
$this->load->helper('url');
  $this->load->helper('form');
       $this->load->database();
             
    }
function get_allproduk($term) {
$this->db->from('data_produk_ditoko');
$this->db->limit(9);
$this->db->like("nama_produk",$term); //untuk filter
$query = $this->db->get();

//cek apakah ada data
if ($query->num_rows() > 0) { //jika ada maka jalankan
return $query->result();
}

}
}