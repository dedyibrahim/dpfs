<div class="x_panel">
<div class="x_title">
    <h2>DATA CUSTOMER</h2>
        <div class="clearfix"></div>
            </div>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/');?>vendors/datatables/datatables/media/js/jquery.js"></script>
<script type="text/javascript">
          $(document).ready(function() {
                $('#mytable').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "<?php echo base_url('C_pengaturan/json_customer')?>"
                } );
            } );

        </script>
    
    
    
    <div class="dashboard_graph">
     <table id="mytable" class="table table-striped table-bordered dataTable"  role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row" align="center">
           <th class="sorting_asc" align="center"   aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:100px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nama Customer</th>
           <th class="sorting" align="center"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 1px;" aria-label="Name: activate to sort column descending">Alamat</th>
           <th class="sorting"align="center"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 1px;" aria-label="Name: activate to sort column descending">Telepon</th>
           <th class="sorting"align="center" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">AKSI</th>
         </thead>
        <tbody align="center">
        </table>
       
    </div></div>