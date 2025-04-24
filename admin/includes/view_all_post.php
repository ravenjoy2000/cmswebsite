
   <?php

        if(isset($_POST['checkBoxArray'])){

            foreach($_POST['checkBoxArray'] as $checkBoxValue ){

            $bulk_options = escape($_POST['bulk_options']);

            switch($bulk_options){
                case 'published' :
                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = '{$checkBoxValue}' ";
                    $update_to_published_status = mysqli_query($connection, $query);
                    break;

                    case 'draft' :
                        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = '{$checkBoxValue}' ";
                        $update_to_drafft_status = mysqli_query($connection, $query);
                        break;

                        case 'delete' :
                            $query = "DELETE FROM posts WHERE post_id = '{$checkBoxValue}' ";
                            $update_to_delete_status = mysqli_query($connection, $query);
                            break;


                            case 'clone': 

                                $query = "SELECT * FROM posts WHERE post_id = '{$checkBoxValue}' ";
                                $select_post_query = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_array($select_post_query)){
                                    $C_post_id = $row['post_id'];
                                    $C_post_category_id	 = $row['post_category_id'];
                                    $C_post_title	 = $row['post_title'];
                                    $C_post_author = $row['post_author'];
                                    $C_post_date	 = $row['post_date'];
                                    $C_post_image = $row['post_image'];
                                    $C_post_content = $row['post_content'];
                                    $C_post_tags = $row['post_tags'];
                                    $C_post_comment_count = $row['post_comment_count'];
                                    $C_post_status = $row['post_status'];                             
                                
                                }

                                $query = "INSERT INTO posts(
                                    post_category_id,
                                    post_title,
                                    post_author,
                                    post_date,
                                    post_image,
                                    post_content,
                                    post_tags,
                                    post_status)";

                                $query .=  "VALUES( {$C_post_category_id},
                                                    '{$C_post_title}',
                                                    '{$C_post_author}',
                                                    now(),
                                                    '{$C_post_image}',
                                                    '{$C_post_content}',
                                                    '{$C_post_tags}',
                                                    '{$C_post_status}') ";

                                                    $copy_query = mysqli_query($connection,$query);

                                                    if(!$copy_query){
                                                            die("Query Failed" . mysqli_error($connection));
                                                    }
                                                    break;
                }
            }
        }

    ?>

   <form action="" method="post">
   
   <table class="table table-bordered table-hover ">

    <div id="bulkOptionsContainer" class="col-xs-4">

    <select name="bulk_options" id="" class="form-control">
        <option value="" class="">Select Options</option>
        <option value="published" class="">Publish</option>
        <option value="draft" class="">Draft</option>
        <option value="delete" class="">Delete</option>
        <option value="clone" class="">Clone</option>

    </select>

    <input type="submit" name="submit" class="btn btn-primary" value="Apply"><a class="btn btn-success" href="admin_post.php?source=add_post">Add New</a>



    </div>
   <thead>
       <tr>
           <th><input id="selectAllBoxes" type="checkbox" class=""></th>
           <th>post_id</th>
           <th>User</th>
           <th>post_title</th>
           <th>Category</th>
           <th>post_date</th>
           <th>post_image</th>
           <th>post_content</th>
           <th>post_tags</th>
           <th>post_comment_count</th>
           <th>Subscirber</th>
           <th>View All POst</th>
           <th>Edit</th>
           <th>Delete</th>
           <th>View</th>

       </tr>
   </thead>
   <tbody>

   <?php // add posts 
   
   $query = "SELECT * FROM posts ORDER BY post_id DESC ";
   $select_posts = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_posts )){
    $post_id = $row['post_id'];
    $post_category_id= $row['post_category_id'];
    $post_title	 = $row['post_title'];
    $post_author = $row['post_author'];
    $post_user = $row['post_user'];
    $post_date	 = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
    $post_views_count = $row['post_views_count'];

 

    echo "<tr>";
    ?><!--- THIS ONE ALSO NEEDED -->
    <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id  ?>'></td> <!--- IF YOU LOOKING AT ME HERE I AM -->
    <?php // THIS ONE ALSO NEEDED

         echo "<td> $post_id </td>";
         
         if(!empty($post_author)){
            echo  "<td>  $post_author</td>";
         }else if(!empty($post_user)){
            echo  "<td>  $post_user</td>";
         }

         echo "<td>$post_title </td>";

                    $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                    $select_categories_id = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($select_categories_id )){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];  

                    echo "<td> {$cat_title}</td>";

                    }

            echo "<td>  $post_date</td>";
            echo "<td><img src='../images/$post_image' alt='images' width='100' height='100'></td>";
            echo "<td>  $post_content</td>";
            echo "<td>  $post_tags</td>";

    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
    $send_comment_query = mysqli_query($connection,$query);

    $row = mysqli_fetch_array($send_comment_query);
    $COMMENT_ID = $row['comment_id'];

    
    $count_comment = mysqli_num_rows($send_comment_query);

    echo "<td><a href='post_comments.php?id={$post_id}'>$count_comment</a></td>";

    echo "<td>  $post_status</td>";
    echo "<td><a href='../post.php?p_id={$post_id}'>ViewPostss</a></td>";
    echo "<td><a href='./admin_post.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete');\" href='./admin_post.php?delete={$post_id}'>Delete</a></td>";
    echo "<td><a href='./admin_post.php?reset={$post_id}'> $post_views_count </a></td>";
    echo "</tr>";


    }
   ?>


   <?php // delete posts
   
   if(isset($_GET['delete'])){

   $the_post_id = escape($_GET['delete']);
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($connection,$query);
    header("Location: ./admin_post.php");

   }

   ?>

<?php // Reset View
   
   if(isset($_GET['reset'])){

   $the_post_id = escape($_GET['reset']);
    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id =". mysqli_real_escape_string($connection, $_GET['reset']) . " ";
    $reset_query = mysqli_query($connection,$query);
    header("Location: ./admin_post.php");

   }

   ?>




</tbody>
</table>

</form>