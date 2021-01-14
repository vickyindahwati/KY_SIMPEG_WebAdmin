<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMPEG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('static')?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('static')?>/dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/iCheck/square/blue.css">
    <!-- Validation Engine -->
    <link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/validation_engine/css/validationEngine.jquery.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      .bg {
        /* The image used */
        background-image: url("<?php echo base_url();?>uploads/background/login_background.png");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
  </head>
  <body class="bg hold-transition login-page">
    <div class="login-box">
      
      
      <div class="login-box-body">
        <div class="login-logo">
          <img src="<?php echo base_url('static')?>/dist/img/logo_home.png" width="160">
          
        </div><!-- /.login-logo -->
        <p class="login-box-msg">Silahkan masukkan NIP anda.</p>

        <?php if( $status_code <> "00" && $status_code != '' ){?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Pesan Peringatan!</h4>
          <?php echo $status_msg;?>
        </div>
        <?php } ?>

        <form action="<?php echo base_url();?>index.php/login/doForgotPassword" method="post" id="form-forgot-password" name="form-forgot-password">
          <div class="form-group has-feedback">
            <input type="text" class="form-control validate[required]" placeholder="NIP..." name="x_nip" id="x_nip">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>

          <?php /*
          <div class="form-group has-feedback">
            <select id="x_type" name="x_type" class="form-control validate[required]" >
              <option value="">-Please Select Login Type-</option>
              <option value="1">Admin</option>
              <option value="2">Management</option>
            </select>
          </div>
          */?>
          <div class="row">
            <div class="col-xs-6">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Proses</button>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <a href="<?php echo base_url(); ?>index.php/login" class="btn btn-danger btn-block btn-flat">Batal</a>
            </div><!-- /.col -->
          </div>
        </form>

        <!--a href="#">Lupa Password</a><br-->

      </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('static')?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('static')?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('static')?>/plugins/iCheck/icheck.min.js"></script>

    <script src="<?php echo base_url('static')?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('static')?>/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('static')?>/dist/js/app.min.js"></script>
    <!-- Validation Engine -->
    <script src="<?php echo base_url('static')?>/plugins/validation_engine/js/jquery.validationEngine.js"></script>
    <script src="<?php echo base_url('static')?>/plugins/validation_engine/js/languages/jquery.validationEngine-en.js"></script>
    <script>
      $(function () {

        $('input').iCheck({

          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });

        $('#form-login').validationEngine();

      });
    </script>
  </body>
</html>
