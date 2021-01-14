<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/iCheck/all.css">
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/datepicker/datepicker3.css">

<div class="box-body">

    <form id="form-add-user" name="form-add-user" class="form-horizontal">
        <input type="text" name="x_act_suamiistri" id="x_act_suamiistri" value="<?php echo $xAct ?>">
        <input type="text" name="x_act_suamiistri_id" id="x_act_suamiistri_id" value="<?php echo $rsProfile->data->encrypted_id; ?>">
        <div class="form-group">
            <label for="input1" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" id="x_add_nama" name="x_add_nama" class="form-control" value="<?php echo $rsProfile->data->name; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input1" class="col-sm-2 control-label">Gelar Depan</label>
            <div class="col-sm-4">
                <input type="text" name="x_add_gelar_depan" id="x_add_gelar_depan" class="form-control" value="<?php echo $rsProfile->data->gelar_depan; ?>">
            </div>
            <label for="input1" class="col-sm-2 control-label">Gelar Belakang</label>
            <div class="col-sm-4">
                <input type="text" name="x_add_gelar_belakang" id="x_add_gelar_belakang" class="form-control" value="<?php echo $rsProfile->data->gelar_belakang; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input1" class="col-sm-2 control-label">Tempat Lahir</label>
            <div class="col-sm-4">
                <input type="text" name="x_add_tempat_lahir" id="x_add_tempat_lahir" class="form-control" value="<?php echo $rsProfile->data->tempat_lahir; ?>">
            </div>
            <label for="input1" class="col-sm-2 control-label">Tanggal Lahir</label>
            <div class="col-sm-3 input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="x_add_tgl_lahir" id="x_add_tgl_lahir" class="form-control" data-date-format="dd-mm-yyyy" value="<?php echo $rsProfile->data->tanggal_lahir; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input1" class="col-sm-2 control-label">Jns. Kelamin</label>
            <div class="col-sm-4">
                <select id="x_add_jenis_kelamin" name="x_add_jenis_kelamin" class="form-control">
                    <option value="0">-Pilih-</option>
                    <option value="1" <?php echo ( $rsProfile->data->jenis_kelamin->id == 1 ? 'selected="selected"' : '' ); ?>>Pria</option>
                    <option value="2" <?php echo ( $rsProfile->data->jenis_kelamin->id == 2 ? 'selected="selected"' : '' ); ?>>Wanita</option>
                </select>
            </div>
            <label for="input1" class="col-sm-1 control-label">Agama</label>
            <div class="col-sm-5">
                <select id="x_add_agama" name="x_add_agama" class="form-control">
                    <option value="0">-Pilih-</option>
                    <?php 
                        foreach( $rsAgama->data as $dtAgama ){
                    ?>
                            <option value="<?php echo $dtAgama->id ?>" <?php echo ( $rsProfile->data->agama->id == $dtAgama->id ? 'selected="selected"' : '' ); ?> ><?php echo $dtAgama->name; ?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="input1" class="col-sm-2 control-label">NIK</label>
            <div class="col-sm-4">
                <input type="text" name="x_add_nik" id="x_add_nik" class="form-control validate[required]" value="<?php echo $rsProfile->data->nik; ?>">
            </div>
            <label for="input1" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-4">
                <input type="text" name="x_add_email" id="x_add_email" class="form-control" value="<?php echo $rsProfile->data->email; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input1" class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" name="x_add_alamat" id="x_add_alamat" class="form-control" value="<?php echo $rsProfile->data->alamat_tinggal; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input1" class="col-sm-2 control-label">No. HP</label>
            <div class="col-sm-4">
                <input type="text" name="x_add_no_hp" id="x_add_no_hp" class="form-control" value="<?php echo $rsProfile->data->no_hp; ?>">
            </div>
            <label for="input1" class="col-sm-2 control-label">No. Telp</label>
            <div class="col-sm-4">
                <input type="text" name="x_add_no_telp" id="x_add_no_telp" class="form-control" value="<?php echo $rsProfile->data->telepon; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input1" class="col-sm-2 control-label">Status Nikah</label>
            <div class="col-sm-5">
                <select id="x_add_status_nikah" name="x_add_status_nikah" class="form-control">
                    <option value="0">-Pilih-</option>
                    <?php 
                        foreach( $rsStatusNikah->data as $dtStatusNikah ){
                    ?>
                            <option value="<?php echo $dtStatusNikah->id ?>" <?php echo ( $rsProfile->data->status_pernikahan->id == $dtStatusNikah->id ? 'selected="selected"' : '' ); ?>><?php echo $dtStatusNikah->name; ?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="input1" class="col-sm-2 control-label">Akte Kelahiran</label>
            <div class="col-sm-4">
                <input type="text" name="x_add_akte_kelahiran" id="x_add_akte_kelahiran" class="form-control" value="<?php echo $rsProfile->data->akte_kelahiran; ?>">
            </div>
            <label for="input1" class="col-sm-2 control-label">Status Hidup</label>
            <div class="col-sm-4">
                <label>
                  <input type="checkbox" id="x_add_status_hidup" name="x_add_status_hidup" class="minimal" value="1" <?php echo ( $rsProfile->data->status_hidup == 1 ? 'checked="checked"' : '' ); ?>>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="input1" class="col-sm-2 control-label">Akte Meninggal</label>
            <div class="col-sm-4">
                <input type="text" name="x_add_akte_meninggal" id="x_add_akte_meninggal" class="form-control" value="<?php echo $rsProfile->data->akte_meninggal; ?>">
            </div>
            <label for="input1" class="col-sm-2 control-label">Tgl Meninggal</label>
            <div class="col-sm-3 input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="x_add_tgl_meninggal" id="x_add_tgl_meninggal" class="form-control" data-date-format="dd-mm-yyyy" value="<?php echo $rsProfile->data->tgl_meninggal; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input1" class="col-sm-2 control-label">No. NPWP</label>
            <div class="col-sm-4">
                <input type="text" name="x_add_no_npwp" id="x_add_no_npwp" class="form-control" value="<?php echo $rsProfile->data->no_npwp; ?>">
            </div>
            <label for="input1" class="col-sm-2 control-label">Tgl NPWP</label>
            <div class="col-sm-4">
                <input type="text" name="x_add_tgl_npwp" id="x_add_tgl_npwp" class="form-control" value="<?php echo $rsProfile->data->tgl_npwp; ?>">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
            <button type="submit" class="btn btn-success">SIMPAN</button>
        </div>
    </form>
</div>

<!-- Constanta -->
<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('static')?>/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('static');?>/plugins/fastclick/fastclick.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('static');?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url('static');?>/custom/user.js"></script>