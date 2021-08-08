<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/datepicker/datepicker3.css">
<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet"> 

<style type="text/css">
    td {
        white-space: nowrap;
    }
     
    td.wrapok {
        white-space:normal
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
                <button type="button" id="btn-close-modal-hukdis" class="btn btn-primary">TUTUP</button>
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

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-hukdis">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI</h4>
            </div>
            <form class="form-horizontal" id="form-confirm-delete-hukdis" name="form-confirm-delete-hukdis">
                <input type="hidden" id="x_confirm_delete_id" name="x_confirm_delete_id">
                <input type="hidden" id="x_confirm_delete_module" name="x_confirm_delete_module" value="/user/hukdis">
                <div class="modal-body" id="modal-body-confirm-msg-hukdis"></div>
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

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-upload-sk-hukdis">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">UPLOAD FILE</h4>
            </div>
            <form class="form-horizontal" id="form-upload-sk-hukdis" name="form-upload-sk-hukdis">
                <div id="mulitplefileuploader_SK_HUKDIS" >Upload</div>
                <input type="hidden" name="x_file_hukdis" id="x_file_hukdis" value="">
                <input type="hidden" name="x_id_hukdis" id="x_id_hukdis" value="">
                <input type="hidden" name="x_user_id_hukdis" id="x_user_id_hukdis" value="<?php echo $id?>">
                <input type="hidden" name="x_sk_module" id="x_sk_module" value="hukdis">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-frm-add-edit" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM TAMBAH HUKDIS</h4>                
            </div>
            <form id="form-submit-hukdis" name="form-submit-hukdis" class="form-horizontal">
                <input type="hidden" name="x_id" id="x_id" value="<?php echo $id; ?>">
                <input type="hidden" name="x_hukdis_id" id="x_hukdis_id" value="">
                <input type="hidden" name="x_act" id="x_act" value="add">
            
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Jenis Hukuman</label>
                                <div class="col-sm-6">
                                    <select id="x_addedit_jenis_hukuman" name="x_addedit_jenis_hukuman" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsJenisHukuman->data as $dtJenisHukuman ){
                                        ?>
                                                <option value="<?php echo $dtJenisHukuman->id ?>"><?php echo $dtJenisHukuman->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">No. SK HD</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="x_addedit_sk_hd" id="x_addedit_sk_hd">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tgl. SK HD</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_tgl_sk_hd" id="x_addedit_tgl_sk_hd" data-date-format="dd-mm-yyyy">
                                </div>
                                <label for="input1" class="col-sm-3 control-label">TMT HD</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_tmt_hd" id="x_addedit_tmt_hd" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Masa Hukuman</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_masa_hukuman_tahun" id="x_addedit_masa_hukuman_tahun">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_masa_hukuman_bulan" id="x_addedit_masa_hukuman_bulan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">No. PP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="x_addedit_no_pp" id="x_addedit_no_pp">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Alasan Hukuman</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="x_addedit_alasan_hukuman" id="x_addedit_alasan_hukuman">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="x_addedit_keterangan" id="x_addedit_keterangan">
                                </div>
                            </div>
                            
                            <?php /*
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Atasan Pejabat Penilai</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="x_addedit_atasan_pejabat_penilai_name" id="x_addedit_atasan_pejabat_penilai_name" disabled="disabled">
                                    <input type="hidden" class="form-control" name="x_addedit_atasan_pejabat_penilai_id" id="x_addedit_atasan_pejabat_penilai_id">
                                </div>
                                <div class="col-sm-3">
                                    <a href="#" class="btn btn-success btn-md" name="btn-search-user" data-toggle="modal" data-target="#modal-frm-user">Cari</a> 
                                </div>
                            </div>*/?>

                            
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
    <?php /*
    <p class="pull-right">
        <button type="button" id="btn-add-hukdis" class="btn btn-primary" data-toggle="modal" data-target="#modal-frm-add-edit" ><i class="glyphicon glyphicon-plus"></i>&nbsp;TAMBAH</button>
    </p>
    */?>
    <br>
    <table id="dt-table-hukdis" class="table table-bordered table-striped nowrap">
        <thead>
            <tr>
                
                <th nowrap="nowrap">Hukuman</th>
                <th nowrap="nowrap">No.SK</th>
                <th nowrap="nowrap">Tgl.SK</th>
                <th nowrap="nowrap">TMT HD</th>
                <th nowrap="nowrap">No.SK Pembatalan</th>
                <th nowrap="nowrap">Tgl.SK Pembatalan</th>      
                <th nowrap="nowrap">S.K</th>     
            </tr>
        </thead>
        <tfoot>
            <tr>
                
                <th nowrap="nowrap">Hukuman</th>
                <th nowrap="nowrap">No.SK</th>
                <th nowrap="nowrap">Tgl.SK</th>
                <th nowrap="nowrap">TMT HD</th>
                <th nowrap="nowrap">No.SK Pembatalan</th>
                <th nowrap="nowrap">Tgl.SK Pembatalan</th> 
                <th nowrap="nowrap">S.K</th>
            </tr>
        </tfoot>
    </table> 

</div>

<!-- Constanta -->
<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('static');?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="https://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
<script src="<?php echo base_url('static');?>/custom/hukdis.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        loadDataTableHukdis( $('#x_id').val() );

        $('#dt-table-hukdis').on('click', 'a[name="link-modal-upload-sk-hukdis"]', function(){
            var id = $(this).attr('data-edit');
            $('#x_id_hukdis').val(id);
        });

        $('#dt-table-hukdis tbody').on( 'click', 'a[name="link-edit-hukdis"]', function(){
            var arrData = $(this).attr('data').toString().split(dataSeparator);
            $('#x_hukdis_id').val(arrData[0]);
            $('#x_addedit_jenis_hukuman').val( arrData[2] );
            $('#x_addedit_sk_hd').val( arrData[3] );
            $('#x_addedit_tgl_sk_hd').val( arrData[4] );
            $('#x_addedit_tmt_hd').val( arrData[5] );
            $('#x_addedit_masa_hukuman_tahun').val( arrData[6] );
            $('#x_addedit_masa_hukuman_bulan').val( arrData[7] );
            $('#x_addedit_no_pp').val( arrData[8] );
            $('#x_addedit_alasan_hukuman').val( arrData[9] );
            $('#x_addedit_keterangan').val( arrData[10] );

            $('#x_act').val('edit');
        } );

        $('#dt-table-hukdis').on( 'click', 'a[name="link-delete-hukdis"]', function(){
            $('#x_confirm_delete_id').val($(this).attr('data'));
            $('#modal-body-confirm-msg-hukdis').html('Anda yakin ingin menghapus data ini?');
        } );

        $("form#form-submit-hukdis").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {
                    // alert($("form#form-add-user").serialize());
                    $.ajax({

                        type        : 'POST',
                        url         : indexURL + '/employee/saveHukdis',
                        data        : $("form#form-submit-hukdis").serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-frm-add-edit').modal('hide');},
                        success     : function(data){                             
                                        
                                        $('#modal-loader').modal('hide'); 
                                        if( data.status_code == "00" ){ 
                                            $('#modal-message-add-edit').modal('show');                                    
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $(this).trigger('reset');
                                            loadDataTableDP3( $('#x_id').val() );
                                        }else{
                                            $('#modal-message-add-edit').modal('show');
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $('#modal-frm-add-edit').modal('show');
                                        }      
                                        
                        }

                    });
                    

                }

            }

        });

        $("form#form-confirm-delete-hukdis").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {
                    // alert($("form#form-add-user").serialize());
                    $.ajax({

                        type        : 'POST',
                        url         : indexURL + '/employee/deleteData',
                        data        : $("form#form-confirm-delete-hukdis").serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-confirm-hukdis').modal('hide');},
                        success     : function(data){                             
                                        
                                        $('#modal-loader').modal('hide'); 
                                        if( data.status_code == "00" ){ 
                                            $('#modal-message-add-edit').modal('show');                                    
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $(this).trigger('reset');
                                            loadDataTableDP3( $('#x_id').val() );
                                        }else{
                                            $('#modal-message-add-edit').modal('show');
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $('#modal-frm-add-edit').modal('show');
                                        }      
                                        
                        }

                    });
                    

                }

            }

        });

        $('#btn-add-hukdis').click(function(){
            $('form#form-submit-hukdis').trigger('reset');
            $('#x_act').val('add');
        });

        $('#btn-close-modal-hukdis').click(function(){
            $('#modal-message-add-edit').modal('hide');            
            //$('#modal-frm-add-edit').modal('show');
            loadDataTableHukdis($('#x_id').val());
            
        });

        $('a[name="btn-search-user"]').click(function(){
            $('#modal-frm-add-edit').modal('hide');
            loadDataTableUser();
        });

    }); 
</script>