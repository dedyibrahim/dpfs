  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-user"></i>USER<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url(); ?>C_pengaturan/data_user">USER</a></li>
                         <li><a href="<?php echo base_url(); ?>C_pengaturan/tambah_user">TAMBAH USER</a></li>
                   </ul>
                  </li>
                 <li><a><i class="fa fa-users"></i>CUSTOMER<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url('C_pengaturan/data_customer'); ?>">DATA CUSTOMER</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-exchange"></i>DATA MUTASI<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url('C_pengaturan/mut_pabrik_toko'); ?>">PABRIK KE TOKO</a></li>
                        <li><a href="<?php echo base_url('C_pengaturan/mut_toko_pabrik'); ?>">TOKO KE PABRIK</a></li>
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

