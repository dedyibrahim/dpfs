</div>
<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					
					<div class="col-sm-12">
						<div class="col-sm-4">
                                                  <div class="single-widget">
							<h2>Pembayaran</h2>
							<ul class="nav nav-pills nav-stacked">
                                                            <li>
                                                                 <img style="width:60px; height: auto; " src="<?php echo base_url('assets/toko/images/bca_click.jpg'); ?>">
                                                             <img style="width:60px; height: auto; " src="<?php echo base_url('assets/toko/images/mandiri-ecash.jpg'); ?>"></li>
							
							</ul>
						</div>
						</div>
                                            <div class="col-sm-4">
                                                  <div class="single-widget">
							<h2>Pengiriman</h2>
							<ul class="nav nav-pills nav-stacked">
                                                            <li> <img style="width:60px; height: auto; " src="<?php echo base_url('assets/toko/images/logo_pos.jpg'); ?>">
                                                                 <img style="width:60px; height: auto; " src="<?php echo base_url('assets/toko/images/logo_jne.jpg'); ?>">
                                                                 <img style="width:60px; height: auto; " src="<?php echo base_url('assets/toko/images/logo_tiki.png'); ?>"></li>
							</ul>
						</div>
					   </div>
                                            <div class="col-sm-4">
                                                  <div class="single-widget">
							<h2>Bank Transfer</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><img style="width:60px; height: auto; " src="<?php echo base_url('assets/toko/images/logo_bca.jpg'); ?>">
								<img style="width:60px; height: auto; " src="<?php echo base_url('assets/toko/images/logo-mandiri.jpg'); ?>"></li>
							</ul>
						</div>
					   </div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Informasi</h2>
							<ul class="nav nav-pills nav-stacked">
                                                            <li><a href="<?php echo base_url('C_informasi/tentang_kami') ?>">Tentang kami</a></li>
								<li><a href="<?php echo base_url('C_informasi/kebijakan_privasi') ?>">Kebijakan privasi</a></li>
								<li><a href="#">Syarat & Ketentuan</a></li>
								<li><a href="#">Konfirmasi pembayaran</a></li>
                                                                <li><a href="#">Promo akhir tahun</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Layanan pelanggan</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hubungi kami</a></li>
								<li><a href="#">Pengembalian</a></li>
								<li><a href="#">Cek pesanan</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Tambahan</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Brand</a></li>
								<li><a href="#">Voucher Hadiah</a></li>
								<li><a href="#">Penawaran istimewa</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Akun saya</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Akun saya</a></li>
								<li><a href="#">Riwayat pesananan</a></li>
								<li><a href="#">Daftar keinginan</a></li>
								
							</ul>
						</div>
					</div>
					
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bawah">
			<div class="container">
				<div class="col-sm-6 pull-right">
				<ul class="nav navbar-nav">
                                    
							       <li><a href="<?php echo base_url('Toko/facebook'); ?>"><i class="fa fa-facebook"></i> Facebook</a></li>
							       <li><a href="<?php echo base_url('Toko/twitter'); ?>"><i class="fa fa-twitter"></i> Twitter</a></li>
							       <li><a href="<?php echo base_url('Toko/twitter'); ?>"><i class="fa fa-google-plus"></i> Google</a></li>
							       <li><a href="<?php echo base_url('Toko/twitter'); ?>"><i class="fa fa-linkedin"></i> linkedin</a></li>
							       <li><a href="<?php echo base_url('Toko/twitter'); ?>"><i class="fa fa-whatsapp"></i> Whatsapp</a></li>
                                                           
                                                            </ul>
                            </div>
                            <div class="col-sm-6 pull-left" style="margin-top: 15px;">
                            <p align="left">Copyright © 2018 Niagara Watermart. All rights reserved.</p>
								
                            </div>
                      </div>
		</div>
		
	</footer>

<script type="text/javascript">
  $(document).ready(function(){
 
$('#lihat_keranjang2').popover({html:true,trigger:"click"});
$('#lihat_keranjang2').on('click', function (e) {
    load_keranjang();
});
    
$('#lihat_keranjang').popover({html:true,trigger:"click"});
$('#lihat_keranjang').on('click', function (e) {
    $('#menu').not(this).popover('hide');
    $('#akun').not(this).popover('hide');
    load_keranjang();
});  

$('#menu').popover({html:true,trigger:"click"});
$('#menu').on('click', function (e) {
    $('#lihat_keranjang').not(this).popover('hide');
     $('#akun').not(this).popover('hide');
   
        load_keranjang();
}); 

$("#akun").popover({html:true,trigger:"click"});
  $('#akun').on('click', function (e) {
    $('#lihat_keranjang').not(this).popover('hide');
    $('#menu').not(this).popover('hide');
    load_keranjang();
}); 
    
 $("#login_header").click(function(){
     
     
       $.ajax({
          
          type:"GET",
          url :"<?php echo base_url("Toko/login_header");?>",
          data:"",
          success:function(html){
           $("#sembunyikan").hide();
           $("#hasil_pencarian").html(html);
           $("#hasil_pencarian").show();
             $('#lihat_keranjang').not(this).popover('hide');
    $('#menu').not(this).popover('hide');
    
                 
         }
          
      });
     
 });   
 
  
      });
    
</script>

        <script src="<?php echo base_url('assets/toko/'); ?>js/jquery.js"></script>
	<script src="<?php echo base_url('assets/toko/'); ?>js/header.js"></script>
	<script src="<?php echo base_url('assets/toko/'); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/toko/'); ?>js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url('assets/toko/'); ?>js/price-range.js"></script>
    <script src="<?php echo base_url('assets/toko/'); ?>js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url('assets/toko/'); ?>js/main.js"></script>
</body>
</html>