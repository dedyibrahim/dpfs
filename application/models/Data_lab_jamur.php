<?php

class Data_lab_jamur extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    function json() {
      /*  $this->datatables->select('record_number_customer,jenis_sample.record_number_sample as record ,'
                . 'customer.nama_customer as nama,'
                . 'jenis_sample.data_sample as sample,'
                . 'jenis_sample.tgl_penerimaan as tgl_terima,'
                . 'jenis_sample.jumlah_sample as jml_sample,'
                . 'jenis_sample.data_sample as sample,'
                . 'data_nekropsi.nekropsi_jamur as jamur,'
                . 'data_penerimaan_sample.kode_sample as kode,');
        $this->datatables->from('customer_fpps');
        $this->datatables->join('jenis_sample','jenis_sample.record_number_sample = customer_fpps.record_number_customer');
        $this->datatables->join('customer','customer.id_customer = customer_fpps.id_customer_fpps_customer');
        $this->datatables->join('data_nekropsi','customer_fpps.record_number_customer = data_nekropsi.record_number_nekropsi','left');
        $this->datatables->join('data_penerimaan_sample','customer_fpps.record_number_customer = data_penerimaan_sample.record_number_penerimaan_sample','left');
        $this->datatables->add_column('view','<a class="btn btn-xs btn-warning btn" href="'.base_url().'C_nekropsi/ambil_data/$1">Get</a> ', 'record_number_customer');
        return $this->datatables->generate();
      */ 
        
        $this->datatables->select('record_number_nekropsi,data_nekropsi.nekropsi_jamur as jamur');
        $this->datatables->from('data_nekropsi');
        $this->datatables->join('jenis_sample','jenis_sample.record_number_sample = data_nekropsi.record_number_nekropsi');
       // $this->datatables->join('data_penerimaan_sample','data_penerimaan_sample.record_number_penerimaan_sample = data_nekropsi.record_number_nekropsi','left');
        $this->datatables->add_column('view','<a class="btn btn-xs btn-warning btn" href="'.base_url().'C_nekropsi/ambil_data/$1">Get</a> ', 'record_number_customer');
        return $this->datatables->generate();  
        
    }
}

?>