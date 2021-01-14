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
            
        </div>
    </div>
 </div>

<div class="box-body">
    <form id="form-submit-pwk" name="form-submit-pwk" class="form-horizontal">
        <input type="hidden" name="x_id" id="x_id" value="<?php echo $id; ?>">
        <input type="hidden" name="x_cpnspns_user_id" id="x_cpnspns_user_id" value="">
        <input type="hidden" name="x_act" id="x_act" value="add">
    
        <div class="modal-body">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label for="input1" class="col-sm-3 control-label">Status Kepeg</label>
                        <div class="col-sm-3">
                            <input type="text" name="x_addedit_cpnspns_status_kepeg" id="x_addedit_cpnspns_status_kepeg" value="<?php echo $data['name']; ?>">
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">TMT CPNS</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_tmt_cpns" id="x_addedit_cpnspns_tmt_cpns" data-date-format="dd-mm-yyyy">
                        </div>
                        <label for="input1" class="col-sm-2 control-label">Tgl. SK CPNS</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_sk_cpns" id="x_addedit_cpnspns_tgl_sk_cpns" data-date-format="dd-mm-yyyy">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_no_sk_cpns" id="x_addedit_cpnspns_no_sk_cpns" placeholder="No. SK CPNS">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">Jenis Pengadaan</label>
                        <div class="col-sm-2">
                            <select id="x_addedit_cpnspns_jenis_pengadaan" name="x_addedit_cpnspns_jenis_pengadaan" class="form-control">
                                <option value="0">-Pilih-</option>
                                <?php 
                                    foreach( $rsPengadaan->data as $dtPengadaan ){
                                ?>
                                        <option value="<?php echo $dtPengadaan->id ?>"><?php echo $dtPengadaan->name; ?></option>
                                <?php 
                                    }
                                ?>
                            </select>
                        </div>
                        <label for="input1" class="col-sm-2 control-label">Tgl. SPMT</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_spmt" id="x_addedit_cpnspns_tgl_spmt" data-date-format="dd-mm-yyyy">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_no_spmt" id="x_addedit_cpnspns_no_spmt" placeholder="No. SPMT">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">TMT PNS</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_tmt_pns" id="x_addedit_cpnspns_tmt_pns" data-date-format="dd-mm-yyyy">
                        </div>
                        <label for="input1" class="col-sm-2 control-label">Tgl.Sk. PNS</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_sk_pns" id="x_addedit_cpnspns_tgl_spmt" data-date-format="dd-mm-yyyy">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_no_sk_pns" id="x_addedit_cpnspns_no_sk_pns" placeholder="No. SK. PNS">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">Tgl. Pertek C2TH</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_pertek_c2th" id="x_addedit_cpnspns_tgl_pertek_c2th" data-date-format="dd-mm-yyyy">
                        </div>
                        <label for="input1" class="col-sm-2 control-label">No. Pertek C2TH</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_no_pertek_c2th" id="x_addedit_cpnspns_no_pertek_c2th" data-date-format="dd-mm-yyyy">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">Tgl.Kep.PNS Honorer >= 2 Thn</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_kep_pns" id="x_addedit_cpnspns_tgl_kep_pns" data-date-format="dd-mm-yyyy">
                        </div>
                        <label for="input1" class="col-sm-2 control-label">No.Kep.PNS Honorer >= 2 Thn</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_no_kep_pns" id="x_addedit_cpnspns_no_kep_pns">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">Karis/Karsu</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_karis_karsu" id="x_addedit_cpnspns_karis_karsu">
                        </div>
                        <label for="input1" class="col-sm-2 control-label">Karpeg</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_karpeg" id="x_addedit_cpnspns_karpeg">
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">Tgl. STTPL</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_sttpl" id="x_addedit_cpnspns_tgl_sttpl" data-date-format="dd-mm-yyyy">
                        </div>
                        <label for="input1" class="col-sm-2 control-label">No. STTPL</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_no_sttpl" id="x_addedit_cpnspns_no_sttpl">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">Tgl. Dokter</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_dokter" id="x_addedit_cpnspns_tgl_dokter" data-date-format="dd-mm-yyyy">
                        </div>
                        <label for="input1" class="col-sm-2 control-label">No. STTPL</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_no_surat_dokter" id="x_addedit_cpnspns_no_surat_dokter">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input1" class="col-sm-3 control-label">Nm. Jabatan Pengangkat CPNS</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="x_addedit_cpnspns_nama_jabatan" id="x_addedit_cpnspns_nama_jabatan">
                        </div>
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
        
        loadDataTableUser( $('#x_id').val() );

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

    }); 
</script>