
<div class="x_panel">
<div class="x_title">
    <h2>DATA PERPINDAHAN STOK DARI PABRIK KE TOKO</h2>
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
                        sProcessing: "Sabarr..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "<?php echo base_url('C_pengaturan/data_json_mut_pabrik_toko') ?> ", "type": "POST"},
                    columns: [
                        {
                            "data": "id_mut_pabrik_toko",
                            "orderable": true
                        },
                        {"data": "id_mut_pabrik_toko"},
                        {"data": "nama_produk"},
                        {"data": "stok"},
                        {"data": "stok_toko"},
                        {"data": "waktu"},
                        {"data": "view"},
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
     <table id="tabel" width="100%" class="table table-striped table-bordered dataTable"  role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row" align="center">
           <th class="sorting_asc" align="center"   aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">No</th>
           <th class="sorting_asc" align="center"   aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Id Mutasi</th>
           <th class="sorting" align="center"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 100px;" aria-label="Name: activate to sort column descending">Nama Barang</th>
           <th class="sorting"align="center"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 100px;" aria-label="Name: activate to sort column descending">Jumlah Mutasi</th>
           <th class="sorting"align="center"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 100px;" aria-label="Name: activate to sort column descending">Stok Toko sekarang</th>
           <th class="sorting"align="center" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Waktu</th>
           <th class="sorting"align="center" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">AKSI</th>
             <th class="sorting"align="center" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">STATUS</th>
        </thead>
        <tbody>
        </table>
       
    </div></div>