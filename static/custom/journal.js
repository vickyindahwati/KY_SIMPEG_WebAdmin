
function loadDataTableJournal(pJournalDate, pUnorInduk, pTotalRow){

    $("#dt-table-journal").DataTable().clear().destroy();

    var column = [
            { "data": "unor_induk" },
            { "data": "nip" },
            { "data": "user_name" },
            { "data": "journal_date" },
            { "data": "subject"},
            { "data": "body"},
            { "data": "navigation" }
    ];
    
    $("#dt-table-journal").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": pTotalRow,
        "ajax":{
            "url": indexURL + "/journal/getTableData",
            "type": "POST",
            "data":{"x_journal_date":pJournalDate, "x_search_unor_induk": pUnorInduk},
        },
        "columns":column,
        "scrollX": true,
        columnDefs:[{targets:[3], width:"10%"},{targets:6, width:"10%"},{"visible":false, targets:5}],
        dom: 'Bfrtip',
        buttons: [
            'copy', 
            {
                extend: 'excel',
                messageTop: 'REKAP JURNAL'
            },/*
                extend: 'pdf',
                messageTop: 'REKAP JURNAL'
            },*/'print'
        ],
        "bPaginate": ( pTotalRow == 0 ? false : true ),
        "order": [[3,"desc"]]
    });
}

$(document).ready(function(){

	// loadJournal('container-list');
	loadDataTableJournal('',$('#x_search_unor_induk').val(), $('#x_total_row').val());

	$('.textarea').wysihtml5();

	$('#x_journal_date').datepicker({
		autoclose:true
    });
    
    $('#x_search_tgl_jurnal').daterangepicker({
		autoclose:true
	});

	$('#x_journal_date').datepicker("setDate",new Date());

	$('form#form-search-journal').validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                loadDataTableJournal($('#x_search_tgl_jurnal').val(), $('#x_search_unor_induk').val(), $('#x_total_row').val() );

            }
        }
    });

    $("form#form-journal").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/journal/save',
                    data        : $('#form-journal').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                    success     : function(data){        
                                    $('#modal-loader').modal('hide');   
                                    $('#modal-form-journal').modal('hide');                                                                       

                                    if( data.status_code == '00' ){ 
                                    	clearForm('form-journal');   
                                    	$('#x_journal_date').datepicker("setDate",new Date());
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

    $("form#frm-confirm-cancel-journal").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/journal/cancel',
                    data        : $('#frm-confirm-cancel-journal').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                    success     : function(data){        
                                    $('#modal-loader').modal('hide');   
                                    $('#modal-confirm-cancel-journal').modal('hide');                                                                       

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


	$('.modal').on('hide.bs.modal', function (e) {
        e.stopPropagation();
        $('body').css('padding-right','');
    });

    $('#btn-close-modal-msg').click(function(){
        $('#modal-message').modal('hide');  
        $('.modal-backdrop').remove();    
        loadDataTableJournal('',$('#x_search_unor_induk').val(), $('#x_total_row').val());
        
    });

    $('#dt-table-journal').on('click', 'a[name="link-confirm-cancel-journal"]', function(){
        var arrDataEdit = $(this).attr('data').toString().split(dataSeparator);
        $('#x_confirm_cancel_id').val( arrDataEdit[0] );
    });

    $('#dt-table-journal').on('click', 'a[name="link-journal-detail"]', function(){
        var arrDataEdit = $(this).attr('data').toString().split(dataSeparator);
        $('#x_detail_subject').val(arrDataEdit[1]);
        $('#x_detail_journal_date').val(arrDataEdit[3]);
        $('#x_detail_body').html(arrDataEdit[2]);
        $('#x_detail_name').val(arrDataEdit[4]);
    });

});