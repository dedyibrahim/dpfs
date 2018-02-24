<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>PERHATIAN !! </strong> Diharap untuk tidak menghapus level superadmin karena semua halaman membutuhkan akses dari superadmin .
                  </div>
<div class="x_panel">
<div class="x_title">
    <h2>DATA USER</h2>
        <div class="clearfix"></div>
            </div>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/');?>vendors/datatables/datatables/media/js/jquery.js"></script>
<script type="text/javascript">
          $(document).ready(function() {
                $('#mytable').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "<?php echo base_url('C_pengaturan/json_user')?>"
                } );
            } );

        </script>
    
    
    
    <div class="dashboard_graph">
     <table id="mytable" class="table table-striped table-bordered dataTable"  role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row" align="center">
           <th class="sorting_asc" align="center"   aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:100px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nama</th>
           <th class="sorting" align="center"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 1px;" aria-label="Name: activate to sort column descending">Email</th>
           <th class="sorting"align="center"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 1px;" aria-label="Name: activate to sort column descending">Level</th>
           <th class="sorting"align="center" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Status</th>
           <th class="sorting"align="center" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Tanggal Daftar</th>
           <th class="sorting"align="center" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">AKSI</th>
         </thead>
        <tbody>
        </table>
       
    </div></div>