<script type="text/javascript">
    function uploadBuktibayar(id){ 
     var formdata = new FormData();      
     var file = $('#bukti_bayar'+id)[0].files[0];
     var total_bayar = $("#total_bayar"+id).html(); 
     var jumlah_bayar = $("#jumlah_bayar"+id).val();
     var no_inv       = $("#no_inv"+id).val();
        
        formdata.append('bukti_bayar', file);
      $.each($('#myForm').serializeArray(), function(a, b){
        formdata.append(b.name, b.value);
      });
   $( document ).ajaxStart(function() {
    $( "#loading" ).show();
 });
 $( document ).ajaxComplete(function() {
    $( "#loading" ).hide();
 });
    if(jumlah_bayar == '' || file == null ){
        
        swal({
               title:"", 
               text:"Masih terdapat data kosong gan..",
               timer:1500,
               type:"error",
               showCancelButton :false,
               showConfirmButton :false
            });
            
    } else if(jumlah_bayar != total_bayar){
         
         swal({
               title:"", 
               text:"Agan kurang bayar..",
               timer:1500,
               type:"error",
               showCancelButton :false,
               showConfirmButton :false
            });
      
     }else{
         
       $.ajax({
        url: '<?php echo base_url("Toko/simpan_bukti_bayar") ?>',
        data: formdata,
        processData: false,
        contentType: false,
        type: 'POST',
        beforeSend: function(){
        },
       success: function(ret) {
          console.log(ret); 
          $(".konfirmasi_bayar").load("<?php echo base_url('Toko/konfirmasi_bayar/'.$this->uri->segment(3))?>  #konfirmasi_bayar");
          
           
         swal({
               title:"", 
               text:"Konfirmasi pembayaran berhasil gan..",
               timer:1500,
               type:"success",
               showCancelButton :false,
               showConfirmButton :false
            });
        }
      });
      return false; 
    
    }
      
     
    }
  </script>
     
<div class="container  konfirmasi_bayar" >
    <div id="konfirmasi_bayar">
        
        
<?php 
$i=0;
foreach ($data_konfirmasi->result_array() as $konfirmasi_pembayaran ) {    
$pemisah_panel = $konfirmasi_pembayaran['no_invoices'];
$i++;
$pemisah =  explode("/", $pemisah_panel);
;
?>
         
    <div class="panel panel-default" id="panel1">
        <div class="panel-heading">
            <h4 data-toggle="collapse" data-target="#<?php echo $pemisah[5]; ?>" class="panel-title " <?php echo $pemisah[5]; ?>">Konfirmasi pembayaran No.invoices <?php  echo $konfirmasi_pembayaran['no_invoices'];  ?></h4>
        </div>
        <div id="<?php echo $pemisah[5]; ?>" class="panel-collapse collapse <?php if ($i == 1){ echo"in"; } else { } ?> ">
            <div class="panel-body">
                <div class="col-sm-4">
                    <div id="bukti_upload">
                        
         <form method="post" id="myForm" action="#" enctype="multipart/form-data" >
       <label>Upload Bukti bayar :</label> 
       <input class="form-control" type="file" id="bukti_bayar<?php echo $pemisah[5]; ?>">
      <br/>
      <label>Jumlah bayar</label>
      
      <input class="form-control"  id="no_inv<?php echo $pemisah[5]; ?>" value="<?php  echo $konfirmasi_pembayaran['no_invoices'];  ?>" type="hidden" name="no_inv">
      <input class="form-control" id="jumlah_bayar<?php echo $pemisah[5]; ?>" value="" type="text" name="jumlah_bayar">
      <input class="form-control" value="<?php  echo $konfirmasi_pembayaran['no_invoices'];  ?>" type="hidden" name="no_invoices">
      
      <br/>
      <button type="button" onclick="return uploadBuktibayar(<?php echo $pemisah[5]; ?>)" class="btn btn-primary">Simpan pembayaran</button>
    </form>
                            </div>
                </div>
                <div class="col-sm-8">
                    <table style="width:100%; text-align: center; " class="table-striped table-bordered table-hover table-responsive">
                      <tr style="">
                            <td>Nama produk</td>
                            <td>Qty</td>
                            <td>Harga</td>
                            <td>Harga total</td>
                        </tr>
                   
                    <?php 
                $data_produk = $this->db->get_where('data_toko_penjualan_produk',array('no_invoices'=>$konfirmasi_pembayaran['no_invoices']));
                
                foreach ($data_produk->result_array() as $data_order){
                   ?> 
                        <tr>
                            <td><?php echo $data_order['nama_produk'];?></td>
                            <td><?php echo $data_order['qty'];?></td>
                            <td><?php echo $data_order['harga'];?></td>
                            <td><?php echo $data_order['harga_total'];?></td>
                        </tr>   
                        
                   
                    
                    
                  
               <?php  }
                
                ?>
                      
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Sub total</td>
                            <td><?php echo $konfirmasi_pembayaran['sub_total']; ?></td>
                        </tr>
                    <?php if ($konfirmasi_pembayaran['nilai_diskon'] != 0){ ?>
                      <tr>
                            <td></td>
                            <td></td>
                            <td>Diskon <?php echo  $konfirmasi_pembayaran['nilai_diskon'] ?> %</td>
                            <td><?php echo  $konfirmasi_pembayaran['hasil_diskon'] ?></td>
                        </tr>
                    <?php }?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td><?php echo  $konfirmasi_pembayaran['total'] ?></td>
                        </tr>
                        
                      <tr>
                            <td></td>
                            <td></td>
                            <td>Ongkos kirim</td>
                            <td><?php echo  $konfirmasi_pembayaran['ongkos_kirim'] ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total bayar</td>
                            <td id="total_bayar<?php echo $pemisah[5]; ?>"><?php echo  $konfirmasi_pembayaran['total_bayar'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
        
        
<?php } ?>

<?php if(!empty($konfirmasi_pembayaran['no_invoices'])?$konfirmasi_pembayaran['no_invoices']:'' !=''){
    
    
}else{
?>

<div class="container">
    <h3 align="center">Tidak ada pembayaran yang harus di konfirmasi <span class="fa fa-warning"></span></h3>
    
</div>
<?php } ?>
    </div>
</div>
  <div class="container">
        <div class="col-sm-12 ">
            <div class="col-sm-6" style="margin:0 auto; float:none; ">
                <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
    <thead>
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd; background-color:#168A35; font-weight:bold;text-align:left;padding:7px;color:#fff">Instruksi</td>
      </tr>
    </thead>
    <tbody>
      <tr>
   <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">Intruksi Transfer Bank<br>
<br>
Silahkan melakukan pembayaran dengan mentransfer ke rekening di bawah ini, sesuai dengan nominal order Anda.<br>
<br>
Nama Bank:  BCA  ( KCP Muara Karang - Pluit )<br>
No. Rekening: PT. Angkasindo Dunia<br>
Atas nama: 0697089008<br>
<br>
Nama Bank:  Bank Mandiri ( KCP Muara Karang )<br>
No. Rekening: PT. Angkasindo Dunia<br>
Atas nama: 1150004051720<br>
<br>
<br>
Pesanan Anda tidak akan dikirim sampai Kami menerima pembayaran Anda.</td>
      </tr>
    </tbody>
  </table>


                </div>
            </div>    
        </div> 