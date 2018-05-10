
<div class="container-fluid">
                 <div class="container menu_atas">
                         			<div class="navbar-header">
                                                    <div  class="pencarian col-xs-8 hidden-md hidden-lg hidden-sm pull-left" >
                                                       <input id="pencaharian2" class="kunci2"    type="text" placeholder="Cari produk disini gan ...">
                                                     </div>
                                                    <div class="col-xs hidden-md hidden-lg hidden-sm pull-left tex-center">
                                                        <span id="lihat_keranjang2" style="color: #FFFFFF;
  font-size: 40px;" class="ikon-keranjang fa fa-shopping-cart " title="BARANG BELANJAAN AGAN"
                                               data-container="body" data-toggle="popover" data-placement="bottom"
                                               data-content="<div id=data_keranjang></div>"></span>
                                                        
                                                        
                                                    </div>
						       <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".cole2">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
							<ul class="nav navbar-nav collapse navbar-collapse cole2">
                                                        <?php 
                                                                    $query = $this->db->get('layout_menu');
                                                                    foreach ($query->result_array() as $data){
                                                                   if($data['menu'] == 'Home'){
                                                                    	
                                                                       echo "<li class='active'><a href=". base_url('Toko')." class='actv'>".$data['menu']."</a></li>";	
                                                                      
                                                                     }else if($data['menu'] != 'Home'){   
                                                                    
                                                                        echo "<li class='active'><a href=". base_url('Toko/Kategori')."/".  urlencode($data['menu'])." class='actv'>".$data['menu']."</a></li>";	
                                                                       
                                                                      }
                                                                    }
                                                                    ?>	
	                                                </ul>
						</div>
</div>