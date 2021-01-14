<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">

<div class="box-body">

    <table id="dt-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No. Ref</th>
                <th>Nama</th>
                <th>Jns. Cuti</th>
                <th>Tgl. Cuti</th>
                <th>Lama Cuti</th>
                <th>Pertimbangan Atasan</th>
                <th>Keputusan Pejabat</th>
                <th>Created At</th>
                <th>Status Cuti</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No. Ref</th>
                <th>Nama</th>
                <th>Jns. Cuti</th>
                <th>Tgl. Cuti</th>
                <th>Lama Cuti</th>
                <th>Pertimbangan Atasan</th>
                <th>Keputusan Pejabat</th>
                <th>Created At</th>
                <th>Status Cuti</th>
                <th></th>
            </tr>
        </tfoot>
    </table> 

</div>

<!-- Constanta -->
<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">    

    function loadLeaveDataTable(){

        $("#dt-table").DataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "ajax":{
                "url": indexURL + "/leave/getLeaveDataTableList",
                "type": "POST",
                "data":{"module":"\/user\/leave", "status":$('#x_search_status_leave').val(), "tgl_mulai_cuti":$('#x_search_tgl_mulai_cuti').val(), "tgl_berakhir_cuti": $('#x_search_tgl_berakhir_cuti').val(), "jenis_cuti": $('#x_search_jenis_cuti').val()}
            },
            "columns":[
                { "data": "no_reference" },
                { "data": "nama_pegawai" },
                { "data": "jenis_cuti.name" },
                { "data": "tgl_cuti" },
                { "data": "lama_cuti" },
                { "data": "pertimbangan_atasan_langsung" },
                { "data": "keputusan_pejabat" },
                { "data": "created_at" },
                { "data": "status_admin" },
                { "data": "navigation" },
            ]
        });
    }

    $(document).ready(function(){        
        loadLeaveDataTable();    
        $('#dt-table').on('click', 'a[name="link-confirm-leave-request"]', function(){
            var arrData = $(this).attr('data').split(dataSeparator);

            getHolidayDate(indexURL);
            
            $('#x_id_leave').val( arrData[0] );
            $('#x_no_reference').val( arrData[1] );
            $('#x_receive_leave_nip').val( arrData[2] );
            $('#x_receive_leave_nama_pegawai').val( arrData[3] );
            $('#x_receive_leave_tgl_mulai').val( arrData[4] );
            $('#x_receive_leave_tgl_berakhir').val( arrData[5] );
            $('#x_receive_leave_lama_cuti').val( arrData[6] );
            $('#x_receive_leave_alasan_cuti').val( arrData[7] );
        });

        $('#dt-table').on('click', 'a[name="link-change-leave-request"]', function(){
            var arrData = $(this).attr('data').split(dataSeparator);
            
            $('#x_id_leave_change').val( arrData[0] );
            $('#x_no_reference_change').val( arrData[1] );
            $('#x_receive_leave_nip_change').val( arrData[2] );
            $('#x_receive_leave_nama_pegawai_change').val( arrData[3] );
            $('#x_receive_leave_tgl_mulai_change').val( arrData[4] );
            $('#x_receive_leave_tgl_berakhir_change').val( arrData[5] );
            $('#x_receive_leave_lama_cuti_change').val( arrData[6] );
            $('#x_receive_leave_alasan_cuti_change').val( arrData[7] );
        });

        $('#dt-table').on( 'click', 'a[name="link-confirm-cancel-leave"]', function(){
            var id = $(this).attr('data');
            $('#x_confirm_cancel_id').val( id );
        } );
    });
    

</script>