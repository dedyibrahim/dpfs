
<div class="x_panel">
<div class="x_title">
  
    <h2 class="pull-left">DATA STOK PRODUK YANG MAU HABIS</h2>
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

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable')
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
                    ajax: {"url": "<?php echo base_url('C_produk/data_json_produk_mau_habis') ?> ", "type": "POST"},
                    columns: [
                        {
                            "data": "id_produk_toko",
                            "orderable": false
                        },
                        {"data": "nama"},
                        {"data": "barcode"},
                        {"data": "harga"},
                        {"data": "stok"},
                        {"data": "milik"},
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
     <table id="mytable" class="table table-striped table-bordered dataTable"  role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row">
           <th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">N0</th>
           <th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nama</th>
           <th  align="center" class="sorting"  aria-controls="datatable-fixed-header rowspan="1"      colspan="1" style="width: 1px;" aria-label="Name: activate to sort column descending">Barcode</th>
           <th  align="center" class="sorting"  aria-controls="datatable-fixed-header rowspan="1" colspan="1" style="width: 1px;" aria-label="Name: activate to sort column descending">Harga</th>
           <th  align="center" class="sorting" aria-controls="datatable-fixed-header rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Stok</th>
           <th  align="center" class="sorting"aria-controls="datatable-fixed-header rowspan="1"  colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Milik</th>
           <th  align="center" class="sorting" aria-controls="datatable-fixed-header rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Status</th>
         </thead>
        <tbody align="center">
        </table>
       
    </div></div>
