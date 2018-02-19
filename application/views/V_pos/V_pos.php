<?php  
 $id_inv = $this->db->get('data_invoices')->num_rows();
 
?>
<!-------PREVIEW-------->
<div  class="modal fade bs-example-modal-xs" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                           <div class="modal-body">
                               <div class="col-md-10  center-margin" style="border:1px solid ;"  id="data_preview">  
                                                      
                             </div>      
                           </div>
                          <p align="center" style="color:#9e0505; font-size:16px;  ">Untuk melakukan edit silahkan datangi bagian inventory untuk di koordinasikan karena stok tersebut telah berkurang</p> 
        
                        <div class="modal-footer">
                           <button type="button" class="btn btn-warning "data-dismiss="modal"><span class="fa fa-close"></span> Close</button>
                            <a href="<?php echo base_url('C_pos/cetak_struk/'.$id_inv)  ?>"><button type="button" name="simpan_customer" class="btn bg-green"><span class="fa fa-print"></span> Print</button></a>
                        </form>
                        </div>
               </div>
           </div>
    </div>
<!-------PREVIEW-------->

<body onload="load_data_barcode_sementara()"></body>

<script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.min.js"></script>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">BUAT DATA CUSTOMER</h4>
                        </div>
                        <div class="modal-body">
                            
                <form action="<?php echo base_url('C_pos/simpan_customer');?>" method="post" enctype="multipart/formdata">
                <input class="form-control"  placeholder="nama customer" name="nama_customer" type="text"><br>
                <input class="form-control"  name="telp" placeholder="Telp" type="text"><br>
                <textarea class="form-control"  name="alamat" placeholder="Alamat" type="text"></textarea><br>
                
                             
                       </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default"data-dismiss="modal">Close</button>
                            <button type="submit" name="simpan_customer" class="btn bg-green">Save</button>
                        </form>
                        </div>
               </div>
           </div>
    </div >


    
 <link href="<?php echo base_url()?>assets/jquery/jquery-ui.css" rel="stylesheet">
   <script>
     $(function () {
        $("#customer").autocomplete({
            minLength:0,
            delay:0,
            source:'<?php echo site_url('C_pos/get_allcustomer'); ?>',   //nama source kita ambil langsung memangil fungsi get_allkota
             select:function(event, ui){
                $('#id_customer').val(ui.item.id_customer);
                $('#nama_customer').val(ui.item.nama_customer);
                $('#alamat').val(ui.item.alamat);
                $('#telp').val(ui.item.telp);
                }
            }
                    );
        });
    </script>
    
    <script type="text/javascript">
     $(function () {
        $("#nama_produk").autocomplete({
            minLength:0,
            delay:0,
            source:'<?php echo site_url('C_pos/get_allproduk'); ?>',   //nama source kita ambil langsung memangil fungsi get_allkota
             select:function(event, ui){
                $('#nama_produk').val(ui.item.nama_produk);
                $('#harga_produk').val(ui.item.harga_produk);
                $('#id_produk').val(ui.item.id_produk);
                }
            }
                    );
        });
    </script>
    
<div class="x_panel">
 <div class="x_title">
    <h2>PENJUALAN</h2>
        <div class="clearfix">
     </div>
  </div>
    
   
  <script type="text/javascript">
    $(document).ready(function(){
        $("#nama_produk").mouseout(function(){
            var nama_produk=$("#nama_produk").val();
            var harga_produk=$("#harga_produk").val();
            var id_produk=$("#id_produk").val();
            
           $.ajax({
                type:"POST",
                url:"<?php echo base_url('C_pos/simpan_data_barcode_sementara')?>",
                data:"nama_produk="+nama_produk+"&harga_produk="+harga_produk+"&id_produk="+id_produk,
                success:function(html){
                   load_data_barcode_sementara();
                  $("#barcode").val("");
                  $("#nama_produk").val("");
                  $("#id_produk").val("");
                  $("#harga_produk").val("");
                
                 }
               
            });
            
            
        });
    });
</script>

<script type="text/javascript">

  function load_data_barcode_sementara(){
      $.ajax({
                type:"GET",
                url:"<?php echo base_url('C_pos/load_data_barcode_sementara')?>",
                data:"",
                success:function(html){
                 $("#data_hasil_barcode").html(html);
                }
               
            });
      
  }
</script>
<script type="text/javascript">
   function hapus(id){
       
        $.ajax({
                type:"GET",
                url:"<?php echo base_url('C_pos/hapus_data_barcode_sementara')?>",
                data:"id_data_barcode_sementara="+id,
                success:function(html){
               $('.sembunyikan'+id).hide(500);
               load_data_barcode_sementara();
           
             }
            });
      
       
   } 
    
</script>
<script type="text/javascript">
   function input_qty(id){
            
        var qty_produk=$("#qty_produk"+id).val();
        
             
            $.ajax({
               type:"POST",
               url:"<?php echo base_url('C_pos/input_qty')?>",
               data:"qty_produk="+qty_produk+"&id_data_barcode_sementara="+id,
               success:function(html){
               load_data_barcode_sementara(); 
              
                }
            });
           
    } 
</script>

<script type="text/javascript">
   function input_ppn(){
            
        var valppn=$("#valppn").val();
        
             
           $.ajax({
               type:"POST",
               url:"<?php echo base_url('C_pos/input_ppn')?>",
               data:"ppn="+valppn,
               success:function(html){
               load_data_barcode_sementara(); 
            
               }
            });
           
    } 
</script>
<script type="text/javascript">
   function input_diskon(){
            
       var valdiskon=$("#valdiskon").val();
       
         $.ajax({
               type:"POST",
              url:"<?php echo base_url('C_pos/input_diskon')?>",
               data:"diskon="+valdiskon,
               success:function(html){
               load_data_barcode_sementara(); 
            
              }
            });
           
    } 
</script>

   <script type="text/javascript">    
function input_barcode(){
            
       var foo=$("#foo").val();
       
         $.ajax({
               type:"GET",
               url:"<?php echo base_url('C_pos/input_barcode')?>",
               data:"foo="+foo,
               success:function(html){
                 load_data_barcode_sementara();
                 $("#foo").val("");
              }
            });
           
    } 
  </script>
   <script type="text/javascript">    
function tampil_barcode(){
          
      $('#tampil_barcode').show(500);
      $('#tampil_nama').hide(500);
    } 
  </script>
   <script type="text/javascript">    
function tampil_nama(){
          
      $('#tampil_nama').show(500);
      $('#tampil_barcode').hide(500);
  
    } 
  </script>
  
  <script type="text/javascript">    
function input_freight(){
      
        var freight=$("#freight").val();
       
         $.ajax({
               type:"POST",
               url:"<?php echo base_url('C_pos/input_freight')?>",
               data:"freight="+freight,
               success:function(html){
                 load_data_barcode_sementara();
                 
              }
            });
  
    } 
  </script>
  <script type="text/javascript">    
function input_nominal(){
      
        var nominal=$("#nominal").val();
       
         $.ajax({
               type:"POST",
               url:"<?php echo base_url('C_pos/input_nominal')?>",
               data:"nominal="+nominal,
               success:function(html){
                 load_data_barcode_sementara();
                 
              }
            });
    } 
  </script>
  <script type="text/javascript">
  
  function tampil_ship(){
      $("#tampil_ship").show(200);
   }
  function tutup_ship(){
      $("#tampil_ship").hide(200);
  }
  </script>
  <script type="text/javascript">
  function simpan_data(){
      var id_inv=$("#id_inv").val();
      var customer=$("#customer").val();
      var telp=$("#telp").val();
      var alamat=$("#alamat").val();
      var tampil_ship=$("#tampil_ship").val();
      var catatan=$("#catatan").val();
      var subtotal=$("#subtotal").val();
      var kembalian=$("#kembalian").val();
       
         $.ajax({
               type:"POST",
               url:"<?php echo base_url('C_pos/simpan_invoices')?>",
               data:"id_inv="+id_inv+"&customer="+customer+"&telp="+telp+"&alamat="+alamat+"&tampil_ship="+tampil_ship+"&catatan="+catatan+"&subtotal="+subtotal+"&kembalian="+kembalian,
               success:function(html){
                 load_data_barcode_sementara();
                 $("#tampil_print").show(500);
              }
            });
      
  }
  
  
  </script>
  
  <script type="text/javascript">
  function load_preview(){
      $.ajax({
                type:"GET",
                url:"<?php echo base_url('C_pos/load_preview/'.$this->uri->segment(3))?>",
                data:"",
                success:function(html){
                 $("#data_preview").html(html);
                }
               
            });
      
  }
</script> 
   <!------------BUAT BARCODE-----------------> 
           
   <input class="form-control"  id="id_inv" name="id_inv" type="hidden" value="<?php echo $id_inv; ?>">
       <div class="col-md-8">
       <div class="col-md-12">
        <div class="col-md-12 center-margin">
            <div class="btn-group">
                      <button type="button" class="btn btn-success">CARI BERDASARKAN</button>
                          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                               <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="#" onclick="tampil_barcode()" >Barcode</a>
                          </li>
                          <li><a href="#" onclick="tampil_nama()">Nama Produk</a>
                        </li>
                        </ul>
                    </div>
            
            <div class="col-md-8" >
            <div  id ="tampil_barcode"  class="form-group has-feedback">
              <input class="form-control" placeholder="Scan Barcode" id="foo" onkeyup="input_barcode()" type="text" name="foo"/>
             <span class="fa fa-barcode form-control-feedback"></span>
            </div>
         
          <div id="tampil_nama" style="display: none;"  class="form-group has-feedback">
          <input type="hidden" class="form-control" id="valppn" value="10">
          <input class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama produk" type="text">
          <input class="form-control" id="id_produk"   name="id_produk" placeholder="id produk" type="hidden">
          <input class="form-control" id="harga_produk" name="harga_produk" placeholder="harga produk" type="hidden">
          <span class="fa fa-product-hunt form-control-feedback"></span>
         </div>
      
          </div>  
         </div>
      </div>
        
      <div class="clearfix"></div>
         <div class="form-group has-feedback">
            <div class="table-responsive">
                            <table  class="table table-hover table-striped">
                                <tr align="center" style=" background-color:#1ABB9C; color:#FFFFFF; ">
                                <td style="width: 110px; font-size:14px; ">BARANG</td>
                                <td style="width: 110px; font-size:14px;">HARGA </td>
                                <td style="width: 90px; font-size:15px;" >QTY</td>
                                <td style="width: 150px; font-size:15px;">JUMLAH</td>
                                <td style="width: 90px; font-size:15px;">AKSI</td>
                                </tr>
                                <tbody id="data_hasil_barcode">
                              </tbody>
                            </table>
        
            </div>
         </div>
     </div>
   
     
<div class="col-md-4">
      <div class="input-group">
        <input class="form-control" id="id_customer" name="id_customer" type="hidden">
           <input class="form-control ui-autocomplete-input" id="customer" placeholder="nama customer" name="nama_customer" type="text" autocomplete="off">
              <span class="input-group-btn">
                 <button type="button"  class="btn btn-primary bg-green" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="fa fa-plus"></span></button>
               </span>
        </div>
       <div class="form-group has-feedback">
          <input class="form-control" readonly="" id="telp" name="telp" placeholder="Telp" type="text">
         <span class="fa fa-tty form-control-feedback"></span>
      </div>
       

        <div class="form-group has-feedback">
            <textarea class="form-control" readonly="" id="alamat" name="alamat" placeholder="Alamat" type="text"></textarea>
        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
      </div>
    
    <div class="btn-group form-group ">
                      <button type="button" class="btn btn-success">METODE PENGIRIMAN</button>
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <span class="caret"></span>
                         <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                         <li><a href="#" onclick="tutup_ship()" >On ship</a>
                        </li>
                        <li><a href="#" onclick="tampil_ship()" >Ship</a>
                        </li>
                        <li><a href="#" onclick="tampil_ship()" >Drop Ship</a>
                        </li>
                        </ul>
    </div>
    
    <select style="display: none;" id="tampil_ship" name="ship" class="form-control form-group">
                            <option></option>
                            <option>JNE</option>
                            <op<option>JNE</option>
                            <option>TIKI</option>
                            <option>WAHANA</option>
                            <option>J&T</option>
                            <option>GRABCELL</option>
                            <option>Ninja Xpress</option>
                            <option>MPX</option>
                            <option>TELL & C</option>
                          </select>
    
    
    <div class="form-group">
        <textarea class="form-control" id="catatan" name="catatan" placeholder="Catatan" ></textarea>
    </div>
    
    <div class="clearfix"></div>
    <hr>
          <div class="col-xs-4 pull-right">
              <button type="button" onclick="simpan_data()" class="btn bg-green btn-block btn-flat"><span class="fa fa-save"> Simpan</span></button>
          
          </div>
            <div class="col-xs-4 pull-right">
                <button type="button" onclick='input_ppn()'  class="btn btn-warning btn-block btn-flat"><span class="fa fa-money"> Ppn </span></button>
          
        </div> 
   
    <div style="display: none" id="tampil_print" class="col-xs-4 pull-right">
        
        <button type="button" onclick="load_preview()"  class="btn btn-primary bg-green" data-toggle="modal" data-target=".bs-example-modal-xs"><span class="fa fa-eye"> Preview </span></button>
        </div>
    </div>
</div>
       
          