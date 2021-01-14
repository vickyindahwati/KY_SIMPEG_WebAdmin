<link href="<?php echo base_url('static');?>/plugins/jquery-upload-file/uploadfile.css" rel="stylesheet">
<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/datepicker/datepicker3.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/daterangepicker/daterangepicker-bs3.css">

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
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-cancel-journal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI PEMBATALAN JURNAL</h4>
            </div>
            <form class="form-horizontal" id="frm-confirm-cancel-journal" name="frm-confirm-cancel-journal">
                <input type="hidden" id="x_confirm_cancel_id" name="x_confirm_cancel_id">
                <div class="modal-body" id="modal-body-confirm-msg">
                    Apakah anda yakin ingin membatalkan jurnal ini?
                </div>
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

<?php if( $xRoleId <> 1 && $xRoleId <> 3 ){ ?>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-form-journal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM TAMBAH JURNAL</h4>                
            </div>            
            <form id="form-journal" name="form-journal" class="form-horizontal">
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">                            
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Judul Jurnal</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_subject" id="x_subject" class="form-control validate[required]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tgl Jurnal</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_journal_date" id="x_journal_date" class="form-control validate[required]" data-date-format="dd-mm-yyyy" value="" placeholder="Tgl. Jurnal..." autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="x_body" id="x_body"></textarea>
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
<?php } ?>

 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-journal-detail">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">DETAIL JURNAL</h4>                
            </div>            
            <form id="form-journal" name="form-journal" class="form-horizontal">
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">     
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Nama Pegawai</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_detail_name" id="x_detail_name" class="form-control" readonly="readonly">
                                </div>
                            </div>                       
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Judul Jurnal</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_detail_subject" id="x_detail_subject" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tgl Jurnal</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_detail_journal_date" id="x_detail_journal_date" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <span id="x_detail_body" name="x_detail_body"></span>
                                </div>
                                
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
                </div>
            </form>
        </div>
    </div>
 </div> 

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    JURNAL HARIAN
  </h1>
</section>

<!-- Main content -->
<section class="content">  
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <p>
                <a href="<?php echo base_url(); ?>index.php/layanan" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i>Back to Layanan</a>
            </p>
        </div>
    </div>
    <div class="row">
        <form id="form-search-journal" name="form-search-journal" class="form-horizontal">
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-body">                            
                        <div class="form-group">                            
                            <div class="col-sm-2">
                                <input type="text" name="x_search_tgl_jurnal" id="x_search_tgl_jurnal" class="form-control" placeholder="Tgl. Jurnal..." autocomplete="off">
                            </div>
                            <?php if( $this->session->userdata['SESSION_SIMPEG_D'] == 1 || $this->session->userdata['SESSION_SIMPEG_D'] == 3 ){ ?>
                            <div class="col-sm-5">
                                <select id="x_search_unor_induk" name="x_search_unor_induk" class="form-control">
                                    <option value="">-Unor Induk-</option>
                                    <?php 
                                        foreach( $rsUnorInduk->data as $dtUnorInduk ){
                                    ?>
                                            <option value="<?php echo $dtUnorInduk->id ?>" ><?php echo $dtUnorInduk->name; ?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                            <?php } ?>
                            <div class="col-sm-2">
                                <select id="x_total_row" name="x_total_row" class="form-control">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="0">All</option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                            <?php if( $this->session->userdata['SESSION_SIMPEG_D'] != 1 && $this->session->userdata['SESSION_SIMPEG_D'] != 3 ){ ?>
                                <div class="col-sm-1">
                                    <button class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-form-journal" id="btn-add-leave"><i class="fa fa-plus"></i>&nbsp;Tambah Baru</button>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
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
<script src="<?php echo base_url('static')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('static');?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url('static');?>/plugins/daterangepicker/moment.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('static');?>/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript">
    function loadListPage_Journal(method, param){
        $.ajax({

            type        : method,
            url         : indexURL + '/journal/showTableList',
            data        : param,
            crossDomain : true,
            beforeSend  : function(){ $('#container-loader-list').show(); },
            success     : function(html){ 
                            $('#container-loader-list').hide();
                            $('#container-list').html(html); 
                          }
        
          });
    } 

    $(document).ready(function(){         
        loadListPage_Journal('POST','');
    });
</script>