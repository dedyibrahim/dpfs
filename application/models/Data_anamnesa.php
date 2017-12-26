<?php

class Data_anamnesa extends CI_Model {
    
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
                . 'parameter_penyakit.identifikasi_virus as virus,'
                . 'parameter_penyakit.identifikasi_bakteri as bakteri,'
                . 'parameter_penyakit.identifikasi_parasit as parasit,'
                . 'parameter_penyakit.identifikasi_jamur as jamur,'
                . 'data_penerimaan_sample.kode_sample as kode,');
        $this->datatables->from('customer_fpps');
        $this->datatables->join('jenis_sample','jenis_sample.record_number_sample = customer_fpps.record_number_customer');
        $this->datatables->join('customer','customer.id_customer = customer_fpps.id_customer_fpps_customer');
        $this->datatables->join('parameter_penyakit','customer_fpps.record_number_customer = parameter_penyakit.record_number_parameter','left');
        $this->datatables->join('data_penerimaan_sample','customer_fpps.record_number_customer = data_penerimaan_sample.record_number_penerimaan_sample','left');
        $this->datatables->add_column('view','<a class="btn btn-xs btn-warning btn" href="'.base_url().'C_anamnesa/ambil_data/$1">Get</a>| <a class="btn btn-xs btn-success" href="'.base_url('C_anamnesa/').'cetak_anamnesa/$1">Print</a>', 'record_number_customer');
        return $this->datatables->generate();
        
    }
}

?>