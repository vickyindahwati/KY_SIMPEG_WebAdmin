function loadDashboard(pModule, pContainer){
  $.ajax({

      type        : 'POST',
      url         : indexURL + '/dashboard/showContainer',
      data        : {module:pModule},
      beforeSend  : function(){},
      success     : function(html){    
                      $('#' + pContainer).html(html);  
                  }

  });     
}  

function loadDataTableAttendance(pAttendanceDate, pUnorIndukId, pTotalRow, pKondisiKesehatan){

    $("#dt-table-attendance").DataTable().clear().destroy();

    var column = [
            { "data": "unor_induk" },
            { "data": "attendance_date" },
            { "data": "nip"},
            { "data": "user_name" },
            { "data": "clock_in" },
            { "data": "clock_out" },
            { "data": "healthy_check_status" },
            { "data": "healthy_check_desc" },
            { "data": "healthy_check_status_clockout" },
            { "data": "healthy_check_desc_clockout" }
    ];
    
    $("#dt-table-attendance").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": pTotalRow,
        "ajax":{
            "url": indexURL + "/attendance/getTableData",
            "type": "POST",
            "data":{"x_search_attendance_date":pAttendanceDate, "x_search_unor_induk": pUnorIndukId, "x_kondisi_kesehatan": pKondisiKesehatan},
        },
        "columns":column,
        "scrollX": true,
        columnDefs:[{targets:[-1], class:"wrapok"}],
        dom: 'Bfrtip',
        buttons: [
            'copy', 
            {
                extend: 'excel',
                messageTop: 'REKAP ABSENSI'
            },/*{
                extend: 'pdf',
                messageTop: 'REKAP ABSENSI'
            },*/'print'
        ],
        "bPaginate": ( pTotalRow == 0 ? false : true ),
        "order": [[1,"desc"]]
    });
}

function geoLocation(){
    if( "geolocation" in navigator ){
        navigator.geolocation.getCurrentPosition(function(position){
            //alert( "Your location: " + position.coords.latitude + "," + position.coords.longitude );
            $('#x_geoloc_latitude_clockin').val( position.coords.latitude );
            $('#x_geoloc_longitude_clockin').val( position.coords.longitude );

            $('#x_geoloc_latitude_clockout').val( position.coords.latitude );
            $('#x_geoloc_longitude_clockout').val( position.coords.longitude );
        });
    }else{
        alert('No Geolocation plugin active');
    }
}

$(document).ready(function(){

    loadDataTableAttendance();
    geoLocation();

    $('#x_health_type_id').change(function(){
        if( $(this).val() == 1 || $(this).val() == 0 ){
            $('#container-healthy-description').hide();
        }else{
            $('#container-healthy-description').show();
        }
    });

    $('#x_health_type_id_clockout').change(function(){
        if( $(this).val() == 1 || $(this).val() == 0 ){
            $('#container-healthy-description-clockout').hide();
        }else{
            $('#container-healthy-description-clockout').show();
        }
    });

    $('#x_search_attendance_date').datepicker({
        autoclose:true
    });

    $('form#form-search-attendance').validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                loadDataTableAttendance($('#x_search_attendance_date').val(), $('#x_search_unor_induk').val(), $('#x_total_row').val(), $('#x_kondisi_kesehatan').val() );

            }
        }
    });

	$("form#frm-confirm-clockin").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                /*var options = {
                    enableHighAccuracy: true,
                    timeout: 1000,
                    maximumAge: 0
                };
                navigator.geolocation.getCurrentPosition(successCallback,errorCallback,options);*/

                
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/attendance/clockIn',
                    data        : $('#frm-confirm-clockin').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                    success     : function(data){        
                                    $('#modal-loader').modal('hide');   
                                    $('#modal-confirm-clockin').modal('hide');                                                          

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }                                

                                }

                });       

            }

        }

    });

    $("form#frm-confirm-clockout").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/attendance/clockOut',
                    data        : $('#frm-confirm-clockout').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                    success     : function(data){        
                                    $('#modal-loader').modal('hide');   
                                    $('#modal-confirm-clockout').modal('hide');                                                                       

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        $('#x_flag_healthy_check_clockout').val(0);
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }                                

                                }

                });

            }

        }

    });

    $("form#frm-healthy-check").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/attendance/updateHealthyCheckStatus',
                    data        : $('#frm-healthy-check').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                    success     : function(data){        
                                    $('#modal-loader').modal('hide');   
                                    $('#modal-healthy-check').modal('hide');                                                                       

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        $('#x_flag_healthy_check').val(1);
                                        //loadDashboard('attendance_info','container-attendance');
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }                                

                                }

                });

            }

        }

    });

    $("form#frm-healthy-check-clockout").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/attendance/updateHealthyCheckStatusClockout',
                    data        : $('#frm-healthy-check-clockout').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                    success     : function(data){        
                                    $('#modal-loader').modal('hide');   
                                    $('#modal-healthy-check-clockout').modal('hide');                                                                       

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        $('#x_flag_healthy_check_clockout').val(1);
                                        //loadDashboard('attendance_info','container-attendance');
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }                                

                                }

                });

            }

        }

    });

    $('.modal').on('hide.bs.modal', function (e) {
        e.stopPropagation();
        $('body').css('padding-right','');
    });

    $('#btn-close-modal-msg').click(function(){
        $('#modal-message').modal('hide');  
        $('.modal-backdrop').remove();    

        if( $('#x_flag_healthy_check').val() == "" ){
            $('#modal-healthy-check').modal({backdrop:'static',keyboard:false});
            $('#modal-healthy-check').modal('show');
            
            //alert(1);
        }else{
            //alert(2);
            if( $('#x_flag_healthy_check').val() == 1  && $('#x_flag_healthy_check_clockout').val() == "0" ){
                //alert(3);
                $('#modal-healthy-check-clockout').modal({backdrop:'static',keyboard:false});
                $('#modal-healthy-check-clockout').modal('show');
                
            }else{
                loadDashboard('attendance_info','container-attendance');
            }
            
        }
        
    });

    $('a[name=link-confirm-clockin]').click(function(){
        var d = new Date();
        var n = d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();
        $('#x_time_clockin').val(n);
    });

    $('a[name=link-confirm-clockout]').click(function(){
        var d = new Date();
        var n = d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();
        $('#x_time_clockout').val(n);
    });

});