  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-list-alt"></i>PRODUK <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"><li><a href="<?php echo base_url(); ?>C_produk">PRODUK</a></li>
                    </ul>
                  </li>
                  <li>
                     <a>
                  <i class="fa fa-plus-circle"></i>TAMBAH PRODUK<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('C_produk/tambah_produk_online'); ?>">PRODUK ONLINE</a></li>
                      <li><a href="<?php echo base_url('C_produk/tambah_produk_offline'); ?>">PRODUK OFFLINE</a></li>
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

