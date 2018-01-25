<div class="x_panel">
<div class="x_title">
                    <h2>Daftar penganalis</h2>
                   
                    <div class="clearfix"></div>
                  </div>
    <script type="text/javascript" language="javascript" src="<?php echo base_url('assets/');?>vendors/datatables/datatables/media/js/jquery.js"></script>
 <script type="text/javascript"  >
            $(document).ready(function() {
                $('#datatable10').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "<?php echo base_url() ;?>C_manajer/penganalis"
                } );
            } );
    </script>
    <div class="dashboard_graph">
     <table id="datatable10" class="table table-striped table-bordered dataTable" align="center" role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row">
           <th class="sorting_asc"  tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 161px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nama</th>
           <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 161px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Email</th>
           <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 114px;" aria-label="Start date: activate to sort column ascending">Aksi</th>
         </thead>
        <tbody>
        </table>
       
    </div>
    
</div>


</div>
                    
                 