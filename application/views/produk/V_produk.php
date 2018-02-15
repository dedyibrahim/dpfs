<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">BUAT DATA CUSTOMER</h4>
                        </div>
                        <div class="modal-body">
                <form action="<?php echo base_url('C_fpps/simpan_customer');?>" method="post" enctype="multipart/formdata">
                <input class="form-control"  placeholder="nama customer" name="nama_customer" type="text"><br>
                <input class="form-control"  name="alamat" placeholder="Alamat" type="text"><br>
                <input class="form-control"  name="telp" placeholder="Telp" type="text"><br>
                <input class="form-control"  name="contact_person" placeholder="Contact Person" type="text"><br>
                <input class="form-control"  name="telp_fax" placeholder="Telp/Fax" type="text">
    
                             
                       </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default"data-dismiss="modal">Close</button>
                            <button type="submit" name="simpan_customer" class="btn btn-primary ">Save</button>
                        </form>
                        </div>
               </div>
           </div>
    </div>
    
<div class="x_panel">
<div class="x_title">
    <h2>DATA PRODUK ONLINE DAN OFFLINE</h2>
        <div class="clearfix"></div>
            </div>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/');?>vendors/datatables/datatables/media/js/jquery.js"></script>
<script type="text/javascript">
          $(document).ready(function() {
                $('#mytable').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "<?php echo base_url('C_produk/json_produk')?>"
                } );
            } );

        </script>
    
    
    
    <div class="dashboard_graph">
     <table id="mytable" class="table table-striped table-bordered dataTable"  role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row" align="center">
           <th class="sorting_asc" align="center   aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:100px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">NAMA BARANG</th>
           <th class="sorting" align="center  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 1px;" aria-label="Name: activate to sort column descending">HARGA BARANG</th>
           <th class="sorting"align="center  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 1px;" aria-label="Name: activate to sort column descending">STOK BARANG</th>
           <th class="sorting"align="center aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">STATUS</th>
           <th class="sorting"align="center aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">STATUS BARANG</th>
           <th class="sorting"align="center aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">AKSI</th>
         </thead>
        <tbody>
        </table>
       
    </div></div>