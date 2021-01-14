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
                <button type="button" id="btn-close-modal-cltn" class="btn btn-primary">TUTUP</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-cltn">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI</h4>
            </div>
            <form class="form-horizontal" id="form-confirm-delete-cltn" name="form-confirm-delete-cltn">
                <input type="hidden" id="x_confirm_delete_id" name="x_confirm_delete_id">
                <input type="hidden" id="x_confirm_delete_module" name="x_confirm_delete_module" value="/user/cltn">
                <div class="modal-body" id="modal-body-confirm-msg-cltn"></div>
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
                <h4 class="modal-title" id="gridSystemModalLabel">FORM TAMBAH CLTN</h4>                
            </div>
            <form id="form-submit-cltn" name="form-submit-cltn" class="form-horizontal">
                <input type="hidden" name="x_id" id="x_id" value="<?php echo $id; ?>">
                <input type="hidden" name="x_cltn_id" id="x_cltn_id" value="">
                <input type="hidden" name="x_act" id="x_act" value="add">
            
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input1" class="col-sm-2 control-label">Jenis CLTN</label>
                                <div class="col-sm-7">
                                    <select id="x_addedit_cltn_jenis_cltn" name="x_addedit_cltn_jenis_cltn" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsJenisCLTN->data as $dtJenisCLTN ){
                                        ?>
                                                <option value="<?php echo $dtJenisCLTN->id ?>"><?php echo $dtJenisCLTN->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-2 control-label">No. SK</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="x_addedit_cltn_no_sk" id="x_addedit_cltn_no_sk">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Tgl. SKEP</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_cltn_tgl_skep" id="x_addedit_cltn_tgl_skep" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-2 control-label">Tgl Awal</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_cltn_tgl_awal" id="x_addedit_cltn_tgl_awal" data-date-format="dd-mm-yyyy">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Tgl Akhir</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_cltn_tgl_akhir" id="x_addedit_cltn_tgl_akhir" data-date-format="dd-mm-yyyy">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Tgl Aktif</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_cltn_tgl_aktif" id="x_addedit_cltn_tgl_aktif" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-2 control-label">No. BKN</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="x_addedit_cltn_no_bkn" id="x_addedit_cltn_no_bkn">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Tgl. BKN</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_cltn_tgl_bkn" id="x_addedit_cltn_tgl_bkn" data-date-format="dd-mm-yyyy">
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
        <button type="button" id="btn-add-cltn" class="btn btn-primary" data-toggle="modal" data-target="#modal-frm-add-edit" ><i class="glyphicon glyphicon-plus"></i>&nbsp;TAMBAH</button>
    </p>
    */?>
    <br>
    <table id="dt-table-cltn" class="table table-bordered table-striped">
        <thead>
            <tr>                
                <th>Jenis CLTN</th>
                <th>No. SK</th>
                <th>Tgl. SKEP</th>
                <th>Tgl. Awal</th>
                <th>Tgl. Akhir</th>
                <th>Tgl. Aktif</th>
                <th>No. BKN</th>
                <th>Tgl. BKN</th>
                <th>Action</th>          
            </tr>
        </thead>
        <tfoot>
            <tr>                
                <th>Jenis CLTN</th>
                <th>No. SK</th>
                <th>Tgl. SKEP</th>
                <th>Tgl. Awal</th>
                <th>Tgl. Akhir</th>
                <th>Tgl. Aktif</th>
                <th>No. BKN</th>
                <th>Tgl. BKN</th>
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
<script src="<?php echo base_url('static');?>/custom/cltn.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        loadDataTableCLTN( $('#x_id').val() );

        $('#dt-table-cltn tbody').on( 'click', 'a[name="link-edit-cltn"]', function(){
            var arrData = $(this).attr('data').toString().split(dataSeparator);
            $('#x_cltn_id').val(arrData[0]);
            $('#x_addedit_cltn_jenis_cltn').val( arrData[2] );
            $('#x_addedit_cltn_no_sk').val( arrData[3] );
            $('#x_addedit_cltn_tgl_skep').val( arrData[4] );
            $('#x_addedit_cltn_tgl_awal').val( arrData[5] );
            $('#x_addedit_cltn_tgl_akhir').val( arrData[6] );
            $('#x_addedit_cltn_tgl_aktif').val( arrData[7] );
            $('#x_addedit_cltn_no_bkn').val( arrData[8] );
            $('#x_addedit_cltn_tgl_bkn').val( arrData[9] );

            $('#x_act').val('edit');
        } );

        $('#dt-table-cltn').on( 'click', 'a[name="link-delete-cltn"]', function(){
            $('#x_confirm_delete_id').val($(this).attr('data'));
            $('#modal-body-confirm-msg-cltn').html('Anda yakin ingin menghapus data ini?');
        } );

        $("form#form-submit-cltn").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {
                    // alert($("form#form-add-user").serialize());
                    $.ajax({

                        type        : 'POST',
                        url         : indexURL + '/employee/saveCLTN',
                        data        : $("form#form-submit-cltn").serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-frm-add-edit').modal('hide');},
                        success     : function(data){                             
                                        
                                        $('#modal-loader').modal('hide'); 
                                        if( data.status_code == "00" ){ 
                                            $('#modal-message-add-edit').modal('show');                                    
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $(this).trigger('reset');
                                            loadDataTableCLTN( $('#x_id').val() );
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

        $("form#form-confirm-delete-cltn").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {
                    // alert($("form#form-add-user").serialize());
                    $.ajax({

                        type        : 'POST',
                        url         : indexURL + '/employee/deleteData',
                        data        : $("form#form-confirm-delete-cltn").serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-confirm-cltn').modal('hide');},
                        success     : function(data){                             
                                        
                                        $('#modal-loader').modal('hide'); 
                                        if( data.status_code == "00" ){ 
                                            $('#modal-message-add-edit').modal('show');                                    
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $(this).trigger('reset');
                                            loadDataTableCLTN( $('#x_id').val() );
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

        $('#btn-add-cltn').click(function(){
            $('form#form-submit-cltn').trigger('reset');
            $('#x_act').val('add');
        });

        $('#btn-close-modal-cltn').click(function(){
            $('#modal-message-add-edit').modal('hide');            
            //$('#modal-frm-add-edit').modal('show');
            loadDataTableCLTN($('#x_id').val());
            
        });

    }); 
</script>