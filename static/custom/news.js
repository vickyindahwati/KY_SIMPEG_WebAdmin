function loadDataTableNews(){

    $("#dt-table-news").DataTable().clear().destroy();

    var column = [
            { "data": "post_date" },
            { "data": "title" },
            { "data": "effective_date"},
            { "data": "expire_at"},
            { "data": "post_by"},
            { "data": "navigation"}
    ];
    
    $("#dt-table-news").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/news/getTableData",
            "type": "POST",
            "data":{"module":"\/news"},
        },
        "columns":column,
        //"scrollX": true,
        //columnDefs:[{targets:[5], class:"wrapok"}]
    });
}

$(document).ready(function(){

    loadDataTableNews();

    $('.textarea').wysihtml5();
    $('#x_mulai_tanggal, #x_effective_date, #x_expire_at').datepicker({
      autoclose: true
    });

    $("form#frm-news").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/news/save',
                    data        : $('#frm-news').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show'); },
                    success     : function(data){                            
                                    
                                    $('#modal-loader').modal('hide');                                        

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        $('#modal-news-form').modal('hide');
                                        loadDataTableNews();
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }      

                                }

                });

            }

        }

    });

    $('#dt-table-news').on('click', 'a[name="link-detail-news"]', function(){
        var id = $(this).attr('data').toString();
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/news/getDetailData',
            data        : {id:id},
            dataType    : 'json',
            beforeSend  : function(){  },
            success     : function(data){
                           $('#x_title_view').val( data.title );
                           $('#x_content_view').html( data.content );
                           $('#x_effective_date_view').val( data.effective_date );
                           $('#x_expire_at_view').val( data.expire_at );
                           $('#x_status_view').val( data.status );
                        }

        });
    });

    $('#dt-table-news').on('click', 'a[name="link-edit-news"]', function(){
        var id = $(this).attr('data').toString();
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/news/getDetailData',
            data        : {id:id},
            dataType    : 'json',
            beforeSend  : function(){  },
            success     : function(data){
                           $('#x_title').val( data.title );
                           $('#x_content').html( data.content );
                           $('#x_effective_date').val( data.effective_date );
                           $('#x_expire_at').val( data.expire_at );
                           $('#x_status').val( data.status );
                           $('#x_act').val( "edit" );
                           $('#x_id_news').val( id );
                        }

        });
    });

    $('#btn-add-news').click(function(){
        $('#x_id_news').val('');
        $('#x_act').val('add');
        $('#frm-news').trigger('reset');
    });

});