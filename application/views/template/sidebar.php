<?php 
  $arr_allowed_menu = $this->session->userdata['SESSION_GT_G'];
  $user_level_id    = $this->session->userdata['SESSION_GT_E'];
?>
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel"> 
        <div class="pull-left image">
          <?php
            /*$photo    = $this->converter->decode($this->session->userdata['SESSION_GT_D']);

            if( $photo == "" ){
              $photo = "unknown.png";
            }*/
          ?>
          <img src="<?php echo base_url('static')?>/photos/unknown.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata['SESSION_PRJ_C'];?></p>
          <!-- a href="#"><i class="fa fa-circle text-success"></i> Online</a -->
        </div>  
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>   
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>

          <li class="treeview">
            <a href="<?php echo base_url()?>index.php/dashboard">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url();?>index.php/driver/list">
              <i class="glyphicon glyphicon-user"></i> <span>Driver</span>
            </a>
          </li>         

          <li class="treeview">
            <a href="#">
              <i class="fa fa-database"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">

              <li><a href="<?php echo base_url();?>index.php/vehicle/list"><i class="fa fa-bus"></i> Kendaraan</a></li>    

            </ul>
          </li>
          

          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Report</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url();?>index.php/report/provider-rate/list"><i class="fa fa-circle-o"></i> Provider Rate</a></li>
            </ul>
          </li>

      </ul>
    </section>
    <!-- /.sidebar -->