<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/datepicker/datepicker3.css">

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-message-add-edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">POP UP MESSAGE</h4>
            </div>
            <div class="modal-body" id="container-popup-message-addedit"></div>
            <div class="modal-footer">
                <button type="button" id="btn-close-modal-pindahinstansi" class="btn btn-primary">TUTUP</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-pindahinstansi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI</h4>
            </div>
            <form class="form-horizontal" id="form-confirm-delete-pindahinstansi" name="form-confirm-delete-pindahinstansi">
                <input type="hidden" id="x_confirm_delete_id" name="x_confirm_delete_id">
                <input type="hidden" id="x_confirm_delete_module" name="x_confirm_delete_module" value="/user/pindah_instansi">
                <div class="modal-body" id="modal-body-confirm-msg-pindahinstansi"></div>
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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-frm-add-edit" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FORM TAMBAH PINDAH INSTANSI</h4>                
            </div>
            <form id="form-submit-pindahinstansi" name="form-submit-pindahinstansi" class="form-horizontal">
                <input type="text" name="x_id" id="x_id" value="<?php echo $id; ?>">
                <input type="text" name="x_pindahinstansi_id" id="x_pindahinstansi_id" value="">
                <input type="text" name="x_act" id="x_act" value="add">
            
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Jenis Pemindahan</label>
                                <div class="col-sm-3">
                                    <?php
                                        //1=> Pindah Instansi, 2=> DPB, 3=>DPK
                                    ?>
                                    <select id="x_addedit_pindahinstansi_jenis_pemindahan" name="x_addedit_pindahinstansi_jenis_pemindahan" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <option value="1">Pindah Instansi</option>
                                        <option value="2">DPB</option>
                                        <option value="3">DPK</option>
                                    </select>
                                </div>
                                <label for="input1" class="col-sm-3 control-label">Jenis Pegawai</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_jenis_pegawai" name="x_addedit_pindahinstansi_jenis_pegawai" class="form-control">
                                        <option value="0">-Pilih-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Jns. Jbtn Lama</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_jenis_jataban_lama" name="x_addedit_pindahinstansi_jenis_jataban_lama" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsPangkat->data as $dtPangkat ){
                                        ?>
                                                <option value="<?php echo $dtPangkat->id ?>"><?php echo $dtPangkat->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <label for="input1" class="col-sm-3 control-label">Jns. Jbtn Baru</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_jenis_jataban_baru" name="x_addedit_pindahinstansi_jenis_jataban_baru" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsPangkat->data as $dtPangkat ){
                                        ?>
                                                <option value="<?php echo $dtPangkat->id ?>"><?php echo $dtPangkat->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                                                     
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Instansi Kerja Lama</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_instansi_kerja_lama" name="x_addedit_pindahinstansi_instansi_kerja_lama" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsInstansiKerja->data as $dtInstansiKerja ){
                                        ?>
                                                <option value="<?php echo $dtInstansiKerja->id ?>"><?php echo $dtInstansiKerja->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <label for="input1" class="col-sm-3 control-label">Instansi Kerja Baru</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_instansi_kerja_baru" name="x_addedit_pindahinstansi_instansi_kerja_baru" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsInstansiKerja->data as $dtInstansiKerja ){
                                        ?>
                                                <option value="<?php echo $dtInstansiKerja->id ?>"><?php echo $dtInstansiKerja->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Satuan Kerja Lama</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_satuan_kerja_lama" name="x_addedit_pindahinstansi_satuan_kerja_lama" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsSatuanKerja->data as $dtSatuanKerja ){
                                        ?>
                                                <option value="<?php echo $dtSatuanKerja->id ?>"><?php echo $dtSatuanKerja->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <label for="input1" class="col-sm-3 control-label">Satuan Kerja Baru</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_satuan_kerja_baru" name="x_addedit_pindahinstansi_satuan_kerja_baru" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsSatuanKerja->data as $dtSatuanKerja ){
                                        ?>
                                                <option value="<?php echo $dtSatuanKerja->id ?>"><?php echo $dtSatuanKerja->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Unor Lama</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_unor_lama" name="x_addedit_pindahinstansi_unor_lama" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsUnor->data as $dtUnor ){
                                        ?>
                                                <option value="<?php echo $dtUnor->id ?>"><?php echo $dtUnor->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <label for="input1" class="col-sm-3 control-label">Unor Baru</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_unor_baru" name="x_addedit_pindahinstansi_unor_baru" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsUnor->data as $dtUnor ){
                                        ?>
                                                <option value="<?php echo $dtUnor->id ?>"><?php echo $dtUnor->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Jab. Fungsional Lama</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_jabatan_fungsional_lama" name="x_addedit_pindahinstansi_jabatan_fungsional_lama" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsJabatanFungsional->data as $dtJabatanFungsional ){
                                        ?>
                                                <option value="<?php echo $dtJabatanFungsional->id ?>"><?php echo $dtJabatanFungsional->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <label for="input1" class="col-sm-3 control-label">Jab. Fungsional Baru</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_jabatan_fungsional_baru" name="x_addedit_pindahinstansi_jabatan_fungsional_baru" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsJabatanFungsional->data as $dtJabatanFungsional ){
                                        ?>
                                                <option value="<?php echo $dtJabatanFungsional->id ?>"><?php echo $dtJabatanFungsional->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Instansi Induk Lama</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_instansi_induk_lama" name="x_addedit_pindahinstansi_instansi_induk_lama" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsInstansiInduk->data as $dtInstansiInduk ){
                                        ?>
                                                <option value="<?php echo $dtInstansiInduk->id ?>"><?php echo $dtInstansiInduk->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <label for="input1" class="col-sm-3 control-label">Instansi Induk Baru</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_jabatan_fungsional_baru" name="x_addedit_pindahinstansi_jabatan_fungsional_baru" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsInstansiInduk->data as $dtInstansiInduk ){
                                        ?>
                                                <option value="<?php echo $dtInstansiInduk->id ?>"><?php echo $dtInstansiInduk->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Satuan Kerja Induk Lama</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_satuan_kerja_induk_lama" name="x_addedit_pindahinstansi_satuan_kerja_induk_lama" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsSatkerInduk->data as $dtSatkerInduk ){
                                        ?>
                                                <option value="<?php echo $dtSatkerInduk->id ?>"><?php echo $dtSatkerInduk->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <label for="input1" class="col-sm-3 control-label">Satuan Kerja Induk Baru</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_satuan_kerja_induk_baru" name="x_addedit_pindahinstansi_satuan_kerja_induk_baru" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsSatkerInduk->data as $dtSatkerInduk ){
                                        ?>
                                                <option value="<?php echo $dtSatkerInduk->id ?>"><?php echo $dtSatkerInduk->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Lokasi Kerja Lama</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_lokasi_kerja_lama" name="x_addedit_pindahinstansi_lokasi_kerja_lama" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsLokasi->data as $dtLokasi ){
                                        ?>
                                                <option value="<?php echo $dtLokasi->id ?>"><?php echo $dtLokasi->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <label for="input1" class="col-sm-3 control-label">Lokasi Kerja Baru</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_lokasi_kerja_baru" name="x_addedit_pindahinstansi_lokasi_kerja_baru" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsLokasi->data as $dtLokasi ){
                                        ?>
                                                <option value="<?php echo $dtLokasi->id ?>"><?php echo $dtLokasi->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">KPPN Baru</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_kppn_baru" name="x_addedit_pindahinstansi_kppn_baru" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsKppn->data as $dtKppn ){
                                        ?>
                                                <option value="<?php echo $dtKppn->id ?>"><?php echo $dtKppn->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <label for="input1" class="col-sm-3 control-label">Jab. Fungsional Umum Baru</label>
                                <div class="col-sm-3">
                                    <select id="x_addedit_pindahinstansi_jabatan_fungsional_umum_baru" name="x_addedit_pindahinstansi_jabatan_fungsional_umum_baru" class="form-control">
                                        <option value="0">-Pilih-</option>
                                        <?php 
                                            foreach( $rsJabatanFungsionalUmum->data as $dtJabatanFungsionalUmum ){
                                        ?>
                                                <option value="<?php echo $dtJabatanFungsionalUmum->id ?>"><?php echo $dtJabatanFungsionalUmum->name; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">No. Surat Instansi Asal</label>
                                <div class="col-sm-4">
                                    <input type="text" name="x_addedit_pindahinstansi_no_surat_instansi_asal" id="x_addedit_pindahinstansi_no_surat_instansi_asal" class="form-control">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Tgl. SK</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_1" id="x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_1" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">No. Surat Instansi Asal (Prov)</label>
                                <div class="col-sm-4">
                                    <input type="text" name="x_addedit_pindahinstansi_no_surat_instansi_asal_prov" id="x_addedit_pindahinstansi_no_surat_instansi_asal_prov" class="form-control">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Tgl. SK</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_2" id="x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_2" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">No. Surat Instansi Tujuan</label>
                                <div class="col-sm-4">
                                    <input type="text" name="x_addedit_pindahinstansi_no_surat_instansi_tujuan" id="x_addedit_pindahinstansi_no_surat_instansi_tujuan" class="form-control">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Tgl. SK</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_3" id="x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_3" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">No. Surat Instansi Tujuan (Prov)</label>
                                <div class="col-sm-4">
                                    <input type="text" name="x_addedit_pindahinstansi_no_surat_instansi_tujuan_prov" id="x_addedit_pindahinstansi_no_surat_instansi_tujuan_prov" class="form-control">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Tgl. SK</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_4" id="x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_4" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">No. SK</label>
                                <div class="col-sm-4">
                                    <input type="text" name="x_addedit_pindahinstansi_no_sk" id="x_addedit_pindahinstansi_no_sk" class="form-control">
                                </div>
                                <label for="input1" class="col-sm-2 control-label">Tgl SK</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="x_addedit_pindahinstansi_tgl_sk" id="x_addedit_pindahinstansi_tgl_sk" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">TMT PI</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="x_addedit_pindahinstansi_tmt_pi" id="x_addedit_pindahinstansi_tmt_pi" data-date-format="dd-mm-yyyy">
                                </div>
                                <div class="col-sm-5">
                                    
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

<div class="box-body">
    <?php /*
    <p class="pull-right">
        <button type="button" id="btn-add-pindahinstansi" class="btn btn-primary" data-toggle="modal" data-target="#modal-frm-add-edit" ><i class="glyphicon glyphicon-plus"></i>&nbsp;TAMBAH</button>
    </p>
    */?>
    <br>
    <table id="dt-table-pindahinstansi" class="table table-bordered table-striped">
        <thead>
            <tr>                
                <th>Jenis PI</th>
                <th>TMT</th>
                <th>Tgl SK</th>
                <th>Insduk Baru</th>
                <th>Insker Baru</th>
                <th>Insduk Lama</th>
                <th>Insker Lama</th>
                <th>Action</th>          
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Jenis PI</th>
                <th>TMT</th>
                <th>Tgl SK</th>
                <th>Insduk Baru</th>
                <th>Insker Baru</th>
                <th>Insduk Lama</th>
                <th>Insker Lama</th>
                <th>Action</th>   
            </tr>
        </tfoot>
    </table> 

</div>

<!-- Constanta -->
<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('static');?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url('static');?>/custom/pindahinstansi.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        loadDataTablePindahInstansi( $('#x_id').val() );

        $('#dt-table-pindahinstansi tbody').on( 'click', 'a[name="link-edit-pindahinstansi"]', function(){
            var arrData = $(this).attr('data').toString().split(dataSeparator);
            $('#x_pindahinstansi_id').val(arrData[0]);
            $('#x_addedit_pindahinstansi_jenis_pemindahan').val( arrData[2] );
            $('#x_addedit_pindahinstansi_jenis_pegawai').val( arrData[3] );
            $('#x_addedit_pindahinstansi_jenis_jataban_lama').val( arrData[4] );
            $('#x_addedit_pindahinstansi_jenis_jataban_baru').val( arrData[5] );
            $('#x_addedit_pindahinstansi_instansi_kerja_lama').val( arrData[6] );
            $('#x_addedit_pindahinstansi_instansi_kerja_baru').val( arrData[7] );
            $('#x_addedit_pindahinstansi_satuan_kerja_lama').val( arrData[8] );
            $('#x_addedit_pindahinstansi_satuan_kerja_baru').val( arrData[9] );
            $('#x_addedit_pindahinstansi_unor_lama').val( arrData[10] );
            $('#x_addedit_pindahinstansi_unor_baru').val( arrData[11] );
            $('#x_addedit_pindahinstansi_jabatan_fungsional_lama').val( arrData[12] );
            $('#x_addedit_pindahinstansi_jabatan_fungsional_baru').val( arrData[13] );
            $('#x_addedit_pindahinstansi_instansi_induk_lama').val( arrData[14] );
            $('#x_addedit_pindahinstansi_instansi_induk_baru').val( arrData[15] );
            $('#x_addedit_pindahinstansi_satuan_kerja_induk_lama').val( arrData[16] );
            $('#x_addedit_pindahinstansi_satuan_kerja_induk_baru').val( arrData[17] );
            $('#x_addedit_pindahinstansi_lokasi_kerja_lama').val( arrData[18] );
            $('#x_addedit_pindahinstansi_lokasi_kerja_baru').val( arrData[19] );
            $('#x_addedit_pindahinstansi_kppn_baru').val( arrData[20] );
            $('#x_addedit_pindahinstansi_jabatan_fungsional_umum_baru').val( arrData[21] );
            $('#x_addedit_pindahinstansi_no_surat_instansi_asal').val( arrData[22] );
            $('#x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_1').val( arrData[23] );
            $('#x_addedit_pindahinstansi_no_surat_instansi_asal_prov').val( arrData[24] );
            $('#x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_2').val( arrData[25] );
            $('#x_addedit_pindahinstansi_no_surat_instansi_tujuan').val( arrData[26] );
            $('#x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_3').val( arrData[27] );
            $('#x_addedit_pindahinstansi_no_surat_instansi_tujuan_prov').val( arrData[28] );
            $('#x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_4').val( arrData[29] );
            $('#x_addedit_pindahinstansi_no_sk').val( arrData[30] );
            $('#x_addedit_pindahinstansi_tgl_sk').val( arrData[31] );
            $('#x_addedit_pindahinstansi_tmt_pi').val( arrData[32] );

            $('#x_act').val('edit');
        } );

        $('#dt-table-pindahinstansi').on( 'click', 'a[name="link-delete-pindahinstansi"]', function(){
            $('#x_confirm_delete_id').val($(this).attr('data'));
            $('#modal-body-confirm-msg-pindahinstansi').html('Anda yakin ingin menghapus data ini?');
        } );

        $("form#form-submit-pindahinstansi").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {
                    // alert($("form#form-add-user").serialize());
                    $.ajax({

                        type        : 'POST',
                        url         : indexURL + '/employee/savePindahInstansi',
                        data        : $("form#form-submit-pindahinstansi").serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-frm-add-edit').modal('hide');},
                        success     : function(data){                             
                                        
                                        $('#modal-loader').modal('hide'); 
                                        if( data.status_code == "00" ){ 
                                            $('#modal-message-add-edit').modal('show');                                    
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $(this).trigger('reset');
                                            loadDataTablePindahInstansi( $('#x_id').val() );
                                        }else{
                                            $('#modal-message-add-edit').modal('show');
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $('#modal-frm-add-edit').modal('show');
                                        }      
                                        
                        }

                    });
                    

                }

            }

        });

        $("form#form-confirm-delete-pindahinstansi").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {
                    // alert($("form#form-add-user").serialize());
                    $.ajax({

                        type        : 'POST',
                        url         : indexURL + '/employee/deleteData',
                        data        : $("form#form-confirm-delete-pindahinstansi").serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-confirm-pindahinstansi').modal('hide');},
                        success     : function(data){                             
                                        
                                        $('#modal-loader').modal('hide'); 
                                        if( data.status_code == "00" ){ 
                                            $('#modal-message-add-edit').modal('show');                                    
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $(this).trigger('reset');
                                            loadDataTablePindahInstansi( $('#x_id').val() );
                                        }else{
                                            $('#modal-message-add-edit').modal('show');
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $('#modal-frm-add-edit').modal('show');
                                        }      
                                        
                        }

                    });
                    

                }

            }

        });

        $('#btn-add-pindahinstansi').click(function(){
            $('form#form-submit-pindahinstansi').trigger('reset');
            $('#x_act').val('add');
        });

        $('#btn-close-modal-pindahinstansi').click(function(){
            $('#modal-message-add-edit').modal('hide');            
            //$('#modal-frm-add-edit').modal('show');
            loadDataTablepindahinstansi($('#x_id').val());
            
        });

    }); 
</script>