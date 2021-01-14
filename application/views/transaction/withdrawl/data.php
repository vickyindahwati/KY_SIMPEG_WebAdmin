<?php
/**
 * Created by PhpStorm.
 * User: PETER SUSANTO
 * Date: 7/27/2017
 * Time: 8:28 PM
 */
?>

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<div class="box-body">
    <?php

    if( count($rs) > 0 ){
        ?>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No.</th>
                <th>Reference Number</th>
                <th>Request Date</th>
                <th>AYARES ID</th>
                <th>Account Name</th>
                <th>Amount</th>
                <th>Fee</th>
                <th>Status Transfer</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php

            $no = 1;

            foreach( $rs as $dt ){

                $class_status = "";
                $class_label  = "";

                if( $dt->statusTransfer == 1 ){
                    $class_status = "bg-green";
                    $class_label  = "Approved";
                }
                else if( $dt->statusTransfer == 0 ){
                    $class_status = "bg-yellow";
                    $class_label  = "Pending";
                }
                else if( $dt->statusTransfer == -1 ){
                    $class_status = "bg-red";
                    $class_label  = "Rejected";
                }
                ?>

                <tr>
                    <td class="pull-right"><?php echo $no;?></td>
                    <td><?php echo $dt->referenceNumber; ?></td>
                    <td><?php echo $dt->postDate; ?></td>
                    <td><?php echo $dt->accountNumber; ?></td>
                    <td><?php echo $dt->accountName; ?></td>
                    <td class="pull-right"><?php echo number_format($dt->amount,2,",","."); ?></td>
                    <td style="text-align:right;"><?php echo number_format($dt->fee,2,",","."); ?></td>
                    <td><small class="label pull-left <?php echo $class_status;?>"><?php echo $class_label?></small></td>
                    
                    <td nowrap="nowrap">
                        <?php

                        $data_approve    = $this->converter->encode($dt->withdrawlId) . "Þ" .
                                           $dt->postDate . "Þ" .
                                           $dt->accountId . "Þ" .
                                           $dt->accountNumber . "Þ" .
                                           $dt->accountName . "Þ" .
                                           $dt->amount . "Þ" .
                                           $dt->transferToBankName . "Þ" .
                                           $dt->transferToAccountName . "Þ" .
                                           $dt->transferToAccountNumber;

                        ?>

                        <a href="#" class="btn bg-olive" data-toggle="modal" data-target="#modal-form" data-edit="<?php echo $data_approve;?>" name="link-edit">
                            <span class="glyphicon glyphicon-ok fa-1x"></span>
                        </a>

                        <a href="#" class="btn bg-red" name="link-reject" data-toggle="modal" data-target="#modal-confirm-delete" data-edit="<?php echo $this->converter->encode($dt->withdrawlId)?>">
                            <span class="glyphicon glyphicon-remove fa-1x"></span>
                        </a>

                    </td>
                </tr>

                <?php

                $no++;

            }

            ?>

            </tbody>
        </table>

        <?php

    }else{

        ?>
        <td colspan="7">
            <div class="alert alert-warning alert-dismissable">
                <h4><i class="icon fa fa-warning"></i> Attention!</h4>
                Data not found
            </div>
        </td>

        <?php

    }
    ?>

</div>

<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Jquery File Download -->
<script src="<?php echo base_url('static');?>/plugins/file_download/jquery.fileDownload.js"></script>
<script type="text/javascript">

    $("#example1").DataTable();

    $( "#example1 tbody" ).on('click', 'a[name=link-reject]',  function(){

        var id = $(this).attr('data-edit');

        $('#x_reject_withdrawlid').val( id );

    });

    $( "#example1 tbody" ).on('click', 'a[name="link-edit"]',  function(){

        var arr_data      = $(this).attr('data-edit').split("Þ");

        /*
            $data_approve    = $this->converter->encode($dt->withdrawlId) . "Þ" .
                                           $dt->postDate . "Þ" .
                                           $dt->accountId . "Þ" .
                                           $dt->accountNumber . "Þ" .
                                           $dt->accountName . "Þ" .
                                           $dt->amount . "Þ" .
                                           $dt->transferToBankName . "Þ" .
                                           $dt->transferToAccountName . "Þ" .
                                           $dt->transferToAccountNumber;
        */

        $('#x_act').val('edit');
        $('#x_id').val( arr_data[0] );
        $('#x_post_date').val( arr_data[1] );
        $('#x_account_number').val( arr_data[3] );
        $('#x_account_name').val( arr_data[4] );
        $('#x_amount').val( arr_data[5] );

    });

</script>
