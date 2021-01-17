<link href="<?php echo base_url('static');?>/plugins/jquery-upload-file/uploadfile.css" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<!-- Content Header (Page header) -->

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-upload-photo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">UPLOAD PHOTO</h4>
            </div>
            <form class="form-horizontal" id="form-upload-photo" name="form-upload-photo">
                <div id="mulitplefileuploader_photoProfile" >Upload</div>
                <input type="hidden" name="x_photo_profile" id="x_photo_profile" value="">
                <input type="hidden" name="x_id_update_photo" id="x_id_update_photo" value="<?php echo $id?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
            </form>

        </div>
    </div>
</div>

<section class="content-header">
  <h1>
    PROFILE
    <small>SIMPEG - Profile</small>
  </h1>
  <br>
  <p>
    <a href="<?php echo base_url(); ?>index.php/dashboard" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i>Back to Dashboard</a>
  </p>
  <?php /*
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Home</a></li>
    <li class="active">Dashboard</li>
  </ol>*/?>
</section>

<!-- Main content -->
<section class="content">

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
                    <button type="button" id="btn-close" class="btn btn-primary">TUTUP</button>
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
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-user">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI</h4>
                </div>
                <form class="form-horizontal" id="form-confirm-user" name="form-confirm-user">
                    <input type="hidden" id="x_confirm_id" name="x_confirm_id">
                    <input type="hidden" id="x_nid" name="x_nid" value="<?php echo $nid; ?>">
                    <input type="hidden" id="x_confirm_type" name="x_confirm_type">
                    <div class="modal-body" id="modal-body-confirm-msg"></div>
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
  
    <div class="row">
        
        <!-- Profile Left -->
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-upload-photo">UPLOAD PHOTO</button>
                    <br>
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo (  $data['picture'] == "" ? CONST_IMG_PROFILE_DEFAULT :  CONST_IMG_PROFILE . $data['picture'] ) ?>" alt="User profile picture" id="x_img_photo_profile">

                    <h3 class="profile-username text-center">
                        <?php 
                            $xFullName = $data['name'];
                            if( $data['gelar_depan'] != '' ){
                                $xFullName = $data['gelar_depan'] . ' ' . $xFullName;
                            }
                            if( $data['gelar_belakang'] != '' ){
                                $xFullName = $xFullName . ' ' . $data['gelar_belakang'];
                            }
                            echo $xFullName;
                        ?>
                    </h3>

                    <p class="text-muted text-center"><?php echo $data['nip']?></p>

                    <table class="table table-bordered table-striped" id="dt-table-left">
                        <tr>
                            <td>
                                <b>UNIT KERJA</b><br>
                                <?php echo $data['unor']['name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>JENIS JABATAN</b><br>
                                <?php echo $data['jenis_pegawai']['name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>STATUS PEGAWAI</b><br>
                                <a><?php echo $data['status_pegawai']['name'] ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>JENIS PEGAWAI</b><br>
                                <?php echo $data['jenis_pegawai']['name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>KEDUDUKAN</b><br>
                                <?php echo $data['kedudukan']['name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>MASA KERJA</b><br>
                                <?php  
                                    if( $data['masa_kerja_tahun'] != 0 && $data['masa_kerja_bulan'] != 0 ){
                                        echo $data['masa_kerja_tahun'] . " Tahun " . $data['masa_kerja_bulan'] . " Bulan";
                                    }   
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <!-- Profile Left -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#pegawai" data-toggle="tab">Pegawai</a></li>
                    <li><a href="#riwayat_pegawai" data-toggle="tab" name="link-riwayat-pegawai" data="<?php echo $id; ?>">Riwayat Pegawai</a></li>
                    <li><a href="#keluarga" data-toggle="tab" name="link-keluarga" data="<?php echo $id; ?>" data-type="1">Keluarga</a></li>
                    <li><a href="#pendidikan" data-toggle="tab" data="<?php echo $id; ?>" name="link-riwayat-pendidikan">Pendidikan</a></li>
                    <li><a href="#upload_file" data-toggle="tab" data="<?php echo $id; ?>" name="link-upload-file">Upload File</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="pegawai">
                        
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#pegawai_identitas" data-toggle="tab">Identitas</a></li>
                                <li><a href="#pegawai_pengalaman_kerja" name="link-pengalaman-kerja" data-toggle="tab" data="<?php echo $id; ?>">Pengalaman Kerja</a></li>
                                <?php /*
                                <li><a href="#pegawai_sk_cpns" data-toggle="tab" name="link-sk-cpns" data="<?php echo $id; ?>">SK CPNS & PNS</a></li>
                                */?>
                                <li><a href="#pegawai_sk_pensiun" data-toggle="tab" name="link-sk-pensiun" data="<?php echo $id; ?>">SK PENSIUN</a></li>
                                <li><a href="#pegawai_pmk" data-toggle="tab" name="link-pmk" data="<?php echo $id; ?>">PMK</a></li>

                                <?php /*
                                <li><a href="#pegawai_dp3" data-toggle="tab" name="link-dp3" data="<?php echo $id; ?>">DP3</a></li>
                                */?>

                                <li><a href="#pegawai_hukdis" data-toggle="tab" name="link-hukdis" data="<?php echo $id; ?>">Hukdis</a></li>
                                <li><a href="#pegawai_pwk" data-toggle="tab" name="link-pwk" data="<?php echo $id; ?>">PWK</a></li>
                                <li><a href="#pegawai_pindahinstansi" data-toggle="tab" name="link-pindahinstansi" data="<?php echo $id; ?>">P. Instansi</a></li>
                                <li><a href="#pegawai_cltn" data-toggle="tab" name="link-cltn" data="<?php echo $id; ?>">CLTN</a></li>
                                <li><a href="#pegawai_cpnspns" data-toggle="tab" name="link-cpnspns" data="<?php echo $id; ?>">CPNS/PNS</a></li>
                                <li><a href="#pegawai_profesi" data-toggle="tab" name="link-profesi" data="<?php echo $id; ?>">Profesi</a></li>
                                <li><a href="#pegawai_historyunor" data-toggle="tab" name="link-historyunor" data="<?php echo $id; ?>">PNS Unor</a></li>
                                <li><a href="#pegawai_historypemberhentian" data-toggle="tab" name="link-historypemberhentian" data="<?php echo $id; ?>">Pemberhentian</a></li>
                                <li><a href="#pegawai_historyangkakredit" data-toggle="tab" name="link-historyangkakredit" data="<?php echo $id; ?>">Angka Kredit</a></li>
                                <li><a href="#pegawai_skp" data-toggle="tab" name="link-skp" data="<?php echo $id; ?>">SKP</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="pegawai_identitas">
                                    <form id="form-submit-box-1" name="form-submit-box-1" class="form-horizontal">
                                        <input type="hidden" name="x_id_update_profile" id="x_id_update_profile" value="<?php echo $id ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"><strong>IDENTITAS</strong></h3>
                                                </div>
                                                <?php if( $isHasUpdateData == 1 && ( $this->session->userdata['SESSION_SIMPEG_D'] == 1 || $this->session->userdata['SESSION_SIMPEG_D'] == 3 ) ){ ?>
                                                    <div class="callout callout-warning">
                                                        <h4>Anda baru saja merubah data profile anda dan saat ini masih dalam proses review oleh Admin.</h4>
                                                        <p>Untuk melihat detail perubahan, silahkan klik <a href="#" data="<?php echo $id; ?>" name="link-open-updated-data" data-toggle="modal" data-target="#modal-update-data-pending">di sini.</a></p>
                                                    </div>
                                                <?php } ?>

                                                <?php if( $isHasUpdateData == 0 && ( $this->session->userdata['SESSION_SIMPEG_D'] == 2 ) ){ ?>
                                                    <div class="callout callout-<?php echo ( $confirmStatus == 1 ? 'success' : 'warning' ) ?>">
                                                        <h4>Anda terakhir melakukan request perubahan pada <strong><?php echo $requestAt ?></strong>.</h4>
                                                        <p>Request anda telah di <strong><?php echo ($confirmStatus == 1 ? 'SETUJUI' : 'DITOLAK') ?></strong> pada tanggal <strong><?php echo $confirmAt ?></strong> <?php echo ( $confirmStatus == 1 ? '' : 'dengan alasan :' ) ?> </p>
                                                        <p><i><?php echo $reason ?></i></p>
                                                        <p>Perubahan data anda telah ditanggapi oleh <strong><?php echo $userConfirm; ?></strong></p>
                                                    </div>
                                                <?php } ?>

                                                <div class="col-md-6">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">NIK</label>
                                                                <input type="text" disabled class="form-control" id="" value="<?php echo $data['nik'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tempat Lahir</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['tempat_lahir'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Tgl. Lahir</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['tanggal_lahir'] ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-3">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Agama</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['agama']['name'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email</label>
                                                            <input type="text" class="form-control" name="x_email" id="x_email" value="<?php echo $data['email'] ?>" <?php echo ( $isHasUpdateData == 1 ? 'disabled="disabled"' : '' ); ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Jenis Kelamin</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['jenis_kelamin']['name'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Alamat Tinggal</label>
                                                                <textarea class="form-control" rows="3" name="x_alamat_tinggal" id="x_alamat_tinggal" <?php echo ( $isHasUpdateData == 1 ? 'disabled' : '' ); ?>><?php echo $data['alamat_tinggal'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Alamat KTP</label>
                                                                <textarea class="form-control" rows="3" name="x_alamat_ktp" id="x_alamat_ktp" <?php echo ( $isHasUpdateData == 1 ? 'disabled' : '' ); ?>><?php echo $data['alamat_ktp'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="">No. Telp</label>
                                                            <input type="text" class="form-control" name="x_telepon" id="x_telepon" value="<?php echo $data['telepon'] ?>" <?php echo ( $isHasUpdateData == 1 ? 'disabled="disabled"' : '' ); ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">No. Hp</label>
                                                            <input type="text" class="form-control" name="x_hp" id="x_hp" value="<?php echo $data['no_hp'] ?>" <?php echo ( $isHasUpdateData == 1 ? 'disabled="disabled"' : '' ); ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Jenis Pegawai</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['jenis_pegawai']['name'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-8">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="">Kedudukan PNS</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['kedudukan']['name'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="">Status Pegawai</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['status_pegawai']['name'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-3">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="">TMT PNS</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['tmt_pns'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="">Karpeg</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['kartu_pegawai'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="">TMT CPNS</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['tmt_cpns'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-4">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="">Tingkat Pendidikan</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['tingkat_pendidikan']['name'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="">Diktat Struktural</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['diktat_struktural'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-8">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="">Pendidikan Terakhir</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['pendidikan_jurusan']['name'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="">Tahun Lulus</label>
                                                            <input type="text" disabled class="form-control" id="" value="<?php echo $data['tahun_lulus'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                        
                                            <div class="col-md-9"></div>
                                            <div class="col-md-3">
                                                <div class="box-footer">
                                                    <button type="submit" id="btn-submit-box-1" class="btn btn-primary" <?php echo ( $isHasUpdateData == 1 ? 'disabled' : '' ); ?>><i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;SIMPAN</button>
                                                    <button type="button" id="btn_go_to_2" class="btn btn-success">LANJUT&nbsp;<i class="glyphicon glyphicon-arrow-right"></i></button>
                                                </div>
                                            </div>
                                            
                                        </div>        
                                    </form>
                                    <div class="row" id="box_identitas_2" style="display:none;">
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-2">
                                                    <label for="exampleInputPassword1">Instansi Induk</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['instansi_kerja_kode_cepat'] ?>">
                                                </div>
                                                <div class="col-md-4">  
                                                    <label for="exampleInputPassword1">&nbsp;</label>                                 
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['instansi_induk']['name'] ?>">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="exampleInputPassword1">Instansi Kerja</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['instansi_kerja_kode_cepat'] ?>">
                                                </div>
                                                <div class="col-md-4">  
                                                    <label for="exampleInputPassword1">&nbsp;</label>                                 
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['instansi_kerja']['name'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-6">
                                                    <label for="exampleInputPassword1">Satuan Kerja Induk</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['satuan_kerja_induk']['name'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleInputPassword1">Satuan Kerja</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['satuan_kerja']['name'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-3">
                                                    <label for="exampleInputPassword1">Kanreg</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['kanreg']['code'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleInputPassword1">&nbsp;</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['kanreg']['name'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-6">
                                                    <label for="exampleInputPassword1">Unit Organisasi</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['unor']['name'] ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="exampleInputPassword1">Eselon</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['eselon']['name'] ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="exampleInputPassword1">TMT Eselon</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['tmt_eselon'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-12">
                                                    <label for="exampleInputPassword1">Unit Organisasi Induk</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['unor_induk']['name'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Jenis Jabatan</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['tipe_pegawai']['name'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Jabatan Struktural</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['jabatan_struktural']['name'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">TMT Jabatan Struktural</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['tmt_jabatan'] ?>">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-8">
                                                    <label for="exampleInputPassword1">Jabatan Fungsional</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['jabatan_fungsional']['name'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">TMT Jabatan Fungsional</label>
                                                    <input type="text" disabled class="form-control" id="" value="">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-8">
                                                    <label for="exampleInputPassword1">Jabatan Fungsional Umum</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['jabatan_fungsional_umum']['name'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">TMT Jabatan Fungsional Umum</label>
                                                    <input type="text" disabled class="form-control" id="" value="">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-8">
                                                    <label for="exampleInputPassword1">Lokasi Kerja</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['lokasi_kerja'] ?>">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Golongan Ruang Awal</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['golongan_ruang_awal']['name'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Golongan Ruang Akhir</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['golongan_ruang_akhir']['name'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">TMT Golongan</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['tmt_golongan_akhir'] ?>">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Gaji Pokok</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['golongan_ruang_awal']['name'] ?>">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="exampleInputPassword1">Masa Kerja (Thn/Bln)</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['masa_kerja_tahun']?>">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="exampleInputPassword1">&nbsp;</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['masa_kerja_bulan']?>">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">KPPN</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['kppn']['name'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">KTUA</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['ktua']['name']?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">TASPEN</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['taspen']['name']?>">
                                                </div>
                                            </div>                                            
                                        </div>


                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="box-footer">
                                                    <button type="button" id="btn_back_to_1" class="btn btn-warning"><i class="glyphicon glyphicon-arrow-left"></i>&nbsp;SEBELUMNYA</button>
                                                </div>
                                            </div>
                                            <div class="col-md-8"></div>
                                            <div class="col-md-2">
                                                <div class="box-footer">
                                                    <button type="button" id="btn_go_to_3" class="btn btn-primary">SELANJUTNYA&nbsp;<i class="glyphicon glyphicon-arrow-right"></i></button>
                                                </div>
                                            </div>
                                            
                                        </div>                                 
                                    </div>

                                    <div class="row" id="box_identitas_3" style="display:none;">
                                        <div class="col-md-12">
                                            <div class="box-header with-border">
                                                <h3 class="box-title"><strong>DATA LAINNYA</strong></h3>
                                            </div>
                                        </div>   
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Status Menikah</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['status_pernikahan']['name'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Jml. Istri / Suami</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['jml_istri_suami'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Jml. Anak</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['jml_anak'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-8">
                                                    <label for="exampleInputPassword1">No. Surat Ket. Sehat Dokter</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['no_surat_ket_dokter'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Tgl.</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['tgl_surat_ket_dokter'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-8">
                                                    <label for="exampleInputPassword1">No. Surat Ket. Bebas Narkoba</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['no_surat_ket_bebas_narkoba'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Tgl.</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['tgl_surat_ket_bebas_narkoba'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-8">
                                                    <label for="exampleInputPassword1">No. Surat Keterangan Catatan Kepolisian</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['skck'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Tgl.</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['tgl_skck'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-8">
                                                    <label for="exampleInputPassword1">Akte Kelahiran</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['akte_kelahiran'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Status Hidup</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo ( $data['status_hidup'] == 1 ? "Hidup" : "Meninggal" ) ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-8">
                                                    <label for="exampleInputPassword1">Akte Meninggal</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['akte_meninggal'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Tgl. Meninggal</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['tgl_meninggal'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-8">
                                                    <label for="exampleInputPassword1">No. ASKES</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['askes_atau_bpjs'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Tgl. TASPEN</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['no_taspen'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="col-md-8">
                                                    <label for="exampleInputPassword1">No. NPWPW</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['no_npwp'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputPassword1">Tgl. NPWP</label>
                                                    <input type="text" disabled class="form-control" id="" value="<?php echo $data['tgl_npwp'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="box-footer">
                                                    <button type="button" id="btn_back_to_2" class="btn btn-warning"><i class="glyphicon glyphicon-arrow-left"></i>&nbsp;SEBELUMNYA</button>
                                                </div>
                                            </div>
                                            <div class="col-md-8"></div>
                                            <div class="col-md-2">
                                            </div>
                                            
                                        </div>                                 
                                    </div>                                   
                                    

                                </div>
                                <div class="tab-pane" id="pegawai_pengalaman_kerja">

                                </div>

                                <?php /*
                                <div class="tab-pane" id="pegawai_sk_cpns">
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
                                                            <input type="text" class="form-control pull-right" id="x_mulai_tanggal" name="x_mulai_tanggal" data-date-format="yyyy-mm-dd" value="<?php echo $data['tmt_cpns']; ?>" placeholder="TMT. CPNS"> 
                                                        </div>        
                                                        <label for="input1" class="col-sm-2 control-label">Tgl. SK CPNS</label>
                                                        <div class="col-sm-2">        
                                                            <input type="text" class="form-control pull-right" id="x_tgl_keputusan" name="x_tgl_keputusan" placeholder="Tgl. Surat Keputusan" data-date-format="yyyy-mm-dd" value="<?php echo $data['tgl_sk_cpns']; ?>">                                
                                                        </div><div class="col-sm-4">
                                                            <input type="text" name="x_no_surat_keputusan" id="x_no_surat_keputusan" class="form-control" placeholder="No. SK CPNS" value="<?php echo $data['no_sk_cpns']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input1" class="col-sm-2 control-label">Tgl. Surat Dokter</label>                        
                                                        <div class="col-sm-2"> 
                                                            <input type="text" class="form-control pull-right" id="x_tgl_uji_kesehatan" name="x_tgl_uji_kesehatan" placeholder="Tgl. Uji Kesehatan" data-date-format="yyyy-mm-dd" value="<?php echo $data['tgl_surat_dokter_cpns']; ?>">                                
                                                        </div>  
                                                        <label for="input1" class="col-sm-2 control-label">No. Surat Dokter</label>           
                                                        <div class="col-sm-6">
                                                            <input type="text" name="x_no_surat_uji_kesehatan" id="x_no_surat_uji_kesehatan" class="form-control" placeholder="No. Surat Uji Kesehatan" value="<?php echo $data['no_surat_dokter_cpns']; ?>">
                                                        </div>   
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <label for="input1" class="col-sm-2 control-label">TMT. PNS</label>
                                                        <div class="col-sm-2">
                                                            <input type="text" class="form-control pull-right" id="x_mulai_tanggal_pns" name="x_mulai_tanggal_pns" data-date-format="yyyy-mm-dd" value="<?php echo $data['tmt_pns']; ?>" placeholder="TMT. PNS"> 
                                                        </div>          
                                                        <label for="input1" class="col-sm-2 control-label">Tgl. SK PNS</label>
                                                        <div class="col-sm-2">        
                                                            <input type="text" class="form-control pull-right" id="x_tgl_keputusan_pns" name="x_tgl_keputusan_pns" placeholder="Tgl. SK PNS" data-date-format="yyyy-mm-dd" value="<?php echo $data['tgl_sk_pns']; ?>">                                
                                                        </div><div class="col-sm-4">
                                                            <input type="text" name="x_no_surat_keputusan_pns" id="x_no_surat_keputusan_pns" class="form-control" placeholder="No. SK PNS" value="<?php echo $data['no_sk_pns']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input1" class="col-sm-2 control-label">Tgl. Surat Dokter</label>                        
                                                        <div class="col-sm-2"> 
                                                            <input type="text" class="form-control pull-right" id="x_tgl_uji_kesehatan_pns" name="x_tgl_uji_kesehatan_pns" placeholder="Tgl. Uji Kesehatan PNS" data-date-format="yyyy-mm-dd" value="<?php echo $data['tgl_surat_dokter_pns']; ?>">                                
                                                        </div>  
                                                        <label for="input1" class="col-sm-2 control-label">No. Surat Dokter</label>           
                                                        <div class="col-sm-6">
                                                            <input type="text" name="x_no_surat_uji_kesehatan_pns" id="x_no_surat_uji_kesehatan_pns" class="form-control" placeholder="No. Surat Uji Kesehatan PNS" value="<?php echo $data['no_surat_dokter_pns']; ?>">
                                                        </div>                                                           
                                                    </div>
                                                    
                                                </div>
                                            </form>

                                    </div>
                                </div>
                                */?>
                                <div class="tab-pane" id="pegawai_sk_pns">

                                </div>
                                <div class="tab-pane" id="pegawai_sk_pensiun">

                                </div>
                                <div class="tab-pane" id="pegawai_pmk">

                                </div>

                                <?php /*
                                <div class="tab-pane" id="pegawai_dp3">

                                </div>
                                */?>
                                <div class="tab-pane" id="pegawai_hukdis">

                                </div>
                                <div class="tab-pane" id="pegawai_pwk">

                                </div>
                                <div class="tab-pane" id="pegawai_pindahinstansi">

                                </div>
                                <div class="tab-pane" id="pegawai_cltn">

                                </div>
                                <div class="tab-pane" id="pegawai_cpnspns">
                                    <div class="box-body">
                                        <form id="form-submit-cpnspns" name="form-submit-cpnspns" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="input1" class="col-sm-3 control-label">Status Kepeg</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="x_addedit_cpnspns_status_kepeg" id="x_addedit_cpnspns_status_kepeg" value="<?php echo $data['status_pegawai']['name']; ?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input1" class="col-sm-2 control-label">TMT CPNS</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_tmt_cpns" id="x_addedit_cpnspns_tmt_cpns" data-date-format="dd-mm-yyyy" value= "<?php echo $data['tmt_cpns']; ?>">
                                                </div>
                                                <label for="input1" class="col-sm-2 control-label">Tgl. SK CPNS</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_sk_cpns" id="x_addedit_cpnspns_tgl_sk_cpns" data-date-format="dd-mm-yyyy" value= "<?php echo $data['tgl_sk_cpns']; ?>">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_no_sk_cpns" id="x_addedit_cpnspns_no_sk_cpns" placeholder="No. SK CPNS" value= "<?php echo $data['no_sk_cpns']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input1" class="col-sm-2 control-label">Jenis Pengadaan</label>
                                                <div class="col-sm-2">
                                                    <select id="x_addedit_cpnspns_jenis_pengadaan" name="x_addedit_cpnspns_jenis_pengadaan" class="form-control">
                                                        <option value="0">-Pilih-</option>
                                                        <?php 
                                                            foreach( $rsPengadaan->data as $dtPengadaan ){
                                                        ?>
                                                                <option value="<?php echo $dtPengadaan->id ?>"><?php echo $dtPengadaan->name; ?></option>
                                                        <?php 
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <label for="input1" class="col-sm-2 control-label">Tgl. SPMT</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_spmt" id="x_addedit_cpnspns_tgl_spmt" data-date-format="dd-mm-yyyy" value= "<?php echo $data['tgl_spmt']; ?>">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_no_spmt" id="x_addedit_cpnspns_no_spmt" placeholder="No. SPMT" value= "<?php echo $data['no_spmt']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input1" class="col-sm-2 control-label">TMT PNS</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_tmt_pns" id="x_addedit_cpnspns_tmt_pns" data-date-format="dd-mm-yyyy" value= "<?php echo $data['tmt_pns']; ?>">
                                                </div>
                                                <label for="input1" class="col-sm-2 control-label">Tgl.Sk. PNS</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_sk_pns" id="x_addedit_cpnspns_tgl_spmt" data-date-format="dd-mm-yyyy" value= "<?php echo $data['tgl_sk_pns']; ?>">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_no_sk_pns" id="x_addedit_cpnspns_no_sk_pns" placeholder="No. SK. PNS" value= "<?php echo $data['no_sk_pns']; ?>">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label for="input1" class="col-sm-2 control-label">Tgl. Pertek C2TH</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_pertek_c2th" id="x_addedit_cpnspns_tgl_pertek_c2th" data-date-format="dd-mm-yyyy">
                                                </div>
                                                <label for="input1" class="col-sm-2 control-label">No. Pertek C2TH</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_no_pertek_c2th" id="x_addedit_cpnspns_no_pertek_c2th" data-date-format="dd-mm-yyyy">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input1" class="col-sm-2 control-label">Tgl.Kep.PNS Honorer >= 2 Thn</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_kep_pns" id="x_addedit_cpnspns_tgl_kep_pns" data-date-format="dd-mm-yyyy">
                                                </div>
                                                <label for="input1" class="col-sm-2 control-label">No.Kep.PNS Honorer >= 2 Thn</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_no_kep_pns" id="x_addedit_cpnspns_no_kep_pns">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label for="input1" class="col-sm-2 control-label">Karis/Karsu</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_karis_karsu" id="x_addedit_cpnspns_karis_karsu">
                                                </div>
                                                <label for="input1" class="col-sm-2 control-label">Karpeg</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_karpeg" id="x_addedit_cpnspns_karpeg" value= "<?php echo $data['kartu_pegawai']; ?>">
                                                </div>
                                            </div>                   
                                            <div class="form-group">
                                                <label for="input1" class="col-sm-2 control-label">Tgl. STTPL</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_sttpl" id="x_addedit_cpnspns_tgl_sttpl" data-date-format="dd-mm-yyyy" value= "<?php echo $data['tgl_sttpl']; ?>">
                                                </div>
                                                <label for="input1" class="col-sm-2 control-label">No. STTPL</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_no_sttpl" id="x_addedit_cpnspns_no_sttpl" value= "<?php echo $data['no_sttpl']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input1" class="col-sm-2 control-label">Tgl. Dokter</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_tgl_dokter" id="x_addedit_cpnspns_tgl_dokter" data-date-format="dd-mm-yyyy" value= "<?php echo $data['tgl_surat_ket_dokter']; ?>">
                                                </div>
                                                <label for="input1" class="col-sm-2 control-label">No. Surat Dokter</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_no_surat_dokter" id="x_addedit_cpnspns_no_surat_dokter" value= "<?php echo $data['no_surat_ket_dokter']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input1" class="col-sm-3 control-label">Nm. Jabatan Pengangkat CPNS</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="x_addedit_cpnspns_nama_jabatan" id="x_addedit_cpnspns_nama_jabatan">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane" id="pegawai_profesi">

                                </div>

                                <div class="tab-pane" id="pegawai_historyunor">

                                </div>

                                <div class="tab-pane" id="pegawai_historypemberhentian">

                                </div>
                                <div class="tab-pane" id="pegawai_historyangkakredit">

                                </div>
                                <div class="tab-pane" id="pegawai_skp">

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="riwayat_pegawai">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#riwayat_pangkat" name="link-riwayat-pangkat" data="<?php echo $id; ?>" data-toggle="tab">Riwayat Pangkat</a></li>
                                <li><a href="#riwayat_jabatan" name="link-riwayat-jabatan" data-toggle="tab" data="<?php echo $id; ?>">Riwayat Jabatan</a></li>
                                <li><a href="#riwayat_gaji" data-toggle="tab" name="link-riwayat-gaji" data="<?php echo $id; ?>">Riwayat Gaji</a></li>
                                <li><a href="#riwayat_penugasan" data-toggle="tab" name="link-riwayat-penugasan" data="<?php echo $id; ?>">Riwayat Penugasan</a></li>
                                <li><a href="#riwayat_penghargaan" data-toggle="tab" name="link-riwayat-penghargaan" data="<?php echo $id; ?>">Riwayat Penghargaan</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="riwayat_pangkat">

                                </div>
                                <div class="active tab-pane" id="riwayat_jabatan">

                                </div>
                                <div class="active tab-pane" id="riwayat_gaji">

                                </div>
                                <div class="active tab-pane" id="riwayat_penugasan">

                                </div>
                                <div class="active tab-pane" id="riwayat_penghargaan">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="keluarga">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <?php /*
                                <li class="active"><a href="#keluarga_orang_tua" name="link-keluarga-orangtua" data="<?php echo $id; ?>" data-type="1" data-toggle="tab">Orang Tua</a></li>
                                */?>
                                <li><a href="#keluarga_istri" name="link-keluarga-istri" data-toggle="tab" data="<?php echo $id; ?>" data-type="2">Orang Tua / Suami / Istri</a></li>
                                <li><a href="#keluarga_anak" data-toggle="tab" name="link-keluarga-anak" data="<?php echo $id; ?>" data-type="3">Anak</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="keluarga_orang_tua">

                                </div>
                                <div class="active tab-pane" id="keluarga_istri">

                                </div>
                                <div class="active tab-pane" id="keluarga_anak">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="pendidikan">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#riwayat_pendidikan_umum" name="link-riwayat-pendidikan-umum" data="<?php echo $id; ?>" data-toggle="tab">Pendidikan Umum</a></li>
                                <li><a href="#riwayat_pendidikan_diklat" name="link-riwayat-pendidikan-diklat" data-toggle="tab" data="<?php echo $id; ?>">Diklat Struktural</a></li>
                                <li><a href="#riwayat_pendidikan_non_formal" data-toggle="tab" name="link-riwayat-pendidikan-nonformal" data="<?php echo $id; ?>">Pelatihan</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="riwayat_pendidikan_umum">

                                </div>
                                <div class="active tab-pane" id="riwayat_pendidikan_diklat">

                                </div>
                                <div class="active tab-pane" id="riwayat_pendidikan_non_formal">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="upload_file">
                        <div class="nav-tabs-custom">
                            <div class="row" id="box_identitas_4">
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                        <?php /*
                                        <div class="box-header with-border">
                                            <h3 class="box-title"><strong>FILE</strong></h3>
                                        </div>
                                        */?>
                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <div class="col-md-12">
                                            <div class="box-body">
                                                <form id="form-upload-dosier" name="form-upload-dosier">
                                                    <input type="hidden" name="x_user_id_dosier" id="x_user_id_dosier" value="<?php echo $id; ?>">
                                                    <table id="example1" class="table table-bordered table-striped">                                                
                                                        <thead>
                                                            <tr>
                                                                <th width="30%" class="bg-teal color-palette">Kartu Pegawai</th>
                                                                <td width="5%" style="text-align:center;">
                                                                    <?php 
                                                                        $pathFileKartuPegawai = "";
                                                                        if( $data['file_kartu_pegawai'] != "" ){
                                                                            $pathFileKartuPegawai = CONST_PATH_KARTU_PEGAWAI . $data['file_kartu_pegawai'];
                                                                        }
                                                                    ?>
                                                                    <a href="<?php echo $pathFileKartuPegawai; ?>" name="link-download-kartupegawai"><?php echo $data['file_kartu_pegawai']; ?></a>
                                                                </td>
                                                                <td width="45%">
                                                                    <div id="mulitplefileuploader_kartuPegawai" >Upload</div>
                                                                     <input type="hidden" name="x_file_kartu_pegawai" id="x_file_kartu_pegawai" value="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%" class="bg-teal disabled color-palette">KTP</th>
                                                                <td width="5%">
                                                                    <?php 
                                                                        $pathFileKTP = "";
                                                                        if( $data['file_ktp'] != "" ){
                                                                            $pathFileKartuPegawai = CONST_PATH_KTP . $data['file_ktp'];
                                                                        }
                                                                    ?>
                                                                    <a href="<?php echo $pathFileKTP; ?>" name="link-download-ktp"><?php echo $data['file_ktp']; ?></a>
                                                                </td>
                                                                <td width="45%">
                                                                <?php if( $isHasUpdateData == 1 ){ ?>

                                                                <?php }else{ ?>
                                                                    <div id="mulitplefileuploader_ktp" >Upload</div>
                                                                    <input type="hidden" name="x_file_ktp" id="x_file_ktp" value="">
                                                                <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%" class="bg-teal color-palette">Kartu Keluarga</th>
                                                                <td width="5%">
                                                                    <?php 
                                                                        $pathFileKK = "";
                                                                        if( $data['file_kartu_keluarga'] != "" ){
                                                                            $pathFileKK = CONST_PATH_KARTU_KELUARGA . $data['file_kartu_keluarga'];
                                                                        }
                                                                    ?>
                                                                    <a href="<?php echo $pathFileKK; ?>" name="link-download-kk"><?php echo $data['file_kartu_keluarga']; ?></a>
                                                                </td>
                                                                <td width="45%">
                                                                <?php if( $isHasUpdateData == 1 ){ ?>

                                                                <?php }else{ ?>
                                                                    <div id="mulitplefileuploader_kartu_keluarga" >Upload</div>
                                                                    <input type="hidden" name="x_file_kartu_keluarga" id="x_file_kartu_keluarga" value="">
                                                                <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%" class="bg-teal disabled color-palette">Buku Tabungan</th>
                                                                <td width="5%">    
                                                                    <?php 
                                                                        $pathFileBukuTabungan = "";
                                                                        if( $data['file_buku_tabungan'] != "" ){
                                                                            $pathFileBukuTabungan = CONST_PATH_BUKU_TABUNGAN . $data['file_buku_tabungan'];
                                                                        }
                                                                    ?>
                                                                    <a href="<?php echo $pathFileBukuTabungan; ?>" name="link-download-bukutabungan"><?php echo $data['file_buku_tabungan']; ?></a>
                                                                </td>
                                                                <td width="45%">
                                                                <?php if( $isHasUpdateData == 1 ){ ?>

                                                                <?php }else{ ?>
                                                                    <div id="mulitplefileuploader_buku_tabungan" >Upload</div>
                                                                    <input type="hidden" name="x_file_buku_tabungan" id="x_file_buku_tabungan" value="">
                                                                <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%" class="bg-teal color-palette">NPWP</th>
                                                                <td width="5%">
                                                                    <?php 
                                                                        $pathFileNPWP = "";
                                                                        if( $data['file_npwp'] != "" ){
                                                                            $pathFileNPWP = CONST_PATH_NPWP . $data['file_npwp'];
                                                                        }
                                                                    ?>
                                                                    <a href="<?php echo $pathFileNPWP; ?>" name="link-download-npwp"><?php echo $data['file_npwp']; ?></a>
                                                                </td>
                                                                <td width="45%">
                                                                <?php if( $isHasUpdateData == 1 ){ ?>

                                                                <?php }else{ ?>
                                                                    <div id="mulitplefileuploader_npwp" >Upload</div>
                                                                    <input type="hidden" name="x_file_npwp" id="x_file_npwp" value="">
                                                                <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%" class="bg-teal disabled color-palette">LHKPN</th>
                                                                <td width="5%">
                                                                    <?php 
                                                                        $pathFileLHKPN = "";
                                                                        if( $data['file_lhkpn'] != "" ){
                                                                            $pathFileLHKPN = CONST_PATH_LHKPN . $data['file_lhkpn'];
                                                                        }
                                                                    ?>
                                                                    <a href="<?php echo $pathFileLHKPN; ?>" name="link-download-lhkpn"><?php echo $data['file_lhkpn']; ?></a>
                                                                </td>
                                                                <td width="45%">
                                                                <?php if( $isHasUpdateData == 1 ){ ?>

                                                                <?php }else{ ?>
                                                                    <div id="mulitplefileuploader_lhkpn" >Upload</div>
                                                                    <input type="hidden" name="x_file_lhkpn" id="x_file_lhkpn" value="">
                                                                <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%" class="bg-teal color-palette">ASKES / BPJSS</th>
                                                                <td width="5%">
                                                                    <?php 
                                                                        $pathFileAskesBPJS = "";
                                                                        if( $data['file_askes_atau_bpjs'] != "" ){
                                                                            $pathFileAskesBPJS = CONST_PATH_ASKES_BPJS . $data['file_askes_atau_bpjs'];
                                                                        }
                                                                    ?>
                                                                    <a href="<?php echo $pathFileAskesBPJS; ?>" name="link-download-askesbpjs"><?php echo $data['file_askes_atau_bpjs']; ?></a>
                                                                </td>
                                                                <td width="45%">
                                                                <?php if( $isHasUpdateData == 1 ){ ?>

                                                                <?php }else{ ?>
                                                                    <div id="mulitplefileuploader_askesbpjs" >Upload</div>
                                                                    <input type="hidden" name="x_file_askes_bpjs" id="x_file_askes_bpjs" value="">
                                                                <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%" class="bg-teal disabled color-palette">TASPEN</th>
                                                                <td width="5%">
                                                                    <a href="#" name="link-download-taspen"></a>
                                                                    <?php 
                                                                        $pathFileTASPEN = "";
                                                                        if( $data['file_taspen'] != "" ){
                                                                            $pathFileTASPEN = CONST_PATH_TASPEN . $data['file_taspen'];
                                                                        }
                                                                    ?>
                                                                    <a href="<?php echo $pathFileTASPEN; ?>" name="link-download-taspen"><?php echo $data['file_taspen']; ?></a>
                                                                </td>
                                                                <td width="45%">
                                                                <?php if( $isHasUpdateData == 1 ){ ?>

                                                                <?php }else{ ?>
                                                                    <div id="mulitplefileuploader_taspen" >Upload</div>
                                                                    <input type="hidden" name="x_file_taspen" id="x_file_taspen" value="">
                                                                <?php }?>
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">SIMPAN FILE</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>                                                               
                                    
                                    <!-- /.box -->
                                </div>   
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                    </div>
                                    
                                </div>                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>  

</section><!-- /.content -->

<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<script src="<?php echo base_url('static');?>/custom/global_function.js"></script>
<script src="<?php echo base_url('static');?>/plugins/jquery-upload-file/jquery.uploadfile.min.js"></script>
<script src="<?php echo base_url('static');?>/custom/profile.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>