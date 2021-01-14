<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">

<div class="box-body">
    <p class="pull-right">
        <p>
            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-frm-add-user" id="btn-add-user"><i class="fa fa-plus"></i>&nbsp;Tambah Baru</button>
        </p>
    </p>
    <br>
    <table id="dt-table-user" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tempat Lahir</th>
                <th>Tgl. Lahir</th>
                <th>Jenis Kelamin</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tempat Lahir</th>
                <th>Tgl. Lahir</th>
                <th>Jenis Kelamin</th>
                <th>&nbsp;</th>
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

    var xTable;

    function loadDataTableUser(){

        $("#dt-table-user").DataTable().clear().destroy();
        
        xTable =$("#dt-table-user").DataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 5,
            "ajax":{
                "url": indexURL + "/employee/getData",
                "type": "POST",
                "data": {"type":2}
            },
            "columns":[
                { "data": "name" },
                { "data": "nik" },
                { "data": "tempat_lahir"},
                { "data": "tanggal_lahir"},
                { "data": "jenis_kelamin"},
                { "data": "btn_select_user" }
            ],
            "select":true
        });
    }

    $(document).ready(function(){

        loadDataTableUser();

        $('#dt-table-user tbody').on( 'click', 'a[name=link-select-user]', function () {
            var arrData = $(this).attr('data').split(dataSeparator);
            // alert($(this).attr('data'));
            $('#x_suamiistri_user_family_id').val( arrData[0] );
            $('#x_suamiistri_name').val( arrData[1] );
            $('#x_tgl_menikah').val( arrData[2] );
            $('#x_akte_menikah').val( arrData[3] );
            $('#x_tgl_meninggal').val( arrData[4] );
            $('#x_akte_meninggal').val( arrData[5] );
            $('#x_tgl_cerai').val( arrData[6] );
            $('#x_akte_cerai').val( arrData[7] );
            $('#x_status_menikah').val( arrData[8] );

            $('#x_anak_user_family_id').val( arrData[0] );
            $('#x_anak_name').val( arrData[1] );

            $('#x_addedit_pejabat_penilai_id').val( arrData[0] );
            $('#x_addedit_pejabat_penilai_name').val( arrData[1] );

            $('#x_addedit_atasan_pejabat_penilai_id').val( arrData[0] );
            $('#x_addedit_atasan_pejabat_penilai_name').val( arrData[1] );

            $('#modal-frm-user').modal('hide');
            $('#modal-frm-add-edit').modal('show');
        });

        $('#btn-add-user').click(function(){
            $('#modal-frm-user').modal('hide');
            $.ajax({

                type        : 'POST',
                url         : indexURL + '/employee/showUserForm',
                beforeSend  : function(){},
                success     : function(html){                                
                                
                                $('#container-add-user').html(html);                    

                            }

            });
        });

    });
    
</script>