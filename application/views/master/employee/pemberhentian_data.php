<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">

<style type="text/css">
    td.wrapok {
        white-space: nowrap;
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
                <button type="button" id="btn-close-modal-pemberhentian" class="btn btn-primary">TUTUP</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-pemberhentian">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI</h4>
            </div>
            <form class="form-horizontal" id="form-confirm-delete-pemberhentian" name="form-confirm-delete-pemberhentian">
                <input type="hidden" id="x_confirm_delete_id" name="x_confirm_delete_id">
                <input type="hidden" id="x_confirm_delete_module" name="x_confirm_delete_module" value="/user/pemberhentian">
                <div class="modal-body" id="modal-body-confirm-msg-pemberhentian"></div>
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
                <h4 class="modal-title" id="gridSystemModalLabel">FORM TAMBAH pemberhentian</h4>                
            </div>
            <form id="form-submit-pemberhentian" name="form-submit-pemberhentian" class="form-horizontal">
                <input type="hidden" name="x_id" id="x_id" value="<?php echo $id; ?>">
                <input type="hidden" name="x_pemberhentian_id" id="x_pemberhentian_id" value="">
                <input type="hidden" name="x_act" id="x_act" value="add">
            
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">                                            
                            
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

 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-upload-sk-pemberhentian">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">UPLOAD FILE</h4>
            </div>
            <form class="form-horizontal" id="form-upload-sk-pemberhentian" name="form-upload-sk-pemberhentian">
                <div id="mulitplefileuploader_SK_PEMBERHENTIAN" >Upload</div>
                <input type="hidden" name="x_file_pemberhentian" id="x_file_pemberhentian" value="">
                <input type="text" name="x_id_pemberhentian" id="x_id_pemberhentian" value="">
                <input type="hidden" name="x_user_id_pemberhentian" id="x_user_id_pemberhentian" value="<?php echo $id?>">
                <input type="hidden" name="x_sk_module" id="x_sk_module" value="pemberhentian">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="box-body">
    <p class="pull-right"></p>
    <?php /*
    <p class="pull-right">
        <button type="button" id="btn-add-pemberhentian" class="btn btn-primary" data-toggle="modal" data-target="#modal-frm-add-edit" ><i class="glyphicon glyphicon-plus"></i>&nbsp;TAMBAH</button>
    </p>*/?>
    <br>
    <table id="dt-table-pemberhentian" class="table table-bordered table-striped">
        <thead>
            <tr>        
                <th>Jns. Pemberhentian</th>
                <th>Kedudukan Hukum</th>
                <th>No. SK</th>
                <th>Tgl. SK</th>
                <th>Prosedur Asal</th>      
                <th>S.K</th>        
                    
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Jns. Pemberhentian</th>
                <th>Kedudukan Hukum</th>
                <th>No. SK</th>
                <th>Tgl. SK</th>
                <th>Prosedur Asal</th> 
                <th>S.K</th>                
                         
            </tr>
        </tfoot>
    </table> 

</div>

<!-- Constanta -->
<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
<script src="<?php echo base_url('static');?>/custom/pemberhentian.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        loadDataTablePemberhentian( $('#x_id').val() );

        

    }); 
</script>