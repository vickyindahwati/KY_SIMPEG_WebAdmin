<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">

<!-- Start : Modal Form -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-frm-job-experience">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM PENGALAMAN KERJA</h4>
                <input type="text" name="x_id" id="x_id" value="<?php echo $id; ?>">
            </div>
        </div>
    </div>
 </div>

 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-jobexperience">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI</h4>
                </div>
                <form class="form-horizontal" id="form-confirm-jobexperience" name="form-confirm-jobexperience">
                    <input type="hidden" id="x_confirm_jobexperience_id" name="x_confirm_jobexperience_id">
                    <input type="hidden" id="x_confirm_jobexperience_user_id" name="x_confirm_jobexperience_user_id">
                    <input type="hidden" id="x_confirm_jobexperience_type" name="x_confirm_jobexperience_type">
                    <div class="modal-body" id="modal-body-confirm-jobexperience-msg"></div>
                    <div class="overlay" id="container-loader-confirm" style="display:none;">
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

<div class="box-body">
    <p class="pull-right">
        <?php /*
        <button type="button" id="btn-existing-job-experience" class="btn" disabled="disabled" ><i class="glyphicon glyphicon-ok"></i>&nbsp;DITERIMA</button>
        <button type="button" id="btn-pending-job-experience" class="btn btn-warning" ><i class="glyphicon glyphicon-time"></i>&nbsp;MENUNGGU</button>
        <button type="button" id="btn-add-job-experience" class="btn btn-primary" data-toggle="modal" data-target="#modal-frm-job-experience" ><i class="glyphicon glyphicon-plus"></i>&nbsp;TAMBAH</button>
        */?>
    </p>
    <br>
    <table id="dt-table-riwayat-pendidikan-diklat" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Diklat</th>
                <th>Tgl. Mulai</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Nama Diklat</th>
                <th>Tgl. Mulai</th>
            </tr>
        </tfoot>
    </table> 

</div>

<!-- Constanta -->
<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('static');?>/custom/riwayatpendidikandiklat.js"></script>