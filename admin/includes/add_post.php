
<?php 

if(isset($_POST['create_post'])){

    $post_title = escape($_POST['title']); // the escape came form admin function
    $post_user = escape($_POST['post_user']);
    $post_category_id = escape($_POST['post_category']);
    $post_status = escape($_POST['post_status']);

    $post_image = escape($_FILES['image']['name']);
    $post_image_temp = escape($_FILES['image']['tmp_name']);

    $post_tags = escape($_POST['post_tag']);
    $post_content = escape($_POST['post_content']);
    $post_date = date('d-m-y');
    //$post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(
                          post_category_id,
                          post_title,
                          post_user,
                          post_date,
                          post_image,
                          post_content,
                          post_tags,
                          post_status)";
    $query .=  "VALUES( {$post_category_id},
                       '{$post_title}',
                       '{$post_user}',
                        now(),
                       '{$post_image}',
                       '{$post_content}',
                       '{$post_tags}',
                       '{$post_status}') ";
    
     $create_post_query = mysqli_query($connection,$query);
     comfirm($create_post_query);

     $the_post_id = mysqli_insert_id($connection);
     echo "<p class='bg-success'> Post Create. <a href='../post.php?p_id={$the_post_id}'> View POst </a> or  <a href='./admin_post.php'> Edit MOre Post </a></p>";

}


?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="" name="title">
    </div>


    <div>
            <label for="cateegory" class="">Category</label>
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

                 <div>
                         <label for="Users" class="">Users</label>
                         <select name="post_user" id="" class="">
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

    <!-- <div>
        <label for="post_status">Post Author</label>
        <input type="text" class="" name="author">
    </div> -->

    <div>
        <label for="title">Post Status</label>
        <select name="post_status" id="" class="">
            <option value="draft" class="">Select Options</option>
            <option value="published" class="">Published</option>
            <option value="draft" class="">Draft</option>
        </select>
    </div>
    <div>
        <label for="image">Post Image</label>
        <input type="file" class="" name="image">
    </div>
    <div>
        <label for="post_tag">Post tags</label>
        <input type="text" class="" name="post_tag">
    </div>
    <div>
        <label for="summernote">Post content</label>
        <textarea class="" name="post_content" id="summernote" cols="30" rows="10"></textarea>
    </div>


    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>

</form>