
    <!-- header -->
    <?php include "includes/admin_header.php" ?>



    <div id="wrapper">

<!-- Navagator -->
<?php include "includes/admin_navgation.php" ?>

        <div id="page-wrapper">


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            WELCOME TO ADMIN 
                            <small>  <?php  echo $_SESSION['Username']; ?></small>
                        </h1>

                
                    </div>
                </div>
                <!-- /.row -->

                       
                <!-- /.row -->
                

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-file-text fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">

                            <?php 

                                $query = "SELECT * FROM posts";
                                $select_all_post = mysqli_query($connection,$query);
                                $post_counts = mysqli_num_rows($select_all_post);
                                echo "<div class='huge'>{$post_counts}</div>";
                            ?>

                            <div>Posts</div>
                        </div>
                    </div>
                </div>
                <a href="admin_post.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                               <?php 

                                $query = "SELECT * FROM comments";
                                $select_all_comment = mysqli_query($connection,$query);
                                $comment_counts = mysqli_num_rows($select_all_comment);
                                echo "<div class='huge'>{$comment_counts}</div>";
                            ?>
                        <div>Comments</div>
                        </div>
                    </div>
                </div>
                <a href="admin_comments.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                                    <?php 

                                $query = "SELECT * FROM users";
                                $select_all_user = mysqli_query($connection,$query);
                                $user_count = mysqli_num_rows($select_all_user);
                                echo "<div class='huge'>{$user_count}</div>";
                            ?>
                            <div> Users</div>
                        </div>
                    </div>
                </div>
                <a href="admin_user.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-list fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                                             <?php 

                                $query = "SELECT * FROM categories";
                                $select_all_categories = mysqli_query($connection,$query);
                                $categories_count = mysqli_num_rows($select_all_categories);
                                echo "<div class='huge'>{$categories_count}</div>";
                            ?>
                            
                            <div>Categories</div>
                        </div>
                    </div>
                </div>
                <a href="admin_categories.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
                   
                <!-- /.row -->
                <?php // adding onther loop

                $query = "SELECT * FROM posts WHERE post_status = 'published' ";
                $select_all_publish_posts = mysqli_query($connection,$query);
                $post_published_count = mysqli_num_rows($select_all_publish_posts);

                $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
                $select_all_draf_posts = mysqli_query($connection,$query);
                $post_draf_count = mysqli_num_rows($select_all_draf_posts);

                $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
                $unapproved_comments_query = mysqli_query($connection,$query);
                $unapproved_comment_count = mysqli_num_rows($unapproved_comments_query);

                $query = "SELECT * FROM users WHERE user_role = 'subscriber' ";
                $select_all_subscribers = mysqli_query($connection,$query);
                $subscriber_count = mysqli_num_rows($select_all_subscribers);

                ?>
                <div class="row">

                          <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['Date', 'Count'],

                                <?php
                                
                                $element_text = ['Active Posts', 'Comments', 'User', 'Categories','All Posts','Draft Posts','Pending Comments','Subscribers'];
                                $element_count = [$post_counts, $comment_counts, $user_count, $categories_count, $post_published_count, $post_draf_count, $unapproved_comment_count,
                                 $subscriber_count];

                                for($i = 0; $i < 8; $i++){
                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                }

                                ?>

                                //['Posts', 1000 ],
                       
                                ]);

                                var options = {
                                chart: {
                                    title: ' ',
                                    subtitle: '',
                                }
                                };

                                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                            </script>
                                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<!-- footer -->
        <?php include "includes/admin_footer.php" ?>


        