
    
<div class="x_panel">
<div class="x_title">
    <h2>DATA PRODUK YANG BERADA DI PABRIK</h2>
        <div class="clearfix"></div>
            </div>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/');?>vendors/datatables/datatables/media/js/jquery.js"></script>
<script type="text/javascript">
          $(document).ready(function() {
                $('#mytable').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "<?php echo base_url('C_produk/json_produk_pabrik')?>"
                } );
            } );

        </script>
    
    
    
    <div class="dashboard_graph">
     <table id="mytable" class="table table-striped table-bordered dataTable"  role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row" align="center">
           <th class="sorting_asc" align="center"   aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:100px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">NAMA BARANG</th>
           <th class="sorting" align="center"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 1px;" aria-label="Name: activate to sort column descending">HARGA BARANG</th>
           <th class="sorting"align="center"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 1px;" aria-label="Name: activate to sort column descending">STOK PABRIK</th>
           <th class="sorting"align="center" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">STATUS</th>
           <th class="sorting"align="center" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">STATUS BARANG</th>
           <th class="sorting"align="center" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">AKSI</th>
         </thead>
        <tbody>
        </table>
       
    </div></div>