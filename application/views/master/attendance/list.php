<link href="<?php echo base_url('static');?>/plugins/jquery-upload-file/uploadfile.css" rel="stylesheet">
<link href="https://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/datepicker/datepicker3.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    KEHADIRAN
    <small>SIMPEG - Pegawai</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">  
    <div class="row">
        <form id="form-search-attendance" name="form-search-attendance" class="form-horizontal">
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-body">                            
                        <div class="form-group">                            
                            <div class="col-sm-2">
                                <input type="text" name="x_search_attendance_date" id="x_search_attendance_date" class="form-control" placeholder="Tgl. Absen..." data-date-format="dd-mm-yyyy" autocomplete="off">
                            </div>
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
                            <div class="col-sm-2">
                                <select id="x_total_row" name="x_total_row" class="form-control">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="0">All</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select id="x_kondisi_kesehatan" name="x_kondisi_kesehatan" class="form-control">
                                    <option value="0">-Kondisi Kesehatan-</option>
                                    <option value="1">Sehat</option>
                                    <option value="2">Sakit</option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
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

<script type="text/javascript">
    function loadListPage_Attendance(method, param){
        $.ajax({

            type        : method,
            url         : indexURL + '/attendance/showTableList',
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
        loadListPage_Attendance('POST','');
    });
</script>