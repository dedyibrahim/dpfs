<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Niagara Watermart</title>
    <link href="<?php echo base_url('assets/toko/'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/toko/'); ?>css/custom_d.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/toko/'); ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/toko/'); ?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/toko/'); ?>css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/toko/'); ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/toko/'); ?>css/main.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/toko/'); ?>css/responsive.css" rel="stylesheet">
    <script src="<?php echo  base_url(); ?>assets/css/sweetalert.min.js" type="text/javascript"></script>
    <link href="<?php echo  base_url(); ?>assets/css/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo  base_url(); ?>assets/css/gaya.css" rel="stylesheet" type="text/css"/>

</head><!--/head-->
<script src="<?php echo base_url('assets/toko/'); ?>js/jquery.js"></script>
<script type="text/javascript">
function addcart(id){
    $( document ).ajaxStart(function() {
    $( "#loading" ).show();
 });
 $( document ).ajaxComplete(function() {
    $( "#loading" ).hide();
 });
   var id_produk= id;
            $.ajax({
               type:"GET",
               url:"<?php echo base_url('Toko/addcart')?>",
               data:"id_produk="+id_produk,
               success:function(html){
                swal({
               title:"", 
               text:"Produk Berhasil ditambahkan",
               timer:1500,
               type:"success",
               showCancelButton :false,
               showConfirmButton :false
                        
       
            });
                }
            });
}


</script>
    <script type="text/javascript">
function load_keranjang(){
    $( document ).ajaxStart(function() {
    $( "#loading" ).show();
 });
 $( document ).ajaxComplete(function() {
    $( "#loading" ).hide();
 });
     $.ajax({
                type:"GET",
                url:"<?php echo base_url('Toko/data_keranjang')?>",
                data:"",
                success:function(html){
                 $("#data_keranjang").html(html);
                 
                }
               
            });
}

</script>

<script type="text/javascript">
  $(document).ready(function(){
  $("#pencaharian").keyup(function(){
      var kunci=$(".kunci").val();
  $( document ).ajaxStart(function() {
    $( "#loading" ).show();
 });
 $( document ).ajaxComplete(function() {
    $( "#loading" ).hide();
 });
    if(kunci != '' ) {    
       
       $.ajax({
          
          type:"GET",
          url :"<?php echo base_url("Toko/pencarian");?>",
          data:"kunci="+kunci,
          success:function(html){
           $("#sembunyikan").hide();
           $("#hasil_pencarian").html(html);
           $("#hasil_pencarian").show();
                
                 
         }
          
      });
      
      } else {
      $("#sembunyikan").show();
      $("#hasil_pencarian").hide();
      
        }
       });
    });
    
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#pencaharian2").keyup(function(){
      var kunci=$(".kunci2").val();
  $( document ).ajaxStart(function() {
    $( "#loading" ).show();
 });
 $( document ).ajaxComplete(function() {
    $( "#loading" ).hide();
 });
    if(kunci != '' ) {    
       
       $.ajax({
          
          type:"GET",
          url :"<?php echo base_url("Toko/pencarian");?>",
          data:"kunci="+kunci,
          success:function(html){
           $("#sembunyikan").hide();
           $("#hasil_pencarian").html(html);
           $("#hasil_pencarian").show();
                
                 
         }
          
      });
      
      } else {
      $("#sembunyikan").show();
      $("#hasil_pencarian").hide();
      
        }
       });
    });
    
</script>
<div class="loading" id="loading"><div></div><div></div><div></div><div></div></div>
 
<body >
       
    <?php 
 $valid =  $this->session->all_userdata();
 
 if (!empty($valid['id_customer_toko'])?$valid['id_customer_toko']:'' != NULL ){ 
   $nama_depan     = $valid['nama_depan'];
   $nama_belakang  = $valid['nama_belakang'];
   $email          = $valid['email'];
   $id_customer = $valid['id_customer_toko'];
   $tidak_selesai=$this->db->get_where('data_toko_penjualan',array('id_customer_toko'=>$id_customer,'status_penjualan !=' => 'selesai' ));
                                
                             
     ?>
      <header ><!--header-->
            
            
	<div  id="fixed" class="normal">	
		<div class="container-fluid atas_tengah"><!--header-middle-->
			<div class="container atas_tengah_padding " >
					<div class="col-sm-4  hidden-xs text-center" style="margin-bottom:5px; ">
                                            <a href="<?php echo base_url(); ?>"><img style="width:170px; " src="<?php echo base_url('assets/toko/'); ?>images/home/logo.png" alt="" /></a>&nbsp;&nbsp;&nbsp;
					  <a href="https://www.idea.or.id/badge/2296776711"><img style="width:120px; padding-top:20px;  " src="<?php echo base_url('assets/toko/'); ?>images/home/idEA-niagara.png " alt="" /></a>
						
					</div>
					<div class="col-sm-5 hidden-xs text-center" style="margin-top:5px; ">	
                                            <div class="pencarian tex-center">
                                                        <input id="pencaharian" class="kunci"    type="text" placeholder="Cari produk disini gan ...">
                                                       </div>
                                      </div>
                            <div class="col-sm-3 hidden-xs text-center" >
                                <div class="list_keranjang ">
                                    <span id="lihat_keranjang" class="ikon-keranjang fa fa-shopping-cart " title="BARANG BELANJAAN AGAN"
                                               data-container="body" data-toggle="popover" data-placement="bottom"
                                               data-content="<div id=data_keranjang></div>"></span>
                                    
                                    <span id="menu" class=" ikon-keranjang fa fa-list-alt" title="MENU"
                                               data-container="body" data-toggle="popover" data-placement="bottom"
                                               data-content="
                                               <ul  class=nav>
                                               <li class=menupoper><a  href=<?php echo base_url('Toko/daftar_transaksi/'.base64_encode($id_customer))?>><i class='fa fa-exchange'></i> Daftar Transaksi</a></li>
								<li class=menupoper><a href=<?php echo base_url('Toko/cek_pesanan/'.base64_encode($id_customer))?>><i class='fa fa-search'></i> Cek pesanan</a></li>
								<li class=menupoper><a href=<?php echo base_url('Toko/konfirmasi_bayar/'.base64_encode($id_customer))?>><i class='fa fa-sign-out'></i> Konfirmasi bayar</a></li>
                                                                
                                                        </ul>
                                               
                                               " ></span>
                                    
                                     <span id="akun" class="ikon-keranjang fa fa-user" title="<?php echo $nama_depan."&nbsp;".$nama_belakang; ?>"
                                               data-container="body" data-toggle="popover" data-placement="bottom"
                                               data-content=" <ul  class=nav>
                                               <li class=menupoper><a href=<?php echo base_url('Toko/keluar')?>><i class='fa fa-sign-out'></i> Keluar</a></li>
                                                                
                                                        </ul>"></span></a>
                                </div>                   
                            </div>
			       </div>
		          </div>
        
             <?php  $this->load->view('Toko/umum/V_menu');?>	
        </div>
        <?php }else{ ?> 
          
        <header ><!--header-->
            
	<div  id="fixed" class="normal">	
		<div class="container-fluid atas_tengah"><!--header-middle-->
			<div class="container atas_tengah_padding "  >
					<div class="col-sm-4 hidden-xs text-center" style="margin-bottom:5px; ">
                                            <a href="<?php echo base_url(); ?>"><img style="width:170px; " src="<?php echo base_url('assets/toko/'); ?>images/home/logo.png" alt="" /></a>&nbsp;&nbsp;&nbsp;
					  <a href="https://www.idea.or.id/badge/2296776711"><img class="col-sm-1-hidden" style="width:120px; padding-top:20px;  " src="<?php echo base_url('assets/toko/'); ?>images/home/idEA-niagara.png " alt="" /></a>
						
					</div>
                            <div class="col-sm-5  text-center" style="margin-top:5px; ">	
                                            <div  class="pencarian hidden-xs text-center">
                                                  
                                                        <input id="pencaharian" class="kunci"    type="text" placeholder="Cari produk disini gan ...">
                                                       </div>
                                      </div>
                            <div class="col-sm-3 hidden-xs text-center">
                                <div class="list_keranjang ">
                                    
                                    <span id="lihat_keranjang" class="ikon-keranjang fa fa-shopping-cart " title="BARANG BELANJAAN AGAN"
                                               data-container="body" data-toggle="popover" data-placement="bottom"
                                               data-content="<div id=data_keranjang></div>"></span>
                                    
                                    <span id="menu" class=" ikon-keranjang fa fa-list-alt" title="MENU"
                                               data-container="body" data-toggle="popover" data-placement="bottom"
                                               data-content="
                                               <ul  class=nav>
								<li class=menupoper><a  href=<?php echo base_url('Toko/login')?>><i class='fa fa-exchange'></i> Daftar Transaksi</a></li>
								<li class=menupoper><a href=<?php echo base_url('Toko/login')?>><i class='fa fa-search'></i> Cek pesanan</a></li>
								<li class=menupoper><a href=<?php echo base_url('Toko/login')?>><i class='fa fa-sign-out'></i> Konfirmasi bayar</a></li>
                                                                
                                                        </ul>
                                               
                                               " ></span>
                                              
                                          <span id="login_header" class="ikon-keranjang fa fa-sign-in" title="AKUN"></span>
                                      
                                      
                                </div>
                            </div>
			       </div>
		          </div>
        
             <?php  $this->load->view('Toko/umum/V_menu');?>	
        </div>
        </header>
      <?php } ?>

      <section>
		<div class="container">
			<div class="row">
		          <div class="col-md-12">
			   <div style="display: none;" id="hasil_pencarian">
                            </div>
      			</div>
		    </div>
			
		</div>
	</section>
        </div>
        
        
        
  <div id="sembunyikan">         
