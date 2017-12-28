<?php

$valid =  $this->session->all_userdata();

$level    = $valid['level'];
$status   = $valid['status'];
$gambar   =$valid['gambar'];

if($level == 'admin' || $level == 'user')

 {

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="icon" href="<?php echo base_url('assets/');?>white_logo.png" type="image/ico" />

    <title>APLIKASI BKIPM MAMUJU </title>
 <div class="login_wrapper">
        
          <section class="login_content">
  <div>
      <p style="font-size: 35px;color: #F7F7F7"><i class="fa fa-anchor"></i>Aplikasi Perizinan Karantina Ikan!</h1>
                  <p style="font-size: 15px;color: #F7F7F7">©2018 All Rights Reserved.BKIPM Mamuju </p>
                </div>        
         </div>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets'); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url('assets'); ?>/build/css/custom.min.css" rel="stylesheet">
  </head>
    <div class="col-lg-12" style="padding: 10%;">
      <div class="col-md-pull-11">
               <div class="col-sm-3">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url('assets'); ?>/images/media.jpg" alt="image" />
                            <div class="mask">
                              <p>FPPS</p>
                              <div class="tools tools-bottom">
                                <a href="<?php echo base_url('C_fpps'); ?>"><i class="fa fa-link"></i></a>
                              </div>
                             
                            </div>
                          </div>
                            <div class="caption">
                                <h5 align="center">FORM PERMINTAAN PENGUJIAN SAMPLE</h5>
                          </div>
                          
                        </div>
                </div>  
      <div class="col-md-3 col-sm-3">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url('assets'); ?>/images/media2.jpg" alt="image" />
                            <div class="mask">
                              <p>ANAMNESA SAMPLE</p>
                              <div class="tools tools-bottom">
                                <a href="<?php echo base_url('C_anamnesa'); ?>"><i class="fa fa-link"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                                <h5 align="center">ADMINISTRASI PENERIMAAN SAMPLE</h5>
                          </div>
                        </div>
                </div>  
      <div class="col-md-3 col-sm-3">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url('assets'); ?>/images/media3.jpg" alt="image" />
                            <div class="mask">
                              <p>NEKROPSI</p>
                              <div class="tools tools-bottom">
                                <a href="<?php echo base_url('C_nekropsi'); ?>"><i class="fa fa-link"></i></a>
                              </div>
                            </div>
                          </div>
                            <div class="caption">
                                <h5 align="center">LAB NEKROPSI</h5>
                          </div>
                          
                        </div>
                </div>
          
          <div class="col-md-pull-11">
               <div class="col-sm-3">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url('assets'); ?>/images/media5.jpg" alt="image" />
                            <div class="mask">
                              <p>JAMUR</p>
                              <div class="tools tools-bottom">
                                <a href="<?php echo base_url('C_lab_jamur'); ?>"><i class="fa fa-link"></i></a>
                              </div>
                            </div>
                          </div>
                            <div class="caption">
                                <h5 align="center">LAB JAMUR</h5>
                          </div>
                          
                        </div>
                </div>  
      <div class="col-md-3 col-sm-3">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url('assets'); ?>/images/media6.jpg" alt="image" />
                            <div class="mask">
                              <p>PARASIT</p>
                              <div class="tools tools-bottom">
                                <a href="<?php echo base_url('C_lab_parasit'); ?>"><i class="fa fa-link"></i></a>
                              </div>
                            </div>
                          </div>
                            <div class="caption">
                                <h5 align="center">LAB PARASIT</h5>
                          </div>
                          
                        </div>
                </div>  
      <div class="col-md-3 col-sm-3">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url('assets'); ?>/images/media7.jpg" alt="image" />
                            <div class="mask">
                              <p>BAKTERI</p>
                              <div class="tools tools-bottom">
                                <a href="<?php echo base_url('C_lab_bakteri'); ?>"><i class="fa fa-link"></i></a>
                              </div>
                            </div>
                          </div>
                            <div class="caption">
                                <h5 align="center">LAB BAKTERI</h5>
                          </div>
                          
                        </div>
                </div>
           <div class="col-md-3 col-sm-3">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url('assets'); ?>/images/media8.jpg" alt="image" />
                            <div class="mask">
                              <p>VIRUS</p>
                              <div class="tools tools-bottom">
                                <a href="<?php echo base_url('C_lab_virus'); ?>"><i class="fa fa-link"></i></a>
                              </div>
                            </div>
                          </div>
                            <div class="caption">
                                <h5 align="center">LAB VIRUS</h5>
                          </div>
                        </div>
                   </div>
                 <div class="col-md-3 col-sm-3">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url('assets'); ?>/images/media8.jpg" alt="image" />
                            <div class="mask">
                              <p>MANAJER TEKNIK</p>
                              <div class="tools tools-bottom">
                                <a href="<?php echo base_url('C_manajer'); ?>"><i class="fa fa-link"></i></a>
                              </div>
                            </div>
                          </div>
                            <div class="caption">
                                <h5 align="center">MANAJER TEKNIK</h5>
                          </div>
                        </div>
                   </div>
              
        
    <!-- jQuery -->
    <script src="<?php echo base_url('assets'); ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets'); ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets'); ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets'); ?>/vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets'); ?>/build/js/custom.min.js"></script>
  </body>
</html>
<?php
}else{
redirect('C_login');
}

?>   