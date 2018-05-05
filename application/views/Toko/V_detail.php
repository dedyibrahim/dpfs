<script type="text/javascript">
function addcart(id){
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

function load_data_cost(){
var kurir            = $("#kurir").val();
var kota_tujuan      = $("#kota_tujuan").val();
var berat_sementara  = $(".berat_total").html();

var qty_est           =$("#qty_est").val();

var berat_total       = berat_sementara * qty_est;
$( document ).ajaxStart(function() {
$( "#loading" ).show();
});
$( document ).ajaxComplete(function() {
$( "#loading" ).hide();
});
$.ajax({
type:"GET",
url:"<?php echo base_url('Toko/cost_cek_detail')?>",
data:"kurir="+kurir+"&kota_tujuan="+kota_tujuan+"&berat_total="+berat_total,
success:function(html){
$("#data_cost").html(html);
}
});




}
</script>
<?php 
foreach ($data->result_array() as $produk){
}
if($produk==''){
redirect(base_url());    
}else{
}
?>
<section>
<div class="container">
<div class="row">



<div class="product-details"><!--product-details-->

<div class="col-sm-4">
<div id="similar-product" style="padding:10px;" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" >

<div class="item active">
<a href=""><img  src="<?php echo base_url('uploads/produk_thumb/'.$produk['gambar0']) ?>" alt=""></a>
</div>

<div class="item">
<a href=""><img src="<?php echo base_url('uploads/produk_thumb/'.$produk['gambar0']) ?>" alt=""></a>
</div>
</div>

<a class="left item-control" href="#similar-product" data-slide="prev">
<i class="fa fa-angle-left"></i>
</a>

<a class="right item-control" href="#similar-product" data-slide="next">
<i class="fa fa-angle-right"></i>
</a>

</div>
</div>


<div class="col-sm-8" >
    <div style="border: 1px solid #ccc; float: none;margin: 0 auto; padding:10px; border-radius:5px;" class="col-md-12">
<h3 align="center"><?php echo $produk['nama_produk'];?></h3>
<b>Harga  :  </b> <span>Rp.<?php echo number_format($produk['harga_produk']);?></span><br><br>
<b>Berat Produk</b> : <span class="berat_total"><?php echo $produk['berat'] ?></span> Gram<br><br> 
<b>Ketersediaan  :  </b><?php if($produk['stok_toko'] >= 20 ) { echo "Stok > 20"; } else {echo "Stok < 20";  } ?><br><br>
<b>Kondisi  :  </b>Baru<br><br>

<p align="center" ><button style="color:#FFF; background-color:#40403E; "  type="button" onclick="addcart(<?php echo $produk['id_produk']?>)" class="btn btn-default middle-bar add-to-cart"><i class="fa fa-shopping-cart"></i>Tambahkan Ke Keranjang</button></p>
</div>
</div>

<div class="category-tab shop-details-tab col-sm-12"><!--category-tab-->
<div class="col-sm-12">
<ul class="nav nav-tabs">
<li class="active"><a href="#details" data-toggle="tab">Detail Produk</a></li>
<li><a href="#ongkos" data-toggle="tab">Estimasi Ongkos kirim</a></li>
<li><a href="#pertanyaan" data-toggle="tab">Pertanyaan</a></li>
<li><a href="#reviews" data-toggle="tab">Ulasan</a></li>
</ul>
</div>

<div class="tab-content">

<div class="tab-pane  fade in active " id="details" >
<h4><?php echo $produk['deskripsi'];?></h4>	
</div>

<div class="tab-pane fade" id="ongkos" >
    <div class="col-md-6">
<h4 align="center"><b>CEK ONGKOS KIRIM</b></h4>                                
<label>Pilih provinsi</label>                                   
<select class="form-control" id="provinsi_tujuan">
<?php 
$data_provinsi = json_decode($provinsi,true);
foreach ($data_provinsi['rajaongkir']['results'] as $prov){
echo "<option class='nama_provinsi".$prov['province_id']."' value=".$prov['province_id'].">".$prov['province']."</option>";
}
?>
</select>


<label>Pilih Kota</label>                                   
<select id="kota_tujuan" class="form-control"> 
<?php 
$data_kota = json_decode($kota,true);
foreach ($data_kota['rajaongkir']['results'] as $kot){
echo "<option class='nama_kota".$kot['city_id']."' value=".$kot['city_id'].">".$kot['city_name']."</option>";
}
?>
</select>
    <label>Qty Produk :</label>
    <input type="text" id="qty_est" value="1"  class="form-control">    

<label>Pilih Kurir :</label>
<select id="kurir"  onclick="load_data_cost()" class="form-control">
<option name="jne" value="jne">JNE</option>
<option name="jne" value="tiki">TIKI</option>
<option name="jne" value="pos">POS</option>

</select>
</div>
 
    <div class="col-md-6">    
        <h3><div id="data_cost"></div></h3>                                
    </div>
        
</div>

<div class="tab-pane fade" id="pertanyaan" >
<h1>PERTANYAAN</h1>	
</div>

<div class="tab-pane fade in" id="reviews" >
<h1>ULASAN</h1>	
</div>
</div>
</div>
</div>
</section>
