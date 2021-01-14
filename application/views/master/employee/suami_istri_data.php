<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/iCheck/all.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/datepicker/datepicker3.css">
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

<!-- Start : Modal Form -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-message-add-edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">POP UP MESSAGE</h4>
            </div>
            <div class="modal-body" id="container-popup-message-addedit"></div>
            <div class="modal-footer">
                <input type="hidden" name="x_modal_message_from" id="x_modal_message_from">
                <button type="button" id="btn-close-modal-suamiistri" class="btn btn-primary">TUTUP</button>
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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-frm-add-edit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM TAMBAH ORANG TUA / SUAMI / ISTRI</h4>                
            </div>
            <form id="form-submit-family" name="form-submit-family" class="form-horizontal">
                <input type="hidden" name="x_id" id="x_id" value="<?php echo $id; ?>">
                <input type="hidden" name="x_data_type" id="x_data_type" value="<?php echo $dataType; ?>">
                <input type="hidden" name="x_act" id="x_act" value="add">
            
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">PNS</label>
                                <div class="col-sm-9">
                                    <label>
                                      <input type="checkbox" id="x_is_pns" name="x_is_pns" class="minimal" value="1">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" name="x_suamiistri_name" id="x_suamiistri_name" class="form-control" disabled="disabled">
                                    <input type="hidden" name="x_suamiistri_id" id="x_suamiistri_id">
                                    <input type="hidden" name="x_suamiistri_user_family_id" id="x_suamiistri_user_family_id">
                                </div>
                                <div class="col-sm-3">
                                    <a href="#" class="btn btn-success btn-md" name="btn-search-user" data-toggle="modal" data-target="#modal-frm-user">Cari</a> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Relasi</label>
                                <div class="col-sm-6">
                                    <select id="x_suamiistri_relasi_id" name="x_suamiistri_relasi_id" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <option value="1">Suami</option>
                                        <option value="2">Istri</option>
                                        <option value="3">Anak</option>
                                        <option value="4">Ayah</option>
                                        <option value="5">Ibu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tgl. Menikah</label>
                                <div class="col-sm-3">
                                    <input type="text" name="x_tgl_menikah" id="x_tgl_menikah" class="form-control" data-date-format="dd-mm-yyyy">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Akte Menikah</label>
                                <div class="col-sm-4">
                                    <input type="text" name="x_akte_menikah" id="x_akte_menikah" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tgl. Cerai</label>
                                <div class="col-sm-3">
                                    <input type="text" name="x_tgl_cerai" id="x_tgl_cerai" class="form-control" data-date-format="dd-mm-yyyy">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Akte Cerai</label>
                                <div class="col-sm-4">
                                    <input type="text" name="x_akte_cerai" id="x_akte_cerai" class="form-control">
                                </div>
                            </div>
                            <?php /*
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tgl. Meninggal</label>
                                <div class="col-sm-3">
                                    <input type="text" name="x_tgl_meninggal" id="x_tgl_meninggal" class="form-control" disabled="disabled">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Akte Meninggal</label>
                                <div class="col-sm-4">
                                    <input type="text" name="x_akte_meninggal" id="x_akte_meninggal" class="form-control" disabled="disabled">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">KARSUS</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_karsus" id="x_karsus" class="form-control" disabled="disabled">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_status_menikah" id="x_status_menikah" class="form-control" disabled="disabled">
                                </div>
                            </div>
                            */?>
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

<div class="box-body">
    <p class="pull-right">
        <?php /*
        <button type="button" id="btn-existing-job-experience" class="btn" disabled="disabled" ><i class="glyphicon glyphicon-ok"></i>&nbsp;DITERIMA</button>
        <button type="button" id="btn-pending-job-experience" class="btn btn-warning" ><i class="glyphicon glyphicon-time"></i>&nbsp;MENUNGGU</button>
        <button type="button" id="btn-add-job-experience" class="btn btn-primary" data-toggle="modal" data-target="#modal-frm-job-experience" ><i class="glyphicon glyphicon-plus"></i>&nbsp;TAMBAH</button>
        */?>
        <p>
            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-frm-add-edit" id="btn-add-suamiistri"><i class="fa fa-plus"></i>&nbsp;Tambah Baru</button>
        </p>
    </p>
    <br>
    <table id="dt-table-keluarga" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Hubungan</th>
                <th>Nama</th>
                <th>Status Hidup</th>
                <th>PNS</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Hubungan</th>
                <th>Nama</th>
                <th>Status Hidup</th>
                <th>PNS</th>
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
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('static')?>/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('static');?>/plugins/fastclick/fastclick.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('static');?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url('static');?>/custom/keluarga.js"></script>

<script type="text/javascript">        

$(document).ready(function(){

    loadDataTableKeluarga( $('#x_id').val(), 0, $('#x_data_type').val() );

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });

    $('a[name="btn-search-user"]').click(function(){
        $('#modal-frm-add-edit').modal('hide');
        showUserTableList();
    });

    //Date picker
    $('#x_tgl_menikah, #x_tgl_cerai').datepicker({
      autoclose: true,
      endDate: '+0d'
    });

    $('#dt-table-keluarga tbody').on('click', 'a[name="link-nama-suamiistri"]', function(){
        //alert($(this).attr('data-edit'));
        var arrDataEdit = $(this).attr('data-edit').toString().split(dataSeparator);
        $('#x_suamiistri_user_family_id').val( arrDataEdit[0] );
        $('#x_suamiistri_name').val( arrDataEdit[1] );
        $('#x_suamiistri_relasi_id').val( arrDataEdit[2] );
        $('#x_tgl_menikah').val( arrDataEdit[3] );
        $('#x_akte_menikah').val( arrDataEdit[4] );
        $('#x_tgl_cerai').val( arrDataEdit[5] );
        $('#x_akte_cerai').val( arrDataEdit[6] );
        if( arrDataEdit[7] == 1 ){
            $('input[type="checkbox"]').attr('checked','checked').iCheck('update');
        }else{
            $('input[type="checkbox"]').removeAttr('checked').iCheck('update');
        }
        $('#x_suamiistri_id').val( arrDataEdit[8] );
        $('#x_act').val('edit');
    });

    $('#btn-close-modal-suamiistri').click(function(){
        $('#modal-message-add-edit').modal('hide');

        if( $('#x_modal_message_from').val() == 'ADD_NEW_USER' ){
            $('#modal-frm-user').modal('show');
            loadDataTableUser();
        }
        
    });

    $('#btn-add-suamiistri').click(function(){
        var xId = $('#x_id').val();
        var xType = $('#x_data_type').val();
        $('form#form-submit-family').trigger('reset');
        $('#x_id').val(xId);
        $('#x_data_type').val(xType);

    });

    $("form#form-submit-family").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                // alert($("form#form-add-user").serialize());
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/employee/saveFamily',
                    data        : $("form#form-submit-family").serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-frm-add-edit').modal('hide');},
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');                                        

                                    if( data.status_code == '00' ){   
                                        $('#modal-message-add-edit').modal('show');    
                                        $('#x_modal_message_from').val('ADD_INTO_FAMILY');                               
                                        $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        $(this).trigger('reset');
                                        loadDataTableKeluarga( $('#x_id').val(), 0, $('#x_data_type').val() );
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

    $('#dt-table-keluarga tbody').on('click', 'a[name="link-edit-suamiistri"]', function(){

        var id = $(this).attr('data-edit');

        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showUserForm',
            data        : {act:'edit',id:id},
            beforeSend  : function(){},
            success     : function(html){                                
                            
                            $('#container-add-user').html(html);                    

                        }

        });
    });

})
</script>
