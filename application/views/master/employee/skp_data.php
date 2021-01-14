<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">


<!-- Start : Modal Form -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-skp-detail" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">SKP DETAIL</h4>                
            </div>
            <form id="form-submit-skp" name="form-submit-skp" class="form-horizontal">
                <input type="hidden" name="x_id" id="x_id" value="<?php echo $id; ?>">
                <div class="modal-body">

                    <div class="tab-content">
                        <div class="active tab-pane">
                            
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#riwayat_skp" data-toggle="tab">Riwayat SKP</a></li>
                                    <li><a href="#pejabat_penilai" data-toggle="tab">Pejabat Penilai</a></li>
                                    <li><a href="#atasan_pejabat_penilai" data-toggle="tab">Atasan Pejabat Penilai</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="active tab-pane" id="riwayat_skp">
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-3 control-label">Jns. Jabatan</label>
                                            <div class="col-sm-4">
                                                <select id="x_skp_jenis_jabatan" name="x_skp_jenis_jabatan" class="form-control" disabled="disabled">
                                                    <option value="0">-Pilih-</option>
                                                    <?php 
                                                        foreach( $rsJenisJabatan->data as $dtJenisJabatan ){
                                                    ?>
                                                            <option value="<?php echo $dtJenisJabatan->id ?>"><?php echo $dtJenisJabatan->name; ?></option>
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <label for="input1" class="col-sm-2 control-label">Tahun</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_tahun" id="x_skp_tahun" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">                                
                                            <div class="col-sm-12">
                                                <h3>Sasaran Kinerja Pegawai</h3>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-3 control-label">Nilai SKP</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="x_skp_nilai_skp" id="x_skp_nilai_skp" readonly="readonly">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="x_skp_nilai_skp_desc" id="x_skp_nilai_skp_desc" readonly="readonly">
                                            </div>
                                        </div>  
                                        <div class="form-group">                                
                                            <div class="col-sm-12">
                                                <h3>Perilaku Kerja</h3>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Orientasi Pelayanan</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_orientasi_pelayanan" id="x_skp_orientasi_pelayanan" readonly="readonly">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_orientasi_pelayanan_desc" id="x_skp_orientasi_pelayanan_desc" readonly="readonly">
                                            </div>

                                            <label for="input1" class="col-sm-2 control-label">Integritas</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_integritas" id="x_skp_integritas" readonly="readonly">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_integritas_desc" id="x_skp_integritas_desc" readonly="readonly">
                                            </div>
                                        </div>   
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Komitmen</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_komitmen" id="x_skp_komitmen" readonly="readonly">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_komitmen_desc" id="x_skp_komitmen_desc" readonly="readonly">
                                            </div>

                                            <label for="input1" class="col-sm-2 control-label">Disiplin</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_disiplin" id="x_skp_disiplin" readonly="readonly">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_disiplin_desc" id="x_skp_disiplin_desc" readonly="readonly">
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Kerjasama</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_kerjasama" id="x_skp_kerjasama" readonly="readonly">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_kerjasama_desc" id="x_skp_kerjasama_desc" readonly="readonly">
                                            </div>

                                            <label for="input1" class="col-sm-2 control-label">Kepemimpinan</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_kepemimpinan" id="x_skp_kepemimpinan" readonly="readonly">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_kepemimpinan_desc" id="x_skp_kepemimpinan_desc" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Nilai Perilaku Kerja</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_nilai_perilaku_kerja" id="x_skp_nilai_perilaku_kerja" readonly="readonly">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_nilai_perilaku_kerja_desc" id="x_skp_nilai_perilaku_kerja_desc" readonly="readonly">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Nilai Prestasi Kerja</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_nilai_prestasi_kerja" id="x_skp_nilai_prestasi_kerja" readonly="readonly">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="x_skp_nilai_prestasi_kerja_desc" id="x_skp_nilai_prestasi_kerja_desc" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="pejabat_penilai">
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Status Pejabat Penilai</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_skp_status_pejabat_penilai" id="x_skp_status_pejabat_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">NIP/NRP</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_skp_nip_pejabat_penilai" id="x_skp_nip_pejabat_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Nama</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_skp_nama_pejabat_penilai" id="x_skp_nama_pejabat_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Jabatan</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_skp_jabatan_pejabat_penilai" id="x_skp_jabatan_pejabat_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Unor</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_skp_unor_pejabat_penilai" id="x_skp_unor_pejabat_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Golongan</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_skp_golongan_pejabat_penilai" id="x_skp_golongan_pejabat_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">TMT Golongan</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_tmt_golongan_pejabat_penilai" id="x_tmt_golongan_pejabat_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="atasan_pejabat_penilai">
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Status Atasan Penilai</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_skp_status_atasan_penilai" id="x_skp_status_atasan_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">NIP/NRP</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_skp_nip_atasan_penilai" id="x_skp_nip_atasan_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Nama</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_skp_nama_atasan_penilai" id="x_skp_nama_atasan_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Jabatan</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_skp_jabatan_atasan_penilai" id="x_skp_jabatan_atasan_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Unor</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_skp_unor_atasan_penilai" id="x_skp_unor_atasan_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">Golongan</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_skp_golongan_atasan_penilai" id="x_skp_golongan_atasan_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-2 control-label">TMT Golongan</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="x_tmt_golongan_atasan_penilai" id="x_tmt_golongan_atasan_penilai" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
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
    <p class="pull-right">
        <?php /*
        <button type="button" id="btn-existing-job-experience" class="btn" disabled="disabled" ><i class="glyphicon glyphicon-ok"></i>&nbsp;DITERIMA</button>
        <button type="button" id="btn-pending-job-experience" class="btn btn-warning" ><i class="glyphicon glyphicon-time"></i>&nbsp;MENUNGGU</button>
        <button type="button" id="btn-add-job-experience" class="btn btn-primary" data-toggle="modal" data-target="#modal-frm-job-experience" ><i class="glyphicon glyphicon-plus"></i>&nbsp;TAMBAH</button>
        */?>
    </p>
    <br>
    <table id="dt-table-skp" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Rata-rata</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Pejabat Penilai</th>
                <th>Atasan Pej. Penilai</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Tahun</th>
                <th>Rata-rata</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Pejabat Penilai</th>
                <th>Atasan Pej. Penilai</th>
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
<script src="<?php echo base_url('static');?>/custom/skp.js"></script>