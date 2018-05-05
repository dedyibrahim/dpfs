<div class="x_panel">
<div class="x_title">
   <h2>Tambhakan Layout menu kategori</h2>
     <div class="clearfix"></div>
                  </div>
<form action="<?php echo base_url('C_toko/lyt_menu') ?>" method="post" enctype="multipart/form-data">
   
     <div class="col-md-6">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="kategori" placeholder="Layout menu">
         <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
     <div class="x_content">
            <hr>  
           <div class="col-xs-2 pull-left">
               <button type="reset" class="btn btn-warning"><span class="fa fa-close"> Batal</button>
          </div>
     
          <div class="col-xs-2 pull-right">
              <button type="submit" name="btnlytmenu" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
          </div>
        </div>
     </div>    
   <div class="col-md-6">
        
<script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.min.js"></script>
 
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
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "<?php echo base_url('C_toko/data_json_layout_menu') ?> ", "type": "POST"},
                    columns: [
                        {
                            "data": "id_layout_menu",
                            "orderable": false
                        },
                        {"data": "menu"},
                        {"data": "view"}
                        
                        
                       ],
                    order: [[1, 'asc']],
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
    
    
    <div class="dashboard_graph" width="50%">
     <table id="tabel"  class="table table-striped table-bordered dataTable"  role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row">
           <th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">N0</th>
           <th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:50px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Menu</th>
           <th  align="center" class="sorting"          aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Aksi</th>
         </thead>
        <tbody align="center">
        </table>
       
    </div></div>
   
             
         </div>     
 </form>
</div>
</div>