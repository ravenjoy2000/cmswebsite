
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin_index.php">CMS Admin</a>
            </div>


            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

              <!-- <li class=""><a href="">Users Online: <?php //echo  users_online(); // This is for Online User Query?></a></li> -->
              <li><a href="">Users Online:<span class="userOnline"></span></a></li>


                <li><a href="../index.php">HOME SITE</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i 
                    
                    class="fa fa-user"></i>            
                    <?php

                        if(isset($_SESSION['Username'])){

                            echo $_SESSION['Username'];
                        }
                    
                    ?>
                    
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="Profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="admin_index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> POSTS <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./admin_post.php">View All Posts</a>
                            </li>
                            <li>
                                <a href="admin_post.php?source=add_post">Add POsts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./admin_categories.php"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                   
                    <li class="active">
                        <a href="./admin_comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./admin_user.php">View All Users</a>
                            </li>
                            <li>
                                <a href="admin_user.php?source=add_user">ADD USER</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="Profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>

            
            <!-- /.navbar-collapse -->
        </nav>