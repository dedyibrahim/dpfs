	
	<section>
		<div class="container">
			<div class="row">
				
				
				<div class="col-md-12">
					<div class="features_items"><!--features_items-->
					  
                                                    <?php 
                                         foreach($data->result_array() as $produk){
                                       ?>
                                            <a style="text-decoration: none;" href="<?php echo base_url('Toko/detail/'. base64_encode($produk['id_produk'])); ?>"> 
                                                <div class="col-md-3" style="margin-top:7px; ">
							<div class="product-image-wrapper">
								<div class="single-products">
                                                                    <div class="productinfo text-center" >
                                                                        <img class="img-container" style="padding: 10px; height:200px; width:220px;  " src="<?php echo base_url('uploads/produk_thumb/'.$produk['gambar0'])?>" alt="" />
                                                                                  <div style="height:60px; padding:10px;  font-size:14px;   color:#666663; ">
                                                                                      <?php 
                                                                                  $num_char = 70;
                                                                                $text =  $produk['nama_produk'];
                                                                                echo substr($text, 0, $num_char);
                                                                                 ?></div>
                                                                                  <h4 align="center" style=" color:#666663;">Rp.<?php echo number_format($produk['harga_produk']) ?></h4>
                                                                                </div>
                                                                          </div>
                                                                	</div>
                                                             </div>
                                                </a>
						 <?php } ?>	
						
					</div><!--features_items-->
						
				</div>
			</div>
		</div>
	</section>
	
