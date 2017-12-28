<?php

class Data_distribusi extends CI_Model {
    
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
                . 'data_nekropsi.analis_nekropsi as analis,'
                
                );
        $this->datatables->from('data_nekropsi_bakteri');
        $this->datatables->join('jenis_sample','jenis_sample.record_number_sample =data_nekropsi_bakteri.record_number_bakteri');
        $this->datatables->join('customer_fpps','customer_fpps.record_number_customer = data_nekropsi_bakteri.record_number_bakteri');
        $this->datatables->join('customer','customer.id_customer = customer_fpps.id_customer_fpps_customer','left');
        $this->datatables->join('parameter_penyakit','parameter_penyakit.record_number_parameter = data_nekropsi_bakteri.record_number_bakteri','left');
       $this->datatables->join('status_distribusi_bakteri','status_distribusi_bakteri.record_number_status_distribusi =data_nekropsi_bakteri.record_number_bakteri','left');
       $this->datatables->join('data_penerimaan_sample','data_penerimaan_sample.record_number_penerimaan_sample =data_nekropsi_bakteri.record_number_bakteri','left');
       $this->datatables->join('data_nekropsi','data_nekropsi.record_number_nekropsi =data_nekropsi_bakteri.record_number_bakteri','left');
        
        $this->datatables->add_column('view','<a class="btn btn-sm btn-warning " href="'.base_url().'C_manajer/set_terdistribusi_bakteri/$1">DISTRIBUSIKAN</a>', 'record_number_bakteri');
        return $this->datatables->generate();
       
    }

     function json_jamur() {
      
        $this->datatables->select('record_number_jamur,'
                . 'customer_fpps.id_customer_fpps_customer as id_customer,'
                . 'jenis_sample.record_number_sample as record,'
                . 'customer.nama_customer as nama,'
                . 'data_nekropsi_jamur.nekropsi_jamur as data_jamur,'
                . 'data_penerimaan_sample.kode_sample as kode,'
                . 'jenis_sample.data_sample as sample,'
                . 'jenis_sample.tgl_penerimaan as tgl_terima,'
                . 'jenis_sample.jumlah_sample as jml_sample,'
                . 'jenis_sample.data_sample as sample,'
                . 'parameter_penyakit.identifikasi_jamur as jamur,'
               . 'status_distribusi_jamur.status_jamur as status,'
                
                );
        $this->datatables->from('data_nekropsi_jamur');
        $this->datatables->join('jenis_sample','jenis_sample.record_number_sample =data_nekropsi_jamur.record_number_jamur');
        $this->datatables->join('customer_fpps','customer_fpps.record_number_customer = data_nekropsi_jamur.record_number_jamur');
        $this->datatables->join('customer','customer.id_customer = customer_fpps.id_customer_fpps_customer','left');
        $this->datatables->join('parameter_penyakit','parameter_penyakit.record_number_parameter = data_nekropsi_jamur.record_number_jamur','left');
       $this->datatables->join('status_distribusi_jamur','status_distribusi_jamur.record_number_status_distribusi =data_nekropsi_jamur.record_number_jamur','left');
       $this->datatables->join('data_penerimaan_sample','data_penerimaan_sample.record_number_penerimaan_sample =data_nekropsi_jamur.record_number_jamur','left');
        
        $this->datatables->add_column('view','<a class="btn btn-sm btn-warning " href="'.base_url().'C_manajer/set_terdistribusi_jamur/$1">DISTRIBUSIKAN</a>', 'record_number_jamur');
        return $this->datatables->generate();
       
    }
    
    
      function json_parasit() {
      
        $this->datatables->select('record_number_parasit,'
                . 'customer_fpps.id_customer_fpps_customer as id_customer,'
                . 'jenis_sample.record_number_sample as record,'
                . 'customer.nama_customer as nama,'
                . 'data_nekropsi_parasit.nekropsi_parasit as data_parasit,'
                . 'data_penerimaan_sample.kode_sample as kode,'
                . 'jenis_sample.data_sample as sample,'
                . 'jenis_sample.tgl_penerimaan as tgl_terima,'
                . 'jenis_sample.jumlah_sample as jml_sample,'
                . 'jenis_sample.data_sample as sample,'
                . 'parameter_penyakit.identifikasi_parasit as parasit,'
               . 'status_distribusi_parasit.status_parasit as status,'
                
                );
        $this->datatables->from('data_nekropsi_parasit');
        $this->datatables->join('jenis_sample','jenis_sample.record_number_sample =data_nekropsi_parasit.record_number_parasit');
        $this->datatables->join('customer_fpps','customer_fpps.record_number_customer = data_nekropsi_parasit.record_number_parasit');
        $this->datatables->join('customer','customer.id_customer = customer_fpps.id_customer_fpps_customer','left');
        $this->datatables->join('parameter_penyakit','parameter_penyakit.record_number_parameter = data_nekropsi_parasit.record_number_parasit','left');
       $this->datatables->join('status_distribusi_parasit','status_distribusi_parasit.record_number_status_distribusi =data_nekropsi_parasit.record_number_parasit','left');
       $this->datatables->join('data_penerimaan_sample','data_penerimaan_sample.record_number_penerimaan_sample =data_nekropsi_parasit.record_number_parasit','left');
        
        $this->datatables->add_column('view','<a class="btn btn-sm btn-warning " href="'.base_url().'C_manajer/set_terdistribusi_parasit/$1">DISTRIBUSIKAN</a>', 'record_number_parasit');
        return $this->datatables->generate();
       
    }
    function json_virus() {
      
        $this->datatables->select('record_number_virus,'
                . 'customer_fpps.id_customer_fpps_customer as id_customer,'
                . 'jenis_sample.record_number_sample as record,'
                . 'customer.nama_customer as nama,'
                . 'data_nekropsi_virus.nekropsi_virus as data_virus,'
                . 'data_penerimaan_sample.kode_sample as kode,'
                . 'jenis_sample.data_sample as sample,'
                . 'jenis_sample.tgl_penerimaan as tgl_terima,'
                . 'jenis_sample.jumlah_sample as jml_sample,'
                . 'jenis_sample.data_sample as sample,'
                . 'parameter_penyakit.identifikasi_virus as virus,'
               . 'status_distribusi_virus.status_virus as status,'
                
                );
        $this->datatables->from('data_nekropsi_virus');
        $this->datatables->join('jenis_sample','jenis_sample.record_number_sample =data_nekropsi_virus.record_number_virus');
        $this->datatables->join('customer_fpps','customer_fpps.record_number_customer = data_nekropsi_virus.record_number_virus');
        $this->datatables->join('customer','customer.id_customer = customer_fpps.id_customer_fpps_customer','left');
        $this->datatables->join('parameter_penyakit','parameter_penyakit.record_number_parameter = data_nekropsi_virus.record_number_virus','left');
       $this->datatables->join('status_distribusi_virus','status_distribusi_virus.record_number_status_distribusi =data_nekropsi_virus.record_number_virus','left');
       $this->datatables->join('data_penerimaan_sample','data_penerimaan_sample.record_number_penerimaan_sample =data_nekropsi_virus.record_number_virus','left');
        
        $this->datatables->add_column('view','<a class="btn btn-sm btn-warning " href="'.base_url().'C_manajer/set_terdistribusi_virus/$1">DISTRIBUSIKAN</a>', 'record_number_virus');
        return $this->datatables->generate();
       
    }
    }

?>