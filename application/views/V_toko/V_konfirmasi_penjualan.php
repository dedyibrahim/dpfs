<script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.min.js"></script>
 
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/');?>vendors/datatables/datatables/media/js/jquery.js"></script>

<div class="x_panel">
<div class="x_title">
   <h2>PENJUALAN MASUK TERBARU</h2>
     <div class="clearfix"></div>
</div>
    <div class="col-md-12">
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

                var t = $("#tabelhome").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#tabelhome')
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
                    ajax: {"url": "<?php echo base_url('C_toko/data_konfirmasi_penjualan') ?> ", "type": "POST"},
                    columns: [
                        {
                            "data": "no_invoices",
                            "orderable": false
                        },
                        {"data": "nama_depan"},
                        {"data": "no_kontak"},
                        {"data": "nama_kurir"},
                        {"data": "jenis_service"},
                        {"data": "status_penjualan"},
                        {"data": "bayar"},
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
    
    
    <div class="dashboard_graph" width="100%">
     <table id="tabelhome"  class="table table-striped table-bordered dataTable"  role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row">
           <th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">N0</th>
           <th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:50px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nama customer</th>
           <th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Kontak</th>
           <th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Jasa Pengiriman</th>
           <th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:50px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Service</th>
           <th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Status penjualan</th>
           <th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Bukti bayar</th>
          <th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Aksi</th>
         </thead>
        <tbody align="center">
        </table>
       
    </div>   
</div>
     
</div>
