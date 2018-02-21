<?php

class Data_penjualan extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    function json_penjualan() {
        $this->datatables->select('id_invoices_customer_data,'
                . 'data_jumlah_invoices.id_invoices_jumlah as id_jumlah,'
                . 'data_customer_invoices.nama_customer as nama,'
                . 'data_customer_invoices.telp as telpon,'
                . 'data_customer_invoices.ship as pengiriman,'
                . 'data_customer_invoices.waktu as waktu,'
                . 'data_customer_invoices.cashier as kasir,'
                . 'data_jumlah_invoices.total as total,'
                
                );
        
        $this->datatables->from('data_customer_invoices');
        $this->datatables->join('data_jumlah_invoices','data_jumlah_invoices.id_invoices_jumlah = data_customer_invoices.id_invoices_customer_data');
        $this->datatables->add_column('view','<a class="btn btn-sm btn-warning fa fa-edit " href="'.base_url().'C_pos/edit_penjualan/$1"></a>', 'id_invoices_customer_data');
        return $this->datatables->generate();
       
    }
}
    ?>