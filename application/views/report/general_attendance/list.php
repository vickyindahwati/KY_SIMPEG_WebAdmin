<link href="<?php echo base_url('static');?>/plugins/jquery-upload-file/uploadfile.css" rel="stylesheet">
<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/daterangepicker/daterangepicker-bs3.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/select2/select2.min.css">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/timepicker/bootstrap-timepicker.min.css">



<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title;?>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Report</a></li>
    <li class="active"><?php echo $title;?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <form id="frm-search" name="frm-search">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Filter Reports</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tanggal</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right datepicker" id="x_attendance_date">                  
                  </div>
                </div>
              </div>
              <!-- /.col -->

              <div class="col-md-3 bootstrap-timepicker">
                <div class="form-group">
                  <label>Time</label>
                  <div class="input-group">
                    <input type="text" class="form-control timepicker" id="x_start_time" name="x_start_time" placeholder="Start Time...">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3 bootstrap-timepicker">
                <div class="form-group">
                  <label>&nbsp;</label>
                  <div class="input-group">
                    <input type="text" class="form-control timepicker" id="x_end_time" name="x_end_time" placeholder="End Time...">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
            <!-- /.row -->

            <div class="row">

              <div class="col-md-6">

                <div class="form-group">
                  <label>Grup</label>
                  <select id="x_group" name="x_group" class="form-control" >
                    <option value="">-Silahkan Pilih-</option>
                    <?php echo $elementOption;?>
                  </select>
                </div>

              </div>

              <div class="col-md-6">
                <label>Terminal ID</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" id="x_terminal_id">
                    <option value="">-Silahkan Pilih-</option>
                    <?php 
                      foreach( $rsTerminalId as $dtTerminalId ){

                        echo '<option value="' . $dtTerminalId->terminal_id . '">Terminal ' . $dtTerminalId->terminal_id . ' (' . $dtTerminalId->terminal_name . ')</option>';

                      }
                    ?>
                  </select>
              </div>

            </div>    

            <div class="row">
              <div class="col-md-6">
                <span class="input-group-btn">
                <button class="btn bg-purple" type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="glyphicon glyphicon-search fa-1x"></i>&nbsp;Search
                  </button>
                  <a href="#" class="btn bg-olive" name="link-export-report">
                    <span class="glyphicon glyphicon-download-alt fa-1x">&nbsp;Download Report</span>
                  </a>
                </span>
              </div>
            </div>      

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </form>

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data List</h3>
        </div><!-- /.box-header -->
        <div id="container-master"></div>
        <div class="overlay" id="container-loader-list" style="display:none;">
          <i class="fa fa-refresh fa-spin"></i>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="<?php echo base_url('static');?>/plugins/jquery-upload-file/jquery.uploadfile.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url('static');?>/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url('static');?>/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url('static');?>/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url('static');?>/plugins/daterangepicker/daterangepicker.js"></script>

<!-- bootstrap time picker -->
<script src="<?php echo base_url('static');?>/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!-- Jquery File Download -->
<script src="<?php echo base_url('static');?>/plugins/file_download/jquery.fileDownload.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url('static');?>/plugins/select2/select2.full.min.js"></script>

<script type="text/javascript">

function loadList( method, param ){

  $.ajax({

    type        : method,
    url         : '<?php echo base_url();?>report/provider-income/load.data',
    data        : param,
    beforeSend  : function(){ $('#container-loader-list').show(); },
    success     : function(html){ 
                    $('#container-loader-list').hide();
                    $('#container-master').html(html); 
                  }

  });

}

function disabledForm(){
  $('#form-update-status :input').attr("disabled",true);
  $('#form-update-status :button').attr("disabled",true);
}

function enabledForm(){
  $('#form-update-status :input').attr("disabled",false);
  $('#form-update-status :button').attr("disabled",false);
}

function clearForm(){
  $('#form-update-status').trigger('reset');
}

$(document).ready(function(){

  //loadList( 'POST', '' ); 

  //Initialize Select2 Elements
  $(".select2").select2();

    //Date picker
    $('#x_attendance_date').daterangepicker({
      locale: {
        format: 'YYYY-MM-DD'
      }
    });

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false,
      showMeridian: false
    });

    $('#datepicker').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' s/d ' + picker.endDate.format('YYYY-MM-DD'));
    });

  $('form#frm-filter').submit(function(){

    loadList( 'POST', 'td=' + $('#datepicker').val() ); 

    return false;

  });


  $('a[name=link-export-report]').click(function(){

    $.ajax({
        type            : 'POST',
        url             : '<?php echo base_url();?>index.php/attendancereport/exportAttendance',
        data            : {date: $('#x_attendance_date').val(), startTime: $('#x_start_time').val(), endTime: $('#x_end_time').val(), group: $('#x_group').val(), terminalId: $('#x_terminal_id').val()},
        dataType        : 'json',
        success         : function(data){
           
            $.fileDownload('<?php echo base_url();?>uploads/export/worker_attendance/' + data.fileName )
                    .done(function () { alert('File download a success!'); })
                    .fail(function () { alert('File download failed!'); });

        },error: function(jqXHR, textStatus, errorThrown) {
            alert("Error... " + textStatus + "        " + errorThrown);
        }       
    });

  });

  $('form#frm-search').submit(function(){

    $.ajax({

      type        : 'POST',
      url         : '<?php echo base_url();?>index.php/attendancereport/getAttendanceData',
      data        : {date: $('#x_attendance_date').val(), startTime: $('#x_start_time').val(), endTime: $('#x_end_time').val(), group: $('#x_group').val(), terminalId: $('#x_terminal_id').val()},
      beforeSend  : function(){ $('#container-loader-list').show(); },
      success     : function(html){ 
                      $('#container-loader-list').hide();
                      $('#container-master').html(html); 
                    }

    });

    return false;

  });


});
</script>
