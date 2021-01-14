$(document).ready(function(){

    $('#x_tgl_pensiun, #x_tmt_pensiun, #x_tgl_bkn').datepicker({
      autoclose: true
    })

    $("form#frm-" + module).validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/employee/saveSKPensiun',
                    data        : $('#frm-' + module).serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show'); },
                    success     : function(data){                            
                                    
                                    $('#modal-loader').modal('hide');                                        

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

});