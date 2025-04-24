

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
                            WELCOME TO COMMENTS
                            <small>AUTHOR</small>
                        </h1>

<table class="table table-bordered table-hover ">
   <thead>
       <tr>
           <th>ID</th>
           <th>AUTHOR</th>
           <th>COMMENTS</th>
           <th>EMAIL</th>
           <th>STATUS</th>
           <th>IN RESPONSE TO </th>
           <th>DATE</th>
           <th>APPROVE</th>
           <th>UN APPROVE</th>
           <th>DELETE</th>



       </tr>
   </thead>
   <tbody>

   <?php // add posts 
   
   $query = "SELECT * FROM comments WHERE comment_post_id =". mysqli_real_escape_string($connection, $_GET['id'])." ";

   $select_Comments = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_Comments)){
    $comment_id = $row['comment_id'];
    $comment_post_id	 = $row['comment_post_id'];
    $comment_author	 = $row['comment_author'];
    $comment_content	 = $row['comment_content'];
    $comment_email = $row['comment_email'];
    $comment_status = $row['comment_status'];
    $comment_date = $row['comment_date'];



    echo "<tr>";
    echo "<td> $comment_id </td>";
    echo "<td> $comment_author </td>";
    echo "<td> $comment_content </td>";
 
                    // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                    // $select_categories_id = mysqli_query($connection,$query);
                    // while($row = mysqli_fetch_assoc($select_categories_id )){
                    // $cat_id = $row['cat_id'];
                    // $cat_title = $row['cat_title'];  

                    // echo "<td> {$cat_title}</td>";

                    // }

    echo "<td> $comment_email </td>";
    echo "<td> $comment_status </td>";

    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
    $select_posts_id_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_posts_id_query)){
        $posts_id = $row['post_id'];
        $posts_title = $row['post_title'];
        echo "<td><a href='../post.php?p_id=$posts_id'> $posts_title </a></td>";

    }

    echo "<td> $comment_date </td>";
    echo "<td><a href='./admin_comments.php?approve=$comment_id&id=".$_GET['id']."'>APPROVE</a></td>";
    echo "<td><a href='./admin_comments.php?unapprove=$comment_id&id=".$_GET['id']."'>DISAPPROVE</a></td>";
    echo "<td><a href='./post_comments.php?delete=$comment_id&id=".$_GET['id']."'>Delete</a></td>";
    echo "</tr>";

    }
   ?>

   <?php 

      // Approve
      if(isset($_GET['approve']) ){

        $the_comment_id = $_GET['approve'];
         $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
         $approve_coment_query = mysqli_query($connection,$query);
         header("Location: post_comments.php?id=".$_GET['id']."");
     
        }
   
   // UNAPPROVE
   if(isset($_GET['unapprove']) ){

    $the_comment_id = $_GET['unapprove'];
     $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
     $unapprove_coment_query = mysqli_query($connection,$query);
     header("Location: post_comments.php?id=".$_GET['id']."");
 
    }
   
   
   // delete Comments
   
   if(isset($_GET['delete']) ){

   $the_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
    $delete_query = mysqli_query($connection,$query);
    header("Location: post_comments.php?id=".$_GET['id']."");

   }

   ?>


</tbody>
</table>

</div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<!-- footer -->
        <?php include "includes/admin_footer.php" ?>
