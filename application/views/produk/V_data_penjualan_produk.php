<div class="col-md-4">
                        BUAT LAPORAN PENJUALAN
                        <form class="form-horizontal">
                          <fieldset>
                            <div class="control-group">
                              <div class="controls">
                                <div class="input-prepend input-group">
                                  <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                  <input style="width: 200px" name="reservation" id="reservation" class="form-control" value="" type="text">
                                </div>
                              </div>
                            </div>
                          </fieldset>
                        </form>
                      </div>
<div class="x_panel">
<div class="x_title">
    <h2>DATA PENJUALAN ONLINE DAN OFFLINE</h2>
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
                    ajax: {"url": "<?php echo base_url('C_produk/data_json_penjualan') ?> ", "type": "POST"},
                    columns: [
                        {
                            "data": "id_invoices_customer_data",
                            "orderable": false
                        },
                        {"data": "nama"},
                        {"data": "telpon"},
                        {"data": "pengiriman"},
                        {"data": "waktu"},
                        {"data": "kasir"},
                        {"data": "total"},
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
     <table id="mytable" class="table table-striped table-bordered dataTable"  role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row">
           <th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">N0</th>
           <th  align="center" class="sorting"  aria-controls="datatable-fixed-header rowspan="1"      colspan="1" style="width: 1px;" aria-label="Name: activate to sort column descending">Customer</th>
           <th  align="center" class="sorting"  aria-controls="datatable-fixed-header rowspan="1" colspan="1" style="width: 1px;" aria-label="Name: activate to sort column descending">Telepon</th>
           <th  align="center" class="sorting" aria-controls="datatable-fixed-header rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Pengiriman</th>
           <th  align="center" class="sorting"aria-controls="datatable-fixed-header rowspan="1"  colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Waktu</th>
           <th  align="center" class="sorting" aria-controls="datatable-fixed-header rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Kasir</th>
           <th  align="center" class="sorting" aria-controls="datatable-fixed-header rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Total penjualan</th>
           <th  align="center" class="sorting"aria-controls="datatable-fixed-header rowspan="1"  colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">AKSI</th>
         </thead>
        <tbody align="center">
        </table>
       
    </div></div>
