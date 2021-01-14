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
                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">TMT. CPNS</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control pull-right" id="x_mulai_tanggal" name="x_mulai_tanggal" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tmt_cpns; ?>" placeholder="TMT. CPNS"> 
                    </div>        
                    <label for="input1" class="col-sm-2 control-label">Tgl. SK CPNS</label>
                    <div class="col-sm-2">        
                        <input type="text" class="form-control pull-right" id="x_tgl_keputusan" name="x_tgl_keputusan" placeholder="Tgl. Surat Keputusan" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tgl_sk_cpns; ?>">                                
                    </div><div class="col-sm-4">
                        <input type="text" name="x_no_surat_keputusan" id="x_no_surat_keputusan" class="form-control" placeholder="No. SK CPNS" value="<?php echo $rs->data->no_sk_cpns; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Tgl. Surat Dokter</label>                        
                    <div class="col-sm-2"> 
                        <input type="text" class="form-control pull-right" id="x_tgl_uji_kesehatan" name="x_tgl_uji_kesehatan" placeholder="Tgl. Uji Kesehatan" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tgl_surat_dokter_cpns; ?>">                                
                    </div>  
                    <label for="input1" class="col-sm-2 control-label">No. Surat Dokter</label>           
                    <div class="col-sm-6">
                        <input type="text" name="x_no_surat_uji_kesehatan" id="x_no_surat_uji_kesehatan" class="form-control" placeholder="No. Surat Uji Kesehatan" value="<?php echo $rs->data->no_surat_dokter_cpns; ?>">
                    </div>   
                    <?php /*
                    <div class="input-group col-sm-3">                                                          
                        <label>
                            <input type="checkbox" class="minimal" value="1" name="x_pengambilan_sumpah" id="x_pengambilan_sumpah" <?php echo ( $rs->data->pengambilan_sumpah == 1 ? 'checked="checked"' : '' )?>>
                            Pengambilan Sumpah
                        </label>                                 
                    </div> 
                    */?>
                </div>
                <hr>
                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">TMT. PNS</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control pull-right" id="x_mulai_tanggal_pns" name="x_mulai_tanggal_pns" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tmt_pns; ?>" placeholder="TMT. PNS"> 
                    </div>          
                    <label for="input1" class="col-sm-2 control-label">Tgl. SK PNS</label>
                    <div class="col-sm-2">        
                        <input type="text" class="form-control pull-right" id="x_tgl_keputusan_pns" name="x_tgl_keputusan_pns" placeholder="Tgl. SK PNS" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tgl_sk_pns; ?>">                                
                    </div><div class="col-sm-4">
                        <input type="text" name="x_no_surat_keputusan_pns" id="x_no_surat_keputusan_pns" class="form-control" placeholder="No. SK PNS" value="<?php echo $rs->data->no_sk_pns; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Tgl. Surat Dokter</label>                        
                    <div class="col-sm-2"> 
                        <input type="text" class="form-control pull-right" id="x_tgl_uji_kesehatan_pns" name="x_tgl_uji_kesehatan_pns" placeholder="Tgl. Uji Kesehatan PNS" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tgl_surat_dokter_pns; ?>">                                
                    </div>  
                    <label for="input1" class="col-sm-2 control-label">No. Surat Dokter</label>           
                    <div class="col-sm-6">
                        <input type="text" name="x_no_surat_uji_kesehatan_pns" id="x_no_surat_uji_kesehatan_pns" class="form-control" placeholder="No. Surat Uji Kesehatan PNS" value="<?php echo $rs->data->no_surat_dokter_pns; ?>">
                    </div>   
                    <?php /*
                    <div class="input-group col-sm-3">                                                          
                        <label>
                            <input type="checkbox" class="minimal" value="1" name="x_pengambilan_sumpah" id="x_pengambilan_sumpah" <?php echo ( $rs->data->pengambilan_sumpah == 1 ? 'checked="checked"' : '' )?>>
                            Pengambilan Sumpah
                        </label>                                 
                    </div> 
                    */?>
                </div>
                <?php /*
                <hr>
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
                          
                </div>
                <div class="form-group">
                        
                    <div class="input-group date col-sm-3">                                
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="x_tgl_keputusan" name="x_tgl_keputusan" placeholder="Tgl. Surat Keputusan" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tgl_surat_keputusan; ?>">                                
                    </div>      
                </div>    
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
                            <div class="input-group col-sm-3">                                                          
                                <label>
                                    <input type="checkbox" class="minimal" value="1" name="x_pengambilan_sumpah" id="x_pengambilan_sumpah" <?php echo ( $rs->data->pengambilan_sumpah == 1 ? 'checked="checked"' : '' )?>>
                                    Pengambilan Sumpah
                                </label>                                 
                            </div> 
                        </div>
                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">No. & Tgl. SKCK</label>
                            <div class="col-sm-5">
                                <input type="text" name="x_no_skck" id="x_no_skck" class="form-control" placeholder="No. SKCK" value="<?php echo $rs->data->nomor_skck; ?>">
                            </div>    
                            <div class="input-group date col-sm-3">                                
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="x_tgl_skck" name="x_tgl_skck" placeholder="Tgl. SKCK" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tgl_terbit_skck; ?>">                                
                            </div>      
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">Upload SKCPNS</label>
                            <div class="col-sm-9">
                                <div id="mulitplefileuploader_skcpns" >Upload</div>
                                <input type="hidden" name="x_file_skcpns" id="x_file_skcpns" value="<?php echo $rs->data->sk_cpns; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">Upload SKCK</label>
                            <div class="col-sm-9">
                                <div id="mulitplefileuploader_skck" >Upload</div>
                                <input type="hidden" name="x_file_skck" id="x_file_skck" value="<?php echo $rs->data->skck; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="overlay" id="container-loader-form" style="display:none;">
                            <i class="fa fa-refresh fa-spin"></i>
                            </div>
                        </div>
                    </div>
                </div>
                */
                ?>
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

<script src="<?php echo base_url('static');?>/custom/skcpns.js"></script>
