<link href="<?php echo base_url('static');?>/plugins/jquery-upload-file/uploadfile.css" rel="stylesheet">
<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/datepicker/datepicker3.css">

<input type="hidden" class="form-control" id="x_holiday_date" name="x_holiday_date">

<!-- Start : Modal Form -->
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
                <button type="button" id="btn-close-modal-msg" class="btn btn-primary">TUTUP</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-update-data-pending">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">DETIL PERUBAHAN DATA</h4>
        </div>            
        <div id="container-update-data-pending"></div>
        <div class="overlay text-center" id="container-loader-update-data-pending" style="display:none;">
            <i class="fa fa-refresh fa-spin fa-5x"></i>
        </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-cancel-leave">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI PEMBATALAN CUTI</h4>
            </div>
            <form class="form-horizontal" id="frm-confirm-cancel-leave" name="frm-confirm-cancel-leave">
                <input type="hidden" id="x_confirm_cancel_id" name="x_confirm_cancel_id">
                <div class="modal-body" id="modal-body-confirm-msg">
                    Apakah anda yakin ingin membatalkan cuti anda?
                </div>
                <div class="overlay" id="container-loader-confirm" style="display:none;">
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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-form-request-leave">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM PENGAJUAN CUTI</h4>                
            </div>            
            <form id="form-request-leave" name="form-request-leave" class="form-horizontal">                
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">                            
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tujuan Pengajuan</label>
                                <div class="col-sm-9">
                                    <select id="x_tujuan_jabatan" name="x_tujuan_jabatan" class="form-control validate[required]">
                                        <option value="">- Silahkan Pilih -</option>
                                        <?php 
                                            foreach( $rsTujuanJabatan->data as $dtTujuanJabatan ){
                                        ?>
                                                <option value="<?php echo $dtTujuanJabatan->id ?>"><?php echo $dtTujuanJabatan->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Jenis Cuti</label>
                                <div class="col-sm-9">
                                    <select id="x_jenis_cuti" name="x_jenis_cuti" class="form-control validate[required]">
                                        <option value="">- Silahkan Pilih -</option>
                                        <?php 
                                            foreach( $rsJenisCuti->data as $dtJenisCuti ){
                                        ?>
                                                <option value="<?php echo $dtJenisCuti->id ?>"><?php echo $dtJenisCuti->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Sisa Cuti Tahunan</label>
                                <div class="col-sm-9">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td style="text-align:center;"><strong>N</strong></td>
                                            <td style="text-align:center;"><strong>N-1</strong></td>
                                            <td style="text-align:center;"><strong>N-2</strong></td>
                                            <td style="text-align:center;"><strong>Tangguhan</strong></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $rsAnualLeaveInfo['cuti_tahunan_n'] ?></td>
                                            <td style="text-align:center;"><?php echo $rsAnualLeaveInfo['cuti_tahunan_n_1'] ?></td>
                                            <td style="text-align:center;"><?php echo $rsAnualLeaveInfo['cuti_tahunan_n_2'] ?></td>
                                            <td style="text-align:center;"><?php echo $rsAnualLeaveInfo['cuti_ditangguhkan'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                                
                            </div>
                            <?php /*
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Catatan Cuti</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_catatan_cuti" id="x_catatan_cuti" class="form-control">
                                </div>
                            </div>
                            */?>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Alasan Cuti</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_alasan_cuti" id="x_alasan_cuti" class="form-control validate[required]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tgl. Mulai Cuti</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_tgl_mulai" id="x_tgl_mulai" class="form-control validate[required]" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tgl. Berakhir Cuti</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_tgl_berakhir" id="x_tgl_berakhir" class="form-control validate[required]" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Lama Cuti</label>
                                <div class="col-sm-3">
                                    <input type="text" name="x_lama_cuti" id="x_lama_cuti" class="form-control validate[required]">
                                </div>
                                <div class="col-sm-3">Hari</div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Alamat Cuti</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_alamat_cuti" id="x_alamat_cuti" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Telp</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_telp" id="x_telp" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
 </div>

 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-form-receive-request-leave">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM PENERIMAAN FORM CUTI</h4>                
            </div>            
            <form id="form-receive-request-leave" name="form-receive-request-leave" class="form-horizontal">
                <input type="hidden" name="x_id_leave" id="x_id_leave">
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">                            
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">No. Reference</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_no_reference" id="x_no_reference" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_receive_leave_nip" id="x_receive_leave_nip" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_receive_leave_nama_pegawai" id="x_receive_leave_nama_pegawai" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tgl. Cuti</label>
                                <div class="col-sm-3">
                                    <input type="text" name="x_receive_leave_tgl_mulai" id="x_receive_leave_tgl_mulai" class="form-control validate[required]" data-date-format="dd-mm-yyyy">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="x_receive_leave_tgl_berakhir" id="x_receive_leave_tgl_berakhir" class="form-control validate[required]" data-date-format="dd-mm-yyyy">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="x_receive_leave_lama_cuti" id="x_receive_leave_lama_cuti" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Alasan Cuti</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_receive_leave_alasan_cuti" id="x_receive_leave_alasan_cuti" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Catatan Cuti</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_receive_leave_catatan_cuti" id="x_receive_leave_catatan_cuti" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Pertimbangan Atasan Langsung</label>
                                <div class="col-sm-9">
                                    <select name="x_receive_leave_pertimbangan_atasan" id="x_receive_leave_pertimbangan_atasan" class="form-control validate[required]">
                                        <option value="">-Silahkan Pilih-</option>
                                        <option value="1">Disetujui</option>
                                        <option value="2">Perubahan</option>
                                        <option value="3">Ditangguhkan</option>
                                        <option value="4">Tidak Disetujui</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Keputusan Pejabat</label>
                                <div class="col-sm-9">
                                    <select name="x_receive_leave_keputusan_pejabat" id="x_receive_leave_keputusan_pejabat" class="form-control validate[required]">
                                        <option value="">-Silahkan Pilih-</option>
                                        <option value="1">Disetujui</option>
                                        <option value="2">Perubahan</option>
                                        <option value="3">Ditangguhkan</option>
                                        <option value="4">Tidak Disetujui</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-form-change-request-leave">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM PERUBAHAN CUTI</h4>                
            </div>            
            <form id="form-change-request-leave" name="form-change-request-leave" class="form-horizontal">
                <input type="text" name="x_id_leave_change" id="x_id_leave_change">
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">                            
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">No. Reference</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_no_reference_change" id="x_no_reference_change" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_receive_leave_nip_change" id="x_receive_leave_nip_change" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_receive_leave_nama_pegawai_change" id="x_receive_leave_nama_pegawai_change" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tgl. Cuti</label>
                                <div class="col-sm-3">
                                    <input type="text" name="x_receive_leave_tgl_mulai_change" id="x_receive_leave_tgl_mulai_change" class="form-control validate[required]" data-date-format="dd-mm-yyyy">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="x_receive_leave_tgl_berakhir_change" id="x_receive_leave_tgl_berakhir_change" class="form-control validate[required]" data-date-format="dd-mm-yyyy">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="x_receive_leave_lama_cuti_change" id="x_receive_leave_lama_cuti_change" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Alasan Cuti</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_receive_leave_alasan_cuti_change" id="x_receive_leave_alasan_cuti_change" class="form-control">
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    PEGAWAI
    <small>SIMPEG - Pegawai</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">   
    <div class="row">
        <form id="form-search-leave" name="form-search-leave" class="form-horizontal">
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-body">                            
                        <div class="form-group">
                            <div class="col-sm-2">
                                <select id="x_search_status_leave" name="x_search_status_leave" class="form-control">
                                    <option value="">- Status Pengajuan -</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Diterima</option>
                                    <option value="1">Ditangguhkan</option>
                                    <option value="2">Batal</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select id="x_search_jenis_cuti" name="x_search_jenis_cuti" class="form-control">
                                    <option value="">- Jenis Cuti -</option>
                                    <?php 
                                            foreach( $rsJenisCuti->data as $dtJenisCuti ){
                                        ?>
                                                <option value="<?php echo $dtJenisCuti->id ?>"><?php echo $dtJenisCuti->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="x_search_tgl_mulai_cuti" id="x_search_tgl_mulai_cuti" class="form-control" placeholder="Tgl. Mulai..." data-date-format="dd-mm-yyyy">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="x_search_tgl_berakhir_cuti" id="x_search_tgl_berakhir_cuti" class="form-control" placeholder="Tgl. Berakhir" data-date-format="dd-mm-yyyy">
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                            <?php if( $this->session->userdata['SESSION_SIMPEG_D'] != 1 && $this->session->userdata['SESSION_SIMPEG_D'] != 3 ){ ?>
                                <div class="col-sm-1">
                                    <button class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-form-request-leave" id="btn-add-leave"><i class="fa fa-plus"></i>&nbsp;Tambah Baru</button>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $title ?></h3>
                </div><!-- /.box-header -->
                <div id="container-list"></div>
                <div class="overlay" id="container-loader-list" style="display:none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>            
        </div>
    </div>
</section>

<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<script src="<?php echo base_url('static');?>/custom/global_function.js"></script>
<script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('static');?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url('static');?>/custom/leave.js"></script>