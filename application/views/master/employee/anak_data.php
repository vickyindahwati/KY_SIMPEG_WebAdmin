<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<style type="text/css">

    #modal-frm-add-user
    .modal-dialog,
    #modal-frm-add-user
    .modal-content
     {
        /* 80% of window height */
        height: 100%;
    }

    #modal-frm-add-user .modal-body {
        max-height: calc(100% - 120px);
        overflow-y: scroll;
    }
</style>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-message-add-edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">POP UP MESSAGE</h4>
            </div>
            <div class="modal-body" id="container-popup-message-addedit"></div>
            <div class="modal-footer">
                <button type="button" id="btn-close-modal-anak" class="btn btn-primary">TUTUP</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-frm-add-user">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">TAMBAH DATA</h4>                
            </div>
            <div class="modal-body" id="container-add-user">
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-frm-user">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">CARI USER</h4>                
            </div>
            <div class="modal-body" id="container-user-list">
                
            </div>
        </div>
    </div>
</div>

 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-jobexperience">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI</h4>
            </div>
            <form class="form-horizontal" id="form-confirm-jobexperience" name="form-confirm-jobexperience">
                <input type="hidden" id="x_confirm_jobexperience_id" name="x_confirm_jobexperience_id">
                <input type="hidden" id="x_confirm_jobexperience_user_id" name="x_confirm_jobexperience_user_id">
                <input type="hidden" id="x_confirm_jobexperience_type" name="x_confirm_jobexperience_type">
                <div class="modal-body" id="modal-body-confirm-jobexperience-msg"></div>
                <div class="overlay" id="container-loader-confirm" style="display:none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-frm-add-edit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM TAMBAH ANAK</h4>                
            </div>
            <form id="form-submit-anak" name="form-submit-family" class="form-horizontal">
                <input type="hidden" name="x_id" id="x_id" value="<?php echo $id; ?>">
                <input type="hidden" name="x_data_type" id="x_data_type" value="<?php echo $dataType; ?>">
                <input type="hidden" name="x_act" id="x_act" value="add">
            
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" name="x_anak_name" id="x_anak_name" class="form-control" disabled="disabled">
                                    <input type="hidden" name="x_anak_id" id="x_anak_id">
                                    <input type="hidden" name="x_anak_user_family_id" id="x_anak_user_family_id">
                                    <input type="hidden" name="x_anak_parent_user_family_id" id="x_anak_parent_user_family_id">
                                </div>
                                <div class="col-sm-3">
                                    <a href="#" class="btn btn-success btn-md" name="btn-search-user" data-toggle="modal" data-target="#modal-frm-user">Cari</a> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-6">
                                    <select id="x_status_anak" name="x_status_anak" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <option value="1">Kandung</option>
                                        <option value="2">Angkat</option>
                                        <option value="3">Tiri</option>
                                    </select>
                                </div>
                            </div>                            
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
 </div>

<div class="box-body">
    <p class="pull-right">
        <?php /*
        <button type="button" id="btn-existing-job-experience" class="btn" disabled="disabled" ><i class="glyphicon glyphicon-ok"></i>&nbsp;DITERIMA</button>
        <button type="button" id="btn-pending-job-experience" class="btn btn-warning" ><i class="glyphicon glyphicon-time"></i>&nbsp;MENUNGGU</button>
        <button type="button" id="btn-add-job-experience" class="btn btn-primary" data-toggle="modal" data-target="#modal-frm-job-experience" ><i class="glyphicon glyphicon-plus"></i>&nbsp;TAMBAH</button>
        */?>
        <p>
            
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="input1" class="col-sm-1 control-label">Dari :</label>
                            <div class="col-sm-5">
                                <select id="x_anak_dari_suamiistri" name="x_anak_dari_suamiistri" class="form-control">
                                    <option value="0">- Pilih -</option>
                                    <?php 
                                        foreach( $rsDDSuamiIstri->data as $dtDDSuamiIstri ){
                                    ?>
                                            <option value="<?php echo $dtDDSuamiIstri->id ?>"><?php echo $dtDDSuamiIstri->name; ?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <button disabled="disabled" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-frm-add-edit" id="btn-add-anak"><i class="fa fa-plus" ></i>&nbsp;Tambah Baru</button>
                            </div>
                        </div>
                    </div>
                </div>
            
        </p>
    </p>
    <br>
    <table id="dt-table-keluarga" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tgl. Lahir</th>
                <th>Status Anak</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tgl. Lahir</th>
                <th>Status Anak</th>
            </tr>
        </tfoot>
    </table> 

</div>

<!-- Constanta -->
<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('static');?>/custom/keluarga.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#x_anak_dari_suamiistri').change(function(){
            if( $(this).val() == 0 ){
                $('#btn-add-anak').attr('disabled',true);
            }else{
                loadDataTableKeluarga( $('#x_id').val(), $(this).val(),$('#x_data_type').val() );
                $('#btn-add-anak').attr('disabled',false);
            }
            
        });

        $('a[name="btn-search-user"]').click(function(){
            $('#modal-frm-add-edit').modal('hide');
            showUserTableList();
        });

        $('#dt-table-keluarga').on('click', 'a[name="link-nama-anak"]', function(){
            var arrDataEdit = $(this).attr('data-edit').toString().split(dataSeparator);
            $('#x_anak_user_family_id').val( arrDataEdit[0] );
            $('#x_anak_name').val( arrDataEdit[1] );            
            $('#x_anak_id').val( arrDataEdit[8] );
            $('#x_anak_parent_user_family_id').val( arrDataEdit[9] );
            $('#x_status_anak').val( arrDataEdit[10] );
            $('#x_act').val('edit');
        });

        $("form#form-submit-anak").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {
                    // alert($("form#form-add-user").serialize());
                    $.ajax({

                        type        : 'POST',
                        url         : indexURL + '/employee/saveAnak',
                        data        : $("form#form-submit-anak").serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-frm-add-edit').modal('hide');},
                        success     : function(data){                             
                                        
                                        $('#modal-loader').modal('hide');                                        

                                        if( data.status_code == '00' ){   
                                            $('#modal-message-add-edit').modal('show');                                    
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $(this).trigger('reset');
                                            loadDataTableKeluarga( $('#x_id').val(), $('#x_anak_dari_suamiistri').val(), $('#x_data_type').val() );
                                        }else{
                                            $('#modal-message-add-edit').modal('show');
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $('#modal-frm-add-user').modal('show');
                                        }      
                                        
                        }

                    });
                    

                }

            }

        });

        $('#btn-add-anak').click(function(){
            $('#x_anak_parent_user_family_id').val( $('#x_anak_dari_suamiistri').val() );
            $('form#form-submit-anak').trigger('reset');
            $('#x_act').val('add');
        });

        $('#btn-close-modal-anak').click(function(){
            $('#modal-message-add-edit').modal('hide');            
            if( $('#x_act').val() == 'add' ){
                $('#modal-frm-user').modal('show');
                loadDataTableUser();
            }
            
        });

    }); 
</script>