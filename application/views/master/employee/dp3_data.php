<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-message-add-edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">POP UP MESSAGE</h4>
            </div>
            <div class="modal-body" id="container-popup-message-addedit"></div>
            <div class="modal-footer">
                <button type="button" id="btn-close-modal-dp3" class="btn btn-primary">TUTUP</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-frm-add-user">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">TAMBAH DATA</h4>                
            </div>
            <div class="modal-body" id="container-add-user">
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-frm-user">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">CARI USER</h4>                
            </div>
            <div class="modal-body" id="container-user-list">
                
            </div>
        </div>
    </div>
</div>

 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-dp3">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI</h4>
            </div>
            <form class="form-horizontal" id="form-confirm" name="form-confirm">
                <input type="hidden" id="x_confirm_id_dp3" name="x_confirm_id_dp3">
                <div class="modal-body" id="modal-body-confirm-msg-dp3"></div>
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
                <h4 class="modal-title" id="gridSystemModalLabel">FORM TAMBAH DP3</h4>                
            </div>
            <form id="form-submit-dp3" name="form-submit-dp3" class="form-horizontal">
                <input type="hidden" name="x_id" id="x_id" value="<?php echo $id; ?>">
                <input type="hidden" name="x_dp3_id" id="x_dp3_id" value="">
                <input type="hidden" name="x_act" id="x_act" value="add">
            
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Jenis Jabatan</label>
                                <div class="col-sm-6">
                                    <select id="x_addedit_jenis_jabatan" name="x_addedit_jenis_jabatan" class="form-control">
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
                                <div class="col-sm-3">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tahun</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_tahun" id="x_addedit_tahun">
                                </div>
                                <div class="col-sm-7"></div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Kesetiaan</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_kesetiaan" id="x_addedit_kesetiaan">
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="x_addedit_kesetiaan_desc" id="x_addedit_kesetiaan_desc">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Tanggung Jawab</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_tanggung_jawab" id="x_addedit_tanggung_jawab">
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="x_addedit_tanggung_jawab_desc" id="x_addedit_tanggung_jawab_desc">
                                </div>
                            </div>    
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Kejujuran</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_kejujuran" id="x_addedit_kejujuran">
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="x_addedit_kejujuran_desc" id="x_addedit_kejujuran_desc">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Prakarsa</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_prakarsa" id="x_addedit_prakarsa">
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="x_addedit_prakarsa_desc" id="x_addedit_prakarsa_desc">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Prestasi Kerja</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_prestasi_kerja" id="x_addedit_prestasi_kerja">
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="x_addedit_prestasi_kerja_desc" id="x_addedit_prestasi_kerja_desc">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Ketaatan</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_ketaatan" id="x_addedit_ketaatan">
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="x_addedit_ketaatan_desc" id="x_addedit_ketaatan_desc">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Kerjasama</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_kerjasama" id="x_addedit_kerjasama">
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="x_addedit_kerjasama_desc" id="x_addedit_kerjasama_desc">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Kepemimpinan</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_kepemimpinan" id="x_addedit_kepemimpinan">
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="x_addedit_kepemimpinan_desc" id="x_addedit_kepemimpinan_desc">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Jumlah</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_jumlah" id="x_addedit_jumlah">
                                </div>
                                <div class="col-sm-7">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Nilai Rata-Rata</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="x_addedit_nilai_rata" id="x_addedit_nilai_rata">
                                </div>
                                <div class="col-sm-7">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Pejabat Penilai</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="x_addedit_pejabat_penilai_name" id="x_addedit_pejabat_penilai_name" disabled="disabled">
                                    <input type="hidden" class="form-control" name="x_addedit_pejabat_penilai_id" id="x_addedit_pejabat_penilai_id">
                                </div>
                                <div class="col-sm-3">
                                    <a href="#" class="btn btn-success btn-md" name="btn-search-user" data-toggle="modal" data-target="#modal-frm-user">Cari</a> 
                                </div>
                            </div>

                            <?php /*
                            <div class="form-group">
                                <label for="input1" class="col-sm-3 control-label">Atasan Pejabat Penilai</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="x_addedit_atasan_pejabat_penilai_name" id="x_addedit_atasan_pejabat_penilai_name" disabled="disabled">
                                    <input type="hidden" class="form-control" name="x_addedit_atasan_pejabat_penilai_id" id="x_addedit_atasan_pejabat_penilai_id">
                                </div>
                                <div class="col-sm-3">
                                    <a href="#" class="btn btn-success btn-md" name="btn-search-user" data-toggle="modal" data-target="#modal-frm-user">Cari</a> 
                                </div>
                            </div>*/?>

                            
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
    <p class="pull-right">
        <button type="button" id="btn-add-dp3" class="btn btn-primary" data-toggle="modal" data-target="#modal-frm-add-edit" ><i class="glyphicon glyphicon-plus"></i>&nbsp;TAMBAH</button>
    </p>
    <br>
    <table id="dt-table-dp3" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Nilai Rata-rata</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Pejabat Penilai</th>
                <th>Action</th>               
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Tahun</th>
                <th>Nilai Rata-rata</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Pejabat Penilai</th>
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
<script src="<?php echo base_url('static');?>/custom/dp3.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        loadDataTableDP3( $('#x_id').val() );

        $('#dt-table-dp3 tbody').on( 'click', 'a[name="link-edit-dp3"]', function(){
            var arrData = $(this).attr('data').toString().split(dataSeparator);
            $('#x_dp3_id').val(arrData[0]);
            $('#x_addedit_jenis_jabatan').val( arrData[2] );
            $('#x_addedit_tahun').val( arrData[3] );
            $('#x_addedit_kesetiaan').val( arrData[4] );
            $('#x_addedit_tanggung_jawab').val( arrData[6] );
            $('#x_addedit_kejujuran').val( arrData[8] );
            $('#x_addedit_prakarsa').val( arrData[10] );
            $('#x_addedit_prestasi_kerja').val( arrData[12] );
            $('#x_addedit_ketaatan').val( arrData[14] );
            $('#x_addedit_kerjasama').val( arrData[16] );
            $('#x_addedit_kepemimpinan').val( arrData[18] );
            $('#x_addedit_jumlah').val( arrData[20] );
            $('#x_addedit_nilai_rata').val( arrData[21] );

            $('#x_addedit_pejabat_penilai_id').val( arrData[23] );
            $('#x_addedit_pejabat_penilai_name').val( arrData[24] );

            $('#x_act').val('edit');
        } );

        $('#dt-table-dp3').on( 'click', 'a[name="link-delete-dp3"]', function(){
            alert($(this).attr('data'));
            $('#x_confirm_id_dp3').val($(this).attr('data'));
            $('#modal-body-confirm-msg-dp3').html('Anda yakin ingin menghapus data ini?');
        } );

        $("form#form-submit-dp3").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {
                    // alert($("form#form-add-user").serialize());
                    $.ajax({

                        type        : 'POST',
                        url         : indexURL + '/employee/saveDP3',
                        data        : $("form#form-submit-dp3").serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-frm-add-edit').modal('hide');},
                        success     : function(data){                             
                                        
                                        $('#modal-loader').modal('hide'); 
                                        if( data.status_code == "00" ){ 
                                            $('#modal-message-add-edit').modal('show');                                    
                                            $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            $(this).trigger('reset');
                                            loadDataTableDP3( $('#x_id').val() );
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

        $('#btn-add-dp3').click(function(){
            $('form#form-submit-dp3').trigger('reset');
            $('#x_act').val('add');
        });

        $('#btn-close-modal-dp3').click(function(){
            $('#modal-message-add-edit').modal('hide');            
            //$('#modal-frm-add-edit').modal('show');
            loadDataTableDP3($('#x_id').val());
            
        });

        $('a[name="btn-search-user"]').click(function(){
            $('#modal-frm-add-edit').modal('hide');
            loadDataTableUser();
        });

    }); 
</script>