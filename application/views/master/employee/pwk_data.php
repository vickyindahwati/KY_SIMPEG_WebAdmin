<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/datepicker/datepicker3.css">

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-message-add-edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">POP UP MESSAGE</h4>
            </div>
            <div class="modal-body" id="container-popup-message-addedit"></div>
            <div class="modal-footer">
                <button type="button" id="btn-close-modal-pwk" class="btn btn-primary">TUTUP</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-pwk">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI</h4>
            </div>
            <form class="form-horizontal" id="form-confirm-delete-pwk" name="form-confirm-delete-pwk">
                <input type="hidden" id="x_confirm_delete_id" name="x_confirm_delete_id">
                <input type="hidden" id="x_confirm_delete_module" name="x_confirm_delete_module" value="/user/pwk">
                <div class="modal-body" id="modal-body-confirm-msg-pwk"></div>
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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-frm-add-edit" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM TAMBAH PWK</h4>                
            </div>
            <form id="form-submit-pwk" name="form-submit-pwk" class="form-horizontal">
                <input type="hidden" name="x_id" id="x_id" value="<?php echo $id; ?>">
                <input type="hidden" name="x_pwk_id" id="x_pwk_id" value="">
                <input type="hidden" name="x_act" id="x_act" value="add">
            
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">KPPN</label>
                                <div class="col-sm-6">
                                    <select id="x_addedit_pwk_kppn" name="x_addedit_pwk_kppn" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsKppn->data as $dtKppn ){
                                        ?>
                                                <option value="<?php echo $dtKppn->id ?>"><?php echo $dtKppn->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Satuan Kerja</label>
                                <div class="col-sm-6">
                                    <select id="x_addedit_pwk_satuan_kerja" name="x_addedit_pwk_satuan_kerja" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsSatuanKerja->data as $dtSatuanKerja ){
                                        ?>
                                                <option value="<?php echo $dtSatuanKerja->id ?>"><?php echo $dtSatuanKerja->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Lokasi</label>
                                <div class="col-sm-6">
                                    <select id="x_addedit_pwk_lokasi" name="x_addedit_pwk_lokasi" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsLokasi->data as $dtLokasi ){
                                        ?>
                                                <option value="<?php echo $dtLokasi->id ?>"><?php echo $dtLokasi->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Unor</label>
                                <div class="col-sm-6">
                                    <select id="x_addedit_pwk_unor" name="x_addedit_pwk_unor" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsUnor->data as $dtUnor ){
                                        ?>
                                                <option value="<?php echo $dtUnor->id ?>"><?php echo $dtUnor->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">No. SK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="x_addedit_pwk_no_sk" id="x_addedit_pwk_no_sk">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tgl. SK</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_pwk_tgl_sk" id="x_addedit_pwk_tgl_sk" data-date-format="dd-mm-yyyy">
                                </div>
                                <label for="input1" class="col-sm-3 control-label">TMT HD</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_pwk_tmt_pemindahan" id="x_addedit_pwk_tmt_pemindahan" data-date-format="dd-mm-yyyy">
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
    <?php /*
    <p class="pull-right">
        <button type="button" id="btn-add-pwk" class="btn btn-primary" data-toggle="modal" data-target="#modal-frm-add-edit" ><i class="glyphicon glyphicon-plus"></i>&nbsp;TAMBAH</button>
    </p>
    */?>
    <br>
    <table id="dt-table-pwk" class="table table-bordered table-striped">
        <thead>
            <tr>                
                <th>Satuan Kerja</th>
                <th>KPPN</th>
                <th>Lokasi Kerja</th>
                <th>Unor</th>
                <th>Action</th>          
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Satuan Kerja</th>
                <th>KPPN</th>
                <th>Lokasi Kerja</th>
                <th>Unor</th>
                <th>Action</th>
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
<script src="<?php echo base_url('static');?>/custom/pwk.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        loadDataTablePWK( $('#x_id').val() );

        $('#dt-table-pwk tbody').on( 'click', 'a[name="link-edit-pwk"]', function(){
            var arrData = $(this).attr('data').toString().split(dataSeparator);
            $('#x_pwk_id').val(arrData[0]);
            $('#x_addedit_pwk_kppn').val( arrData[2] );
            $('#x_addedit_pwk_satuan_kerja').val( arrData[3] );
            $('#x_addedit_pwk_lokasi').val( arrData[4] );
            $('#x_addedit_pwk_unor').val( arrData[5] );
            $('#x_addedit_pwk_no_sk').val( arrData[6] );
            $('#x_addedit_pwk_tgl_sk').val( arrData[7] );
            $('#x_addedit_pwk_tmt_pemindahan').val( arrData[8] );

            $('#x_act').val('edit');
        } );

        $('#dt-table-pwk').on( 'click', 'a[name="link-delete-pwk"]', function(){
            $('#x_confirm_delete_id').val($(this).attr('data'));
            $('#modal-body-confirm-msg-pwk').html('Anda yakin ingin menghapus data ini?');
        } );

        $("form#form-submit-pwk").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {
                    // alert($("form#form-add-user").serialize());
                    $.ajax({

                        type        : 'POST',
                        url         : indexURL + '/employee/savePwk',
                        data        : $("form#form-submit-pwk").serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-frm-add-edit').modal('hide');},
                        success     : function(data){                             
                                        
                                        $('#modal-loader').modal('hide'); 
                                        if( data.status_code == "00" ){ 
                                            $('#modal-message-add-edit').modal('show');                                    
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $(this).trigger('reset');
                                            loadDataTablePWK( $('#x_id').val() );
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

        $("form#form-confirm-delete-pwk").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {
                    // alert($("form#form-add-user").serialize());
                    $.ajax({

                        type        : 'POST',
                        url         : indexURL + '/employee/deleteData',
                        data        : $("form#form-confirm-delete-pwk").serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-confirm-pwk').modal('hide');},
                        success     : function(data){                             
                                        
                                        $('#modal-loader').modal('hide'); 
                                        if( data.status_code == "00" ){ 
                                            $('#modal-message-add-edit').modal('show');                                    
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $(this).trigger('reset');
                                            loadDataTablePWK( $('#x_id').val() );
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

        $('#btn-add-pwk').click(function(){
            $('form#form-submit-pwk').trigger('reset');
            $('#x_act').val('add');
        });

        $('#btn-close-modal-pwk').click(function(){
            $('#modal-message-add-edit').modal('hide');            
            //$('#modal-frm-add-edit').modal('show');
            loadDataTablePWK($('#x_id').val());
            
        });

    }); 
</script>