  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-list-alt"></i>PRODUK <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"><li><a href="<?php echo base_url(); ?>C_produk/produk_toko">PRODUK TOKO</a></li>
                   <li><a href="<?php echo base_url(); ?>C_produk/produk_pabrik">PRODUK PABRIK</a></li>
                   <li><a href="<?php echo base_url(); ?>C_produk/produk_mau_habis">PRODUK MAU HABIS</a></li>
                   <li><a href="<?php echo base_url(); ?>C_produk/produk_habis">PRODUK HABIS</a></li>
                    </ul>
                  </li>
                  <li>
                     <a>
                  <i class="fa fa-plus-circle"></i>TAMBAH PRODUK<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('C_produk/tambah_produk'); ?>">TAMBAHKAN</a></li>
                    </ul>
                  </li>
                   <li>
                     <a>
                  <i class="fa fa-list-alt"></i>PENJUALAN PRODUK<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('C_produk/data_penjualan_produk'); ?>">DATA PENJUALAN</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-exchange"></i>DATA MUTASI<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url('C_produk/mut_pabrik_toko'); ?>">PABRIK KE TOKO</a></li>
                        <li><a href="<?php echo base_url('C_produk/mut_toko_pabrik'); ?>">TOKO KE PABRIK</a></li>
                    </ul>
                  </li>
                  
                  
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->
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

