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
                    ajax: {"url": "<?php echo base_url('C_distribusi/json_bakteri') ?> ", "type": "POST"},
                    columns: [
                        {
                            "data": "record_number_bakteri",
                            "orderable": false
                        },
                        {"data": "record"},
                        {"data": "tgl_terima"},
                        {"data": "nama"},
                        {"data": "jml_sample"},
                        {"data": "kode"},
                        {"data": "data_bakteri"},
                        {"data": "bakteri"},
                        {"data": "status"},
                        {"data": "view"},
                        
                        
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
    
    
    
     <table id="mytable" style="width: 100%;" class="table table-striped table-bordered dataTable" align="center" role="grid" aria-describedby="datatable-fixed-header_info"><thead>
       <tr role="row">
           <th class="sorting_asc"   aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">No</th>
           <th class="sorting"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 60px;" aria-label="Name: activate to sort column descending">Record</th>
           <th class="sorting"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 60px;" aria-label="Name: activate to sort column descending">Tgl.terima</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Pemilik</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 150px;" aria-label="Position: activate to sort column ascending">Jml sample</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 150px;" aria-label="Position: activate to sort column ascending">Kode sampel</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Organ Bakteri</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 150px;" aria-label="Position: activate to sort column ascending">Jenis</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Status</th>
           <th class="sorting" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Action</th>
         </thead>
        <tbody>
      </table>
   