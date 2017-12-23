<?php

class Data_anamnesa extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    function json() {
        $this->datatables->select('record_number_customer,jenis_sample.record_number_sample as record ,customer.nama_customer as nama,customer.telp as telpon,jenis_sample.data_sample as sample,jenis_sample.tgl_penerimaan as tgl_terima,jenis_sample.tgl_sampling as tgl_sampling,jenis_sample.jumlah_sample as jml_sample,jenis_sample.data_sample as sample,'
                . 'penerimaan_sample.no_urut as no_antrian,'
                . 'penerimaan_sample.bakteri_penerimaan_sample as bakteri,'
                . 'penerimaan_sample.parasit_penerimaan_sample as parasit,'
                . 'penerimaan_sample.jamur_penerimaan_sample as jamur,'
                . 'penerimaan_sample.virus_penerimaan_sample as virus,'
                . 'penerimaan_sample.logam_penerimaan_sample as logam,'
                . 'penerimaan_sample.kode_contoh_uji as kode');
        $this->datatables->from('customer_fpps');
        $this->datatables->join('jenis_sample','jenis_sample.record_number_sample = customer_fpps.record_number_customer');
        $this->datatables->join('customer','customer.id_customer = customer_fpps.id_customer_fpps_customer');
        $this->datatables->join('penerimaan_sample','customer_fpps.record_number_customer = penerimaan_sample.record_number_penerimaan_sample','left');
        $this->datatables->add_column('view','<a class="btn btn-xs btn-warning btn " href="edit/$1">edit</a>| <a class="btn btn-xs btn-danger" href="hapus_fpps/$1">delete</a>| <a class="btn btn-xs btn-success" href="cetak_fpps/$1">print</a>', 'record_number_customer');
        return $this->datatables->generate();
        
    }
}

?>