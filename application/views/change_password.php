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
    UBAH PASSWORD
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12" id="container-profile">

      <div class="login-box">
      
      
      <div class="login-box-body">
        <div class="login-logo">
          
        </div><!-- /.login-logo -->
        <p class="login-box-msg">Silahkan isi password lama anda dan kemudian password baru anda.</p>

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
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Perhatian!</h4>
            <?php 
              echo $this->session->userdata['SESSION_MSG_RESET_PASSWORD'];
              $this->session->sess_destroy();
            ?>
          </div>
        <?php } ?>

        <form action="<?php echo base_url();?>index.php/employee/doChangePassword" method="post" id="form-change-password" name="form-change-password">
          <input type="hidden" id="x_user_id" name="x_user_id" value="<?php echo $id ?>">
          <div class="form-group has-feedback">
            <input type="password" class="form-control validate[required]" placeholder="Password Lama..." name="x_old_password" id="x_old_password">
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control validate[required]" placeholder="Password Baru..." name="x_new_password" id="x_new_password">
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control validate[required, equals[x_new_password]]" placeholder="Input ulang Password Baru..." name="x_retype_new_password" id="x_retype_new_password">
          </div>

          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Proses</button>
            </div><!-- /.col -->
          </div>
        </form>

        <!--a href="#">Lupa Password</a><br-->

      </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    </div>
    
    <!-- /.col -->
  </div>
</section><!-- /.content -->

<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<script type="text/javascript">    

    $(document).ready(function(){

      $("form#form-change-password").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {                
              return true;
            }

        }

      });        

    }); 

    
</script>

