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
                            <label for="input1" class="col-sm-6 control-label">Tgl. Pensiun & TMT Pensiun</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control pull-right" id="x_tgl_pensiun" name="x_tgl_pensiun" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tgl_pensiun; ?>" placeholder="Tgl. Pensiun"> 
                            </div>        
                            <div class="col-sm-3">
                                <input type="text" class="form-control pull-right" id="x_tmt_pensiun" name="x_tmt_pensiun" data-date-format="yyyy-mm-dd" value="<?php echo $rs->data->tmt_pensiun; ?>" placeholder="TMT Pensiun"> 
                            </div>  
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">No. SK Pensiun</label>
                            <div class="col-sm-9">
                                <input type="text" name="x_no_sk_pensiun" id="x_no_sk_pensiun" class="form-control" placeholder="No. SK Pensiun" value="<?php echo $rs->data->no_sk_pensiun; ?>">
                            </div>        
                        </div>

                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">No. BKN & Tgl. BKN</label>
                            <div class="col-sm-6">
                                <input type="text" name="x_no_bkn" id="x_no_bkn" class="form-control" placeholder="No. BKN" value="<?php echo $rs->data->no_bkn; ?>">
                            </div>     
                            <div class="col-sm-3">
                                <input type="text" name="x_tgl_bkn" id="x_tgl_bkn" class="form-control" placeholder="Tgl. BKN" value="<?php echo $rs->data->tgl_bkn; ?>">
                            </div>      
                        </div>
                        
                        <div class="form-group">
                            <label for="input1" class="col-sm-3 control-label">Golongan & Unit Kerja</label>
                            <div class="col-sm-5">
                                <select id="x_golongan_id" name="x_golongan_id" class="form-control">
                                    <option value="0">-Silahkan Pilih-</option>
                                    <?php 
                                        $arrGolongan = $rsGolongan->data;
                                        foreach ($arrGolongan as $golongan) {
                                             echo '<option value="' . $golongan->id . '" ' . ( $golongan->id == $rs->data->golongan_id ? 'selected="selected"' : '' ) . '>' . $golongan->name . '</option>';
                                         }
                                    ?>
                                </select>
                            </div>    
                            <div class="col-sm-4">
                                <select id="x_unit_kerja_id" name="x_unit_kerja_id" class="form-control">
                                    <?php 
                                    echo $option;
                                    ?>
                                </select>
                            </div>       
                        </div>                        
                        
                        <div class="form-group" id="container-support-name">
                            <label for="input1" class="col-sm-3 control-label">Masa Kerja (Thn & Bulan)</label>
                            <div class="col-sm-3">
                                <select name="x_masa_kerja_thn" id="x_masa_kerja_thn" class="form-control">
                                    <option value="0">- Silahkan Pilih -</option>
                                    <?php 
                                        $startYear = (int)date('Y');
                                        for( $i = $startYear; $i > 1970; $i-- ){
                                            echo '<option value="' . $i . '" ' . ( $i == $rs->data->masa_kerja_thn ? 'selected="selected"' : '' ) . '>' . $i . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select name="x_masa_kerja_bln" id="x_masa_kerja_bln" class="form-control">
                                    <option value="0" selected>- Silahkan Pilih -</option>
                                    <option value="1" <?php echo ( $rs->data->masa_kerja_bln == 1 ? 'selected="selected"' : '' ) ?>>Januari</option>
                                    <option value="2" <?php echo ( $rs->data->masa_kerja_bln == 2 ? 'selected="selected"' : '' ) ?>>Februari</option>
                                    <option value="3" <?php echo ( $rs->data->masa_kerja_bln == 3 ? 'selected="selected"' : '' ) ?>>Maret</option>
                                    <option value="4" <?php echo ( $rs->data->masa_kerja_bln == 4 ? 'selected="selected"' : '' ) ?>>April</option>
                                    <option value="5" <?php echo ( $rs->data->masa_kerja_bln == 5 ? 'selected="selected"' : '' ) ?>>Mei</option>
                                    <option value="6" <?php echo ( $rs->data->masa_kerja_bln == 6 ? 'selected="selected"' : '' ) ?>>Juni</option>
                                    <option value="7" <?php echo ( $rs->data->masa_kerja_bln == 7 ? 'selected="selected"' : '' ) ?>>Juli</option>
                                    <option value="8" <?php echo ( $rs->data->masa_kerja_bln == 8 ? 'selected="selected"' : '' ) ?>>Agustus</option>
                                    <option value="9" <?php echo ( $rs->data->masa_kerja_bln == 9 ? 'selected="selected"' : '' ) ?>>September</option>
                                    <option value="10" <?php echo ( $rs->data->masa_kerja_bln == 10 ? 'selected="selected"' : '' ) ?>>Oktober</option>
                                    <option value="11" <?php echo ( $rs->data->masa_kerja_bln == 11 ? 'selected="selected"' : '' ) ?>>November</option>
                                    <option value="12" <?php echo ( $rs->data->masa_kerja_bln == 12 ? 'selected="selected"' : '' ) ?>>Desember</option>
                                </select>
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
            <?php /*
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            */?>
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

<script src="<?php echo base_url('static');?>/custom/skpensiun.js"></script>
