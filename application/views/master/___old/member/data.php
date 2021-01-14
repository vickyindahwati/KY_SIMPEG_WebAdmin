<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<div class="box-body">

  <table id="dt-table" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Acc. Number</th>
        <th>Name</th>
        <th>Photo</th>
        <th>Phone No.</th>
        <th>Email</th>
        <th>Register Date</th>
        <th>Status</th>
        <th>Balance</th>
      </tr>
    </thead>
    <tfoot>
          <tr>
              <th>Acc. Number</th>
              <th>Name</th>
              <th>Photo</th>
              <th>Phone No.</th>
              <th>Email</th>
              <th>Register Date</th>
              <th>Status</th>
              <th>Balance</th>
          </tr>
      </tfoot>
  </table>

  

</div>

<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Jquery File Download -->
<script src="<?php echo base_url('static');?>/plugins/file_download/jquery.fileDownload.js"></script>
<script type="text/javascript">

  $("#dt-table").DataTable({
    "processing": true,
    "serverSide": true,
    "ajax":{
      "url": "<?php echo base_url();?>index.php/member/getMemberData",
      "type": "POST"
    },
    "columns":[
      { "data": "accountNumber" },
      { "data": "name" },
      { "data": "photo" },
      { "data": "phoneNumber" },
      { "data": "email" },
      { "data": "registerDate" },
      { "data": "status" },
      { "data": "balance" }
    ]
  }); 

</script>