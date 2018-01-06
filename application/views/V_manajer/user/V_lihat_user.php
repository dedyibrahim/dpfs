<?php foreach ($data_user->result_array() as $data){
    
}
?>
<div class="x_panel">
<div class="x_title">
                    <h2>Data user</h2>
                   
                    <div class="clearfix"></div>
                  </div>
   
     <div class="col-md-6">
      <div class="form-group has-feedback">
          <input type="text " class="form-control" value="<?php echo $data['nama'];?>" readonly="" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      <div class="form-group has-feedback">
          <input type="email" class="form-control" value="<?php echo $data['email'];?>" readonly="" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
          <input type="email" class="form-control" value="<?php echo $data['level'];?>" readonly="" placeholder="Level">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
    
      <div class="form-group has-feedback">
          <input type="email" class="form-control" value="<?php echo $data['status'];?>" readonly="" placeholder="Status">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
   
      </div>
        <div class="col-md-6">
            <p align="center"> 
            <img class="img-thumbnail" style="width:400 px; height:170px;" src="<?php echo base_url('uploads/user_thumb/');echo $data['gambar']; ?>"       
                 </p>
        </div> 
            
</div>


<div class="x_panel">
<div class="x_title">
                    <h2>User Terdaftar</h2>
                   
                    <div class="clearfix"></div>
                  </div>
    <script type="text/javascript" language="javascript" src="<?php echo base_url('assets/');?>vendors/datatables/datatables/media/js/jquery.js"></script>
 <script type="text/javascript"  >
            $(document).ready(function() {
                $('#datatable10').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "<?php echo base_url() ;?>C_manajer/data_user"
                } );
            } );
    </script>
    <div class="dashboard_graph">
     <table id="datatable10" class="table table-striped table-bordered dataTable" align="center" role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row">
           <th class="sorting_asc"  tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 161px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nama</th>
           <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 161px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Email</th>
           <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Level</th>
           <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Office: activate to sort column ascending">Status</th>
           <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 119px;" aria-label="Age: activate to sort column ascending">Gambar</th>
           <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 114px;" aria-label="Start date: activate to sort column ascending">Aksi</th>
         </thead>
        <tbody>
        </table>
       
    </div>
    
</div>


</div>
