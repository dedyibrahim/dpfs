
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-gears"></i>MANAJER TEKNIK<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url(); ?>C_manajer">FORM MANAJER TEKNIK</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-send"></i>DISTRIBUSI<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url(); ?>C_manajer/distribusi">DATA DISTRIBUSI</a></li>
                    </ul>
                  </li>
                 <li><a><i class="fa fa-envelope"></i>DATA LHU<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url(); ?>C_manajer/data_lhu">LHU</a></li>
                    </ul>
                  </li>
                  <li>
                    <a><i class="fa fa-book"></i>DATA<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url(); ?>C_manajer/daftar_user">USER</a></li>
                        <li><a href="<?php echo base_url(); ?>C_manajer/daftar_customer">CUSTOMER</a></li>
                        <li><a href="<?php echo base_url(); ?>C_manajer/daftar_penganalis">PENGANALIS</a></li>
                   
                    </ul>
                     
                 </li>
               
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
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

