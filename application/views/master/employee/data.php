<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">

<div class="box-body">

    <table id="dt-table" class="table table-bordered table-striped" style="width:100%;">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>Nama</th>
                <?php /*
                <th>Pangkat/Gol. Ruang</th>
                */?>
                <th>Nama Jabatan</th>
                <th>Status</th>
                <?php /*<th>Unit Kerja</th>*/?>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>Nama</th>
                <?php /*
                <th>Pangkat/Gol. Ruang</th>
                */?>
                <th>Nama Jabatan</th>
                <th>Status</th>
                <?php /*<th>Unit Kerja</th>*/?>
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

    $(document).ready(function(){
        $("#dt-table").DataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "ajax":{
                "url": indexURL + "/employee/getData",
                "type": "POST",
                "data":{"type":1}
            },
            "columns":[
                { "data": "index" },
                { "data": "nip" },
                { "data": "name" },
                //{ "data": "pangkat" },
                { "data": "jabatan" },
                { "data": "status_label" },
                //{ "data": "unit_kerja" },                
                /*{ "data": "link_adjust_leave" },
                { "data": "link_nonactive" }*/
                { "data": "link_action" }
            ],
            "scrollX": true,
            columnDefs:[{targets:[-1], class:"wrapok"}]
        });

        $( "#dt-table tbody" ).on('click', 'a[name=link-modal-confirm-update]',  function(){      

            var id = $(this).attr('data');

            $.ajax({

                type        : 'POST',
                url         : '<?php echo base_url()?>index.php/profile/getPendingData',
                data        : {id:id},
                beforeSend  : function(){$('#container-loader-update-data-pending').show();},
                success     : function(html){                               
                                $('#container-loader-update-data-pending').hide();
                                $('#container-update-data-pending').html(html);                    

                            }

            });
        });

        $('#dt-table').on('click', 'a[name="link-modal-nonactive-employee"]', function(){
            var id = $(this).attr('data');
            showNonActiveForm();
            $('#x_id_nonactive').val(id);
        });

        $('#dt-table').on('click', 'a[name="link-modal-adjust-anual-leave"]', function(){
            var arrData = $(this).attr('data').split(dataSeparator);;
            $('#x_id_adjust_leave').val(arrData[0]);
            $('#x_cuti_tahun_n').val(arrData[1]);
            $('#x_cuti_tahun_n_1').val(arrData[2]);
            $('#x_cuti_tahun_n_2').val(arrData[3]);
        });

        $( "#dt-table tbody" ).on('click', 'a[name=link-detail-nonactive-employee]',  function(){
            var arrData = $(this).attr('data').toString().split(dataSeparator);    
            showNonActiveDetail();
            $('#x_type_id').val( arrData[0] );
            $('#x_no_sk').val( arrData[1] );
            $('#x_tgl_sk').val( arrData[2] );
            $('#x_tgl_efektif').val( arrData[4] );
            $('a[name="link-download-sk-nonactive"]').attr('href',arrData[3]);
            $('a[name="link-download-sk-nonactive"]').html( '<i class="glyphicon glyphicon-download-alt"></i>&nbsp;' + arrData[5] );
        });

        $('#dt-table').on('click', 'a[name="link-modal-dosier"]', function(){
            var id = $(this).attr('data');
            $.ajax({

                type        : 'POST',
                url         : indexURL + '/dosier/showDosierTableList',
                data        : {id:id},
                beforeSend  : function(){},
                success     : function(html){                                
                                
                                $('#container-dosier').html(html);                    

                            }

            });
        });

    
    });
    

</script>