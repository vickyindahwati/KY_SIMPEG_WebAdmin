<!-- Start : Modal Form -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" data-backdrop="static" data-keyboard="false" id="modal-under-development">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">PERHATIAN</h4>
            </div>      
            <div class="overlay text-center" id="container-loader">
                <img src="<?php echo base_url('static')?>/dist/img/under_construction.jpg" width="200">
            </div>
            <div class="modal-body text-center">
              <h3>Mohon maaf, halaman ini untuk sementara tidak dapat diakses.</h3>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    DASHBOARD
    <small>SIMPEG - Dashboard</small>
  </h1>
  <?php /*
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
  */?>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12" id="container-attendance">

    </div>
  </div>
  <div class="row">
    <div class="col-md-4" id="container-profile">

      <div class="box box-primary">
          <div class="box-body box-profile">
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
                  <?php /*
                  <tr>
                      <td>
                          <b>JENIS JABATAN</b>
                          <?php echo $data['jenis_pegawai']['name'] ?>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <b>STATUS PEGAWAI</b>
                          <a><?php echo $data['status_pegawai']['name'] ?></a>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <b>JENIS PEGAWAI</b>
                          <?php echo $data['jenis_pegawai']['name'] ?>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <b>KEDUDUKAN</b>
                          <?php echo $data['kedudukan']['name'] ?>
                      </td>
                  </tr>
                  */?>
                  <tr>
                      <td>
                          <b>MASA KERJA</b><br>
                          <?php  
                              if( $data['masa_kerja_tahun'] != 0 || $data['masa_kerja_bulan'] != 0 ){
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
    <?php /*
    <div class="col-md-4" id="container-birthday">
    </div>
    
    <div class="col-md-4">
      <div id="container-pmk"></div>
      <div id="container-pendidikan-terakhir"></div>
    </div>
    */?>
    <div class="col-md-4" id="container-news">
    </div>
    <div class="col-md-4" id="container-skp">
      
    </div>
    
    <!-- /.col -->
  </div>

  <?php
    $xColLgLayanan = ""; 
    $xColLgDosier = "";
    if( $isPNS == 1 ){ 
      $xColLgLayanan = "col-lg-4";
      $xColLgDosier = "col-lg-4";
      $xColLgLayanan = "col-lg-4";
      $xColLgDosier = "col-lg-4";
    }else{
      $xColLgLayanan = "col-lg-6";
      $xColLgDosier = "col-lg-6";
      $xColLgLayanan = "col-lg-6";
      $xColLgDosier = "col-lg-6";
    } 
  ?>
  <div class="row">
    <?php if( $isPNS == 1 ){ ?>
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->      
        <a href="<?php echo base_url(); ?>index.php/profile?id=<?php echo $this->ci->session->userdata['SESSION_SIMPEG_G']; ?>" >
          <div class="small-box bg-aqua" style="height: 100px;">
            <div class="inner">
              <h3><strong>PROFILE</strong></h3>
              <p>Module data utama (profil pribadi) dan riwayat data</p>
            </div>
            <?php /*
            <div class="icon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            
            <a href="<?php echo base_url(); ?>index.php/profile?id=<?php echo $this->ci->session->userdata['SESSION_SIMPEG_G']; ?>" class="small-box-footer">Masuk <i class="fa fa-arrow-circle-right"></i></a>*/?>
          </div>
        </a>
    </div>
    <?php } ?>
    <div class="<?php echo $xColLgLayanan; ?> col-xs-6">
      <!-- small box -->
      <a href="<?php echo base_url(); ?>index.php/layanan" class="small-box-footer">
        <div class="small-box bg-green" style="height: 100px;">
          <div class="inner">
            <h3><strong>LAYANAN</strong></h3>
            <p>Module layanan Komisi Yudisial</p>
          </div>
          <?php /*
          <div class="icon">
            <i class="glyphicon glyphicon-th"></i>
          </div>
          
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-under-development">Masuk <i class="fa fa-arrow-circle-right"></i></a>*/?>
        </div>
      </a>
    </div>
    <div class="<?php echo $xColLgDosier; ?> col-xs-6">
      <!-- small box -->
      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-under-development">
        <div class="small-box bg-yellow" style="height: 100px;">
          <div class="inner">
            <h3><strong>DOSIER</strong></h3>
            <p>Module riwayat dokumen</p>
          </div>
          <?php /*
          <div class="icon">
            <i class="glyphicon glyphicon-file"></i>
          </div>
          
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-under-development">Masuk <i class="fa fa-arrow-circle-right"></i></a>*/?>
        </div>
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12" id="container-birthday"></div> 
  </div>
</section><!-- /.content -->

<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script type="text/javascript">

    function loadDashboard(pModule, pContainer){
      $.ajax({

          type        : 'POST',
          url         : indexURL + '/dashboard/showContainer',
          data        : {module:pModule},
          beforeSend  : function(){},
          success     : function(html){    
                          $('#' + pContainer).html(html);  
                      }

      });     
    }   

    $(document).ready(function(){
        
        loadDashboard( 'birthday', 'container-birthday' );
        /*loadDashboard( 'pendidikan_terakhir', 'container-pendidikan-terakhir' );
        loadDashboard( 'pmk', 'container-pmk' );*/
        loadDashboard('news','container-news');
        loadDashboard('skp', 'container-skp' );
        loadDashboard('attendance_info','container-attendance');
        

    }); 

    
</script>

