  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-th"></i>LAYOUT<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo  base_url('C_toko/lyt_menu'); ?>">MENU</a></li>
                         <li><a href="<?php echo base_url('C_toko/sldr_atas'); ?>">SLIDER ATAS</a></li>
                         <li><a href="<?php echo base_url('C_toko/lyt_home'); ?>">HOME</a></li>
                   </ul>
                  </li>
                   <li><a><i class="fa fa-th"></i>PENGATURAN TOKO<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                         <li><a href="<?php echo base_url('C_toko/pengaturan_toko'); ?>">UMUM</a></li>
                   </ul>
                  </li>
                  <li><a><i class="fa fa-money"></i>KODE VOUCHER<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                         <li><a href="<?php echo base_url('C_toko/voucher_toko'); ?>">Kode Voucher</a></li>
                   </ul>
                  </li>
                  <li><a><i class="fa fa-archive"></i>PRODUK<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                         <li><a href="<?php echo base_url('C_toko/tambah_foto_produk'); ?>">Tambah Foto Produk</a></li>
                   </ul>
                  </li>
                  <li><a><i class="fa fa-shopping-basket"></i>PENJUALAN<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                         <li><a href="<?php echo base_url('C_toko/penjualan_masuk'); ?>">PENJUALAN MASUK</a></li>
                         <li><a href="<?php echo base_url('C_toko/konfirmasi_penjualan'); ?>">KONFIRMASI PENJUALAN</a></li>
                         <li><a href="<?php echo base_url('C_toko/penjualan_selesai'); ?>">PENJUALAN SELESAI</a></li>
                  </ul>
                  </li>
                
                  
                </ul>
              </div>
            </div>
            <!-- /menu footer buttons -->
         <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" onclick="" title="Menu Utama" href="<?php echo base_url('C_menu'); ?>">
                <span class="glyphicon glyphicon-backward" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('C_login/keluar'); ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

