<link href="<?php echo base_url('static');?>/plugins/jquery-upload-file/uploadfile.css" rel="stylesheet">
<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/datepicker/datepicker3.css">

<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/fullcalendar/fullcalendar.print.css" media="print">

<style type="text/css">
    .fc-title{
        font-size: 1.5em;
    }
</style>

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
    KALENDER LIBUR
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
                <div id="container-calendar"></div>
                <div class="overlay" id="container-loader-calendar" style="display:none;">
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
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo base_url('static');?>/custom/calendar.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url('static');?>/plugins/fullcalendar/fullcalendar.min.js"></script>

<script type="text/javascript">

/* initialize the external events
    -----------------------------------------------------------------*/
    function ini_events(ele) {
    ele.each(function () {

    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
    // it doesn't need to have a start or end
    var eventObject = {
        title: $.trim($(this).text()) // use the element's text as the event title
    };

    // store the Event Object in the DOM element so we can get to it later
    $(this).data('eventObject', eventObject);

    // make the event draggable using jQuery UI
    $(this).draggable({
        zIndex: 1070,
        revert: true, // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
    });

    });
}
ini_events($('#external-events div.external-event'));

function getCalendarHoliday(){
    $.ajax({

        type        : 'GET',
        url         : indexURL + '/calendar/getHolidayDate',
        dataType    : 'json',
        crossDomain : true,
        beforeSend  : function(){ $('#container-loader-calendar').show(); },
        success     : function(result){ 
                        $('#container-loader-calendar').hide();
                        if( result.status_code == '00' && result.total_record > 0 ){
                            $('#container-calendar').fullCalendar({
                                header: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'month,agendaWeek,agendaDay'
                                },
                                buttonText: {
                                    today: 'today',
                                    month: 'month',
                                    week: 'week',
                                    day: 'day'
                                },
                                height:650,
                                events: result.data
                            })
                        }
                      }
    
    });
}

$(document).ready(function(){
    getCalendarHoliday();
});
</script>