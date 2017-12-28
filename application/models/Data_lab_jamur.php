<?php

class Data_lab_jamur extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    function json() {
      
        $this->datatables->select('record_number_status_distribusi,'
                . 'customer_fpps.id_customer_fpps_customer as id_customer,'
                . 'jenis_sample.record_number_sample as record,'
                . 'customer.nama_customer as nama,'
                . 'data_penerimaan_sample.kode_sample as kode,'
                . 'jenis_sample.data_sample as sample,'
                . 'jenis_sample.tgl_penerimaan as tgl_terima,'
                . 'data_nekropsi_jamur.nekropsi_jamur as organ,'
                . 'data_lab_jamur.jamur_ditemukan as ditemukan,'
                . 'data_lab_jamur.jumlah_jamur as jumlah,'
                
                );
        $this->datatables->from('status_distribusi_jamur');
        $this->datatables->join('jenis_sample','jenis_sample.record_number_sample =status_distribusi_jamur.record_number_status_distribusi');
        $this->datatables->join('customer_fpps','customer_fpps.record_number_customer = status_distribusi_jamur.record_number_status_distribusi');
        $this->datatables->join('customer','customer.id_customer = customer_fpps.id_customer_fpps_customer','left');
        $this->datatables->join('parameter_penyakit','parameter_penyakit.record_number_parameter = status_distribusi_jamur.record_number_status_distribusi','left');
        $this->datatables->join('data_nekropsi_jamur','data_nekropsi_jamur.record_number_jamur = status_distribusi_jamur.record_number_status_distribusi','left');
        $this->datatables->join('data_penerimaan_sample','data_penerimaan_sample.record_number_penerimaan_sample =status_distribusi_jamur.record_number_status_distribusi','left');
        $this->datatables->join('data_lab_jamur','data_lab_jamur.record_number_lab_jamur = status_distribusi_jamur.record_number_status_distribusi','left');
        
        $this->datatables->add_column('view','<a class="btn btn-sm btn-warning " href="'.base_url().'C_lab_jamur/ambil_data/$1">GET</a>', 'record_number_status_distribusi');
        return $this->datatables->generate();
       
    }
}

?>