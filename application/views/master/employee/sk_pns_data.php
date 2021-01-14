<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
 <!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/iCheck/all.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/datepicker/datepicker3.css">

 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-<?php echo $module; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI</h4>
                </div>
                <form class="form-horizontal" id="form-confirm-<?php echo $module; ?>" name="form-confirm-<?php echo $module; ?>">
                    <input type="hidden" id="x_confirm_<?php echo $module; ?>_id" name="x_confirm_<?php echo $module; ?>_id">
                    <input type="hidden" id="x_confirm_<?php echo $module; ?>_user_id" name="x_confirm_<?php echo $module; ?>_user_id">
                    <input type="hidden" id="x_confirm_<?php echo $module; ?>_type" name="x_confirm_<?php echo $module; ?>_type">
                    <div class="modal-body" id="modal-body-confirm-<?php echo $module; ?>-msg"></div>
                    <div class="overlay" id="container-loader-confirm-<?php echo $module; ?>" style="display:none;">
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
    <form id="frm-<?php echo $module; ?>" name="frm-<?php echo $module; ?>" class="form-horizontal">
            <input type="hidden" name="x_<?php echo $module; ?>_user_id" id="x_<?php echo $module; ?>_user_id" value="<?php echo $id; ?>">
            <input type="hidden" name="x_<?php echo $module; ?>_id" id="x_<?php echo $module; ?>_id" value=""> 
            <input type="hidden" name="x_<?php echo $module; ?>_act" id="x_<?php echo $module; ?>_act" value="add">
            <div class="modal-body">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="input1" class="col-sm-9 control-label">Terhitung Mulai Tanggal</label>
                            <div class="input-group date col-sm-3">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="x_mulai_tanggal" name="x_mulai_tanggal" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->terhitung_mulai_tanggal; ?>"> 
                            </div>          
                        </div>
                        <hr>


                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">NIP & Nama Pejabat</label>
                            <div class="col-sm-3">
                                <input type="text" name="x_nip_pejabat" id="x_nip_pejabat" class="form-control" placeholder="NIP" value="<?php echo $rs->data->nip_pejabat_penetapan; ?>">
                            </div>     
                            <div class="col-sm-6">
                                <input type="text" name="x_nama_pejabat" id="x_nama_pejabat" class="form-control" placeholder="Nama Pejabat" value="<?php echo $rs->data->nama_pejabat_penetapan; ?>">
                            </div>      
                        </div>
                        
                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">No. & Tgl. Surat Keputusan</label>
                            <div class="col-sm-5">
                                <input type="text" name="x_no_surat_keputusan" id="x_no_surat_keputusan" class="form-control" placeholder="No. Surat Keputusan" value="<?php echo $rs->data->no_surat_keputusan; ?>">
                            </div>    
                            <div class="input-group date col-sm-3">                                
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="x_tgl_keputusan" name="x_tgl_keputusan" placeholder="Tgl. Surat Keputusan" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tgl_surat_keputusan; ?>">                                
                            </div>      
                        </div>                        
                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">No. & Tgl. Diklat Prajabatan</label>
                            <div class="col-sm-5">
                                <input type="text" name="x_no_surat_diklat" id="x_no_surat_diklat" class="form-control" placeholder="No. Surat Diklat" value="<?php echo $rs->data->no_diklat_prajabatan; ?>">
                            </div>    
                            <div class="input-group date col-sm-3">                                
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="x_tgl_diklat" name="x_tgl_diklat" placeholder="Tgl. Surat Diklat" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tgl_diklat_prajabatan; ?>">                                
                            </div>      
                        </div>
                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">No. & Tgl. Surat Uji Kesehatan</label>
                            <div class="col-sm-5">
                                <input type="text" name="x_no_surat_uji_kesehatan" id="x_no_surat_uji_kesehatan" class="form-control" placeholder="No. Surat Uji Kesehatan" value="<?php echo $rs->data->no_surat_uji_kesehatan; ?>">
                            </div>    
                            <div class="input-group date col-sm-3">                                
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="x_tgl_uji_kesehatan" name="x_tgl_uji_kesehatan" placeholder="Tgl. Uji Kesehatan" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tgl_surat_uji_kesehatan; ?>">                                
                            </div>      
                        </div>
                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">Golongan Ruang</label>
                            <div class="col-sm-3">
                                <select id="x_golongan_ruang" name="x_golongan_ruang" class="form-control">
                                    <option value="0">-Silahkan Pilih-</option>
                                    <?php 
                                        $arrGolongan = $rsGolongan->data;
                                        foreach ($arrGolongan as $golongan) {
                                             echo '<option value="' . $golongan->id . '" ' . ( $golongan->id == $rs->data->golongan_ruang_id ? 'selected="selected"' : '' ) . '>' . $golongan->name . '</option>';
                                         }
                                    ?>
                                </select>
                            </div>
                            <div class="input-group col-sm-3">                                                          
                                <label>
                                    <input type="checkbox" class="minimal" value="1" name="x_pengambilan_sumpah" id="x_pengambilan_sumpah" <?php echo ( $rs->data->pengambilan_sumpah == 1 ? 'checked="checked"' : '' )?>>
                                    Pengambilan Sumpah
                                </label>                                 
                            </div>      
                        </div>
                        
                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">Upload SKPNS</label>
                            <div class="col-sm-9">
                                <div id="mulitplefileuploader_<?php echo $module; ?>" >Upload</div>
                                <input type="hidden" name="x_file_<?php echo $module; ?>" id="x_file_<?php echo $module; ?>" value="<?php echo $rs->data->sk_pns; ?>">
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

<script type="text/javascript">
    var module = '<?php echo $module; ?>';
</script>
<!-- Constanta -->
<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('static')?>/plugins/iCheck/icheck.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('static');?>/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url('static');?>/custom/skpns.js"></script>
