<div class="x_panel">
 <div class="x_content">
    <div class="x_title">
  
 <!--------- end input customer--------------->     
     
 <form action="http://localhost/mamuju/C_fpps/simpan_fpps" method="post" enctype="multipart/formdata">
    <h2>DATA TABEL ANAMNESA</h2>
        <ul class="nav navbar-right panel_toolbox">
                </li>
                    </ul>              
<div class="clearfix"></div>
 </form>
     </div> 
 <div class="col-md-12">
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

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
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
                    ajax: {"url": "<?php echo base_url('C_anamnesa/json') ?> ", "type": "POST"},
                    columns: [
                        {
                            "data": "record_number_customer",
                            "orderable": false
                        },
                        {"data": "record"},
                        {"data": "nama"},
                        {"data": "telpon"},
                        {"data": "tgl_terima"},
                        {"data": "sample"},
                        {"data": "no_antrian"},
                        {"data": "virus"},
                        {"data": "jamur"},
                        {"data": "bakteri"},
                        {"data": "logam"},
                        {"data": "parasit"},
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
    
    
    
    <div class="dashboard_graph">
     <table id="mytable" class="table table-striped table-bordered dataTable" align="center" role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row">
           <th class="sorting_asc"   aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">No</th>
           <th class="sorting"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 60px;" aria-label="Name: activate to sort column descending">Nama</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Telpon</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Tgl terima</th>
           <th class="sorting"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Name: activate to sort column descending" >Tgl sampling</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Sample</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Jml</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Action</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Action</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Action</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Action</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Action</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Action</th>
         </thead>
        <tbody>
        </table>
       
    </div>
</div>
</div>
</div>
</div>