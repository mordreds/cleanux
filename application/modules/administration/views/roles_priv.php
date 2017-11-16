           
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Roles & Priviledges</h1>
          <?php 
            if(isset($_SESSION['success']) && !empty($_SESSION['success'])) {
          ?>
          <div class="pull-right">
            <div class="alert alert-success alert-dismissable gh">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="fa fa-times"></i>
                </button>
                 <?= "<em>".$_SESSION['success']."</em>"; unset($_SESSION['success']); ?>
            </div>
          </div>
          <?php 
                }
            if(isset($_SESSION['error']) && !empty($_SESSION['error'])) {
          ?>
          <div class="pull-right">
            <div class="alert alert-danger alert-dismissable gh">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="fa fa-times"></i>
                </button>
                <?php 
                    if(validation_errors())
                        print "<em>".validation_errors()."</em>";
                    else {
                        print "<em>".$_SESSION['error']."</em>";
                        unset($_SESSION['error']);
                        }
                ?>
            </div>
          </div>
          <?php
                }
          ?>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Statistics -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Statistics</h3>
                </div>
                <!-- /.box-header --> 
                <div class="box-body box-profile">
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Users</b> <a class="pull-right">
                      <?php
                        if(!empty($allusers)) {
                            print sizeof($allusers);
                        }
                      ?>
                      </a>
                    </li>
                    <li class="list-group-item">
                      <b>Workgroups</b> <a class="pull-right">
                      <?php
                        if(!empty($allgroups)) {
                            print sizeof($allgroups);
                        }
                      ?>
                      </a>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- Statistics -->
               
              <!-- New Group Box -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Add New Workgroup</h3>
                  <div class="box-tools pull-right">
                    <a href="Groups" class="btn btn-box-tool" data-toggle="tooltip" title="Manage Groups" data-widget="chat-pane-toggle"><i class="fa fa-gears"></i></a>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php //print "<em style='color:red;'>".validation_errors()."</em>"; ?>
                <form action="Add_Group" method="POST">
                    <div class="form-group">
                        <input type="text" value="<?php print @$next_grp_id; ?>" class="form-control" readonly name="grp_id"/>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Group Name" class="form-control" required name="grp_name"/>
                    </div>
                    <!--<div class="form-group">
                        <textarea class="form-control" rows="5" style="resize: none;" placeholder="Description" name="grp_desc"></textarea>
                    </div>-->
                     <button class="btn btn-success btn-block" type="submit" name="add_grp"><b>Add</b></button>
               </form>
               </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- New Group Box -->
              
              <!-- New User Box -->
              <div class="box box-danger collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Add New User</h3>
                  <div class="box-tools pull-right">
                    <a href="Users" class="btn btn-box-tool" data-toggle="tooltip" title="Manage Users" data-widget="chat-pane-toggle"><i class="fa fa-gears"></i></a>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form action="Add_User" method="POST">
                    <div class="form-group">
                        <input type="text" value="<?= @$next_usr_id; ?>" class="form-control" readonly name="emp_id"/>
                    </div>
                    <!--<div class="form-group">
                      <select class="form-control grpselect" name="emp_id" data-placeholder="Select Employee ID" required style="width: 100%;">
                        <option></option>
                        <?php /*
                          if(!empty($all_users_result)) {
                            #
                            foreach ($all_users_result as $users_result) {
                              # code...
                              if($users_result->employee_id == 'ML/SYS/1' && $_SESSION['username'] != 'sysadmin')
                                continue;
                              else 
                                print "<option value='$users_result->employee_id'>$users_result->employee_id</option>";
                            }
                          }*/
                        ?>
                      </select>
                    </div>-->
                    <div class="form-group">
                        <input type="text" placeholder="Username" class="form-control" required name="usr_name" />
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Pasword" class="form-control" required name="usr_pwd_1"/>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Confirm Password" class="form-control" required name="usr_pwd_2"/>
                    </div>
                    <!--<div class="form-group">
                        <textarea class="form-control" rows="5" style="resize: none;" placeholder="Description" name="grp_desc"></textarea>
                    </div>-->
                     <button class="btn btn-success btn-block" type="submit" name="add_usr"><b>Add</b></button>
                  </form>
               </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- New User Box -->
              
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li><a href="#preview" data-toggle="tab">Preview</a></li>
                  <li class="active"><a href="#roles" data-toggle="tab">Assign New</a></li>
                  <li><a href="#workgroup" data-toggle="tab">Manage Workgroup</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="roles">
                    <div class="box-header">
                        <div class="row">
                            <div class="" style="padding-right: 0px;width:180px">
                                <a id="user" class="btn btn-default btn-sm">User</a> - 
                                <a id="group" class="btn btn-default btn-sm">Group</a>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px;">
                            <form action="User_Roles" method="POST" id="users" >
                                <div class="col-md-5">
                                    <div class="form-group">
                                      <label for="user">Select User</label>
                                      <select class="form-control usrselect" name="user" data-placeholder="Select User" required>
                                        <option></option>
                                        <?php 
                                          if(!empty($allusers)) 
                                          {
                                            foreach ($allusers as $users) 
                                            {
                                              print "<option value='$users->Employee_id'>$users->Username</option>";
                                            }
                                          }
                                        ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                      <label for="user">Select Group</label>
                                      <select class="form-control usrselect" name="user_group" data-placeholder="Select Group" required>
                                        <option></option>
                                        <?php 
                                          if(!empty($allgroups)) 
                                          {
                                            foreach ($allgroups as $group) 
                                            {
                                              print "<option value='$group->group_id'>$group->group_name</option>";
                                            }
                                          }
                                        ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br />
                                    <button class="btn btn-block btn-primary" name="user_roles" type="submit" style="margin-top: 5px;">Preview</button>
                                </div>
                            </form>
                          <!-- /.form-Users -->
                          
                          <!-- Forms Group -->
                            <form action="Group_Roles" method="POST" id="groups" >
                                <div class="col-md-5">
                                    <div class="form-group">
                                      <label for="user">Select Group</label>
                                      <select class="form-control grpselect" name="group" data-placeholder="Select Group" required style="width: 100%;">
                                        <option></option>
                                        <?php 
                                          if(!empty($allgroups)) 
                                          {
                                            foreach ($allgroups as $group) 
                                            {
                                              print "<option value='$group->group_id'>$group->group_name</option>";
                                            }
                                          }
                                        
                                            
                                            /*foreach ($allgroups as $group) {
                                              # code...
                                              if(($group->group_id == "KAD/GRP/SYS") && ($_SESSION['username'] != 'sysadmin'))
                                                continue;
                                              else {
                                                if($group->group_id == @$group_id) 
                                                    $option = "selected";
                                                else
                                                    $option = "";
                                                print "<option value='$group->group_id' $option>$group->name</option>";
                                              }
                                            }*/
                                        ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br />
                                    <button class="btn btn-block btn-primary" name="group_roles" type="submit" style="margin-top: 5px;">Set</button>
                                </div>
                                <?php print "<em style='color:red;'>".validation_errors()."</em>"; ?>
                            </form>
                          <!---- ./ Form Group -->
                        </div>
                        <!-- End of Row -->
                    </div>
                    <!-- Post -->
                    <?php
                        # Extracting Group Roles 
                        if(!empty($grp_roles_result))
                        {
                    ?>
                    <div class="box box-danger">
                      <div class="box-body">
                        <form action="Assign_Roles" method="post">
                         <!-- Displaying All Roles Availble -->
                         <?php
                            foreach($grp_roles_result As $grp_roles) 
                            {
                                #
                                $group_roles_unexploded = $grp_roles->roles;
                                    
                                $group_priv_unexploded  = $grp_roles->priviledges;
                            }
                                
                                $group_roles = explode('|',$group_roles_unexploded);
                                
                                $_SESSION['group_priv'] = explode('|',$group_priv_unexploded);
                            
                            #Setting Counter
                             $site_counter = 0;
                             $procurement_counter = 0;
                             $stores_counter = 0;
                             $account_counter = 0;
                             $hum_res_counter = 0;
                             $admin_counter = 0;
                             $gen_counter = 0;
                            #
                             if(!empty($roles)) {
                            #
                            if(!empty($dash_tabs)) {
                                #Converting To Usable
                                foreach($dash_tabs As $role) {
                                    switch($role->type) {
                                        #Site
                                        case 'Site':
                                            #Assigning
                                            $Site[$site_counter]['name'] = $role->name;
                                            $site_counter++;
                                            break;
                                        #Procurment
                                        case 'Procurement':
                                            #Assigning
                                            $Procurement[$procurement_counter]['name'] = $role->name;
                                            $procurement_counter++;
                                            break;
                                        #Stores
                                        case 'Stores':
                                            #Assigning
                                            $Stores[$stores_counter]['name'] = $role->name;
                                            $stores_counter++;
                                            break;
                                        #Accounts
                                        case 'Accounts':
                                                #Assigning
                                                $Accounts[$account_counter]['name'] = $role->name;
                                                $account_counter++;
                                                break;
                                        #Human Resource
                                        case 'Human-Resource':
                                            #Assigning
                                            $Human_Resource[$hum_res_counter]['name'] = $role->name;
                                            $hum_res_counter++;
                                            break;
                                        #Administration
                                        case 'Administration':
                                            #Assigning
                                            $Administration[$admin_counter]['name'] = $role->name;
                                            $admin_counter++;
                                            break;
                                        #General
                                        case 'General':
                                            #Assigning
                                            $General[$gen_counter]['name'] = $role->name;
                                            $gen_counter++;
                                            break;
                                        #Default
                                        default:
                                            #No Priviledges Loaded
                                            $_SESSION['error'] = "No Roles Set";
                                            break;                                         
                                    }
                                }
                                
                                #General
                                if(!empty($General)) {
                            ?>
                            <div class="col-md-4">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#general">
                                            General
                                        </a></h3>
                                    </div><!-- /.box-header -->
                                    <div id="general" class="box-body no-padding panel-collapse collapse in">
                                      <!--<div class="mailbox-controls">
                                         Check all button 
                                        <button class="btn btn-default btn-sm checkbox-toggle">
                                            <i class="fa fa-square-o"></i></button>  
                                            <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                      </div>-->
                                      <div class="table-responsive mailbox-messages">
                                        <table class="table table-hover table-striped">
                                          <tbody>
                                          <?php
                                            for($i = 0; $i < sizeof($General); $i++) {
                                                #Checking 
                                                if(in_array($General[$i]['name'],$group_roles))
                                                    $checked = "Checked";
                                                else
                                                    $checked = "";
                                                #
                                                print "
                                                        <tr>
                                                            <td style='width: 3px;'>
                                                                <input type='checkbox' name='general[]' value='{$General[$i]['name']}' $checked>
                                                            </td>
                                                            <td class='mailbox-subject'><b>{$General[$i]['name']}</b></td>
                                                        </tr>
                                                    ";
                                            }
                                          ?>
                                          </tbody>
                                        </table><!-- /.table -->
                                      </div><!-- /.mail-box-messages -->
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                            <?php            
                                    }
                                    #$General
                                    #Site
                                            if(!empty($Site)) {
                            ?>
                            <div class="col-md-4">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#site">
                                            Site
                                        </a></h3>
                                    </div><!-- /.box-header -->
                                    <div id="site" class="box-body no-padding panel-collapse collapse in">
                                      <!--<div class="mailbox-controls">
                                         Check all button 
                                        <button class="btn btn-default btn-sm checkbox-toggle">
                                            <i class="fa fa-square-o"></i></button>  
                                            <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                      </div>-->
                                      <div class="table-responsive mailbox-messages">
                                        <table class="table table-hover table-striped">
                                          <tbody>
                                          <?php
                                            for($i = 0; $i < sizeof($Site); $i++) {
                                                #Checking 
                                                if(in_array($Site[$i]['name'],$group_roles))
                                                    $checked = "Checked";
                                                else
                                                    $checked = "";
                                                #
                                                print "
                                                        <tr>
                                                            <td style='width:3px;'><input type='checkbox' name='site[]' value='{$Site[$i]['name']}' $checked></td>
                                                            <td class='mailbox-subject'><b>{$Site[$i]['name']}</b></td>
                                                        </tr>
                                                    ";
                                            }
                                          ?>
                                          </tbody>
                                        </table><!-- /.table -->
                                      </div><!-- /.mail-box-messages -->
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                            <?php            
                                    }
                                    #$Site
                                    #$Accounts
                                            if(!empty($Accounts)) {
                            ?>
                            <div class="col-md-4">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accounts">
                                            Accounts
                                        </a></h3>
                                    </div><!-- /.box-header -->
                                    <div id="accounts" class="box-body no-padding panel-collapse collapse in">
                                      <!--<div class="mailbox-controls">
                                         Check all button 
                                        <button class="btn btn-default btn-sm checkbox-toggle">
                                            <i class="fa fa-square-o"></i></button>  
                                            <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                      </div>-->
                                      <div class="table-responsive mailbox-messages">
                                        <table class="table table-hover table-striped">
                                          <tbody>
                                          <?php
                                            for($i = 0; $i < sizeof($Accounts); $i++) {
                                                #Checking 
                                                if(in_array($Accounts[$i]['name'],$group_roles))
                                                    $checked = "Checked";
                                                else
                                                    $checked = "";
                                                #
                                                print "
                                                        <tr>
                                                            <td style='width:3px;'><input type='checkbox' name='accounts[]' value='{$Accounts[$i]['name']}' $checked></td>
                                                            <td class='mailbox-subject'><b>{$Accounts[$i]['name']}</b></td>
                                                        </tr>
                                                    ";
                                            }
                                          ?>
                                          </tbody>
                                        </table><!-- /.table -->
                                      </div><!-- /.mail-box-messages -->
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                            <?php            
                                    }
                                    #Accounts
                                    #Procurement
                                            if(!empty($Procurement)) {
                            ?>
                            <div class="col-md-4">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#procurement">
                                            Procurement
                                        </a></h3>
                                    </div><!-- /.box-header -->
                                    <div id="procurement" class="box-body no-padding panel-collapse collapse in">
                                      <!--<div class="mailbox-controls">
                                         Check all button 
                                        <button class="btn btn-default btn-sm checkbox-toggle">
                                            <i class="fa fa-square-o"></i></button>  
                                            <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                      </div>-->
                                      <div class="table-responsive mailbox-messages">
                                        <table class="table table-hover table-striped">
                                          <tbody>
                                          <?php
                                            for($i = 0; $i < sizeof($Procurement); $i++) {
                                                #Checking 
                                                if(in_array($Procurement[$i]['name'],$group_roles))
                                                    $checked = "Checked";
                                                else
                                                    $checked = "";
                                                #
                                                print "
                                                        <tr>
                                                            <td style='width: 3px;'><input type='checkbox' name='procurement[]' value='{$Procurement[$i]['name']}' $checked></td>
                                                            <td class='mailbox-subject'><b>{$Procurement[$i]['name']}</b></td>
                                                        </tr>
                                                    ";
                                            }
                                          ?>
                                          </tbody>
                                        </table><!-- /.table -->
                                      </div><!-- /.mail-box-messages -->
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                            <?php            
                                    }
                                    #Procurement
                                    #$Human_Resource
                                            if(!empty($Human_Resource)) {
                            ?>
                            <div class="col-md-4">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#human_Resource">
                                            Human Resource
                                        </a></h3>
                                    </div><!-- /.box-header -->
                                    <div id="human_Resource" class="box-body no-padding panel-collapse collapse in">
                                      <!--<div class="mailbox-controls">
                                         Check all button 
                                        <button class="btn btn-default btn-sm checkbox-toggle">
                                            <i class="fa fa-square-o"></i></button>  
                                            <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                      </div>-->
                                      <div class="table-responsive mailbox-messages">
                                        <table class="table table-hover table-striped">
                                          <tbody>
                                          <?php
                                            for($i = 0; $i < sizeof($Human_Resource); $i++) {
                                                #Checking 
                                                if(in_array($Human_Resource[$i]['name'],$group_roles))
                                                    $checked = "Checked";
                                                else
                                                    $checked = "";
                                                #
                                                print "
                                                        <tr>
                                                            <td style='width: 3px;'><input type='checkbox' name='human_resource[]' value='{$Human_Resource[$i]['name']}' $checked></td>
                                                            <td class='mailbox-subject'><b>{$Human_Resource[$i]['name']}</b></td>
                                                        </tr>
                                                    ";
                                            }
                                          ?>
                                          </tbody>
                                        </table><!-- /.table -->
                                      </div><!-- /.mail-box-messages -->
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                            <?php            
                                    }
                                    #$Human_Resource
                                    #$Stores
                                            if(!empty($Stores)) {
                            ?>
                            <div class="col-md-4">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#stores">
                                            Stores
                                        </a></h3>
                                    </div><!-- /.box-header -->
                                    <div id="stores" class="box-body no-padding panel-collapse collapse in">
                                      <!--<div class="mailbox-controls">
                                         Check all button 
                                        <button class="btn btn-default btn-sm checkbox-toggle">
                                            <i class="fa fa-square-o"></i></button>  
                                            <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                      </div>-->
                                      <div class="table-responsive mailbox-messages">
                                        <table class="table table-hover table-striped">
                                          <tbody>
                                          <?php
                                            for($i = 0; $i < sizeof($Stores); $i++) {
                                                #Checking 
                                                if(in_array($Stores[$i]['name'],$group_roles))
                                                    $checked = "Checked";
                                                else
                                                    $checked = "";
                                                #
                                                print "
                                                        <tr>
                                                            <td style='width: 3px;'><input type='checkbox' name='stores[]' value='{$Stores[$i]['name']}' $checked></td>
                                                            <td class='mailbox-subject'><b>{$Stores[$i]['name']}</b></td>
                                                        </tr>
                                                    ";
                                            }
                                          ?>
                                          </tbody>
                                        </table><!-- /.table -->
                                      </div><!-- /.mail-box-messages -->
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                            <?php            
                                    }
                                    #Stores
                                    #$Administration
                                            if(!empty($Administration)) {
                            ?>
                            <div class="col-md-4">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#administration">
                                            Administration
                                        </a></h3>
                                    </div><!-- /.box-header -->
                                    <div id="administration" class="box-body no-padding panel-collapse collapse in">
                                      <!--<div class="mailbox-controls">
                                         Check all button 
                                        <button class="btn btn-default btn-sm checkbox-toggle">
                                            <i class="fa fa-square-o"></i></button>  
                                            <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                      </div>-->
                                      <div class="table-responsive mailbox-messages">
                                        <table class="table table-hover table-striped">
                                          <tbody>
                                          <?php
                                            for($i = 0; $i < sizeof($Administration); $i++) {
                                                #Checking 
                                                if(in_array($Administration[$i]['name'],$group_roles))
                                                    $checked = "Checked";
                                                else
                                                    $checked = "";
                                                #
                                                print "
                                                        <tr>
                                                            <td style='width: 3px;'><input type='checkbox' name='administration[]' value='{$Administration[$i]['name']}' $checked></td>
                                                            <td class='mailbox-subject'><b>{$Administration[$i]['name']}</b></td>
                                                        </tr>
                                                    ";
                                            }
                                          ?>
                                          </tbody>
                                        </table><!-- /.table -->
                                      </div><!-- /.mail-box-messages -->
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                            <?php            
                                  }
                                  #$Administration
                                  #Confirm Button
                                  print "<hr/>
                                        
                                        <div class='col-sm-3' style='margin-left:40%'>
                                            <button class='btn btn-danger pull-right btn-block btn-sm' name='assign' type='submit'>Confirm & Set Priviledges</button>
                                        </div>
                                    "; 
                                }
                              }                                       
                            ?>
                         </form>
                         <!-- Displaying All Roles Availble -->

                         <!-- Displaying All Priviledges Availble -->
                        <form action="Assign_Priviledges" method="post">
                           <!-- Displaying All Roles Availble -->
                           <?php
                              # Extracting Priviledges
                              if(!empty($priv_result))
                              {
                                $group_priv = $_SESSION['group_priv'];
                                
                                 #Setting Counter
                                 $site_counter = 0;
                                 $procurement_counter = 0;
                                 $stores_counter = 0;
                                 $account_counter = 0;
                                 $hum_res_counter = 0;
                                 $admin_counter = 0;
                                 $gen_counter = 0;

                                 //print_r($priv_result);
                                 foreach ($priv_result as $key => $value) 
                                 {
                                    #Looping through values
                                    foreach ($value as $val) 
                                    {
                                       # code...
                                       switch($val->type) {
                                          #Site
                                          case 'Site':
                                             #Role Assignment
                                             $Site_Priv[$site_counter]['role'] = $key;
                                             #Priv Assignment
                                             $Site_Priv[$site_counter]['priv'] = explode('|', $val->priviledges);
                                             $site_counter++;
                                             break;
                                          #Procurment
                                          case 'Procurement':
                                             #Role Assignment
                                             $Procurement_Priv[$procurement_counter]['role'] = $key;
                                             #Priv Assignment
                                             $Procurement_Priv[$procurement_counter]['priv'] = explode('|', $val->priviledges);
                                             $procurement_counter++;
                                             break;
                                          #Stores
                                          case 'Stores':
                                             #Role Assignment
                                             $Stores_Priv[$stores_counter]['role'] = $key;
                                             #Priv Assignment
                                             $Stores_Priv[$stores_counter]['priv'] = explode('|', $val->priviledges);
                                             $stores_counter++;
                                             break;
                                          #Accounts
                                          case 'Accounts':
                                             #Role Assignment
                                             $Accounts_Priv[$account_counter]['role'] = $key;
                                             #Priv Assignment
                                             $Accounts_Priv[$account_counter]['priv'] = explode('|', $val->priviledges);
                                             $account_counter++;
                                             break;
                                          #Human Resource
                                          case 'Human-Resource':
                                             #Role Assignment
                                             $Human_Resource_Priv[$hum_res_counter]['role'] = $key;
                                             #Priv Assignment
                                             $Human_Resource_Priv[$hum_res_counter]['priv'] = explode('|', $val->priviledges);
                                             $hum_res_counter++;
                                             break;
                                          #Administration
                                          case 'Administration':
                                             #Role Assignment
                                             $Administration_Priv[$admin_counter]['role'] = $key;
                                             #Priv Assignment
                                             $Administration_Priv[$admin_counter]['priv'] = explode('|', $val->priviledges);
                                             $admin_counter++;
                                             break;
                                          #General
                                          case 'General':
                                             #Role Assignment
                                             $General_priv[$gen_counter]['role'] = $key;
                                             #Priv Assignment
                                             $General_priv[$gen_counter]['priv'] = explode('|', $val->priviledges);
                                             $gen_counter++;
                                             break;
                                          #Default
                                          default:
                                             #No Priviledges Loaded
                                             $_SESSION['error'] = "No Available Priviledge(s)";
                                             break;                                         
                                       }
                                    }
                                 }
                                #General
                                if(isset($General_priv)) 
                              {
                                 
                           ?>
                           <div class="box box-success">
                              <div class="box-header with-border">
                                 <h3 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#general">
                                       General
                                    </a>
                                 </h3>
                              </div><!-- /.box-header -->
                              <div id="general" class="box-body no-padding panel-collapse collapse">
                                 <?php
                                    for($i = 0; $i < sizeof($General_priv); $i++) {
                                       if(!empty($General_priv[$i]['role'])) {
                                 ?>
                                 <div class="col-md-4 priv">
                                    <div class="box box-default">
                                       <div class="box-header with-border">
                                          <h3 class="box-title">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#general<?= $i; ?>">
                                                <?= $General_priv[$i]['role']; ?>
                                             </a>
                                          </h3>
                                       </div><!-- /.box-header -->
                                       <div id="#general<?= $i; ?>" class="box-body no-padding panel-collapse collapse in">
                                          <!--<div class="mailbox-controls">
                                             Check all button 
                                             <button class="btn btn-default btn-sm checkbox-toggle">
                                                <i class="fa fa-square-o"></i></button>  
                                                <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                          </div>-->
                                          <div class="table-responsive mailbox-messages">
                                             <table class="table table-hover table-striped">
                                                <tbody>
                                                   <?php
                                                     for($a = 0; $a < sizeof($General_priv[$i]['priv']); $a++) {
                                                         #Printing Priviledges under Role 
                                                         if(!empty($General_priv[$i]['priv'][$a]))
                                                         {
                                                            if(in_array($General_priv[$i]['role']-$General_priv[$i]['name'],$group_priv))
                                                                $checked = "Checked";
                                                            else
                                                                $checked = "";
                                                            print 
                                                            "
                                                               <tr>
                                                                  <td style='width: 3px;'><input type='checkbox' name='Priviledges[]' value='{$General_priv[$i]['role']}-{$General_priv[$i]['priv'][$a]}' {$checked}></td>
                                                                  <td class='mailbox-subject'><b>{$General_priv[$i]['priv'][$a]}</b></td>
                                                               </tr>
                                                            ";
                                                         }
                                                         else {
                                                            print "<div class='priv_error'> No Priviledges Set </div>";
                                                         }
                                                     }
                                                   ?>
                                                </tbody>
                                             </table><!-- /.table -->
                                          </div><!-- /.mail-box-messages -->
                                       </div><!-- /.box-body -->
                                    </div>
                                 </div>
                                 <?php } } ?>
                              </div>
                           </div>
                           <?php            
                                 
                              }
                              #General
                              
                              #Site
                              if(!empty($Site_Priv)) 
                              {
                           ?>
                           <div class="box box-success">
                              <div class="box-header with-border">
                                 <h3 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#site">
                                       Site
                                    </a>
                                 </h3>
                              </div><!-- /.box-header -->
                              <div id="site" class="box-body no-padding panel-collapse collapse">
                                 <?php
                                    for($i = 0; $i < sizeof($Site_Priv); $i++) {
                                       if(!empty($Site_Priv[$i]['role'])) {
                                 ?>
                                 <div class="col-md-4 priv">
                                    <div class="box box-default">
                                       <div class="box-header with-border">
                                          <h3 class="box-title">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#site<?= $i; ?>">
                                                <?= $Site_Priv[$i]['role']; ?>
                                             </a>
                                          </h3>
                                       </div><!-- /.box-header -->
                                       <div id="#site<?= $i; ?>" class="box-body no-padding panel-collapse collapse in">
                                          <!--<div class="mailbox-controls">
                                             Check all button 
                                             <button class="btn btn-default btn-sm checkbox-toggle">
                                                <i class="fa fa-square-o"></i></button>  
                                                <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                          </div>-->
                                          <div class="table-responsive mailbox-messages">
                                             <table class="table table-hover table-striped">
                                                <tbody>
                                                   <?php
                                                     for($a = 0; $a < sizeof($Site_Priv[$i]['priv']); $a++) {
                                                         #Printing Priviledges under Role 
                                                         if(!empty($Site_Priv[$i]['priv'][$a]))
                                                         {
                                                            if(in_array($Site_Priv[$i]['role']-$Site_Priv[$i]['priv'][$a],$group_priv))
                                                                $checked = "Checked";
                                                            else
                                                                $checked = "";
                                                                
                                                            print 
                                                            "
                                                               <tr>
                                                                  <td style='width: 3px;'><input type='checkbox' name='Priviledges[]' value='{$Site_Priv[$i]['role']}-{$Site_Priv[$i]['priv'][$a]}' {$checked}></td>
                                                                  <td class='mailbox-subject'><b>{$Site_Priv[$i]['priv'][$a]}</b></td>
                                                               </tr>
                                                            ";
                                                         }
                                                         else {
                                                            print "<div class='priv_error'> No Priviledges Set </div>";
                                                         }
                                                     }
                                                   ?>
                                                </tbody>
                                             </table><!-- /.table -->
                                          </div><!-- /.mail-box-messages -->
                                       </div><!-- /.box-body -->
                                    </div>
                                 </div>
                                 <?php } }?>
                              </div>
                           </div>
                           <?php            
                                 
                              }
                              #Site
                              
                              #Accounts
                              if(!empty($Accounts_Priv)) 
                              {
                                
                           ?>
                           <div class="box box-success">
                              <div class="box-header with-border">
                                 <h3 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accounts">
                                       Accounts
                                    </a>
                                 </h3>
                              </div><!-- /.box-header -->
                              <div id="accounts" class="box-body no-padding panel-collapse collapse">
                                 <?php
                                    for($i = 0; $i < sizeof($Accounts_Priv); $i++) {
                                       if(!empty($Accounts_Priv[$i]['role'])) {
                                 ?>
                                 <div class="col-md-4 priv">
                                    <div class="box box-default">
                                       <div class="box-header with-border">
                                          <h3 class="box-title">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#accounts<?= $i; ?>">
                                                <?= $Accounts_Priv[$i]['role']; ?>
                                             </a>
                                          </h3>
                                       </div><!-- /.box-header -->
                                       <div id="#accounts<?= $i; ?>" class="box-body no-padding panel-collapse collapse in">
                                          <!--<div class="mailbox-controls">
                                             Check all button 
                                             <button class="btn btn-default btn-sm checkbox-toggle">
                                                <i class="fa fa-square-o"></i></button>  
                                                <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                          </div>-->
                                          <div class="table-responsive mailbox-messages">
                                             <table class="table table-hover table-striped">
                                                <tbody>
                                                   <?php
                                                     for($a = 0; $a < sizeof($Accounts_Priv[$i]['priv']); $a++) {
                                                         #Printing Priviledges under Role 
                                                         if(!empty($Accounts_Priv[$i]['priv'][$a]))
                                                         {
                                                            if(in_array($Accounts_Priv[$i]['role']-$Accounts_Priv[$i]['priv'][$a],$group_priv))
                                                                $checked = "Checked";
                                                            else
                                                                $checked = "";
                                                            
                                                            print 
                                                            "
                                                               <tr>
                                                                  <td style='width: 3px;'><input type='checkbox' name='Priviledges[]' value='{$Accounts_Priv[$i]['role']}-{$Accounts_Priv[$i]['priv'][$a]}' {$checked}></td>
                                                                  <td class='mailbox-subject'><b>{$Accounts_Priv[$i]['priv'][$a]}</b></td>
                                                               </tr>
                                                            ";
                                                         }
                                                         else {
                                                            print "<div class='priv_error'> No Priviledges Set </div>";
                                                         }
                                                     }
                                                   ?>
                                                </tbody>
                                             </table><!-- /.table -->
                                          </div><!-- /.mail-box-messages -->
                                       </div><!-- /.box-body -->
                                    </div>
                                 </div>
                                 <?php } }?>
                              </div>
                           </div>
                           <?php            
                                 
                              }
                              #Accounts

                              #Procurement
                              if(!empty($Procurement_Priv)) 
                              {
                           ?>
                           <div class="box box-success">
                              <div class="box-header with-border">
                                 <h3 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#procurement">
                                       Procurement
                                    </a>
                                 </h3>
                              </div><!-- /.box-header -->
                              <div id="procurement" class="box-body no-padding panel-collapse collapse">
                                 <?php
                                    for($i = 0; $i < sizeof($Procurement_Priv); $i++) {
                                       if(!empty($Procurement_Priv[$i]['role'])) {
                                 ?>
                                 <div class="col-md-4 priv" >
                                    <div class="box box-default">
                                       <div class="box-header with-border">
                                          <h3 class="box-title">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#procurement<?= $i; ?>">
                                                <?= $Procurement_Priv[$i]['role']; ?>
                                             </a>
                                          </h3>
                                       </div><!-- /.box-header -->
                                       <div id="#procurement<?= $i; ?>" class="box-body no-padding panel-collapse collapse in">
                                          <!--<div class="mailbox-controls">
                                             Check all button 
                                             <button class="btn btn-default btn-sm checkbox-toggle">
                                                <i class="fa fa-square-o"></i></button>  
                                                <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                          </div>-->
                                          <div class="table-responsive mailbox-messages">
                                             <table class="table table-hover table-striped">
                                                <tbody>
                                                   <?php
                                                     for($a = 0; $a < sizeof($Procurement_Priv[$i]['priv']); $a++) {
                                                         #Printing Priviledges under Role 
                                                         if(!empty($Procurement_Priv[$i]['priv'][$a]))
                                                         {
                                                            if(in_array($Procurement_Priv[$i]['role']-$Procurement_Priv[$i]['priv'][$a],$group_priv))
                                                                $checked = "Checked";
                                                            else
                                                                $checked = "";
                                                            
                                                            print 
                                                            "
                                                               <tr>
                                                                  <td style='width: 3px;'><input type='checkbox' name='Priviledges[]' value='{$Procurement_Priv[$i]['role']}-{$Procurement_Priv[$i]['priv'][$a]}' {$checked}></td>
                                                                  <td class='mailbox-subject'><b>{$Procurement_Priv[$i]['priv'][$a]}</b></td>
                                                               </tr>
                                                            ";
                                                         }
                                                         else {
                                                            print "<div class='priv_error'> No Priviledges Set </div>";
                                                         }
                                                     }
                                                   ?>
                                                </tbody>
                                             </table><!-- /.table -->
                                          </div><!-- /.mail-box-messages -->
                                       </div><!-- /.box-body -->
                                    </div>
                                 </div>
                                 <?php } } ?>
                              </div>
                           </div>
                           <?php            
                                 
                              }
                              #Procurement
                              
                              #Human_Resource
                              if(!empty($Human_Resource_Priv)) 
                              {
                           ?>
                           <div class="box box-success">
                              <div class="box-header with-border">
                                 <h3 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#hr">
                                       Human Resource
                                    </a>
                                 </h3>
                              </div><!-- /.box-header -->
                              <div id="hr" class="box-body no-padding panel-collapse collapse">
                                 <?php
                                    for($i = 0; $i < sizeof($Human_Resource_Priv); $i++) {
                                       if(!empty($Human_Resource_Priv[$i]['role'])) {
                                          #code
                                 ?>
                                 <div class="col-md-4 priv">
                                    <div class="box box-default">
                                       <div class="box-header with-border">
                                          <h3 class="box-title">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#hr<?= $i; ?>">
                                                <?= $Human_Resource_Priv[$i]['role']; ?>
                                             </a>
                                          </h3>
                                       </div><!-- /.box-header -->
                                       <div id="#hr<?= $i; ?>" class="box-body no-padding panel-collapse collapse in">
                                          <!--<div class="mailbox-controls">
                                             Check all button 
                                             <button class="btn btn-default btn-sm checkbox-toggle">
                                                <i class="fa fa-square-o"></i></button>  
                                                <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                          </div>-->
                                          <div class="table-responsive mailbox-messages">
                                             <table class="table table-hover table-striped">
                                                <tbody>
                                                   <?php
                                                     for($a = 0; $a < sizeof($Human_Resource_Priv[$i]['priv']); $a++) {
                                                         #Printing Priviledges under Role 
                                                         if(!empty($Human_Resource_Priv[$i]['priv'][$a]))
                                                         {
                                                            if(in_array($Human_Resource_Priv[$i]['role']-$Human_Resource_Priv[$i]['priv'][$a],$group_priv))
                                                                $checked = "Checked";
                                                            else
                                                                $checked = "";
                                                             
                                                            print 
                                                            "
                                                               <tr>
                                                                  <td style='width: 3px;'><input type='checkbox' name='Priviledges[]' value='{$Human_Resource_Priv[$i]['role']}-{$Human_Resource_Priv[$i]['priv'][$a]}' {$checked}></td>
                                                                  <td class='mailbox-subject'><b>{$Human_Resource_Priv[$i]['priv'][$a]}</b></td>
                                                               </tr>
                                                            ";
                                                         }
                                                         else {
                                                            print "<div class='priv_error'> No Priviledges Set </div>";
                                                         }
                                                     }
                                                   ?>
                                                </tbody>
                                             </table><!-- /.table -->
                                          </div><!-- /.mail-box-messages -->
                                       </div><!-- /.box-body -->
                                    </div>
                                 </div>
                                 <?php } }?>
                              </div>
                           </div>
                           <?php            
                                 
                              }
                              #Human_Resource
                              
                              #Stores
                              if(!empty($Stores_Priv)) 
                              {
                           ?>
                           <div class="box box-success">
                              <div class="box-header with-border">
                                 <h3 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#stores">
                                       Stores
                                    </a>
                                 </h3>
                              </div><!-- /.box-header -->
                              <div id="stores" class="box-body no-padding panel-collapse collapse">
                                 <?php
                                    for($i = 0; $i < sizeof($Stores_Priv); $i++) {
                                       if(!empty($Stores_Priv[$i]['role'])) {
                                 ?>
                                 <div class="col-md-4 priv">
                                    <div class="box box-default">
                                       <div class="box-header with-border">
                                          <h3 class="box-title">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#stores<?= $i; ?>">
                                                <?= $Stores_Priv[$i]['role']; ?>
                                             </a>
                                          </h3>
                                       </div><!-- /.box-header -->
                                       <div id="#stores<?= $i; ?>" class="box-body no-padding panel-collapse collapse in">
                                          <!--<div class="mailbox-controls">
                                             Check all button 
                                             <button class="btn btn-default btn-sm checkbox-toggle">
                                                <i class="fa fa-square-o"></i></button>  
                                                <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                          </div>-->
                                          <div class="table-responsive mailbox-messages">
                                             <table class="table table-hover table-striped">
                                                <tbody>
                                                   <?php
                                                      for($a = 0; $a < sizeof($Stores_Priv[$i]['priv']); $a++) {
                                                         #Printing Priviledges under Role 
                                                         if(!empty($Stores_Priv[$i]['priv'][$a]))
                                                         {
                                                            if(in_array($Stores_Priv[$i]['role']-$Stores_Priv[$i]['priv'][$a],$group_priv))
                                                                $checked = "Checked";
                                                            else
                                                                $checked = "";
                                                                
                                                            print 
                                                               "
                                                                  <tr>
                                                                  <td style='width: 3px;'><input type='checkbox' name='Priviledges[]' value='{$Stores_Priv[$i]['role']}-{$Stores_Priv[$i]['priv'][$a]}' {$checked}></td>
                                                                     <td class='mailbox-subject'><b>{$Stores_Priv[$i]['priv'][$a]}</b></td>
                                                                  </tr>
                                                               ";
                                                         }
                                                         else {
                                                            print "<div class='priv_error'> No Priviledges Set </div>";
                                                         }
                                                      }
                                                   ?>
                                                </tbody>
                                             </table><!-- /.table -->
                                          </div><!-- /.mail-box-messages -->
                                       </div><!-- /.box-body -->
                                    </div>
                                 </div>
                                 <?php } } ?>
                              </div>
                           </div>
                           <?php            
                                 
                              }
                              #Stores
                              
                              #Administration
                              if(!empty($Administration_Priv)) 
                              {
                           ?>
                           <div class="box box-success">
                              <div class="box-header with-border">
                                 <h3 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#admin">
                                       Administration
                                    </a>
                                 </h3>
                              </div><!-- /.box-header -->
                              <div id="admin" class="box-body no-padding panel-collapse collapse">
                                 <?php
                                    for($i = 0; $i < sizeof($Administration_Priv); $i++) {
                                       if(!empty($Administration_Priv[$i]['role'])) {
                                 ?>
                                 <div class="col-md-4 priv">
                                    <div class="box box-default">
                                       <div class="box-header with-border">
                                          <h3 class="box-title">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#admin<?= $i; ?>">
                                                <?= $Administration_Priv[$i]['role']; ?>
                                             </a>
                                          </h3>
                                       </div><!-- /.box-header -->
                                       <div id="#admin<?= $i; ?>" class="box-body no-padding panel-collapse collapse in">
                                          <!--<div class="mailbox-controls">
                                             Check all button 
                                             <button class="btn btn-default btn-sm checkbox-toggle">
                                                <i class="fa fa-square-o"></i></button>  
                                                <h4 style="display: inline; font-size: 15px;">Check All</h4>
                                          </div>-->
                                          <div class="table-responsive mailbox-messages">
                                             <table class="table table-hover table-striped">
                                                <tbody>
                                                   <?php
                                                      for($a = 0; $a < sizeof($Administration_Priv[$i]['priv']); $a++) {
                                                            #Printing Priviledges under Role 
                                                            if(!empty($Administration_Priv[$i]['priv'][$a]))
                                                            {
                                                               if(in_array($Administration_Priv[$i]['role']-$Administration_Priv[$i]['priv'][$a],$group_priv))
                                                                $checked = "Checked";
                                                            else
                                                                $checked = "";
                                                                
                                                               print 
                                                               "
                                                                  <tr>
                                                                     <td style='width: 3px;'><input type='checkbox' name='Priviledges[]' value='{$Administration_Priv[$i]['role']}-{$Administration_Priv[$i]['priv'][$a]}' {$checked}></td>
                                                                     <td class='mailbox-subject'><b>{$Administration_Priv[$i]['priv'][$a]}</b></td>
                                                                  </tr>
                                                               ";
                                                            }
                                                            else {
                                                               print "<div class='priv_error'> No Priviledges Set </div>";
                                                            }
                                                      }
                                                   ?>
                                                </tbody>
                                             </table><!-- /.table -->
                                          </div><!-- /.mail-box-messages -->
                                       </div><!-- /.box-body -->
                                    </div>
                                 </div>
                                 <?php } }?>
                              </div>
                           </div>
                           <?php            
                                 
                              }
                              #Administration
                                  #Confirm Button
                                  print "<hr/>
                                        
                                        <div class='col-sm-3' style='margin-left:40%'>
                                            <button class='btn btn-danger pull-right btn-block btn-sm' name='assign_priv' type='submit'>Assign</button>
                                        </div>
                                    "; 
                              }                                       
                            ?>
                         </form>
                         <!-- Displaying All Priviledges Availble -->

                        </div>
                    <!-- /.box-body -->
                    </div>
                <?php } ?>
                <!-- /.tab-content -->
              </div><!-- /.col -->
              <div class="tab-pane" id="workgroup">
                <div class="box box-default">
                   <div class="box-body">
                      <table id="example1" class="table table-striped table-hover table-responsive">
                         <thead style="background-color:#009688;color:white">
                            <th> Id # </th>
                            <th> Workgroup Name </th>
                            <th> Roles </th>
                            <th> Priviledges </th>
                            <th> Action </th>
                         </thead>
                         <tbody>
                            <?php
                                $allgroups = $this->SettingsModel->allgroups();
                                #
                                if(!empty($allgroups)) 
                                {
                                    $counter = 0;
                                    
                                    foreach ($allgroups as $group) 
                                    {
                                        if(($group->group_id == "KAD/GRP/SYS") && ($_SESSION['username'] != 'sysadmin'))
                                            continue;
                                        else 
                                        {
                            ?>
                            <tr>
                                <td><?= $group->group_id; ?></td>
                                <td><?= $group->name; ?></td>
                                <td><?= substr($group->roles, 0, 20); ?></td>
                                <td><?= substr($group->priviledges, 0, 20); ?></td>
                                <td>
                                    <a href="" title="Delete" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#det<?= $counter; ?>">
                                       <i class="fa fa-th"></i> Details
                                    </a>
                                    <?php
                                        if($group->group_id != "KAD/GRP/SYS") {
                                    ?>
                                    <a href="" title="Delete" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#del<?= $counter; ?>">
                                       <i class="fa fa-line-chart"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            <?php
                                        }
                                        }
                                      $counter++;
                                    }
                                }
                            ?>
                         </tbody>
                      </table>
                   </div>
                </div>
                
                <?php
                    $allgroups = $this->SettingsModel->allgroups();
                    
                    if(!empty($allgroups)) 
                    {
                        $counter = 0;
                                    
                        foreach ($allgroups as $group) 
                        {
                            if(($group->group_id == "KAD/GRP/SYS") && ($_SESSION['username'] != 'sysadmin'))
                                continue;
                            else 
                            {
                ?>
                <!-- View Details Modal -->
                <div class="modal fade" id='det<?= $counter; ?>' role='dialog' aria-hidden='true' >
                   <div class="modal-dialog" style="width: 900px;">
                      <div class="modal-content">
                         <form action="" method="post">
                            <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                               <h4 class="modal-title">Details</h4>
                            </div>
                            <div class="modal-body">
                                <!-- Roles -->
                                <div  class="">
                                    <div class="box box-danger">
                                       <div class="box-header with-border">
                                          Group Role(s)
                                       </div><!-- /.box-header -->
                                       <div class="box-body">
                                          <div class="table-responsive mailbox-messages">
                                            <table class="table table-hover table-striped">
                                              <thead>
                                              </thead>
                                              <tbody>
                                              <?php
                                                if(!empty($group->roles)) {
                                                   $rows_exploded = explode('|',$group->roles);
                                                   for($i = 0; $i < sizeof($rows_exploded); $i++) {
                                                      if(!empty($rows_exploded[$i])) {
                                              ?>
                                              <tr>
                                                 <td style='width: 3px;'>
                                                    <input type='checkbox' name='edit_roles[]' value='' disabled checked>
                                                 </td>
                                                 <td class='mailbox-subject'><b><?= $rows_exploded[$i]; ?></b></td>
                                                 <td></td>
                                                 <?php 
                                                        }
                                                        $i++; 
                                                        if(!empty($rows_exploded[$i])) {
                                                 ?>
                                                 <td style='width: 3px;'>
                                                    <input type='checkbox' name='edit_roles[]' value='' disabled checked>
                                                 </td>
                                                 <td class='mailbox-subject'><b><?= $rows_exploded[$i]; ?></b></td>
                                                 <td></td>
                                                 <?php 
                                                        }
                                                        $i++; 
                                                        if(!empty($rows_exploded[$i])) {
                                                 ?>
                                                 <td style='width: 3px;'>
                                                    <input type='checkbox' name='edit_roles[]' value='' disabled checked>
                                                 </td>
                                                 <td class='mailbox-subject'><b><?= $rows_exploded[$i]; ?></b></td>
                                              </tr>
                                              <?php 
                                                     }
                                                   }
                                                }
                                              ?>
                                              </tbody>
                                            </table><!-- /.table -->
                                          </div><!-- /.mail-box-messages -->
                                       </div>
                                    </div>
                                </div>
                                <!-- Roles -->
                                <!-- Priviledges -->
                                <div  class="">
                                    <div class="box box-danger">
                                       <div class="box-header with-border">
                                          Priviledges
                                       </div><!-- /.box-header -->
                                       <div class="box-body">
                                          <?php
                                                if(!empty($group->roles)) {
                                                   $rows_exploded = explode('|',$group->priviledges);
                                                   for($i = 0; $i < sizeof($rows_exploded); $i++) {
                                                      if(!empty($rows_exploded[$i])) {
                                          ?>
                                          <!-------- General --------->
                                          <div class="col-xs-4">
                                              <div class="box box-success">
                                                 <div class="box-header with-border">
                                                    <?= $rownom[0]; ?>
                                                 </div><!-- /.box-header -->
                                                 <div class="box-body">
                                                    <div class="table-responsive mailbox-messages">
                                                     <table class="table table-hover table-striped">
                                                        <tbody>
                                                            <tr>
                                                               <td style='width: 3px;'><input type='checkbox' name='Priviledges[]' value='' checked /></td>
                                                               <td class='mailbox-subject'><b><?= $rownom[1]; ?></b></td>
                                                            </tr>
                                                           <?php
                                                             /*for($a = 0; $a < sizeof($Site_Priv[$i]['priv']); $a++) {
                                                                 #Printing Priviledges under Role 
                                                                 if(!empty($Site_Priv[$i]['priv'][$a]))
                                                                 {
                                                                    if(in_array($Site_Priv[$i]['role']-$Site_Priv[$i]['priv'][$a],$group_priv))
                                                                        $checked = "Checked";
                                                                    else
                                                                        $checked = "";
                                                                        
                                                                    print 
                                                                    "
                                                                       
                                                                    ";
                                                                 }
                                                                 else {
                                                                    //print "<div class='priv_error'> No Priviledges Set </div>";
                                                                 }
                                                             }*/
                                                           ?>
                                                        </tbody>
                                                     </table><!-- /.table -->
                                                  </div>
                                                 </div>
                                              </div>
                                          </div>
                                          <!-------- General --------->
                                          <?php 
                                                    }
                                                }
                                                
                                            }
                                          ?>
                                       </div>
                                    </div>
                                </div>
                                <!-- Priviledges -->
                            </div>
                         </form>
                      </div><!-- /.modal-content -->
                   </div><!-- /.modal-dialog -->
                </div>
                <!-- View Details Modal -->
                
                <!-- View Delete Modal -->
                <div class="modal fade" id='del<?= $counter; ?>' role='dialog' aria-hidden='true' >
                      <div class="modal-dialog">
                        <div class="modal-content">
                        <form action="Delete_Workgroup" method="post">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                            <h4 class="modal-title">Details</h4>
                          </div>
                          <div class="modal-body">
                                Do You Want To Really Delete <?php echo "<strong><em>".$group->name."</em></strong>"; ?> ....
                                <input type="hidden" name="group_id" value="<?= $group->group_id; ?>" />
                          </div>
                          <div class="modal-footer">
                            <div class="col-md-2"></div>
                            <div class="col-md-6">
                              <button class="btn btn-danger" type="submit" name="grp_del"><i class="fa fa-database"></i> Delete</button>
                              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                            <div class="col-md-4"></div>
                          </div>
                          </form>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                <!-- View Delete Modal -->
                
                <?php
                            }
                          $counter++;
                        }
                    }
                ?>
              </div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2016 <a href="http://wisspri.com" >WissPri Technologies Limited</a>.</strong> All rights reserved.
      </footer>