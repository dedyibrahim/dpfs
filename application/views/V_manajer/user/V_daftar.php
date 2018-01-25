<div class="x_panel">
<div class="x_title">
                    <h2>Daftar User</h2>
                   
                    <div class="clearfix"></div>
                  </div>
<form action="<?php echo base_url('C_manajer/daftar'); ?>" method="post" enctype="multipart/form-data">
   
     <div class="col-md-6">
      <div class="form-group has-feedback">
          <input type="text" class="form-control" name="nama" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
     <div class="form-group has-feedback">
         <select class="form-control" name="level">
                    <option>level</option>
                    <option>admin</option>
                    <option>user</option>
                  </select>
      
     </div>
            
     <div class="form-group has-feedback">
         <select class="form-control" name="status" >
                    <option>status</option>
                    <option>aktif</option>
                    <option>tidak</option>
                  </select>
      
     </div>
      
     
            
    <div class="form-group has-feedback">
        <input type="password" name="password1" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password"  name="password2" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
        </div>
        <div class="col-md-6">
            <div class="form-group has-feedback">
                <input type="file" class="form-control" name="gambar"  placeholder="Masukan foto" >
        <span class="fa fa-upload form-control-feedback"></span>
      </div>
            
        </div> 
         
                  
        <div class="x_content">
           <div class="col-xs-2 pull-left">
              <button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btnDaftar" class="btn btn-primary btn-block btn-flat">Mendaftar</button>
          </div>
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
                    
                 