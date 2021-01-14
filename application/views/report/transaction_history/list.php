<link href="<?php echo base_url('static');?>/plugins/jquery-upload-file/uploadfile.css" rel="stylesheet">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/iCheck/all.css">
<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/daterangepicker/daterangepicker-bs3.css">


<!-- Start : Modal Form -->

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
    <small>Product List</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Filter</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form id="form-search-report" name="form-search-report" role="form">   

            <div class="form-group">
              <div class="col-sm-6">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="x_period_report" name="x_period_report" placeholder="Period Report...">
                </div>
              </div>

              <div class="col-sm-3">
                <select class="form-control" id="x_merchant" name="x_merchant">
                  <option value="">-All Merchant-</option>

                  <?php 
                    foreach( $rsMerchant as $dtMerchant ){
                  ?>
                      <option value="<?php echo $dtMerchant->merchantId ?>"><?php echo $dtMerchant->merchantName; ?></option>
                  <?php    
                    }
                  ?>

                </select>
              </div>
              <div class="col-sm-3">                  
                <button type="submit" class="btn btn-primary">Search</button>
                <button type="button" class="btn bg-olive" id="btn-show-all">Show All</button>
              </div>
            </div>

            
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data List</h3>
        </div><!-- /.box-header -->
        <div id="container-data"></div>
        <div class="overlay" id="container-loader-form-search" style="display:none;">
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

<!-- Date range picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url('static');?>/plugins/daterangepicker/daterangepicker.js"></script>

<script type="text/javascript">

function disabledForm(){
  $('#form-search-report :input').attr("disabled",true);
  $('#form-search-report :button').attr("disabled",true);
}

function enabledForm(){
  $('#form-search-report :input').attr("disabled",false);
  $('#form-search-report :button').attr("disabled",false);
}

function clearForm(){
  $('#form-search-report').trigger('reset');
}

function loadList( method, param ){

  $.ajax({

    type        : method,
    url         : '<?php echo base_url();?>index.php/branch/getTransactionReportData',
    data        : param,
    beforeSend  : function(){  },
    success     : function(html){ 
                    $('#container-data').html(html); 
                  }

  });

}

$(document).ready(function(){

  //Date range picker
  $('#x_period_report').daterangepicker();

  $('#btn-show-all').click(function(){
      $.ajax({

          type        : 'POST',
          url         : '<?php echo base_url()?>index.php/report/transaction_report/getTransactionReportData',
          beforeSend  : function(){ /*disabledForm();*/  $('#container-loader-form-search').show(); },
          success     : function(html){

              enabledForm();
              clearForm();

              $('#container-loader-form-search').hide();
              $('#container-data').html(html);


          }

      });
  });

  $("form#form-search-report").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {


              $.ajax({

                type        : 'POST',
                url         : '<?php echo base_url()?>index.php/report/transaction_report/getTransactionReportData',
                data        : $('#form-search-report').serialize(),
                beforeSend  : function(){ /*disabledForm();*/  $('#container-loader-form-search').show(); },
                success     : function(html){ 

                                enabledForm();
                                clearForm();
                                
                                $('#container-loader-form-search').hide();
                                $('#container-data').html(html); 
                                

                              }

              });

            }

        }

  });

  $('#btn-close').click(function(){

    $('#modal-message').modal('hide');

  });


});
</script>

