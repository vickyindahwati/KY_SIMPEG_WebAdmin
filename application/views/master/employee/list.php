<link href="<?php echo base_url('static');?>/plugins/jquery-upload-file/uploadfile.css" rel="stylesheet">
<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/datepicker/datepicker3.css">

<!-- Start : Modal Form -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-loader" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">MESSAGE</h4>
            </div>      
            <div class="overlay text-center" id="container-loader">
                <i class="fa fa-refresh fa-spin fa-5x"></i>
            </div>
            <div class="modal-body text-center"><p>Please Wait...</p></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-message">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">POP UP MESSAGE</h4>
            </div>
            <div class="modal-body" id="container-popup-message"></div>
            <div class="overlay" id="container-loader-delete-driver" style="display:none;">
                <i class="fa fa-refresh fa-spin"></i>
                </div>
            <div class="modal-footer">
                <button type="button" id="btn-close-modal-msg" class="btn btn-primary">TUTUP</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-update-data-pending">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">DETIL PERUBAHAN DATA</h4>
        </div>            
        <div id="container-update-data-pending"></div>
        <div class="overlay text-center" id="container-loader-update-data-pending" style="display:none;">
            <i class="fa fa-refresh fa-spin fa-5x"></i>
        </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-user">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI</h4>
                </div>
                <form class="form-horizontal" id="frm-confirm-user" name="frm-confirm-user">
                    <input type="hidden" id="x_confirm_id" name="x_confirm_id">
                    <input type="hidden" id="x_confirm_type" name="x_confirm_type">
                    <div class="modal-body" id="modal-body-confirm-msg"></div>
                    <div class="overlay" id="container-loader-confirm" style="display:none;">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-form-nonactive-employee">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM NON-ACTIVE EMPLOYEE</h4>                
            </div>
            <form id="form-submit-nonactive-employee" name="form-submit-nonactive-employee" class="form-horizontal">
                <input type="hidden" id="x_id_nonactive" name="x_id_nonactive">
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">                            
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tipe Non Aktif</label>
                                <div class="col-sm-6">
                                    <select id="x_type_id" name="x_type_id" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <option value="14">Pensiun</option>
                                        <option value="15">Pindah Instansi</option>
                                        <option value="12">Pemberhentian</option>
                                        <option value="11">Pindah Instansi Asal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">No. SK</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_no_sk" id="x_no_sk" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tgl. SK</label>
                                <div class="col-sm-3">
                                    <input type="text" name="x_tgl_sk" id="x_tgl_sk" class="form-control" data-date-format="dd-mm-yyyy">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Tgl. Efektif</label>
                                <div class="col-sm-4">
                                    <input type="text" name="x_tgl_efektif" id="x_tgl_efektif" class="form-control" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">File SK</label>
                                <div class="col-sm-9" id="container-nonactive-employee-form-file-sk">
                                    <div id="mulitplefileuploader_SK_NONACTIVE" >Upload</div>
                                    <input type="hidden" name="x_file_sk_nonactive" id="x_file_sk_nonactive">
                                    <input type="hidden" name="x_sk_module" id="x_sk_module" value="">
                                </div>
                                <div class="col-sm-9" id="container-nonactive-employee-detail-file-sk" style="display: none;">
                                    <a href="" name="link-download-sk-nonactive" class="btn btn-md btn-primary"></a>
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

 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-form-adjust-anual-leave">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM PENYESUAIAN CUTI TAHUNAN</h4>                
            </div>
            <form id="form-adjust-anual-leave" name="form-adjust-anual-leave" class="form-horizontal">
                <input type="hidden" id="x_id_adjust_leave" name="x_id_adjust_leave" value="">
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">                            
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Cuti Tahun N</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_cuti_tahun_n" id="x_cuti_tahun_n" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Cuti Tahun N-1</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_cuti_tahun_n_1" id="x_cuti_tahun_n_1" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Cuti Tahun N-2</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_cuti_tahun_n_2" id="x_cuti_tahun_n_2" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Cuti Ditangguhkan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_cuti_ditangguhkan" id="x_cuti_ditangguhkan" class="form-control">
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

 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-dosier">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">DOSIER</h4>
        </div>            
        <div id="container-dosier"></div>
        <div class="overlay text-center" id="container-loader-dosier" style="display:none;">
            <i class="fa fa-refresh fa-spin fa-5x"></i>
        </div>
        </div>
    </div>
</div>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    PEGAWAI
    <small>SIMPEG - Pegawai</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">   
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $title ?></h3>
                </div><!-- /.box-header -->
                <div id="container-list"></div>
                <div class="overlay" id="container-loader-list" style="display:none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>            
        </div>
    </div>
</section>

<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<script src="<?php echo base_url('static');?>/custom/global_function.js"></script>
<script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('static');?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url('static');?>/custom/employee.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        
        $("form#frm-confirm-user").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {

                    $.ajax({

                        type        : 'POST',
                        url         : '<?php echo base_url()?>index.php/user/doConfirmUpdateProfile',
                        data        : $('#frm-confirm-user').serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-confirm-user').modal('hide');$('#modal-confirm-user').hide();$('#modal-update-data-pending').modal('hide'); },
                        success     : function(data){                             
                                        
                                        $('#modal-loader').modal('hide');                                        

                                        if( data.status_code == '00' ){   
                                            $('#modal-message').modal('show');                                    
                                            $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        }else{
                                            $('#modal-message').modal('show');
                                            $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        }      
                                        
                                        loadListPage('POST','');

                                    }

                    });

                }

            }

        });       

    });
</script>