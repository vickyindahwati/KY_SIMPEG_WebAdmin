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
    LAYANAN
    <small>SIMPEG - LAYANAN</small>
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
    <div class="col-lg-4 col-xs-6">
      <p>
        <a href="<?php echo base_url(); ?>index.php/dashboard" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i>Back to Dashboard</a>
      </p>
    </div>
    <div class="col-lg-4 col-xs-6">&nbsp;     
    </div>
    <div class="col-lg-4 col-xs-6">&nbsp;</div>
  </div>
  <div class="row">
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <a href="<?php echo base_url(); ?>index.php/leave" >
        <div class="small-box bg-aqua" style="height: 120px;">
          <div class="inner">
            <h3 style="font-size:30px;text-align: center;"><strong>PENGAJUAN <br>SURAT<br> CUTI</strong></h3>
            <p></p>
          </div>
          <?php /*
          <div class="icon">
            <i class="glyphicon glyphicon-user"></i>
          </div>
          
          <a href="<?php echo base_url(); ?>index.php/profile?id=<?php echo $this->ci->session->userdata['SESSION_SIMPEG_G']; ?>" class="small-box-footer">Masuk <i class="fa fa-arrow-circle-right"></i></a>*/?>
        </div>
      </a>
    </div>
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-under-development">
        <div class="small-box bg-green" style="height: 120px;">
          <div class="inner">
            <h3 style="font-size:30px;text-align: center;"><strong>PENGAJUAN <br>SURAT <br>LAINNYA</strong></h3>
            <p></p>
          </div>
          <?php /*
          <div class="icon">
            <i class="glyphicon glyphicon-th"></i>
          </div>
          
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-under-development">Masuk <i class="fa fa-arrow-circle-right"></i></a>*/?>
        </div>
      </a>
    </div>
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-under-development">
        <div class="small-box bg-yellow" style="height: 120px;">
          <div class="inner">
            <h3 style="font-size:30px;text-align: center;"><strong>PENGAJUAN <br>PENGEMBANGAN<br>PEGAWAI</strong></h3>
            <p></p>
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
    <div class="col-lg-6 col-xs-6">
      <a href="<?php echo base_url(); ?>index.php/journal" class="small-box-footer"> <!-- data-toggle="modal" data-target="#modal-under-development"-->
        <div class="small-box bg-purple" style="height: 100px;">
          <div class="inner">
            <h3 style="font-size:30px;text-align: center;">JURNAL<br>HARIAN</h3>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-6 col-xs-6">
      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-under-development">
        <div class="small-box bg-black" style="height: 100px;">
          <div class="inner">
            <h3 style="font-size:30px;text-align: center;">New Module <br>On Progress</h3>
          </div>
        </div>
      </a>
    </div>
  </div>
</section><!-- /.content -->

<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        

    }); 

    
</script>

