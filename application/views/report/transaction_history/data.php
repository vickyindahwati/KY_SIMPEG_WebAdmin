<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<div class="box-body">
<?php 

  if( count($rs) > 0 ){
?>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>Branch</th>
          <th>Trx. Number</th>
          <th>Ttl. Purchase</th>
          <th>Ttl. Rebate</th>
          <th>Status</th>
          <th>Admin</th>
        </tr>
      </thead>
      <tbody>
  <?php
      
        $no            = 1;
        $totalPurchase = 0;
        $totalRebate   = 0;

        foreach( $rs as $dt ){

          $class_status = "";
          $class_label  = "";

          if( $dt->status == 1 ){
            $class_status = "bg-green";
            $class_label  = "Success";
          }
          else{ 
            $class_status = "bg-red"; 
            $class_label  = "Failed";
          }
  ?>

          <tr>
            <td class="pull-right"><?php echo $dt->transDate;?></td>
            <td><?php echo $dt->branchName; ?></td>
            <td><?php echo $dt->merchantTransactionNumber; ?></td>
            <td style="text-align:right;"><?php echo number_format($dt->totalPurchase, 2, ",", "."); ?></td>
            <td style="text-align:right;"><?php echo number_format($dt->totalRebate, 2, ",", "."); ?></td>
            <td><small class="label pull-left <?php echo $class_status;?>"><?php echo $class_label?></small></td>
            <td><?php echo $dt->userName; ?></td>            
          </tr>

  <?php

          $totalPurchase += $dt->totalPurchase;
          $totalRebate += $dt->totalRebate;
          $no++;

        }

  ?>    

      <tr>
        <td colspan="3"><strong>TOTAL</strong></td>
        <td style="text-align:right;background-color:#fcda44;">
          <strong><?php echo number_format($totalPurchase, 2, ",", "."); ?></strong>
        </td>
        <td style="text-align:right;background-color:#fcda44;">
          <strong><?php echo number_format($totalRebate, 2, ",", "."); ?></strong>
        </td>
        <td colspan="3"></td>
      </tr>

      </tbody>
    </table>

  <?php

  }else{

  ?>
        <td colspan="7">
          <div class="alert alert-warning alert-dismissable">
            <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
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

  //$("#example1").DataTable();

</script>