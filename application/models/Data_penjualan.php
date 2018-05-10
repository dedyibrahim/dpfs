<?php

class Data_penjualan extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    function json_penjualan_produk() {
        $this->datatables->select('id_invoices_customer_data,'
                . 'data_jumlah_invoices.id_invoices_jumlah as id_jumlah,'
                . 'data_customer_invoices.id_invoices_customer_data as no_inv,'
                . 'data_customer_invoices.nama_customer as nama,'
                . 'data_customer_invoices.telp as telpon,'
                . 'data_customer_invoices.ship as pengiriman,'
                . 'data_customer_invoices.waktu as waktu,'
                . 'data_customer_invoices.cashier as kasir,'
                 . 'data_customer_invoices.status as status,'
              
                . 'data_jumlah_invoices.total as total,'
                
                );
        $this->datatables->where('status','SELESAI');
        $this->datatables->from('data_customer_invoices');
        $this->datatables->join('data_jumlah_invoices','data_jumlah_invoices.id_invoices_jumlah = data_customer_invoices.id_invoices_customer_data');
        $this->datatables->add_column('view','<a class="btn btn-sm btn-warning fa fa-edit " href="'.base_url().'C_produk/edit_penjualan/$1"> Konfirmasi</a>', 'id_invoices_customer_data');
        return $this->datatables->generate();
       
    }
    function json_penjualan_pos() {
        $this->datatables->select('id_invoices_customer_data,'
                . 'data_jumlah_invoices.id_invoices_jumlah as id_jumlah,'
                . 'data_customer_invoices.id_invoices_customer_data as no_inv,'
                . 'data_customer_invoices.nama_customer as nama,'
                . 'data_customer_invoices.telp as telpon,'
                . 'data_customer_invoices.ship as pengiriman,'
                . 'data_customer_invoices.waktu as waktu,'
                . 'data_customer_invoices.cashier as kasir,'
                . 'data_customer_invoices.status as status,'
                . 'data_jumlah_invoices.total as total,'
                
                );
        $this->datatables->where('status','SELESAI');
        $this->datatables->from('data_customer_invoices');
        $this->datatables->join('data_jumlah_invoices','data_jumlah_invoices.id_invoices_jumlah = data_customer_invoices.id_invoices_customer_data');
        $this->datatables->add_column('view','<a class="btn btn-sm btn-success fa fa-print " href="'.base_url().'C_pos/cetak_struk/$1"></a>|| <a class="btn btn-sm btn-success fa fa-print " href="'.base_url().'C_pos/cetak_A4/$1"> A4 </a> <a class="btn btn-sm btn-primary fa fa-eye " href="'.base_url().'C_pos/lihat_penjualan/$1"></a>  ', 'id_invoices_customer_data');
        return $this->datatables->generate();
       
    }
    function json_edit_pos() {
        $this->datatables->select('id_invoices_customer_data,'
                . 'data_jumlah_invoices.id_invoices_jumlah as id_jumlah,'
                . 'data_customer_invoices.id_invoices_customer_data as no_inv,'
                . 'data_customer_invoices.nama_customer as nama,'
                . 'data_customer_invoices.telp as telpon,'
                . 'data_customer_invoices.ship as pengiriman,'
                . 'data_customer_invoices.waktu as waktu,'
                . 'data_customer_invoices.cashier as kasir,'
                . 'data_customer_invoices.status as status,'
                . 'data_jumlah_invoices.total as total,'
                
                );
        
        $this->datatables->where('status','EDIT');
        $this->datatables->from('data_customer_invoices');
        $this->datatables->join('data_jumlah_invoices','data_jumlah_invoices.id_invoices_jumlah = data_customer_invoices.id_invoices_customer_data');
        $this->datatables->add_column('view','<a class="btn btn-sm btn-warning fa fa-edit " href="'.base_url().'C_pos/edit_data_penjualan/$1"></a>', 'id_invoices_customer_data');
        return $this->datatables->generate();
       
    }
}
    ?>