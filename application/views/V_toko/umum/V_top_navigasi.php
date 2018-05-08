        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url('/uploads/user_thumb/');?><?php  $valid =  $this->session->all_userdata();
                     echo  $valid['gambar']; ?> " alt=""><?php echo  $valid['nama']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><a href="<?php echo base_url('C_menu') ?>">Menu Utama</a></li>
                    <li><a href="<?php echo base_url('C_login/keluar');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <div class="right_col" role="main">
          <!-- top tiles -->
        <div class="row top_tiles">
            <a href="<?php echo base_url('C_toko/penjualan_masuk');?>">   
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                  <div class="count"><?php echo $this->db->get_where('data_toko_penjualan',array('gambar_pembayaran !='=>'','status_penjualan ='=>'Dalam Proses'))->num_rows(); ?></div>
                  <h3>Orderan masuk</h3>
                  <p>Data orderan yang masuk</p>
                </div>
            </div></a>
            
            <a href="<?php echo base_url('C_toko/konfirmasi_penjualan');?>">   
           <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check"></i></div>
                  <div class="count"><?php echo $this->db->get_where('data_toko_penjualan',array('gambar_pembayaran !='=>'','status_penjualan ='=>'Sudah di Proses'))->num_rows(); ?></div>
                  <h3>Konfirmasi penjualan</h3>
                  <p>Data Penjualan yang perlu di konfirmasi</p>
                </div>
           </div></a>
          
        <a href="<?php echo base_url('C_toko/penjualan_selesai');?>">   
           <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo 
                 $this->db->get_where('data_toko_penjualan',array('gambar_pembayaran !='=>'','status_penjualan ='=>'Selesai'))->num_rows();
                   ?></div>
                  <h3>Penjualan selesai</h3>
                  <p>Data penjualan yang sudah selesai</p>
                </div>
           </div></a>
          
         <a href="<?php echo base_url('C_produk/produk_habis');?>">   
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-warning"></i></div>
                   <div class="count"><?php echo 
                 $this->db->get_where('data_produk_ditoko',array('stok_toko ='=>0))->num_rows();
                   ?></div>
                 
                  <h3>Produk Habis</h3>
                  <p>Produk Habis</p>
                </div>
            </div></a>
            </div>
           