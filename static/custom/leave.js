function loadListPage(method, param){
    $.ajax({

        type        : method,
        url         : indexURL + '/leave/showLeaveTableList',
        data        : param,
        crossDomain : true,
        beforeSend  : function(){ $('#container-loader-list').show(); },
        success     : function(html){ 
                        $('#container-loader-list').hide();
                        $('#container-list').html(html); 
                      }
    
      });
}

function disabledForm( pElementId, pVal ){
	$( '#' + pElementId + ' :input' ).prop('disabled', pVal);
}

$(document).ready(function(){
    
    var xLeaveId = $('#x_leave_id').val();
    loadListPage('POST','id=' + xLeaveId);
    
    $('#x_tgl_mulai, #x_tgl_berakhir, #x_search_tgl_mulai_cuti, #x_search_tgl_berakhir_cuti,#x_receive_leave_tgl_mulai_change,#x_receive_leave_tgl_berakhir_change, #x_receive_leave_tgl_mulai,#x_receive_leave_tgl_berakhir').datepicker({
      autoclose: true
    });

    $('#x_tgl_berakhir,#x_tgl_mulai').change( function(){ 
        var secondDate = $('#x_tgl_berakhir').val();
        var firstDate = $('#x_tgl_mulai').val();
        var holidayDate = $('#x_holiday_date').val();
        if( firstDate != '' && secondDate != '' ){
            $('#x_lama_cuti').val(getBusinessDatesCount( parseDate1( firstDate ), parseDate1( secondDate ), holidayDate ));
        }
        
    } );

    $('#x_receive_leave_tgl_mulai_change,#x_receive_leave_tgl_berakhir_change').change( function(){ 
        var secondDate = $('#x_receive_leave_tgl_berakhir_change').val();
        var firstDate = $('#x_receive_leave_tgl_mulai_change').val();
        var holidayDate = $('#x_holiday_date').val();
        if( firstDate != '' && secondDate != '' ){
            $('#x_receive_leave_lama_cuti_change').val(getBusinessDatesCount( parseDate1( firstDate ), parseDate1( secondDate ), holidayDate ));
        }
    } );

    $('#x_receive_leave_tgl_mulai,#x_receive_leave_tgl_berakhir').change( function(){ 
        var secondDate = $('#x_receive_leave_tgl_berakhir').val();
        var firstDate = $('#x_receive_leave_tgl_mulai').val();
        var holidayDate = $('#x_holiday_date').val();
        if( firstDate != '' && secondDate != '' ){
            $('#x_receive_leave_lama_cuti').val(getBusinessDatesCount( parseDate1( firstDate ), parseDate1( secondDate ), holidayDate ));
        }
    } );

    $('form#form-search-leave').validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                loadListPage('POST', '' );

            }
        }
    });

    $("form#form-request-leave").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/leave/saveLeave',
                    data        : $('#form-request-leave').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ disabledForm('form-request-leave', true);$('#modal-loader').modal('show'); },
                    success     : function(data){        
                                    disabledForm('form-request-leave', false); 
                                    $('#modal-loader').modal('hide');   
                                    $('#modal-form-request-leave').modal('hide');                                                                       

                                    if( data.status_code == '00' ){   
                                        clearForm('form-request-leave');                                        
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        loadListPage( 'POST','' );
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }                                

                                }

                });

            }

        }

    });

    $("form#form-receive-request-leave").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/leave/updateStatusLeave',
                    data        : $('#form-receive-request-leave').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ disabledForm('form-receive-request-leave', true);$('#modal-loader').modal('show'); },
                    success     : function(data){       
                                    disabledForm('form-receive-request-leave', false); 
                                    $('#modal-loader').modal('hide');                                    
                                    $('#modal-form-receive-request-leave').modal('hide');
                                    if( data.status_code == '00' ){                                           
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        loadListPage( 'POST','' );
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }                                
                                    getInAppNotification();
                                }

                });

            }

        }

    });

    $("form#frm-confirm-cancel-leave").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/leave/canceLeave',
                    data        : $('#frm-confirm-cancel-leave').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                    success     : function(data){        
                                    $('#modal-loader').modal('hide');
                                    $('#modal-confirm-cancel-leave').modal('hide');                                       

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        loadListPage( 'POST','' );
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }                                
                                    getInAppNotification();
                                }

                });

            }

        }

    });

    $("form#form-change-request-leave").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/leave/saveChangeLeave',
                    data        : $('#form-change-request-leave').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ disabledForm('form-change-request-leave', true);$('#modal-loader').modal('show'); },
                    success     : function(data){        
                                    disabledForm('form-change-request-leave', false);
                                    $('#modal-loader').modal('hide');
                                    $('#modal-form-change-request-leave').modal('hide');                                       

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        loadListPage( 'POST','' );
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }                                

                                }

                });
                

            }

        }

    });

    $('#btn-add-leave').click(function(){
        getHolidayDate(indexURL)
    });

});