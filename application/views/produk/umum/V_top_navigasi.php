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
              
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-home"></i></div>
                  <div class="count">179</div>
                  <h3>Produk Ditoko</h3>
                  <p>Lorem ipsum psdea itgum rixt</p>
                </div>
              </div>
            
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-list-alt"></i></div>
                  <div class="count">179</div>
                  <h3>Produk Di Pabrik</h3>
                  <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
              </div>
            
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count">179</div>
                  <h3>Produk Mau Habis</h3>
                  <p>Produk Mau Habis</p>
                </div>
              </div>
              
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-warning"></i></div>
                  <div class="count">179</div>
                  <h3>Produk Habis</h3>
                  <p>Produk Hbis</p>
                </div>
              </div>
            </div>
           