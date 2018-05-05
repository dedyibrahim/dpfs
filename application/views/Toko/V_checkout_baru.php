<body onload="langkah_checkout()"></body>
<?php 
$data_sesi =  $this->session->all_userdata();
$data_customer = $this->db->get_where('data_customer_toko',array('id_customer_toko'=> base64_decode($this->uri->segment(3))));
foreach ($data_customer->result_array() as $customer){

}            
?>

<script type="text/javascript">
function load_data_cost(){
var kurir                  = $("#kurir").val();
var id_customer            = <?php echo base64_decode($this->uri->segment(3)) ?>;

$( document ).ajaxStart(function() {
$( "#loading" ).show();
});
$( document ).ajaxComplete(function() {
$( "#loading" ).hide();
});
$.ajax({
type:"POST",
url:"<?php echo base_url('Toko/cost_pengiriman')?>",
data:"id_customer="+id_customer+"&kurir="+kurir,
success:function(html){
$("#data_cost").html(html);
}
});
}

function simpan_alamat(){
$( document ).ajaxStart(function() {
$( "#loading" ).show();
});
$( document ).ajaxComplete(function() {
$( "#loading" ).hide();
});
var metode_pembayaran     = $(".metode_pembayaran:checked").val();
var nomor_kontak           = $("#nomor_kontak").val();
var provinsi_tujuan        = $("#provinsi_tujuan").val();
var kota_tujuan            = $("#kota_tujuan").val();
var alamat_lengkap         = $("#alamat_lengkap").val();
var nama_kota              = $(".nama_kota"+kota_tujuan).html();
var nama_provinsi          = $(".nama_provinsi"+provinsi_tujuan).html();
var id_customer            = <?php echo base64_decode($this->uri->segment(3)) ?>;

if(alamat_lengkap == "" || metode_pembayaran == null  || nomor_kontak == "" || provinsi_tujuan == "" || alamat_lengkap == "" ) {
swal({
title:"", 
text:"Harap Isi semua alamat dan metode pembayaran",
timer:1500,
type:"warning",
showCancelButton :false,
showConfirmButton :false
});
}else{
$.ajax({
type:"POST",
url:"<?php echo base_url('Toko/simpan_data_alamat')?>",
data:"metode_pembayaran="+metode_pembayaran+"&nama_kota="+nama_kota+"&nama_provinsi="+nama_provinsi+"&id_customer="+id_customer+"&nomor_kontak="+nomor_kontak+"&provinsi_tujuan="+provinsi_tujuan+"&kota_tujuan="+kota_tujuan+"&alamat_lengkap="+alamat_lengkap,
success:function(html){

swal({
title:"", 
text:"Data berhasil disimpan",
timer:1500,
type:"success",
showCancelButton :false,
showConfirmButton :false
});
$("#reload_alamat").load("<?php echo base_url('Toko/checkout/'.$this->uri->segment(3))?> #cek_alamat");
langkah_checkout();

}
}); 


}


}
function alamat_baru(){
var id_customer            = <?php echo base64_decode($this->uri->segment(3)) ?>;
$.ajax({
type:"POST",
url:"<?php echo base_url('Toko/alamat_baru')?>",
data:"id_customer="+id_customer,
success:function(html){
$("#reload_alamat").load("<?php echo base_url('Toko/checkout/'.$this->uri->segment(3))?> #cek_alamat");
langkah_checkout();

}
});
}

function alamat_lama(){
$( document ).ajaxStart(function() {
$( "#loading" ).show();
});
$( document ).ajaxComplete(function() {
$( "#loading" ).hide();
});    

$("#alamat_lama").show(100);
$("#alamat_baru").hide(100);
}

function simpan_kurir(){

var ongkos_terpilih  = $(".ongkos_terpilih:checked").val();
var nama_kurir       = $("#nama_kurir").html();

if( ongkos_terpilih != null ){
$( document ).ajaxStart(function() {
$( "#loading" ).show();
});
$( document ).ajaxComplete(function() {
$( "#loading" ).hide();
});    

$.ajax({

type:"GET",
url:"<?php echo base_url('Toko/simpan_data_kurir')?>",
data:"ongkos_terpilih="+ongkos_terpilih+"&nama_kurir="+nama_kurir,
success:function(html){

swal({
title:"", 
text:"Data Kurir Berhasil disimpan gan",
timer:1500,
type:"success",
showCancelButton :false,
showConfirmButton :false
});
langkah_checkout();
$(".langkah_pengiriman_tampil").addClass("langkah_pengiriman");
$(".langkah_konfirmasi_tampil").removeClass("langkah_konfirmasi");
$("#konfirmasi").load("<?php echo base_url('Toko/checkout/'.$this->uri->segment(3))?> .data_konfirmasi");

$("#cek_ketersedian_ongkir").load("<?php echo base_url('Toko/checkout/'.$this->uri->segment(3))?> #ada_ongkir");

} 

});

}else{
swal({
title:"", 
text:"Harap Pilih Ongkos kirimnya gan",
timer:1500,
type:"warning",
showCancelButton :false,
showConfirmButton :false
});
}

}
function simpan_kode_kupon(){
$( document ).ajaxStart(function() {
$( "#loading" ).show();
});
$( document ).ajaxComplete(function() {
$( "#loading" ).hide();
});

var kode_voucher = $('#kode_voucher').val();
$.ajax({
type:'POST',
url:'<?php echo base_url('Toko/set_voucher'); ?>',
data:"kode_voucher="+kode_voucher,
success:function(html){
swal({
title:"", 
text:"Kode Voucher Berhasil di simpan",
timer:1500,
type:"success",
showCancelButton :false,
showConfirmButton :false
});
$("#konfirmasi").load("<?php echo base_url('Toko/checkout/'.$this->uri->segment(3))?> .data_konfirmasi");

} 

});

}

function ganti_kurir(){

$( document ).ajaxStart(function() {
$( "#loading" ).show();
});
$( document ).ajaxComplete(function() {
$( "#loading" ).hide();
});
$.ajax({

type:"POST",
url:"<?php echo base_url('Toko/ganti_kurir') ?>",
data:"",
success:function(html){

swal({
title:"", 
text:"Data Kurir Berhasil di hapus",
timer:1500,
type:"success",
showCancelButton :false,
showConfirmButton :false
});
langkah_checkout();
$("#ongkos_baru").show(100);
$("#ongkos_lama").hide(100);
} 
});


}

function hapus_kupon(){
$( document ).ajaxStart(function() {
$( "#loading" ).show();
});
$( document ).ajaxComplete(function() {
$( "#loading" ).hide();
});

$.ajax({
type:"POST",
url:"<?php echo base_url('Toko/hapus_kupon') ?>",
data:"",
success:function(html){
swal({
title:"", 
text:"Kupon berhasil di hapus",
timer:1500,
type:"success",
showCancelButton :false,
showConfirmButton :false
});
$("#konfirmasi").load("<?php echo base_url('Toko/checkout/'.$this->uri->segment(3))?> .data_konfirmasi");

} 
});
}

function proses_bayar(){

$( document ).ajaxStart(function() {
$( "#loading" ).show();
});
$( document ).ajaxComplete(function() {
$( "#loading" ).hide();
});
var id_customer =<?php echo base64_decode($this->uri->segment(3)) ?>;

if (id_customer == null)
{  swal({
title:"", 
text:"Proses pesanan gagal",
timer:1500,
type:"error",
showCancelButton :false,
showConfirmButton :false



});

} else {

$.ajax({

type:"POST",
url :"<?php echo base_url('Toko/simpan_order') ?>",
data:"id_customer="+id_customer,
success:function(html){

swal({
title:"", 
text:"Proses pesanan berhasil silahkan cek email agan untuk proses pembayaran",
timer:1500,
type:"success",
showCancelButton :false,
showConfirmButton :false



});
window.location="<?php  echo base_url("Toko/konfirmasi_bayar/".$this->uri->segment(3)); ?>";
}

}); 
}       
}

function langkah_checkout(){
$( document ).ajaxStart(function() {
$( "#loading" ).show();
});
$( document ).ajaxComplete(function() {
$( "#loading" ).hide();
});
$.ajax({

type:"GET",
url:"<?php echo base_url('Toko/langkah_checkout')?>",
data:"",
success:function(html){
$("#langkah_langkah").html(html);

}
});

}

function langkah_metode_pengiriman(){
var metode_pembayaran     = $(".metode_pembayaran:checked").val();

if(metode_pembayaran == null){

swal({
title:"", 
text:"Anda Belum memilih metode pembayaran untuk transaksi ini",
timer:1500,
type:"warning",
showCancelButton :false,
showConfirmButton :false
});
    
} else {
    
$.ajax({
type:"POST",
url:"<?php echo base_url('Toko/simpan_data_alamat')?>",
data:"metode_pembayaran="+metode_pembayaran,
success:function(html){
$(".langkah_alamat_tampil").addClass("langkah_alamat");
$(".langkah_pengiriman_tampil").removeClass("langkah_pengiriman");
}
});

}
}

function kembali_alamat(){
$(".langkah_alamat_tampil").removeClass("langkah_alamat");
$(".langkah_pengiriman_tampil").addClass("langkah_pengiriman");

}

function kembali_pengiriman(){
$(".langkah_konfirmasi_tampil").addClass("langkah_konfirmasi");
$(".langkah_pengiriman_tampil").removeClass("langkah_pengiriman");

}
function ada_kurir(){
 $(".langkah_pengiriman_tampil").addClass("langkah_pengiriman");
$(".langkah_konfirmasi_tampil").removeClass("langkah_konfirmasi");
   
}


</script>

<div class="container">

<!--------------------------------------------------------->
<div id="langkah_langkah" class="text-center"></div>
<div id="reload_alamat">
<div id="cek_alamat">   

<div class="col-sm-12 checkout-atas langkah_alamat_tampil"  >
<div class="col-sm-12 checkout-bawah" >
<h4 align="center">Metode Pembayaran & Alamat Pengiriman</h4>
</div>

<?php  if (!empty($customer['alamat_lengkap'])) { ?>
<div id="alamat_lama">
<div class="col-md-6">
<label>Nomor HP/Telephone</label>
<input readonly="" value="<?php echo $customer['nomor_kontak']; ?>" type="text" readonly=""    class="form-control" name="">
<label>Pilih provinsi</label>                                   
<input readonly="" value="<?php echo $customer['nama_provinsi']; ?>" type="text"   readonly=""    class="form-control" name="">
<label>Pilih Kota</label>                                   
<input readonly=""  value="<?php echo $customer['nama_kota']; ?>" type="text"   readonly=""    class="form-control" name="">
</div>
<div class="col-md-6">
<label>Input data pengiriman</label>
<textarea  disabled="" readonly=""  class="form-control" placeholder="Kecamatan,kelurahan,Desa,RT/RW,Nomor Rumah"><?php echo $customer['alamat_lengkap']; ?></textarea>    
<p align="center"><label>PILIH METODE PEMBAYARAN</label><br>
<?php 
if (!empty($data_sesi['metode_pembayaran'])?$data_sesi['metode_pembayaran'] : '' != '') {
?>
<input <?php if($data_sesi['metode_pembayaran'] == 'Bank Transfer'){echo 'checked';} ?>  class="metode_pembayaran" type="radio" value='Bank Transfer'   name="option"><b> BANK TRANSFER</b>
<input <?php if($data_sesi['metode_pembayaran'] == 'Cash On Delivery'){echo 'checked';} ?> class="metode_pembayaran" type="radio" value="Cash On Delivery" name="option"> <b>CASH ON DELIVERY</b>
<?php }else{ ?>
<input  class="metode_pembayaran" type="radio" value='Bank Transfer'   name="option"> <b> BANK TRANSFER</b>
<input class="metode_pembayaran" type="radio" value="Cash On Delivery" name="option"> <b> CASH ON DELIVERY</b>
<?php } ?>
</p> 
<div class="footer">
<button onclick="alamat_baru()" class="middle-bar btn btn-primary right"> Alamat Baru  <span class="fa fa-plus"></span></button>
<button onclick="langkah_metode_pengiriman()" class=" pull-right btn btn-primary right">Lanjutkan <span class="fa fa-angle-double-right"> </span></button>&nbsp;
</div>   

</div></div>

<?php  } else { ?>

<div class="col-md-6">

<label>Nomor HP/Telephone</label>
<input type="text" id="nomor_kontak" value="<?php echo $customer['nomor_kontak']; ?>"   class="form-control" name="">
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
</div>
<div class="col-md-6">
<label>Input data pengiriman</label>
<textarea id="alamat_lengkap" class="form-control" placeholder="Kecamatan,kelurahan,Desa,RT/RW,Nomor Rumah"><?php echo $customer['alamat_lengkap']; ?></textarea>    
<br>
<p align="center"><label>PILIH METODE PEMBAYARAN</label><br>
<?php 
if (!empty($data_sesi['metode_pembayaran'])?$data_sesi['metode_pembayaran'] : '' != '') {
?>
<input <?php if($data_sesi['metode_pembayaran'] == 'Bank Transfer'){echo 'checked';} ?>  class="metode_pembayaran" type="radio" value='Bank Transfer'   name="option"><b> BANK TRANSFER</b>
<input <?php if($data_sesi['metode_pembayaran'] == 'Cash On Delivery'){echo 'checked';} ?> class="metode_pembayaran" type="radio" value="Cash On Delivery" name="option"><b> CASH ON DELIVERY</b>
<?php }else{ ?>
<input  class="metode_pembayaran" type="radio" value='Bank Transfer'   name="option"> <b> BANK TRANSFER</b>
<input class="metode_pembayaran" type="radio" value="Cash On Delivery" name="option"> <b> CASH ON DELIVERY</b>
<?php } ?>
</p> 

<button onclick="simpan_alamat()" class=" pull-right btn btn-primary right">Lanjutkan <span class="fa fa-angle-double-right"></span></button>&nbsp;
</div>       
<?php } ?>       
</div>                             
</div>
</div>
<!--------------------------------------------------------->

<div class="col-sm-12 checkout-atas langkah_pengiriman langkah_pengiriman_tampil"  >
<div class="col-sm-12 checkout-bawah" >
<h4 align="center">Metode pengiriman</h4>
</div>
<div id="cek_ketersedian_ongkir">
<div id="ada_ongkir">
<?php
if(!empty($data_sesi['ongkos_terpilih'])?$data_sesi['ongkos_terpilih']:NULL != NULL){
?>
<div id="ongkos_baru" style="display: none;">
<div class="col-md-6">
<label>Pilih Kurir</label>
<select id="kurir"  onclick="load_data_cost()" class="form-control">
<option name="jne" value="jne">JNE</option>
<option name="jne" value="tiki">TIKI</option>
<option name="jne" value="pos">POS</option>
</select>

</div>
<body onload="load_data_cost()"></body>
<div class="col-md-6" >
<div id="data_cost">
</div>
</div>
</div>

<div class="col-md-6" id="ongkos_lama">
<h2 align="center">Agan memilih jasa pengiriman <br><p id="nama_kurir"><?php echo $data_sesi['nama_kurir']; ?></b></h2>
<h3>Jenis Service :<b id="jenis_service"><?php echo $data_sesi['service']; ?></b></h3>    
<h3>Ongkos kirim : Rp.<b id="ongkos_kirim"><?php echo number_format($data_sesi['ongkos_terpilih']);?></b></h3>
<div class='footer'>
<button onclick='kembali_alamat()' class='pull-left btn btn-primary'>Kembali  <span class='fa fa-angle-double-left'></span></button>&nbsp;
<button onclick='ganti_kurir()' class=' btn btn-primary'>Ganti kurir <span class='fa fa-times'></span></button>
<button onclick='ada_kurir()' class='pull-right btn btn-primary right'>Lanjutkan <span class='fa fa-angle-double-right'></span></button>
</div> 
</div>  

<?php }else{ ?>   

<div class="col-md-6">
<label>Pilih Kurir</label>
<select id="kurir"  onclick="load_data_cost()" class="form-control">
<option name="jne" value="jne">JNE</option>
<option name="jne" value="tiki">TIKI</option>
<option name="jne" value="pos">POS</option>
</select>
</div>

<body onload="load_data_cost()"></body>
<div class="col-md-6" >
<div id="data_cost">
</div>
</div>
<?php } ?> 
</div>
</div>
</div>

<!--------------------------------------------------------->

<div class="col-sm-12 checkout-atas langkah_konfirmasi_tampil  langkah_konfirmasi"  >
<div class="col-sm-12 checkout-bawah" >
<h4 align="center">Konfirmasi pesanan</h4>
</div>
<div id="konfirmasi" class="data_konfirmasi">
<button  data-toggle="modal" data-target=".modal_kupon" type="button" class=" btn btn-primary"><span class="fa fa-plus"></span> GUNAKAN KODE KUPON</button>  
<hr>
<table  style="text-align:center; width: 100%"  class=" table-condensed table-striped table-responsive table-hover table-bordered">
<thead  style="text-align:center; background-color:#168A35; color: #fff; " >
<tr>
<td><b>Gambar</td>
<td><b>Qty</td>
<td><b>Nama Produk</td>
<td><b>Berat</td>
<td><b>Harga</td>
<td><b>Harga Total</td>
</tr>
</thead>
<?php $i = 1;
$berat_total = 0;
?>
<?php foreach ($this->cart->contents() as $items): ?>


<tr class="rem1"  >
<td class="invert-image"><img style="width:100px; height: 100px;" src="<?php echo base_url('uploads/produk_thumb/')?><?php echo $items['gambar0'];?>"></td>
<td class="invert"><?php echo $items['qty']; ?></td>
<td class="invert"><?php echo $items['name']; ?></td>
<td class="invert"><?php echo $items['berat']*$items['qty']; ?> Gram</td>
<td class="invert">Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
<td class="invert">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>

</tr>

<?php    
$berat_sementara  = $items['berat']*$items['qty']; 

$berat_total += $berat_sementara;  

?>                                        
<?php $i++; ?>

<?php endforeach; ?>			
<tr class="rem1">
<td class="invert"></td>
<td class="invert"></td>
<td class="invert">Berat Total : </td>
<td class="invert" ><?php echo $berat_total; ?> Gram</td>
<input type="hidden" class="berat_total"  value="<?php echo $berat_total; ?>">
<td class="invert">Sub Total</td>   
<td class="invert">Rp.<?php echo number_format($this->cart->total()); ?></td>   
</tr>

<?php if(!empty($data_sesi['diskon_voucher'])?$data_sesi['diskon_voucher']:NULL !=NULL){ ?>
<tr class="rem1">
<td class="invert"></td>
<td class="invert"></td>
<td class="invert"></td>
<td class="invert"><button type="button" onclick="hapus_kupon()" class="btn btn-warning"><span class="fa fa-minus"></span> hapus kupon</button></td>
<td class="invert">Diskon <?php echo $data_sesi['diskon_voucher'] ?> % </td>   
<td class="invert">Rp.<?php echo number_format($hasil_kupon); ?></td>   
</tr>
<?php } ?>

<tr class="rem1">
<td class="invert"></td>
<td class="invert"></td>
<td class="invert"></td>
<td class="invert"></td>
<input type="hidden" class="berat_total"  value="<?php echo $berat_total; ?>">
<td class="invert">Total</td>   
<td class="invert">Rp.<?php echo number_format($hasil_total); ?></td>   
</tr>

<tr class="rem1">
<td class="invert"></td>
<td class="invert"></td>
<td class="invert"></td>
<td class="invert" align="center"></td>
<td class="invert">Ongkos Kirim</td>   
<td class="invert">Rp.<?php echo number_format(!empty($data_sesi['ongkos_terpilih'])?$data_sesi['ongkos_terpilih']:0);?></td>   
</tr>
<tr class="rem1">
<td class="invert"></td>
<td class="invert"></td>
<td class="invert"></td>
<td class="invert"></td>
<td class="invert">Total Bayar</td>   
<td class="invert">Rp.<?php echo $this->cart->format_number($hasil_total+=!empty($data_sesi['ongkos_terpilih'])?$data_sesi['ongkos_terpilih']:0); ?></td>   
</tr> 
</table>

<div class="footer">
<button onclick='kembali_pengiriman()' class='pull-left btn btn-primary'>Kembali  <span class='fa fa-angle-double-left'></span></button>&nbsp;
<button onclick="proses_bayar()" class='pull-right btn btn-primary right'>Lanjutkan dan simpan <span class='fa fa-angle-double-right'></button>

</div>  
</div>
</div>
</div>

<div class="modal fade modal_kupon" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="myModalLabel">MASUKAN KODE KUPON</h4>
</div>
<div class="modal-body">
<label>KODE KUPON</label>
<input  type="text" id="kode_voucher" class="form-control" required=""  name="voucher">  
</div>
<div class="modal-footer">
<button type="button" onclick="simpan_kode_kupon()" class="btn btn-primary" id="btn_kupon">SIMPAN</button>
</div>
</div>
</div>
</div>

