   <!-- HEADER -->
   <?php include "includes/db.php";?>
<?php include "includes/header.php";?>



 
   <!-- Navigation -->
   <?php include "includes/navgation.php";?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


           <!------------------------------------------------------------------------------------------------------>

            <?php // This PHP is Connected to Database cms posts this will update the content 

                if(isset($_GET['page'])){


                    $page = $_GET['page'];
                }else{
                    $page = "";
                }

                if($page == "" || $page == 1){
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * 5) - 5;
                }

                
                $query_count = "SELECT * FROM posts"; // THIS QUERY FOR PAGENATION
                $find_count = mysqli_query($connection,$query_count);
                $count = mysqli_num_rows($find_count);
                $count = ceil($count / 5);

                    $query = "SELECT * FROM posts LIMIT $page_1, 5"; 
                    $select_all_posts_query = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_posts_query )){ 
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_user'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'],0,50);
                        $post_status = $row['post_status'];

                       if($post_status == 'published'){
                      
                    }


                     ///   ?>


                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->

                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $post_author;?>&p_id=<?php echo $post_id;?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt=""> 
                </a>
                 <!---- This is for Image and you need to access DB for input the name of image in post_image-->
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                  <?php }//}// end of while loop ?>
        
  <!---------------------------------------------------------------------------------------------------------------------------------------->
            </div>

            
                <!-- Blog Sidebar Widgets Column -->
                <?php include "includes/sidebar.php";?>

        </div>
    </div>
        <!-- /.row -->

        <hr>

        <ul class="pager">
                   <?php // THIS FOR LOOP IS FOR PAGE NUMBER 1 2 3 4 ---
                   
                   for($i = 1; $i <= $count; $i++){

                             if($i == $page){

                                           echo "<li '><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";

                               }else{
                                           echo "<li '><a href='index.php?page={$i}'>{$i}</a></li>";
                                 }

                   }

                   ?>
        </ul>

      <!-- Footer -->
        <?php include "includes/footer.php";?>

