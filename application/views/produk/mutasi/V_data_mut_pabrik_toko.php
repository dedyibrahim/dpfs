

<?php
if($this->uri->segment(3) != NULL){

foreach ($query->result_array() as $data){
}
?>

<div class="x_panel">
<div class="x_title">
<h2>MEMBUAT PERPINDAHAN STOK DARI PABRIK KE TOKO</h2>
<div class="clearfix"></div>
</div>
<div class="col-md-6">
<form action="<?php echo base_url('C_produk/simpan_mutasi')  ?>" method="POST" enctype="multipart/form-data">  
<input type="hidden" name="id_produk" readonly="" value="<?php echo $data['id_produk'];?>" class="form-control">
<label class="col-sm-7   control-label">NAMA PRODUK</label>
<div class="col-sm-10">
<input type="text" value="<?php echo $data['nama_produk']; ?>" readonly="" class="form-control">
</div>
<label class="col-sm-7 control-label">STOK PABRIK</label>
<div class="col-sm-10">
<input type="text" readonly="" value="<?php echo $data['stok_pabrik'];?>" class="form-control">
</div>

</div>
    
    <div class="col-md-6">    
<label class="col-sm-7   control-label">STOK TOKO TERSEDIA</label>
<div class="col-sm-10">
<input type="text" value="<?php echo $data['stok_toko']; ?>" readonly="" class="form-control">
</div>
<label class="col-sm-7 control-label">PENAMBAHAN STOK KE TOKO</label>
<div class="col-sm-10">
<input name="mut_stok_pabrik" type="text"  class="form-control">
</div>
<div class="clearfix"></div>
<hr>  
<div class="col-xs-4 pull-right">
<button type="submit" name="btnToko" class="btn bg-green btn-block btn-flat"><span class="fa fa-save"> Simpan</span></button>
</div>
</form>

    </div>   
</div>
<?php } ?>

<div class="x_panel">
<div class="x_title">

<div class="controls pull-left">
<div class=" input-group">
<form action="<?php echo base_url('C_produk/lapor_mutasi')?>" method="POST" enctype="multipart/form-data">
<input type="text" style="width: 200px" name="tanggal"   name="reservation" id="reservation" class="form-control" value="">
&nbsp;<button name="btnToko" class="btn-primary btn btn-md" type="submit"><span class="fa fa-print"></span> CETAK LAPORAN</button>  
</div>
</form>   
</div>
<h2 class="pull-right">DATA PERPINDAHAN STOK DARI PABRIK KE TOKO</h2>
<div class="clearfix"></div>
</div>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/');?>vendors/datatables/datatables/media/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
{
return {
"iStart": oSettings._iDisplayStart,
"iEnd": oSettings.fnDisplayEnd(),
"iLength": oSettings._iDisplayLength,
"iTotal": oSettings.fnRecordsTotal(),
"iFilteredTotal": oSettings.fnRecordsDisplay(),
"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
};
};

var t = $("#tabel").dataTable({
initComplete: function() {
var api = this.api();
$('#tabel')
.off('.DT')
.on('keyup.DT', function(e) {
if (e.keyCode == 13) {
api.search(this.value).draw();
}
});
},
oLanguage: {
sProcessing: "Sabarr..."
},
processing: true,
serverSide: true,
ajax: {"url": "<?php echo base_url('C_produk/data_json_mut_pabrik_toko') ?> ", "type": "POST"},
columns: [
{
"data": "id_mut_pabrik_toko",
"orderable": true
},
{"data": "id_mut_pabrik_toko"},
{"data": "nama_produk"},
{"data": "stok"},
{"data": "stok_toko"},
{"data": "waktu"},
{"data": "status"},


],
order: [[1, 'desc']],
rowCallback: function(row, data, iDisplayIndex) {
var info = this.fnPagingInfo();
var page = info.iPage;
var length = info.iLength;
var index = page * length + (iDisplayIndex + 1);
$('td:eq(0)', row).html(index);
}
});
});
</script>



<div class="dashboard_graph">
<table id="tabel" width="100%" class="table table-striped table-bordered dataTable"  role="grid" aria-describedby="datatable-fixed-header_info"><thead>
<tr role="row" align="center">
<th class="sorting_asc" align="center"   aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">No</th>
<th class="sorting_asc" align="center"   aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Id Mutasi</th>
<th class="sorting" align="center"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 100px;" aria-label="Name: activate to sort column descending">Nama Barang</th>
<th class="sorting"align="center"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 100px;" aria-label="Name: activate to sort column descending">Jumlah Mutasi</th>
<th class="sorting"align="center"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 100px;" aria-label="Name: activate to sort column descending">Stok Toko sekarang</th>
<th class="sorting"align="center" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Waktu</th>
<th class="sorting"align="center" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Status</th>
</thead>
<tbody>
</table>

</div></div>
