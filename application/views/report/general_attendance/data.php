<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<div class="box-body">
<?php 
  if( count($rs) > 0 ){
?>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Member Number</th>
          <th>Member Name</th>
          <th>Att. Date</th>
          <th>Att. In</th>
          <th>Att. Out</th>
        </tr>
      </thead>
      <tbody>
  <?php
      
        $no = 1;

        foreach( $rs as $dt ){

          $class_status = "";
          $class_label  = "";
  ?>

          <tr>
            <td class="pull-right"><?php echo $no;?></td>
            <td><?php echo $dt->member_number;?></td>
            <td><?php echo $dt->member_name?></td>
            <td><?php echo $dt->attend_date?></td>
            <td><?php echo $dt->attend_in?></td>
            <td><?php echo $dt->attend_out?></td>            
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
            <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
            Data tidak ditemukan
          </div>
        </td>

  <?php      

      }
  ?>

</div>


<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  
  $("#example1").DataTable();

</script>
