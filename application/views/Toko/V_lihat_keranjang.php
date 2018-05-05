<script type="text/javascript">
function hapus_cart(id){
    var id_produk = id;
    $.ajax({
        type :"GET",
        url:"<?php echo base_url('Toko/hapus_cart')?>",
        data:"id_produk="+id_produk,
         
        success:function(html){
            load_data_checkout()
         }
        });
    
}
function load_data_checkout(){
     $("#data_checkout").load("<?php echo base_url('Toko/lihat_keranjang/'.$this->uri->segment(3))?> #data_checkout");
           
      
  }
 function input_qty(id){
 var qty_produk = $("#qty"+id).val();
 var id_produk  = id ;
 
        $.ajax({
               type:"GET",
               url:"<?php echo base_url('Toko/update_qty_cart')?>",
               data:"id_produk="+id_produk+"&qty_produk="+qty_produk,
               success:function(html){
               load_data_checkout()    
               }
            });
    
    }
 </script>
 <div class="container" style="padding:10px;">
 <div class="col-sm-12 checkout-atas langkah_konfirmasi_tampil">
        <div class="col-sm-12 checkout-bawah">
            <h4 align="center">Keranjang Belanja</h4>
        </div>
         
        
     <div id="data_checkout" >
	
     <table  class="table-striped table-hover table-bordered" style="width: 100%; text-align: center;">
					<thead>
                                            <tr>
                                                        <td><b>Nama Produk</b></td>
							<td><b>Harga</b></td>
							<td><b>Qty</b></td>
                                                	<td><b>Harga Total</b></td>
                                                        <td><b>Aksi</b></td>
						</tr>
					</thead>
 <?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>
           
                                        
					<tr>
                                           	<td class="invert"><?php echo $items['name']; ?></td>
						<td class="invert">Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
						<td class="invert"><?php echo form_input(array('value' => $items['qty'], 'maxlength' => '3', 'size' => '5', 'id'=>'qty'.$items['id'], 'onmouseout'=>'input_qty('.$items['id'].')' )); ?></td>
						<td class="invert">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
						<td class="invert">
                                                    <button class="btn btn-danger btn btn-md" onclick="hapus_cart(<?php echo $items['id']?>)"><b>X</b></button>
						</td>
					</tr>
                                        
<?php $i++; ?>

<?php endforeach; ?>			
                                        <tr class="rem1">
                                            <td class="invert"></td>   
                                            <td class="invert"></td>   
                                            <td class="invert"></td>   
                                            <td class="invert">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></td>   
                                            <td class="invert">Total</td>   
                                        </tr> 
				</table>
 </div>	</div></div>