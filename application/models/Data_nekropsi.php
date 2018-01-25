<?php

class Data_nekropsi extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    function json() {
        $this->datatables->select('record_number_customer,jenis_sample.record_number_sample as record ,'
                . 'customer.nama_customer as nama,'
                . 'jenis_sample.data_sample as sample,'
                . 'jenis_sample.tgl_penerimaan as tgl_terima,'
                . 'jenis_sample.jumlah_sample as jml_sample,'
                . 'jenis_sample.data_sample as sample,'
                . 'data_nekropsi_parasit.nekropsi_parasit as parasit,'
                . 'data_nekropsi_jamur.nekropsi_jamur as jamur,'
                . 'data_nekropsi_bakteri.nekropsi_bakteri as bakteri,'
                . 'data_nekropsi_virus.nekropsi_virus as virus,'
                . 'data_penerimaan_sample.kode_sample as kode,');
        $this->datatables->from('customer_fpps');
        $this->datatables->join('jenis_sample','jenis_sample.record_number_sample = customer_fpps.record_number_customer');
        $this->datatables->join('customer','customer.id_customer = customer_fpps.id_customer_fpps_customer');
        $this->datatables->join('data_nekropsi','customer_fpps.record_number_customer = data_nekropsi.record_number_nekropsi','left');
        $this->datatables->join('data_nekropsi_jamur','customer_fpps.record_number_customer = data_nekropsi_jamur.record_number_jamur','left');
        $this->datatables->join('data_nekropsi_bakteri','customer_fpps.record_number_customer = data_nekropsi_bakteri.record_number_bakteri','left');
        $this->datatables->join('data_nekropsi_parasit','customer_fpps.record_number_customer = data_nekropsi_parasit.record_number_parasit','left');
        $this->datatables->join('data_nekropsi_virus','customer_fpps.record_number_customer = data_nekropsi_virus.record_number_virus','left');
        $this->datatables->join('data_penerimaan_sample','customer_fpps.record_number_customer = data_penerimaan_sample.record_number_penerimaan_sample','left');
        $this->datatables->add_column('view','<a class="btn btn-md btn-warning btn" href="'.base_url().'C_nekropsi/ambil_data/$1">Get</a> ', 'record_number_customer');
        return $this->datatables->generate();
        
    }
}

?>