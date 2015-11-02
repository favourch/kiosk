<?php 
//session_start();
    if(isset($_SESSION['kiosk']['user_id'])){
      $user_id=$_SESSION['kiosk']['user_id'];
      $query_acc=mysql_query("SELECT * FROM account_t WHERE account_no='$user_id'");
      $row_acc=mysql_fetch_assoc($query_acc);
      $type=$row_acc['type'];

      $query_faculty=mysql_query("SELECT * FROM personnel_members_t, personnel_t, class_t AND personnel_members_t.account_no='$user_id' 
                                  AND personnel_members_t.personnel_id=personnel_t.personnel_id
                                  AND personnel_t.personnel_id=class_t.personnel_id");
      
      $isTeaching=mysql_num_rows($query_acc);

      $privileges = privileges($user_id);

    }else{


    }

?>
    <section id="left-panel" class="show" style="padding:0">
    <?php if($privileges['priv_admin']){ ?>   
                <div class="panel-menu-item <?php if($active_page=='index') echo 'active'?>" style="">
                      <a href="index.php" class="" style="color:black;">
                      <span class="glyphicon glyphicon-list-alt" > </span> General Settings
                      </a>
                </div>
        <?php }
         if ($privileges['priv_admin']) { ?>
                <a href="account_settings.php" class="panel-menu-item  <?php if($active_page=='account_settings') echo 'active '?>" >
                      <span class="glyphicon glyphicon-user" > </span> Accounts Management
                </a>
         <?php } 
         if ($privileges['priv_bull']) {?>
                <a href="faculty_managepost.php" class="panel-menu-item  <?php if($active_page=='e-bulletin') echo 'active'?>">
                      <span class="glyphicon glyphicon-inbox" > </span> E - Bulletin Adminitration
                </a>
        <?php }
         if(($type=='personnel')&&($isTeaching>0)) { ?>
                <a href="faculty_information.php" class="panel-menu-item  <?php if($active_page=='faculty_info') echo 'active'?>" >
                      <span class="glyphicon glyphicon-import" > </span> Faculty Information
                </a>
        <?php }
          if($type=='admin') { ?>
                <a href="image_management.php" class="panel-menu-item  <?php if($active_page=='screensaver') echo 'active'?>" >
                      <span class="glyphicon glyphicon-image" > </span>  Screensaver
                </a>
        <?php }

                 if ($privileges['priv_ois1'] || $privileges['priv_ois2']) { ?>
                <a href="unit_management.php" class="panel-menu-item  <?php if($active_page=='unit_management') echo 'active'?>" >
                      <span class="icon icon-building" > </span> Unit Management
                </a>
        <?php }
         if ($privileges['priv_cms1'] || $privileges['priv_cms2'] || $privileges['priv_cms3']) { ?>
                <a href="#cms_options" data-toggle="collapse" class="panel-menu-item  <?php if($active_page=='cms') echo 'active'?>" >
                      <span class="glyphicon glyphicon-import" > </span> Content Management
                </a>
                        <?php
                        if($active_page=='cms-personnel' || $active_page=='cms-class' || $active_page=='cms-payment')
                            $collapse_cms = "collapse in";
                        else
                            $collapse_cms = "collapse";
                        ?>
                        <ul class=" panel-collapse-menu  <?php echo $collapse_cms; ?>" id="cms_options">
                        <?php
                        if($privileges['priv_cms1']){
                        ?>
                          <li ><a href="cms_personnel_panel.php" class="<?php if($active_page=='cms-personnel') echo 'active'?>">
                            <span class="glyphicon icon-group" > </span> Personnel Data</a>
                          </li>
                        <?php
                        }
                        if($privileges['priv_cms2']){
                        ?>
                          <li ><a href="cms_class_panel.php" class="<?php if($active_page=='cms-class') echo 'active'?>">
                            <span class="glyphicon icon-book" > </span> Enrollment Data</a>
                          </li>
                        <?php
                        }
                        if($privileges['priv_cms3']){
                        ?>
                          <li ><a href="cms_payment_panel.php" class="<?php if($active_page=='cms-payment') echo 'active'?>">
                            <span class="glyphicon icon-money" > </span> Payment Data</a>
                          </li>
                        <?php
                        }
                        ?>
                        </ul>
         <?php
          }
         if ($privileges['priv_admin']) { ?>
                <a href="open_sem.php" class="panel-menu-item  <?php if($active_page=='sem') echo 'active'?>" >
                      <span class="glyphicon glyphicon-cog" > </span> Semester Setup
                </a>
        
         <?php } 

         if ($privileges['priv_admin']) { ?>
              <a href="database_options.php" class="panel-menu-item  <?php if($active_page=='db_deploy') echo 'active'?>" >
                    <span class="glyphicon glyphicon-saved" > </span> Database Deployment
              </a>
          <?php } ?>

    </section><!--#left-panel-->