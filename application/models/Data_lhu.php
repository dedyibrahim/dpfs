
<?php

class Data_lhu extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    function json() {
        $this->datatables->select('record_number_customer,customer.nama_customer as nama,customer.telp as telpon,jenis_sample.data_sample as sample,jenis_sample.tgl_penerimaan as tgl_terima,jenis_sample.tgl_sampling as tgl_sampling,jenis_sample.jumlah_sample as jml_sample');
        $this->datatables->from('customer_fpps');
        $this->datatables->join('customer','customer.id_customer = customer_fpps.id_customer_fpps_customer');
        $this->datatables->join('jenis_sample','jenis_sample.record_number_sample = customer_fpps.record_number_customer');
         $this->datatables->add_column('view','<a class=" btn  btn-primary btn-md fa fa-print" href="'.base_url().'C_manajer/cetak_lhu/$1"> Cetak LHU</a>', 'record_number_customer'); 
         return $this->datatables->generate();
        
    }
}

?>



