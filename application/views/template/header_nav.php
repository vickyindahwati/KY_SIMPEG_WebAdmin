<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url(); ?>index.php/dashboard" class="navbar-brand"><b>SIMPEG</b>Backoffice System</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <!--li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li-->
            <?php if( $this->session->userdata['SESSION_SIMPEG_D'] == 1 || $this->session->userdata['SESSION_SIMPEG_D'] == 3 ){ ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kepegawaian <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">                
                  <li><a href="<?php echo base_url();?>index.php/employee">Data Pegawai</a></li>
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url();?>index.php/news" >News</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">                
                <li><a href="<?php echo base_url();?>index.php/calendar">Kalender Libur</a></li>
                  <li><a href="<?php echo base_url();?>index.php/unor">Unit Organisasi</a></li>
                  <li><a href="<?php echo base_url();?>index.php/userunor/header">Peta Jabatan</a></li>
                </ul>
              </li>
              
            <?php } ?>  

            <?php if( $this->session->userdata['SESSION_SIMPEG_D'] == 1 || $this->session->userdata['SESSION_SIMPEG_D'] == 3 ){ ?>
              <li>
                <a href="<?php echo base_url();?>index.php/leave" >Cuti</a>
              </li>
              <li>
                <a href="<?php echo base_url();?>index.php/journal" >Jurnal</a>
              </li>
              <li>
                <a href="<?php echo base_url();?>index.php/attendance" >Absensi</a>
              </li>
            <?php }?>

              

              <?php if( $this->session->userdata['SESSION_SIMPEG_D'] != 1 && $this->session->userdata['SESSION_SIMPEG_D'] != 3 ){ ?>
                <li><a href="<?php echo base_url();?>index.php/calendar">Kalender Libur</a></li>
                <?php /*
                <li>
                  <a href="<?php echo base_url();?>index.php/profile?id=<?php echo $this->session->userdata['SESSION_SIMPEG_G']; ?>" >Profil</a>
                </li>  */?>
              <?php /*
              <li>
                <a href="<?php echo base_url();?>index.php/employee/showHierarchy" >Hirarki</a>
              </li>
              */?>
              <?php } ?>
              
                     
          </ul>
          <!--form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form-->
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">            
            
            <?php if( $this->session->userdata['SESSION_SIMPEG_D'] == 1 || $this->session->userdata['SESSION_SIMPEG_D'] == 3 ){ ?>
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success" id="container-total-pending-leave"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header" id="container-message-title"></li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu" id="container-message-list">                    
                      <!-- end message -->
                    </ul>
                    <!-- /.menu -->
                  </li>
                  <!--li class="footer"><a href="<?php echo base_url(); ?>index.php/leave">See All Messages</a></li-->
                </ul>
              </li>
              <!-- /.messages-menu -->
            <?php }?>

            <li>
              <a href="<?php echo base_url();?>index.php/login/logout" >Logout</a>
            </li>

            <?php /*
            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                          <!-- Change the css width attribute to simulate progress -->
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            */?>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <!--img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"-->
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Welcome, <?php echo $this->session->userdata['SESSION_SIMPEG_C'];?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img class="profile-user-img img-responsive img-circle" alt="User Image" src="<?php echo CONST_IMG_PROFILE . $this->session->userdata['SESSION_SIMPEG_F'] ?>">

                  <p>
                    <?php echo $this->session->userdata['SESSION_SIMPEG_C'];?>
                    <small></small>
                  </p>
                </li>
                <!-- Menu Body -->
                <?php /*
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                */?>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url();?>index.php/employee/changePassword" class="btn btn-default btn-flat">Ubah Password</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>index.php/login/logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>    

  </header>

  <script>
    function getInAppNotification(){
      $.ajax({

        type        : 'GET',
        url         : indexURL + '/inappnotification/getNotification',
        data        : {},
        dataType    : 'json',
        crossDomain : true,
        success     : function(data){ 
                        console.log(JSON.stringify(data)) ;
                        $('#container-message-title').html('Anda memiliki <strong>' + data.total_record + '</strong> permintaan baru');
                        $('#container-total-pending-leave').html(data.total_record);

                        var xContainerMessageList = '';

                        if( data.status_code == '00' ){
                          if( data.total_record > 0 ){
                            var xRows = data.data;
                            for( var i = 0; i < data.total_record; i++ ){
                              if( xRows[i].module == 'leave' ){
                                xContainerMessageList += '<li><a href="<?php echo base_url(); ?>index.php/leave?id=' + xRows[i].record_id + '&nid=' + xRows[i].id + '"><h4><strong>Pengajuan Cuti</strong><small><i class="fa fa-clock-o"></i> ' + xRows[i].created_at + '</small></h4><p>' + xRows[i].name + '<br>mengajukan cuti <strong>' + xRows[i].reference_no + '</strong></p></a></li>';
                              }else if( xRows[i].module == 'update_profile' ){
                                xContainerMessageList += '<li><a href="<?php echo base_url(); ?>index.php/profile?id=' + xRows[i].record_id + '&nid=' + xRows[i].id + '"><h4><strong>Perubahan Profil</strong><small><i class="fa fa-clock-o"></i> ' + xRows[i].created_at + '</small></h4><p>' + xRows[i].name + '<br>mengajukan perubahan profil</p></a></li>';
                              }    
                            }
                            $('#container-message-list').html(xContainerMessageList);
                          }
                          
                        }else{
                          $('#container-message-list').html('<li><h4>Tidak ada data pengajuan baru</h4></li>');
                        }
                        

                      }

      });
    }

    $(document).ready(function(){
      // getInAppNotification();
    })
  </script>