<?php

class Data_toko extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    function json_layout_menu() {
        $this->datatables->select('id_layout_menu,'
                . 'layout_menu.menu as menu,');
        $this->datatables->from('layout_menu');
        $this->datatables->add_column('view','<a class="btn btn-sm  fa fa-trash btn-danger btn" href="'.base_url().'C_toko/hapus_menu/$1"></a> ', 'id_layout_menu');
        return $this->datatables->generate();
        
    }
    function json_sldr_atas() {
        $this->datatables->select('id_slider_atas,'
                . 'slider_atas.teks as isi,'
                . 'slider_atas.gambar as gambar,');
        $this->datatables->from('slider_atas');
        $this->datatables->add_column('view','<a class="btn btn-sm  fa fa-trash btn-danger btn" href="'.base_url().'C_toko/hapus_slider_atas/$1"></a> ', 'id_slider_atas');
        return $this->datatables->generate();
        
    }
   
     function json_voucher() {
        $this->datatables->select('id_voucher,'
                . 'kode_voucher.kode_voucher as kode,'
                . 'kode_voucher.diskon_voucher as diskon,');
        $this->datatables->from('kode_voucher');
        $this->datatables->add_column('view','<a class="btn btn-sm  fa fa-trash btn-danger btn" href="'.base_url().'C_toko/hapus_voucher/$1"></a> ', 'id_voucher');
        return $this->datatables->generate();
        
    }
    function json_lyt_home() {
        $this->datatables->select('id_produk,'
                . 'data_produk_ditoko.barcode as barcode,'
                . 'data_produk_ditoko.stok_toko as stok_toko,'
                . 'data_produk_ditoko.kategori as kategori,'
                . 'data_produk_ditoko.gambar0 as gambar,'
               . 'data_produk_ditoko.nama_produk as nama_produk,');
        $this->datatables->from('data_produk_ditoko');
        
        $this->datatables->add_column('view','<a class="btn btn-md  fa fa-home btn-success btn" href="'.base_url().'C_toko/set_home/$1"> Set Home</a> ', 'id_produk');
        $this->datatables->add_column('gambar','<img style="width:100px; height:100px;" src="'.base_url().'uploads/produk_thumb/$1"></a> ', 'gambar');
        return $this->datatables->generate();
        
    }
    function data_lyt_home(){
        $this->datatables->select('data_produk_ditoko.id_produk,'
                . 'data_produk_ditoko.barcode as barcode,'
                . 'data_produk_ditoko.nama_produk as nama_produk,'
                . 'data_produk_ditoko.harga_produk as harga_produk,'
                . 'data_produk_ditoko.stok_toko as stok_toko,'
                . 'data_produk_ditoko.kategori as kategori,'
                . 'data_produk_ditoko.gambar0 as gambar,'
                
                );
        $this->datatables->from('layout_home');
        $this->datatables->join('data_produk_ditoko','data_produk_ditoko.id_produk = layout_home.id_produk');
        $this->datatables->add_column('gambar','<img style="width:100px; height:100px;" src="'.base_url().'uploads/produk_thumb/$1"></a> ', 'gambar');
        $this->datatables->add_column('view','<a class="btn btn-sm btn-danger fa fa-trash " href="'.base_url().'C_toko/hapus_home/$1"> Hapus home</a>', 'id_produk');
        return $this->datatables->generate();
       
    
        
    }
     function data_foto_produk(){
        $this->datatables->select('data_produk_ditoko.id_produk,'
                . 'data_produk_ditoko.nama_produk as nama_produk,'
                . 'data_produk_ditoko.gambar0 as gambar,'
                . 'data_produk_ditoko.gambar1 as gambar1,'
                . 'data_produk_ditoko.gambar2 as gambar2,'
                . 'data_produk_ditoko.gambar3 as gambar3,'
                
                );
        $this->datatables->from('data_produk_ditoko');
        
        
        $this->datatables->add_column('gambar','<img style="width:100px; height:100px;" src="'.base_url().'uploads/produk_thumb/$1"></a> ', 'gambar');
        $this->datatables->add_column('gambar1','<img style="width:100px; height:100px;" src="'.base_url().'uploads/produk_thumb/$1"></a> ', 'gambar1');
        $this->datatables->add_column('gambar2','<img style="width:100px; height:100px;" src="'.base_url().'uploads/produk_thumb/$1"></a> ', 'gambar2');
        $this->datatables->add_column('gambar3','<img style="width:100px; height:100px;" src="'.base_url().'uploads/produk_thumb/$1"></a> ', 'gambar3');
       
        
        $this->datatables->add_column('view','<a class="btn btn-sm btn-warning fa fa-trash " href="'.base_url().'C_toko/edit_foto_produk/$1"> Tambah & Edit</a>', 'id_produk');
        return $this->datatables->generate();
       
    
        
    }
    function data_penjualan_masuk(){
        $this->datatables->select('data_toko_penjualan.no_invoices,'
                   .'data_toko_penjualan.no_invoices as no_inv,'
                   .'data_toko_penjualan.nomor_kontak as no_kontak,'
                   .'data_toko_penjualan.nama_kurir as nama_kurir,'
                   .'data_toko_penjualan.jenis_service as jenis_service,'
                   .'data_toko_penjualan.status_penjualan as status_penjualan,'
                   .'data_toko_penjualan.gambar_pembayaran as gambar,'
                   .'data_customer_toko.nama_depan as nama_depan,'
                   );
         $this->datatables->where('gambar_pembayaran !=','');
         $this->datatables->where('status_penjualan =','Dalam Proses');
         $this->datatables->from('data_toko_penjualan');
         $this->datatables->join('data_customer_toko','data_customer_toko.id_customer_toko = data_toko_penjualan.id_customer_toko');
         $this->datatables->add_column('bayar','<img style="width:100px; height:100px;" src="'.base_url().'uploads/bukti_bayar/$1"></a> ', 'gambar');
         $this->datatables->add_column('view','<a class="btn btn-sm btn btn-success fa fa-eye " href="'.base_url().'C_toko/lihat_penjualan_baru/$1"></a>', 'no_invoices');
        return $this->datatables->generate();
       
    
        
    }
    function data_konfirmasi_penjualan(){
        $this->datatables->select('data_toko_penjualan.no_invoices,'
                   .'data_toko_penjualan.no_invoices as no_inv,'
                   .'data_toko_penjualan.nomor_kontak as no_kontak,'
                   .'data_toko_penjualan.nama_kurir as nama_kurir,'
                   .'data_toko_penjualan.jenis_service as jenis_service,'
                   .'data_toko_penjualan.status_penjualan as status_penjualan,'
                   .'data_toko_penjualan.gambar_pembayaran as gambar,'
                   .'data_customer_toko.nama_depan as nama_depan,'
                   );
         $this->datatables->where('gambar_pembayaran !=','');
         $this->datatables->where('status_penjualan =','Sudah di Proses');
         $this->datatables->from('data_toko_penjualan');
         $this->datatables->join('data_customer_toko','data_customer_toko.id_customer_toko = data_toko_penjualan.id_customer_toko');
         $this->datatables->add_column('bayar','<img style="width:100px; height:100px;" src="'.base_url().'uploads/bukti_bayar/$1"></a> ', 'gambar');
         $this->datatables->add_column('view','<a class="btn btn-sm btn btn-success fa fa-check " href="'.base_url().'C_toko/lihat_konfirmasi_penjualan/$1"> Konfirmasi</a>', 'no_invoices');
        return $this->datatables->generate();
       
    
        
    }
    
    function data_penjualan_selesai(){
        $this->datatables->select('data_toko_penjualan.no_invoices,'
                   .'data_toko_penjualan.no_invoices as no_inv,'
                   .'data_toko_penjualan.nomor_kontak as no_kontak,'
                   .'data_toko_penjualan.nama_kurir as nama_kurir,'
                   .'data_toko_penjualan.jenis_service as jenis_service,'
                   .'data_toko_penjualan.status_penjualan as status_penjualan,'
                   .'data_toko_penjualan.gambar_pembayaran as gambar,'
                   .'data_customer_toko.nama_depan as nama_depan,'
                   );
         $this->datatables->where('gambar_pembayaran !=','');
         $this->datatables->where('status_penjualan =','Selesai');
         $this->datatables->from('data_toko_penjualan');
         $this->datatables->join('data_customer_toko','data_customer_toko.id_customer_toko = data_toko_penjualan.id_customer_toko');
         $this->datatables->add_column('bayar','<img style="width:100px; height:100px;" src="'.base_url().'uploads/bukti_bayar/$1"></a> ', 'gambar');
         $this->datatables->add_column('view','<a class="btn btn-sm btn btn-success fa fa-eye " href="'.base_url().'C_toko/lihat_penjualan_selesai/$1"></a>', 'no_invoices');
        return $this->datatables->generate();
}
function data_penjualan_ditolak(){
        $this->datatables->select('data_toko_penjualan.no_invoices,'
                   .'data_toko_penjualan.no_invoices as no_inv,'
                   .'data_toko_penjualan.nomor_kontak as no_kontak,'
                   .'data_toko_penjualan.nama_kurir as nama_kurir,'
                   .'data_toko_penjualan.jenis_service as jenis_service,'
                   .'data_toko_penjualan.status_penjualan as status_penjualan,'
                   .'data_toko_penjualan.gambar_pembayaran as gambar,'
                   .'data_customer_toko.nama_depan as nama_depan,'
                   );
         $this->datatables->where('gambar_pembayaran !=','');
         $this->datatables->where('status_penjualan =','Di Tolak');
         $this->datatables->from('data_toko_penjualan');
         $this->datatables->join('data_customer_toko','data_customer_toko.id_customer_toko = data_toko_penjualan.id_customer_toko');
         $this->datatables->add_column('bayar','<img style="width:100px; height:100px;" src="'.base_url().'uploads/bukti_bayar/$1"></a> ', 'gambar');
         $this->datatables->add_column('view','<a class="btn btn-sm btn btn-success fa fa-eye " href="'.base_url().'C_toko/lihat_penjualan_ditolak/$1"></a>', 'no_invoices');
        return $this->datatables->generate();
}
}
?>