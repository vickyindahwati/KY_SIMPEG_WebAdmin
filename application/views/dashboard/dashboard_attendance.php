<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">

<!-- Start : Modal Form -->

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-healthy-check" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php /*
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                */?>
                <h4 class="modal-title" id="gridSystemModalLabel">INFORMASI KESEHATAN</h4>
            </div>
            <form class="form-horizontal" id="frm-healthy-check" name="frm-healthy-check">
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">                            
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Kondisi saat ini</label>
                                <div class="col-sm-6">
                                    <select id="x_health_type_id" name="x_health_type_id" class="form-control validate[required]">
                                        <option value="">-Pilih-</option>
                                        <option value="1">Sehat</option>
                                        <option value="2">Sakit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="container-healthy-description" style="display: none;">
                                <label for="input1" class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-6">
                                    <textarea name="x_health_description" id="x_health_description" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay" id="container-loader-healthy-check" style="display:none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
                <div class="modal-footer">
                <?php /*
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                */?>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-healthy-check-clockout" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php /*
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                */?>
                <h4 class="modal-title" id="gridSystemModalLabel">INFORMASI KESEHATAN</h4>
            </div>
            <form class="form-horizontal" id="frm-healthy-check-clockout" name="frm-healthy-check-clockout">
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">                            
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Kondisi saat ini</label>
                                <div class="col-sm-6">
                                    <select id="x_health_type_id_clockout" name="x_health_type_id_clockout" class="form-control validate[required]">
                                        <option value="">-Pilih-</option>
                                        <option value="1">Sehat</option>
                                        <option value="2">Sakit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="container-healthy-description-clockout" style="display: none;">
                                <label for="input1" class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-6">
                                    <textarea name="x_health_description_clockout" id="x_health_description_clockout" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay" id="container-loader-healthy-check-clockout" style="display:none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
                <div class="modal-footer">
                <?php /*
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                */?>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-loader" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">MESSAGE</h4>
            </div>      
            <div class="overlay text-center" id="container-loader">
                <i class="fa fa-refresh fa-spin fa-5x"></i>
            </div>
            <div class="modal-body text-center"><p>Please Wait...</p></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-clockin" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <?php /*
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/?>
                <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI ABSEN MASUK</h4>
            </div>
            <form class="form-horizontal" id="frm-confirm-clockin" name="frm-confirm-clockin">
                <input type="hidden" name="x_geoloc_latitude_clockin" id="x_geoloc_latitude_clockin">
                <input type="hidden" name="x_geoloc_longitude_clockin" id="x_geoloc_longitude_clockin">
                <input type="hidden" name="x_time_clockin" id="x_time_clockin">
                <div class="modal-body" id="modal-body-confirm-msg-clockin">
                    Apakah anda yakin ingin <strong>Absen Masuk</strong>?
                </div>
                <div class="overlay" id="container-loader-confirm-clockin" style="display:none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-message" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <?php /*
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/?>
                <h4 class="modal-title" id="gridSystemModalLabel">POP UP MESSAGE</h4>
            </div>
            <div class="modal-body" id="container-popup-message"></div>
            <div class="overlay" id="container-loader-delete-driver" style="display:none;">
                <i class="fa fa-refresh fa-spin"></i>
                </div>
            <div class="modal-footer">
                <button type="button" id="btn-close-modal-msg" class="btn btn-primary">TUTUP</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-clockout" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php /*
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/?>
                <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI ABSEN KELUAR</h4>
            </div>
            <form class="form-horizontal" id="frm-confirm-clockout" name="frm-confirm-clockout">
                <input type="hidden" name="x_geoloc_latitude_clockout" id="x_geoloc_latitude_clockout">
                <input type="hidden" name="x_geoloc_longitude_clockout" id="x_geoloc_longitude_clockout">
                <input type="hidden" name="x_time_clockout" id="x_time_clockout">
                <div class="modal-body" id="modal-body-confirm-msg-clockin">
                    Apakah anda yakin ingin <strong>Absen Keluar</strong>?
                </div>
                <div class="overlay" id="container-loader-confirm-clockout" style="display:none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="box box-PRIMARY">
	<div class="box-header with-border">
    	<!--h3 class="box-title">KEHADIRAN</h3-->
  	</div>
  	<!-- /.box-header -->
  	<div class="box-body">
        <input type="hidden" name="x_flag_healthy_check" id="x_flag_healthy_check" value="<?php echo $rsAttendanceInfo->healthy_check_status ?>">
        <input type="hidden" name="x_flag_healthy_check_clockout" id="x_flag_healthy_check_clockout" value="<?php echo $rsAttendanceInfo->healthy_check_status_clockout ?>">
  		<?php 
  			if( $rsAttendanceInfo->status_code == '-99' ){
  				echo '<div class="callout callout-danger">Silahkan lakukan absen terlebih dahulu. Klik "Clock In"&nbsp;&nbsp;
  				<a href="#" class="btn bg-green" data-toggle="modal" data-target="#modal-confirm-clockin" name="link-confirm-clockin" data="">Clock In</a></div>';
  				echo '';
  			}else if( $rsAttendanceInfo->status_code == '00' && $rsAttendanceInfo->clock_in <> '' && $rsAttendanceInfo->clock_out == '' ){
  				echo '<div class="callout callout-info"><span>Anda clock-In pukul <strong>' . $rsAttendanceInfo->clock_in . '</strong></span><br>Apabila anda ingin absen pulang, silahkan Klik "Clock Out"&nbsp;&nbsp;
  				<a href="#" class="btn bg-red" data-toggle="modal" data-target="#modal-confirm-clockout" name="link-confirm-clockout" data="">Clock Out</a></div>';
  			}else{
  				echo '<div>Anda sudah melakukan absensi. Informasi kehadiran anda hari ini: <br>
  				<ul><li><strong>Kedatangan: </strong>' . $rsAttendanceInfo->clock_in . '</li><li><strong>Kepulangan: </strong>' . $rsAttendanceInfo->clock_out . '</li></ul></div>';
  			}
  		?>
  	</div>
</div>

<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('static');?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url('static');?>/custom/global_function.js"></script>
<script src="<?php echo base_url('static');?>/custom/attendance.js"></script>
<script type="text/javascript">
    /*$('#btn-close-modal-msg').click(function(){
        $('#modal-message').modal('hide');  
        $('.modal-backdrop').remove();    
        loadDashboard('attendance_info','container-attendance');        
        
    });*/
</script>