<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
                <button type="button" id="btn-close-modal-news" class="btn btn-primary">TUTUP</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Start : Modal Form -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-news-form" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM NEWS</h4>                
            </div>
            <form id="frm-news" name="frm-news" class="form-horizontal">
                <input type="text" name="x_id_news" id="x_id_news" value="">
                <input type="text" name="x_act" id="x_act" value="add">
                <div class="modal-body">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_title" id="x_title" class="form-control">
                                </div>          
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Content</label>
                                <div class="col-sm-9">
                                    <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="x_content" id="x_content"></textarea>
                                </div>          
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">Tgl. Mulai Tampil</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control pull-right" id="x_effective_date" name="x_effective_date" data-date-format="yyyy-mm-dd" value="" placeholder="Tgl. Mulai..."> 
                                </div>
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">Tgl. Berakhir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control pull-right" id="x_expire_at" name="x_expire_at" data-date-format="yyyy-mm-dd" value="" placeholder="Tgl. Berakhir"> 
                                </div>
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="x_status" id="x_status" class="form-control">
                                        <option selected value="1" selected="">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="overlay" id="container-loader-form" style="display:none;">
                                <i class="fa fa-refresh fa-spin"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" >Simpan</button>
                </div>
            </form>
        </div>
    </div>
 </div>

 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-detail-news" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">NEWS DETAIL</h4>                
            </div>
            <form id="frm-news" name="frm-news" class="form-horizontal">
                <input type="hidden" name="x_act" id="x_act" value="add">
                <div class="modal-body">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_title_view" id="x_title_view" class="form-control" readonly="readonly">
                                </div>          
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Content</label>
                                <div class="col-sm-9">
                                    <div id="x_content_view"></div>
                                </div>          
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">Tgl. Mulai Tampil</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control pull-right" id="x_effective_date_view" name="x_effective_date_view" data-date-format="yyyy-mm-dd" value="" placeholder="Tgl. Mulai..." readonly="readonly"> 
                                </div>
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">Tgl. Berakhir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control pull-right" id="x_expire_at_view" name="x_expire_at_view" data-date-format="yyyy-mm-dd" value="" placeholder="Tgl. Berakhir" readonly="readonly"> 
                                </div>
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="x_status_view" id="x_status_view" class="form-control" readonly="readonly">
                                        <option selected value="1" selected="">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="overlay" id="container-loader-form" style="display:none;">
                                <i class="fa fa-refresh fa-spin"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" >Simpan</button>
                </div>
            </form>
        </div>
    </div>
 </div>

 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-delete-news">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI</h4>
            </div>
            <form class="form-horizontal" id="form-confirm-delete-news" name="form-confirm-delete-news">
                <input type="hidden" id="x_confirm_delete_id" name="x_confirm_delete_id">
                <input type="hidden" id="x_confirm_delete_module" name="x_confirm_delete_module" value="/news">
                <div class="modal-body" id="modal-body-confirm-msg-news"></div>
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
    <p>
        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-news-form" id="btn-add-news"><i class="fa fa-plus"></i>&nbsp;Tambah Baru</button>
    </p>
    <br>
    <table id="dt-table-news" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Tgl. Buat</th>
                <th>Judul</th>
                <th>Tgl. Efektif</th>
                <th>Tgl. Kadaluarsa</th>
                <th>Admin</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Tgl. Buat</th>
                <th>Judul</th>
                <th>Tgl. Efektif</th>
                <th>Tgl. Kadaluarsa</th>
                <th>Admin</th>
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
<script src="<?php echo base_url('static')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('static');?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url('static');?>/custom/news.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("form#form-confirm-delete-news").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {
                    // alert($("form#form-add-user").serialize());
                    $.ajax({

                        type        : 'POST',
                        url         : indexURL + '/news/deleteData',
                        data        : $("form#form-confirm-delete-news").serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-confirm-delete-news').modal('hide');},
                        success     : function(data){                             
                                        
                                        $('#modal-loader').modal('hide'); 
                                        if( data.status_code == "00" ){ 
                                            $('#modal-message-add-edit').modal('show');                                    
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            loadListPage_News( $('#x_id').val() );
                                        }else{
                                            $('#modal-message-add-edit').modal('show');
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        }      
                                        
                        }

                    });
                    

                }

            }

        });

        $('#dt-table-news').on( 'click', 'a[name="link-delete-news"]', function(){
            $('#x_confirm_delete_id').val($(this).attr('data'));
            $('#modal-body-confirm-msg-news').html('Anda yakin ingin menghapus data ini?');
        } );

        

    });
</script>