<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<div class="box-body"> 
    
    <div class="col-md-12">
        <span class="pull-right">
            <button class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-confirm-user" id="btn-approve" data=""><i class="glyphicon glyphicon-ok"></i>&nbsp;TERIMA</button>
            <button class="btn btn-danger btn-md" data-toggle="modal" data-target="#modal-confirm-user" id="btn-reject"><i class="glyphicon glyphicon-remove"></i>&nbsp;TOLAK</button>
        </span>
    </div>
	<div class="col-md-12">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Old Data</th>
                    <th>New Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>No. Telp</td>
                    <td><?php echo $oldData['telepon']; ?></td>
                    <td><?php echo $newData['telepon']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $oldData['email']; ?></td>
                    <td><?php echo $newData['email']; ?></td>
                </tr>
                <tr>
                    <td>Alamat Tinggal</td>
                    <td><?php echo $oldData['alamat_tinggal']; ?></td>
                    <td><?php echo $newData['alamat_tinggal']; ?></td>
                </tr>
                <tr>
                    <td>Alamat KTP</td>
                    <td><?php echo $oldData['alamat_ktp']; ?></td>
                    <td><?php echo $newData['alamat_ktp']; ?></td>
                </tr>
            </tbody>
        </table>        
    </div>
</div>

<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $("#example1").DataTable({
        "searching": false,
            "paging": false,
            "info": false,
            "ordering": false
    });

    $('#btn-approve').click(function(){
        $('#x_confirm_id').val( '<?php echo $id; ?>' );
        $('#x_confirm_type').val('APPROVE');
        $('#modal-body-confirm-msg').html('Apakah anda yakin ingin <strong style="color:#42f456">MENERIMA</strong> data ini?');
    });

    $('#btn-reject').click(function(){
        $('#x_confirm_id').val( '<?php echo $id; ?>' );
        $('#x_confirm_type').val('REJECT');
        $('#modal-body-confirm-msg').html('Apakah anda yakin ingin <strong style="color:#f44242">MENOLAK</strong> data ini?<br><textarea placeholder="Silahkan isi alasan penolakan..." class="form-control required" id="x_reason" name="x_reason"  ></textarea>');
    });
</script>