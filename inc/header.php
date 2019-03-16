<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
    <a class="navbar-brand text-white" href="#">MTK Consult Drive <em class="fa fa-cloud fa-fw"></em></a>
     
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <?php if($uid != "MTK-001"){ ?>
                <li class="dropdown">
                    <a class="dropdown-toggle file-upload" data-toggle="modal" data-target="#uploadModal" href="#" id="uploadBut">
                        <i class="fa fa-upload"></i> Upload File </a>
                </li>
               <?php } ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
                        <li>
                            <a href="#">
                                <div>
                                    <strong><?php echo $uname; ?></strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>You logged in into the system some minutes ago</div>
                            </a>
                        </li>
     
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Most Recent Activity will appear here</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $uname; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="home.php?page=profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                       <!-- <li><a href="home.php?page=preferences"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>-->
                        <li class="divider"></li>
                        <li><a href="inc/login.php?logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
                
                
            </ul>
            
            