<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">

<!-- Start : Modal Form -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-frm-job-experience">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">FORM PENGALAMAN KERJA</h4>
        </div>

        <form id="frm-job-experience" name="frm-job-experience" class="form-horizontal">
            <input type="hidden" name="x_id" id="x_id" value="<?php echo $id; ?>">
            <input type="hidden" name="x_job_experience_id" id="x_job_experience_id" value=""> 
            <input type="hidden" name="x_act" id="x_act" value="add">
            <div class="modal-body">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">Instansi</label>
                            <div class="col-sm-9">
                                <input type="text" name="x_instansi" id="x_instansi" class="form-control">
                            </div>          
                        </div>
                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">Jabatan</label>
                            <div class="col-sm-9">
                                <input type="text" name="x_jabatan" id="x_jabatan" class="form-control">
                            </div>          
                        </div>
                        <div class="form-group" id="container-support-name">
                            <label for="input1" class="col-sm-3 control-label">Tgl. Mulai Tahun</label>
                            <div class="col-sm-9">
                                <select name="x_mulai_tahun" id="x_mulai_tahun" class="form-control">
                                    <option value="0">- Silahkan Pilih -</option>
                                    <?php 
                                        $startYear = (int)date('Y');
                                        for( $i = $startYear; $i > 1970; $i-- ){
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="container-support-name">
                            <label for="input1" class="col-sm-3 control-label">Tgl. Mulai Bulan</label>
                            <div class="col-sm-9">
                                <select name="x_mulai_bulan" id="x_mulai_bulan" class="form-control">
                                    <option value="0">- Silahkan Pilih -</option>
                                    <option selected value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">Upload</label>
                            <div class="col-sm-9">
                                <div id="mulitplefileuploader_pengalaman_kerja" >Upload</div>
                                <input type="hidden" name="x_file_pengalaman_kerja" id="x_file_pengalaman_kerja" value="">
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
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
    <?php /*
    <p class="pull-right">
        <button type="button" id="btn-existing-job-experience" class="btn" disabled="disabled" ><i class="glyphicon glyphicon-ok"></i>&nbsp;DITERIMA</button>
        <button type="button" id="btn-pending-job-experience" class="btn btn-warning" ><i class="glyphicon glyphicon-time"></i>&nbsp;MENUNGGU</button>
        <button type="button" id="btn-add-job-experience" class="btn btn-primary" data-toggle="modal" data-target="#modal-frm-job-experience" ><i class="glyphicon glyphicon-plus"></i>&nbsp;TAMBAH</button>
    </p>
    */?>
    <br>
    <table id="dt-table-job-experience" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Instansi</th>
                <th>Jabatan</th>
                <th>Thn</th>
                <th>Bln</th>
                <th>Pengalaman</th>
                <th>Status</th>
                <th><?php for($i=0;$i<15;$i++)echo "&nbsp;"; ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Instansi</th>
                <th>Jabatan</th>
                <th>Tgl. Mulai Thn</th>
                <th>Tgl. Mulai Bln</th>
                <th>Pengalaman</th>
                <th>Status</th>
                <th></th>
            </tr>
        </tfoot>
    </table> 

</div>

<!-- Constanta -->
<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('static');?>/custom/jobexperience.js"></script>