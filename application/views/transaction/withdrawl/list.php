<?php
/**
 * Created by PhpStorm.
 * User: PETER SUSANTO
 * Date: 7/27/2017
 * Time: 8:28 PM
 */
?>
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
                <h4 class="modal-title" id="gridSystemModalLabel">WITHDRAWL MANAGEMENT FORM</h4>
            </div>

            <form id="form-submit" name="form-submit" class="form-horizontal">
                <input type="hidden" name="x_id" id="x_id">
                <input type="hidden" name="x_act" id="x_act" value="add">
                <div class="modal-body">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">Post Date</label>
                                <div class="col-sm-9">
                                    <input type="text" value="" name="x_post_date" id="x_post_date" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">Account Number</label>
                                <div class="col-sm-9">
                                    <input type="text" value="" name="x_account_number" id="x_account_number" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">Account Name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="" name="x_account_name" id="x_account_name" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">Amount</label>
                                <div class="col-sm-9">
                                    <input type="text" value="" name="x_amount" id="x_amount" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">From Bank</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="x_bank_code" name="x_bank_code">
                                        <option value="">-Please Select-</option>

                                        <?php
                                        foreach( $rsBankCode as $dtBankCode ){
                                            ?>
                                            <option value="<?php echo $dtBankCode->bankCode ?>"><?php echo $dtBankCode->bankName; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">From Account Number</label>
                                <div class="col-sm-9">
                                    <input type="text" value="" name="x_from_account_number" id="x_from_account_number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">From Account Name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="" name="x_from_account_name" id="x_from_account_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">Transfer Date</label>
                                <div class="col-sm-9">
                                    <input type="text" value="" name="x_transfer_date" id="x_transfer_date" class="form-control">
                                </div>
                            </div>
                            <div class="form-group" id="container-support-name">
                                <label for="input1" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea id="x_description" name="x_description" cols="50" rows="5"></textarea>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="overlay" id="container-loader-form" style="display:none;">
                                    <i class="fa fa-refresh fa-spin"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
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
                <h4 class="modal-title" id="gridSystemModalLabel">REJECT CONFIRMATION</h4>
            </div>
            <form class="form-horizontal" id="form-conf-reject" name="form-conf-reject">
                <input type="hidden" id="x_reject_withdrawlid" name="x_reject_withdrawlid">
                <div class="modal-body">
                    <!-- general form elements -->
                    Are you sure you want reject this data?
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
<?php /*
<section class="content-header">
    <h1>
        <?php echo $title;?>
        <small></small>
    </h1>
</section>
 */?>

<!-- Main content -->
<section class="content">

    <div class="row">
        <!-- ./col -->
        <div class="col-lg-12 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3><?php echo $title; ?></h3>
                    <p><?php echo $titleDescription; ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
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

    function loadList( method, param ){

        $.ajax({

            type        : method,
            url         : '<?php echo base_url();?>index.php/transaction/withdrawl/getData',
            data        : param,
            beforeSend  : function(){ $('#container-loader-list').show(); },
            success     : function(html){
                $('#container-loader-list').hide();
                $('#container-data').html(html);
            }

        });

    }

    $(document).ready(function(){

        loadList( 'POST', '' );

        $("form#form-submit").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {

                    $.ajax({

                        type        : 'POST',
                        url         : '<?php echo base_url()?>index.php/transaction/withdrawl/responseWithdrawl',
                        data        : $('#form-submit').serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#container-loader-form').show(); },
                        success     : function(data){

                            $('#container-loader-form').hide();

                            if( data.errCode == '00' ){

                                loadList('POST','');

                                $('#modal-form').modal('hide');
                                $('#modal-message').modal('show');
                                $('#container-popup-message').html(data.errMsg);

                            }else{

                                alert(data.err_msg);

                            }

                        }

                    });

                }

            }

        });

        $('#btn-add').click(function(){
            $('#x_act').val('add');
            clearForm('form-submit');
        });


        $('form#form-conf-reject').submit(function(){

            $.ajax({

                type        : 'POST',
                url         : '<?php echo base_url();?>index.php/transaction/withdrawl/rejectWithdrawl',
                data        : {id:$('#x_reject_withdrawlid').val()},
                dataType    : 'json',
                beforeSend  : function(){ $('#container-loader-delete').show(); },
                success     : function(data){

                    $('#container-loader-delete').hide();

                    if( data.errCode == '00' ){

                        loadList('POST','');

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


