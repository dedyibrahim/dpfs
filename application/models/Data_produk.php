<?php

class Data_produk extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    function json() {
        $this->datatables->select('record_number_customer,jenis_sample.record_number_sample as record ,'
                . 'customer.nama_customer as nama,');
        $this->datatables->from('produk');
        $this->datatables->add_column('view','<a class="btn btn-md btn-warning btn" href="'.base_url().'C_manajer/ambil_data/$1">Get</a> ', 'record_number_customer');
        return $this->datatables->generate();
        
    }
      

}

?>