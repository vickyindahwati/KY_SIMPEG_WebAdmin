$(document).ready(function(){
	$('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });

	//Date picker
    $('#x_add_tgl_lahir, #x_add_tgl_meninggal, #x_add_tgl_npwp').datepicker({
      autoclose: true,
      endDate: '+0d'
    });

    $("form#form-add-user").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
            	// alert($("form#form-add-user").serialize());
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/employee/saveUserFamily',
                    data        : $("form#form-add-user").serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-frm-add-user').modal('hide');},
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');                                        

                                    if( data.status_code == '00' ){   
                                        $('#modal-message-add-edit').modal('show'); 
                                        if( $('#x_act_suamiistri').val() == 'add' ){
                                            $('#x_modal_message_from').val('ADD_NEW_USER');       
                                        }                                                                    
                                        $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    	$(this).trigger('reset');
                                    }else{
                                        $('#modal-message-add-edit').modal('show');
                                        $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    	$('#modal-frm-add-user').modal('show');
                                    }      
                                    
                    }

                });
                

            }

        }

    });

});