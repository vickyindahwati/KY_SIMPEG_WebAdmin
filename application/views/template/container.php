<!DOCTYPE html>

<html lang="en">

<head>

	<?php echo $inc_header?>

</head>

<body class="hold-transition skin-blue layout-top-nav">


    <div class="wrapper">

        <?php echo $header_nav?>

        <!---- start konten layout ---->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

			<?php echo $konten?>

        </div>

        <!---- end konten layout ---->



    </div>   


    <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.2
    </div>
    <strong>Copyright &copy; 2018 <a href="#">SIMPEG-Back Office System</a>.</strong> All rights reserved.
    </footer>

    
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('static')?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('static')?>/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('static')?>/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('static')?>/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url('static')?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url('static')?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url('static')?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url('static')?>/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('static')?>/dist/js/demo.js"></script>

    <!-- Validation Engine -->
    <script src="<?php echo base_url('static')?>/plugins/validation_engine/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url('static')?>/plugins/validation_engine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

    <!-- JPlayer -->
    <script type="text/javascript" src="<?php echo base_url('static')?>/plugins/jPlayer-2.9.2/dist/jplayer/jquery.jplayer.min.js"></script>

    


</body>

</html>