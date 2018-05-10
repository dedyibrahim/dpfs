<?php

class Data_produk extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    function json() {
        $this->datatables->select('record_number_customer,jenis_sample.record_number_sample as record ,'
                . 'customer.nama_customer as nama,');
        $this->datatables->from('produk');
        $this->datatables->add_column('view','<a class="btn btn-md btn-warning btn" href="'.base_url().'C_manajer/ambil_data/$1">Get</a> ', 'record_number_customer');
        return $this->datatables->generate();
        
    }
    function json_produk_mau_habis() {
        $this->datatables->select('id_produk_toko,'
                . 'data_produk_ditoko.nama_produk as nama ,'
                . 'data_produk_ditoko.barcode as barcode ,'
                . 'data_produk_ditoko.harga_produk as harga ,'
                . 'data_produk_ditoko.stok_toko as stok ,'
                . 'data_produk_ditoko.milik as milik ,'
                . 'data_produk_ditoko.status as status ,'
                
                );
       $this->datatables->where('stok_toko <=', 10);
       $this->datatables->where('stok_toko !=', 0);
       $this->datatables->from('data_produk_ditoko');
      return $this->datatables->generate();
        
    }
    function json_produk_habis() {
        $this->datatables->select('id_produk_toko,'
                . 'data_produk_ditoko.id_produk as id_produk ,'
                . 'data_produk_ditoko.nama_produk as nama ,'
                . 'data_produk_ditoko.barcode as barcode ,'
                . 'data_produk_ditoko.harga_produk as harga ,'
                . 'data_produk_ditoko.stok_toko as stok ,'
                . 'data_produk_ditoko.milik as milik ,'
                . 'data_produk_ditoko.status as status ,'
                
                );
       $this->datatables->where('stok_toko =', 0);
       $this->datatables->from('data_produk_ditoko');
       $this->datatables->add_column('view','<a class="btn btn-sm btn-primary fa fa-eye " href="'.base_url().'C_produk/lihat_produk/$1"></a><a class="btn btn-sm btn-primary fa fa-edit " href="'.base_url().'C_produk/edit_produk/$1"></a><a class="btn btn-sm btn-primary fa fa-trash " href="'.base_url().'C_produk/hapus_produk/$1"></a>', 'id_produk');
        return $this->datatables->generate();
        
    }
    function json_produk_toko() {
        $this->datatables->select('id_produk,'
                . 'data_produk_ditoko.nama_produk as nama ,'
                . 'data_produk_ditoko.barcode as barcode ,'
                . 'data_produk_ditoko.harga_produk as harga ,'
                . 'data_produk_ditoko.stok_toko as stok ,'
                . 'data_produk_ditoko.milik as milik ,'
                . 'data_produk_ditoko.gambar0 as gambar ,'
                . 'data_produk_ditoko.kategori as kategori ,'
                . 'data_produk_ditoko.status as status ,'
                
                );
      $this->datatables->from('data_produk_ditoko');
      $this->datatables->add_column('view','<a class="btn btn-sm btn-primary fa fa-eye " href="'.base_url().'C_produk/lihat_produk/$1"></a><a class="btn btn-sm btn-primary fa fa-edit " href="'.base_url().'C_produk/edit_produk/$1"></a><a class="btn btn-sm btn-primary fa fa-trash " href="'.base_url().'C_produk/hapus_produk/$1"></a>', 'id_produk');
      $this->datatables->add_column('gambar','<img style="width:100px; height:100px;" src="'.base_url().'uploads/produk_thumb/$1"></a> ', 'gambar');
     return $this->datatables->generate();
        
    }
    function json_produk_pabrik() {
        $this->datatables->select('id_produk,'
                . 'data_produk_dipabrik.nama_produk as nama ,'
                . 'data_produk_dipabrik.barcode as barcode ,'
                . 'data_produk_dipabrik.harga_produk as harga ,'
                . 'data_produk_dipabrik.stok_pabrik as stok ,'
                . 'data_produk_dipabrik.milik as milik ,'
                . 'data_produk_dipabrik.gambar0 as gambar ,'
                . 'data_produk_dipabrik.kategori as kategori ,'
                . 'data_produk_dipabrik.status as status ,'
                
                );
       $this->datatables->where('stok_pabrik !=', 0);
      $this->datatables->from('data_produk_dipabrik');
      $this->datatables->add_column('gambar','<img style="width:100px; height:100px;" src="'.base_url().'uploads/produk_thumb/$1"></a> ', 'gambar');
      $this->datatables->add_column('view','<a class="btn btn-sm btn-primary fa fa-exchange " href="'.base_url().'C_produk/mut_pabrik_toko/$1"> Mut ke toko</a><a class="btn btn-sm btn-primary fa fa-exchange " href="'.base_url().'C_produk/mut_toko_pabrik/$1"> Mut ke pabrik</a>', 'id_produk');
       return $this->datatables->generate();
        
    }


}

?>