<?php


if(isset($_GET['p_id'])){

$the_post_id = escape($_GET['p_id']);

}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_posts_by_id = mysqli_query($connection,$query);

 while($row = mysqli_fetch_assoc($select_posts_by_id )){
 $post_id = $row['post_id'];
 $post_category_id	 = $row['post_category_id'];
 $post_title	 = $row['post_title'];
 $post_user = $row['post_user'];
 $post_date	 = $row['post_date'];
 $post_image = $row['post_image'];
 $post_content = $row['post_content'];
 $post_tags = $row['post_tags'];
 $post_comment_count = $row['post_comment_count'];
 $post_status = $row['post_status'];

 }

 if(isset($_POST['update_post'])){

    
    $post_user = escape($_POST['post_user']);
    $post_title = escape($_POST['post_title']);
    $post_category_id = escape($_POST['post_category']);
    $post_status = escape($_POST['post_status']);
    $post_image = escape($_FILES['image']['name']);
    $post_image_temp = escape($_FILES['image']['tmp_name']);
    $post_content = escape($_POST['post_content']);
    $post_tags = escape($_POST['post_tag']);

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($select_image)){
                $post_image = $row['post_image'];
        }

    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_user = '{$post_user}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = '{$post_id}' ";

    $update_post = mysqli_query($connection,$query);
    echo "<p class='bg-success'> Post Update. <a href='../post.php?p_id={$the_post_id}'> View POst </a> or  <a href='./admin_post.php'> Edit MOre Post </a></p>";


if(!$update_post){
    die("DEAD" . mysqli_error($connection));
}

}


?>



<form action="" method="post" enctype="multipart/form-data">

<div>
        <label for="post_status">Post Title</label>
        <input value="<?php echo $post_title;?>" type="text" class="" name="post_title">
    </div>

    <div>
           <label for="Categories" class="">Categories</label>
           <select name="post_category" id="" class="">
            <?php 
            $query = "SELECT * FROM categories ";
            $select_categories = mysqli_query($connection,$query);
                 while($row = mysqli_fetch_assoc($select_categories )){
                   $cat_id = $row['cat_id'];
                   $cat_title = $row['cat_title'];  
                   echo "<option value='{$cat_id}'>{$cat_title}</option>";
                 }
            ?>
           </select>
    </div>

    <!-- <div>
        <label for="post_status">Post Author</label>
        <input value="<?php echo $post_user;?>" type="text" class="" name="post_user">
    </div> -->

    <div>
                         <label for="Users" class="">Users</label>
                         <select name="post_user" id="" class="">
                        <?php echo "<option value='{$post_user}'>{$post_user}</option>" ?>
         <?php 
                        $users_query = "SELECT * FROM users ";
                        $select_users = mysqli_query($connection,$users_query);
                            while($row = mysqli_fetch_assoc($select_users )){
                            $user_id = $row['user_id'];
                            $username = $row['username'];  
                            echo "<option value='{$username}'>{$username}</option>";
                            }
         ?>
                        </select>
          </div>
    
    <div>
    <select name="post_status" id="">
        <option value="<?php echo $post_status; ?>" class=""><?php echo $post_status; ?></option>
        <?php
            if($post_status == 'published'){
                echo "<option value='draft'>Draft</option>";
            }else{
                echo "<option value='published'>Published</option>";
            }
        ?>
    </select>
    </div>
  
    <div>
        <img src="../images/<?php echo $post_image; ?>" width="100" alt="">
        <input type="file" name="image">
    </div>
    <div>
        <label for="post_tag">Post tags</label>
        <input value="<?php echo $post_tags;?>" type="text" class="" name="post_tag">
    </div>

    <div>
        <label for="title">Post content</label>
        <textarea class="" id="summernote" cols="30" rows="10" name="post_content"> <?php echo $post_content ?> </textarea>
    </div>

    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>

</form>