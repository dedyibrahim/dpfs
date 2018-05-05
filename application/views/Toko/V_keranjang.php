
               
                        <?php $i = 1; ?>
                          <?php foreach ($this->cart->contents() as $items): ?>
                           <?php $i++; ?>
           <?php echo $items['name']; ?> <br>
 
           Rp.<?php echo $this->cart->format_number($items['price']); ?> X <?php echo$items['qty'] ?>
           Rp.<?php echo $this->cart->format_number($items['subtotal']); ?><br><br>       
                    <?php endforeach; ?> 
           
           <?php if($this->cart->total()== 0) { ?>   
           <p>Agan belum pilih barang..</p>
           
          <?php } else {?>
           <div class=total>Rp.<?php echo $this->cart->format_number($this->cart->total());?></div>
           <hr>
           <?php $data_user = $this->session->all_userdata(); 
           
           if(!empty($data_user['id_customer_toko'])?$data_user['id_customer_toko']:'' != NULL ){
            ?>
           <p align=center><a href=<?php echo base_url('Toko/lihat_keranjang/'.base64_encode($data_user['id_customer_toko'])) ?> ><button class=buton-bungkus>Lihat Keranjang </button></a>
           <a href=<?php echo base_url('Toko/checkout/'.base64_encode($data_user['id_customer_toko'])) ?> ><button class=buton-bungkus>Bungkus gan !</button></a></p>
           <?php } else {?>
            <p align=center><a href=<?php echo base_url('Toko/login') ?> ><button class=buton-bungkus>Bungkus Gan !</button></a></p>
          
          <?php } ?>
           
           
          <?php } ?>
           