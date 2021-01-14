<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMPEG</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('static')?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
    <div class="login-logo">
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        
            <div class="login-logo">
            <img src="<?php echo base_url('static')?>/dist/img/logo_home.png" width="160">
            <div style="font-size:18px;color:#dbd7d7;"><strong>BETA TESTING</strong></div>
            </div><!-- /.login-logo -->
            <p class="login-box-msg"></p>

            <?php if( $status_code <> "00" && $status_code != '' ){?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Pesan Peringatan!</h4>
                    <?php echo $status_msg;?>
                </div>
            <?php }else if( $status_code == "00" && $status_code != '' ){ ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                    <?php echo $status_msg;?>
                </div>
             <?php } ?>

             <?php if( $this->session->userdata['SESSION_MSG_RESET_PASSWORD'] <> '' ){?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                    <?php 
                        echo $this->session->userdata['SESSION_MSG_RESET_PASSWORD'];
                        $this->session->sess_destroy();
                    ?>
                </div>
            <?php } ?>

            <form action="<?php echo base_url();?>index.php/login/doLogin" method="post" id="form-login" name="form-login">
                <div class="input-group mb-3">
                <input type="text" class="form-control validate[required]" placeholder="Username" name="x_username" id="x_username">
                <div class="input-group-append">
                    <div class="input-group-text">
                     <span class="fas fa-envelope"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control validate[required]" placeholder="Password" name="x_password" id="x_password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>    

            <p class="mb-1">
                <a href="<?php echo base_url(); ?>index.php/login/forgotPassword">Forgot Password</a>
            </p>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('static')?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('static')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('static')?>/dist/js/adminlte.min.js"></script>

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
