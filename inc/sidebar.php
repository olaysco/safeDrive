<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form center">
                                <i class="img-raised center"><img src="img/avatars/male.png" style="margin-left: 20px;"/></i>
                                
                            </div>
                            <!-- /input-group -->
                        </li>
                        <?php if($uid != "MTK-001"){ ?>
                        <li>
                            <a href="home.php?page=profile" data-target="profile" rel="tab"><i class="fa fa-user-md fa-fw"></i> Profile</a>
                            
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-folder-open-o fa-fw"></i> Folders<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="home.php?page=personal" data-target="Personal_files" rel="tab"><i class="fa fa-folder"> </i> Personal</a>
                                </li>
                                <li>
                                    <a href="home.php?page=department" data-target="Department_files" rel="tab"><i class="fa fa-folder"> </i> Department</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="home.php?page=trash" data-target="trash" rel="tab"><i class="fa fa-trash-o fa-fw"></i> Trash Can</a>
                            
                        </li>
                        <?php  } else {?>
                        <li>
                            <a href="home.php?page=profile" data-target="profile" rel="tab"><i class="fa fa-user-md fa-fw"></i> Profile</a>
                            
                        </li>
                        
                        <li>
                            <a href="home.php?page=all_resource" data-target="all_resource" rel="tab"><i class="fa fa-folder"></i> Available Resources</a>
                            
                        </li>
                        <li>
                            <a href="home.php?page=users" data-target="users" rel="tab"><i class="fa fa-dashboard fa-fw"></i>User Management</a>
                            
                        </li>
                        <li>
                            <a href="home.php?page=C_user" data-target="C_user" rel="tab"><i class="fa fa-plus-square fa-fw"></i> Create New IGN</a>
                            
                        </li>
                        <li>
                            <a href="home.php?page=history" data-target="history" rel="tab"><i class="fa fa-history fa-fw"></i> Login History</a>
                            
                        </li>
                        <li>
                            <a href="home.php?page=trash" data-target="trash" data-target="trash" rel="tab"><i class="fa fa-trash-o fa-fw"></i> Trash Can</a>
                            
                        </li>
                        
                        <?php }  ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
