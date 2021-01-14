<link href="<?php echo base_url('static');?>/plugins/jquery-upload-file/uploadfile.css" rel="stylesheet">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/iCheck/all.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/daterangepicker/daterangepicker-bs3.css">

<!-- Start : Modal Form -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-form">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">FORM ASSIGN EVOUCHER</h4>
      </div>

      <form id="form-search-by-account-number" name="form-search-by-account-number" class="form-horizontal">
        <div class="modal-body">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-body">              
              <div class="input-group input-group-sm">
                <input type="text" class="form-control" name="x_account_number" id="x_account_number" placeholder="Account Number...">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat">Search</button>
                    </span>
              </div>         
              <div class="form-group">
                <div class="overlay" id="container-loader-form" style="display:none;">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
          </div>
        </div>        
      </form>

      <form id="form-detail-evoucher" name="form-detail-evoucher" style="display:none;" class="form-horizontal">
        <div class="form-group" >
          <label for="input1" class="col-sm-3 control-label">Customer Name</label>
          <div class="col-sm-9">
            <input type="hidden" name="x_voucher_id" id="x_voucher_id" class="form-control" value="<?php echo $eVoucherId; ?>">
            <input type="hidden" name="x_customer_id" id="x_customer_id" class="form-control">
            <input type="text" name="x_customer_name" id="x_customer_name" class="form-control" readonly="readonly">
          </div>
        </div>
        <div class="form-group" id="">
          <label for="input1" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-9">
            <input type="text" name="x_email" id="x_email" class="form-control" readonly="readonly">
          </div>
        </div>
        <div class="form-group" id="">
          <label for="input1" class="col-sm-3 control-label">Phone Number</label>
          <div class="col-sm-9">
            <input type="text" name="x_phone_number" id="x_phone_number" class="form-control" readonly="readonly">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Assign Now</button>
        </div>
      </form>
    </div>
  </div>
</div>

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
        <button type="button" id="btn-close" class="btn btn-primary">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-delete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI HAPUS</h4>
      </div>
      <form class="form-horizontal" id="form-conf-delete" name="form-conf-delete">
        <input type="hidden" id="x_delete_id" name="x_delete_id">
        <div class="modal-body">
          <!-- general form elements -->
          Apakah anda yakin ingin menghapus data ini?
        </div>
        <div class="overlay" id="container-loader-delete" style="display:none;">
            <i class="fa fa-refresh fa-spin"></i>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Ya</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- End : Modal Form -->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title;?>
    <small>Data List E-Voucher</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">E-Voucher</a></li>
    <li class="active"><?php echo $title;?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <p>
    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-form" id="btn-add"><i class="fa fa-plus"></i>&nbsp;Add New</button>
  </p>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data List</h3>
        </div><!-- /.box-header -->
        <div id="container-data"></div>
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

<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('static');?>/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('static');?>/plugins/fastclick/fastclick.js"></script>

<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url('static');?>/plugins/daterangepicker/daterangepicker.js"></script>


<script type="text/javascript">

function disabledForm(){
  $('#form-announcement :input').attr("disabled",true);
  $('#form-announcement :button').attr("disabled",true);
}

function enabledForm(){
}

function clearForm(){
}

function loadList( method, param ){

  $.ajax({

    type        : method,
    url         : '<?php echo base_url();?>index.php/evoucher/getCustomerEVoucherData',
    data        : param,
    beforeSend  : function(){ $('#container-loader-list').show(); },
    success     : function(html){ 
                    $('#container-loader-list').hide();
                    $('#container-data').html(html); 
                  }

  });

}

$(document).ready(function(){

  loadList( 'POST', 'id=<?php echo $eVoucherId; ?>' );

  //Date range picker
  $('#x_period').daterangepicker();

  $("form#form-detail-evoucher").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

              $.ajax({

                type        : 'POST',
                url         : '<?php echo base_url()?>index.php/evoucher/assignToCustomer',
                data        : $('#form-detail-evoucher').serialize(),
                dataType    : 'json',
                beforeSend  : function(){ disabledForm();$("form#form-detail-evoucher").hide();$('#container-loader-form').show(); },
                success     : function(data){ 
                                
                                $('#container-loader-form').hide();

                                if( data.errCode == '00' ){

                                  loadList('POST','id=' + data.voucherId);

                                  $('#modal-form').modal('hide');
                                  $('#modal-message').modal('show');
                                  $('#container-popup-message').html(data.errMsg);

                                }else{

                                  alert(data.errMsg);

                                }

                              }

              });

            }

        }

  });

  $("form#form-search-by-account-number").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

              $.ajax({

                type        : 'POST',
                url         : '<?php echo base_url()?>index.php/evoucher/searchByAccountNumber',
                data        : $('#form-search-by-account-number').serialize(),
                dataType    : 'json',
                beforeSend  : function(){ disabledForm();$('form#form-detail-evoucher').hide();$('#container-loader-form').show(); },
                success     : function(data){                                
                                
                                $('#container-loader-form').hide();

                                if( data.errCode == '00' ){

                                  $('form#form-detail-evoucher').show();

                                  $('#x_customer_name').val( data.name );
                                  $('#x_customer_id').val( data.id );
                                  $('#x_email').val(data.email);
                                  $('#x_phone_number').val(data.phoneNumber);

                                }else{

                                  alert(data.errMsg);

                                }

                              }

              });

            }

        }

  });  

  $('#btn-add').click(function(){
    $('#x_name').focus();
    $('#x_act').val('add');
    clearForm();
  }); 

  $('form#form-conf-delete').submit(function(){

      $.ajax({

          type        : 'POST',
          url         : '<?php echo base_url();?>index.php/evoucher/deleteAssignedCustomer',
          data        : {id:$('#x_delete_id').val()},
          dataType    : 'json',
          beforeSend  : function(){ $('#container-loader-delete').show(); },
          success     : function(data){ 
                          
                        $('#container-loader-delete').hide();

                        if( data.errCode == '00' ){

                          loadList('POST','id=' + data.id);

                          $('#modal-confirm-delete').modal('hide');
                          $('#modal-message').modal('show');
                          $('#container-popup-message').html(data.errMsg);

                        }else{

                          $('#modal-confirm-delete').modal('hide');
                          $('#modal-message').modal('show');
                          $('#container-popup-message').html(data.errMsg);

                        }

                      }

      });

      return false;

  });

   $('#btn-close').click(function(){

    $('#modal-message').modal('hide');

  });


});
</script>

