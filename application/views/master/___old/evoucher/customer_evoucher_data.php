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
          <th>Customer Name</th>
          <th>Account Number</th>
          <th>Voucher Code</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
  <?php
      
        $no = 1;

        foreach( $rs as $dt ){

          $class_status = "";
          $class_label  = "";

          if( $dt->status == 1 ){
            $class_status = "bg-green";
            $class_label  = "Active";
          }
          else{ 
            $class_status = "bg-red"; 
            $class_label  = "Not Active";
          }
  ?>

          <tr>
            <td class="pull-right"><?php echo $no;?></td>
            <td><?php echo $dt->customerName; ?></td>
            <td><?php echo $dt->accountNumber; ?></td>
            <td><?php echo $dt->voucherCode; ?></td>
            <td><?php echo $dt->startDate; ?></td>
            <td><?php echo $dt->endDate; ?></td>
            <td><small class="label pull-left <?php echo $class_status;?>"><?php echo $class_label?></small></td>


            <td nowrap="nowrap">

              <a href="#" class="btn bg-red" name="link-delete" data-toggle="modal" data-target="#modal-confirm-delete" data-edit="<?php echo $this->converter->encode($dt->voucherCustomerId)?>">
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

  $( "#example1 tbody" ).on('click', 'a[name=link-delete]',  function(){

    var id = $(this).attr('data-edit');

    $('#x_delete_id').val( id );

  });
  
  $( "#example1 tbody" ).on('click', 'a[name="link-edit"]',  function(){

    var arr_data      = $(this).attr('data-edit').split("Þ");

    /*$this->converter->encode($dt->voucher) . "Þ" . 
                                $dt->merchantId . "Þ" .
                                $dt->productName . "Þ" .
                                $dt->photo . "Þ" .
                                $dt->voucherValue . "Þ" .
                                $dt->startDate . "Þ" .
                                $dt->endDate . "Þ" .
                                $dt->status;*/
    
    $('#x_act').val('edit');
    $('#x_id').val( arr_data[0] );
    $('#x_merchant').val( arr_data[1] );
    $('#x_product_name').val( arr_data[2] );
    $('#x_file').val( arr_data[3] );
    $('#x_voucher').val( arr_data[4] );
    $('#x_period').val( arr_data[8] );
    $('#x_status').val( arr_data[7] );


  });

</script>