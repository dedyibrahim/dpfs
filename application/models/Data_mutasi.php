<?php

class Data_mutasi extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    function json_mut_pabrik_toko() {
        $this->datatables->select('mut_pabrik_toko.id_mut_pabrik_toko,'
                . 'data_produk_ditoko.nama_produk as nama_produk,'
                . 'mut_pabrik_toko.mut_stok_pabrik as stok,'
                . 'data_produk_ditoko.stok_toko as stok_toko,'
                . 'mut_pabrik_toko.waktu as waktu,'
                . 'mut_pabrik_toko.status as status,'
                
                );
        
        $this->datatables->from('mut_pabrik_toko');
        $this->datatables->join('data_produk_ditoko','mut_pabrik_toko.id_produk = data_produk_ditoko.id_produk');
        $this->datatables->add_column('view','<a class="btn btn-sm btn-success fa fa-check " href="'.base_url().'C_pos/edit_penjualan/$1"></a> || <a class="btn btn-sm btn-danger fa fa-trash " href="'.base_url().'C_pos/edit_penjualan/$1"></a>', 'id_invoices_customer_data');
        return $this->datatables->generate();
       
    }
    
    function json_mut_toko_pabrik() {
        $this->datatables->select('mut_toko_pabrik.id_mut_toko_pabrik,'
                . 'data_produk_dipabrik.nama_produk as nama_produk,'
                . 'mut_toko_pabrik.mut_stok_toko as stok,'
                . 'data_produk_dipabrik.stok_pabrik as stok_pabrik,'
                . 'data_produk_dipabrik.stok_pabrik as stok_pabrik,'
                . 'mut_toko_pabrik.waktu as waktu,'
                . 'mut_toko_pabrik.status as status,'
                
                );
        
        $this->datatables->from('mut_toko_pabrik');
        $this->datatables->join('data_produk_dipabrik','mut_toko_pabrik.id_produk = data_produk_dipabrik.id_produk');
        $this->datatables->add_column('view','<a class="btn btn-sm btn-success fa fa-check " href="'.base_url().'C_pos/edit_penjualan/$1"></a> || <a class="btn btn-sm btn-danger fa fa-trash " href="'.base_url().'C_pos/edit_penjualan/$1"></a>', 'id_invoices_customer_data');
        return $this->datatables->generate();
       
    }
}
    ?>