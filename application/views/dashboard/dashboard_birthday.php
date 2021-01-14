<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">YANG BERULANG TAHUN BULAN INI</h3>

    <div class="box-tools pull-right">
      <span class="label label-danger"><?php echo $rsBirthday->recordsTotal; ?> Orang</span>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding" style="overflow-x:auto;">
    <?php /*
    <ul class="users-list clearfix">
      <?php 
        foreach( $rsBirthday->data as $dtBirthday ){
          $xPhoto = "";
          // !file_exists('/var/www/simpeg/admin/uploads/photos/profile/original/' . $dtBirthday->picture)
          if( $dtBirthday->picture == "" || !file_exists('P:\\PROJECTS\\XAMPP7\\htdocs\\KomisiYudisial\\simpeg\\admin\\uploads\\photos\\profile\\original\\' . $dtBirthday->picture)   ){
            $xPhoto = CONST_IMG_PROFILE_DEFAULT;
          }else{
            $xPhoto = CONST_IMG_PROFILE . $dtBirthday->picture;
            //$xPhoto = CONST_IMG_PROFILE_DEFAULT;
          }
      ?>
        <li>
          <img src="<?php echo $xPhoto; ?>" alt="User Image" width="80" height="80">
          <?php 
            if( $roleId == 1 || $roleId == 3){
              echo $dtBirthday->name;
            }else{
              echo $dtBirthday->nameNonLink;
            }
             
          ?>
          <span class="users-list-date"></span>
        </li> 
      <?php 
        }
      ?>     
    </ul>*/?>
    <marquee>
      <table>
        <tr>
          <?php 
            foreach( $rsBirthday->data as $dtBirthday ){
              $xPhoto = "";
              // Production : 
              // !file_exists('/var/www/simpeg/admin/uploads/photos/profile/original/' . $dtBirthday->picture)

              // Development : 
              //!file_exists('P:\\PROJECTS\\XAMPP7\\htdocs\\KomisiYudisial\\simpeg\\admin\\uploads\\photos\\profile\\original\\' . $dtBirthday->picture)
              if( $dtBirthday->picture == "" || !file_exists('/var/www/simpeg/admin/uploads/photos/profile/original/' . $dtBirthday->picture)   ){
                $xPhoto = CONST_IMG_PROFILE_DEFAULT;
              }else{
                $xPhoto = CONST_IMG_PROFILE . $dtBirthday->picture;
                //$xPhoto = CONST_IMG_PROFILE_DEFAULT;
              }
          ?>              
              <marquee>
                <td style="text-align: center;padding: 0px 30px 0px 30px;">
                  <img src="<?php echo $xPhoto; ?>" alt="User Image" width="80" style="border-radius: 20%;">
                </td>
              </marquee>
          <?php
            }
          ?>
        </tr>
        <tr>
          <?php 
            foreach( $rsBirthday->data as $dtBirthday ){
          ?>              
              <marquee>
                <td style="text-align: center;">
                  <?php 
                    if( $roleId == 1 || $roleId == 3){
                      echo $dtBirthday->name;
                    }else{
                      echo $dtBirthday->nameNonLink;
                    }
                     
                  ?>
                </td>
              </marquee>
          <?php
            }
          ?>
        </tr>
      </table>
    <!-- /.users-list -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer text-center">
    <?php /*
    <a href="javascript:void(0)" class="uppercase">View All Users</a>
    */?>
  </div>
  <!-- /.box-footer -->
</div>