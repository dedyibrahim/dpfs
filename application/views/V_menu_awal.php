<?php
$valid =  $this->session->all_userdata();
$level    = $valid['level'];
$status   = $valid['status'];
$gambar   =$valid['gambar'];
if($level == 'admin pos' || $level == 'admin toko' || $level == 'admin inventory' || $level == 'super admin')
{
if($status != 'aktif'){
$this->session->sess_destroy();
echo "<script>alert('akun anda tidak aktif');javascript:history.go(-1);</script>";    
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>APLIKASI POIN OF SALES</title>
<link href="<?php echo base_url('assets'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/build/css/custom.min.css" rel="stylesheet">
</head>
<body  >
<p align="center" style=" padding: 5%; font-size: 35px; color:rgba(38,185,154,.88);"><i class="fa fa-shopping-basket"></i> Aplikasi Point Of Sales</h1>
 <div class="col-lg-12" style="padding: 3%;">
    <div class="col-md-pull-11">
      <div class="col-sm-3 col-xs-8" >
            <div class="thumbnail" >
                <div class="image view view-first">
                   <span style="font-size: 120px; color:rgba(38,185,154,.88); " class="fa fa-shopping-cart " </span>
                        <div class="mask">
                          <p>POINT OF SALES</p>
                          <div class="tools tools-bottom">
                            <a href="<?php echo base_url('C_pos'); ?>"><i class="fa fa-link"></i></a>
                          </div>
                        </div>
                      </div>
                     <div class="caption" style="background-color:rgba(38,185,154,.88);" >
                    <h5 align="center" >POINT OF SALES</h5>
                </div>
             </div>
        </div>
        <div class="col-sm-3 col-xs-8" >
            <div class="thumbnail" >
                <div class="image view view-first">
                   <span style="font-size: 120px; color:rgba(38,185,154,.88); " class="fa fa-list-alt " </span>
                        <div class="mask">
                          <p>PRODUK</p>
                          <div class="tools tools-bottom">
                            <a href="<?php echo base_url('C_produk'); ?>"><i class="fa fa-link"></i></a>
                          </div>
                        </div>
                      </div>
                     <div class="caption" style="background-color:rgba(38,185,154,.88);" >
                    <h5 align="center" >PENGATURAN PRODUK</h5>
                </div>
             </div>
        </div>
        <div class="col-sm-3 col-xs-8" >
            <div class="thumbnail" >
                <div class="image view view-first">
                   <span style="font-size: 120px; color:rgba(38,185,154,.88); " class="fa fa-home " </span>
                        <div class="mask">
                          <p>TOKO</p>
                          <div class="tools tools-bottom">
                            <a href="<?php echo base_url('C_toko'); ?>"><i class="fa fa-link"></i></a>
                          </div>
                        </div>
                      </div>
                     <div class="caption" style="background-color:rgba(38,185,154,.88);" >
                    <h5 align="center" >PENGATURAN TOKO</h5>
                </div>
             </div>
        </div>
        <div class="col-sm-3  col-xs-8" >
            <div class="thumbnail" >
                <div class="image view view-first">
                   <span style="font-size: 120px; color:rgba(38,185,154,.88); " class="fa fa-gears" </span>
                        <div class="mask">
                          <p>PENGATURAN</p>
                          <div class="tools tools-bottom">
                            <a href="<?php echo base_url('C_pengaturan'); ?>"><i class="fa fa-link"></i></a>
                          </div>
                        </div>
                      </div>
                     <div class="caption" style="background-color:rgba(38,185,154,.88);" >
                    <h5 align="center" >PENGATURAN</h5>
                </div>
             </div>
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
<script src="<?php echo base_url('assets'); ?>/build/js/custom.min.js"></script>

</body>
</html>
<?php
}else{

redirect('C_login/keluar');
}
?>   