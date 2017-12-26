<?php

class Data_distribusi_bakteri extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    function json_bakteri() {
      
        $this->datatables->select('record_number_bakteri,'
                   . 'customer_fpps.id_customer_fpps_customer as id_customer,'
                . 'jenis_sample.record_number_sample as record,'
                . 'customer.nama_customer as nama,'
                . 'data_nekropsi_bakteri.nekropsi_bakteri as data_bakteri,'
               . 'data_penerimaan_sample.kode_sample as kode,'
                . 'jenis_sample.data_sample as sample,'
                . 'jenis_sample.tgl_penerimaan as tgl_terima,'
                . 'jenis_sample.jumlah_sample as jml_sample,'
                . 'jenis_sample.data_sample as sample,'
               . 'parameter_penyakit.identifikasi_bakteri as bakteri,'
                . 'status_distribusi_bakteri.status_bakteri as status,'
                
                );
        $this->datatables->from('data_nekropsi_bakteri');
        $this->datatables->join('jenis_sample','jenis_sample.record_number_sample =data_nekropsi_bakteri.record_number_bakteri');
        $this->datatables->join('customer_fpps','customer_fpps.record_number_customer = data_nekropsi_bakteri.record_number_bakteri');
        $this->datatables->join('customer','customer.id_customer = customer_fpps.id_customer_fpps_customer','left');
        $this->datatables->join('parameter_penyakit','parameter_penyakit.record_number_parameter = data_nekropsi_bakteri.record_number_bakteri','left');
       $this->datatables->join('status_distribusi_bakteri','status_distribusi_bakteri.record_number_status_distribusi =data_nekropsi_bakteri.record_number_bakteri','left');
       $this->datatables->join('data_penerimaan_sample','data_penerimaan_sample.record_number_penerimaan_sample =data_nekropsi_bakteri.record_number_bakteri','left');
        
        $this->datatables->add_column('view','<a class="btn btn-sm btn-warning " href="'.base_url().'C_distribusi/set_terdistribusi/$1">DISTRIBUSIKAN</a>', 'record_number_bakteri');
        return $this->datatables->generate();
       
    }
}

?>