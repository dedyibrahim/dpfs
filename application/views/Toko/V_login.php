<script type="text/javascript">
function daftar(){
   $("#form_masuk").hide(300);
   $("#form_daftar").show(300);
} 
 
function tampil_login(){
 $("#form_masuk").show(300);
 $("#form_daftar").hide(300);   
    
} 
</script>    
	<section id="form"><!--form-->
		<div class="container">
				<div class="col-sm-4 col-sm-offset-4" id="form_masuk">
					<div class="login-form"><!--login form-->
						<h2 align="center">Login ke akun agan.</h2>
						<?php echo $script_captcha; // javascript recaptcha ?>
                                                   <form action="<?php echo base_url('Toko/login_customer') ?>" method="post" enctype="multipart/form-data" >
                                                          <?php echo form_input('email', $username,'placeholder="Emailnya gan.."'); ?>
                                                          <?php echo form_password('password',$password,'placeholder="Passwordnya juga.."'); ?>
                                                         <?php echo $captcha // tampilkan recaptcha ?>
                                                    <button type="submit" name="btnLogin" class=" pull-right btn btn-default"><span class="fa fa-sign-in pull-right"></span> Login</button>
                                                    <button type="button" onclick="daftar()"  class=" pull-left btn btn-warning"><span class="fa fa-unlock"></span> Daftar</button>
                                                </form>
					</div>
				</div>
				
                            <div class="col-sm-4  col-sm-offset-4" style="display:none;" id="form_daftar">
					<div class="login-form"><!--sign up form-->
						<h2 align="center">Silahkan Daftar terlebih dahulu.</h2>
					          <form action="<?php echo base_url('Toko/daftar_customer')?>" enctype="multipart/form-data" method="post">
                                                         <?php echo form_input('nama_depan', $nama_depan,'placeholder="Nama depan gan.."'); ?>
                                                         <?php echo form_input('nama_belakang', $nama_depan,'placeholder="Nama belakang gan.."'); ?>
                                                         <?php echo form_input('email', $nama_depan,'placeholder="Emailnya gan.."'); ?>
                                                         <?php echo form_password('password1',$password1,'placeholder="Passwordnya juga.."'); ?>
                                                         <?php echo form_password('password2',$password2,'placeholder="Password lagi juga.."'); ?>
                                                         <?php echo $captcha // tampilkan recaptcha ?>
                                        
                                                        <button type="submit" name="btnRegister" class=" pull-right btn btn-default "><span class="fa fa-unlock"></span> Daftarkan</button>
						        <button type="button" onclick="tampil_login()"  class=" pull-left btn btn-warning"><span class="fa fa-sign-in"></span> Login</button>
                                               </form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
            
	</section><!--/form--
	
	