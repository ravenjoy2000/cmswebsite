
<?php 

if(isset($_GET['edit_user'])){
    $the_user_id = escape($_GET['edit_user']);

    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $select_Users_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_Users_query)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $db_user_password	= $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname =  $row['user_lastname'];
    $user_email =     $row['user_email'];
    $user_image =     $row['user_image'];
    $user_role =      $row['user_role'];
    $user_randSalt =  $row['user_randSalt'];

    }

if(isset($_POST['edit_users'])){

    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);
    $username = escape($_POST['user_name']);
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);
}

    if(!empty($user_password)){
        $query_password= "SELECT user_password FROM users WHERE user_id = $the_user_id";
        $get_user_query = mysqli_query($connection,$query_password);

        $row = mysqli_fetch_array($get_user_query);

        $db_user_password = $row['user_password'];

        if($db_user_password != $user_password){
            $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
        }

        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$hashed_password}' ";
        $query .= "WHERE user_id = {$the_user_id} ";
    
        $edit_user_query = mysqli_query($connection,$query);
  
        echo "USER UPDATE" . "<a href='admin_user.php'>VIEW USERS?</a>";
    
    }
 
 }else{
    header("Location: index.php");
 }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_status">USER FIRST NAME</label>
        <input type="text" class="form-group" value="<?php echo $user_firstname; ?>" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="title">USER LAST NAME</label>
        <input type="text" class="form-group" value=" <?php echo $user_lastname; ?>" name="user_lastname">
    </div>
   


    <div class="form-group">
           <select name="user_role" id="" class="form-group">
                    <option value="<?php echo $user_role; ?>"> <?php echo $user_role; ?></option>
                    
                    <?php 

                    if($user_role == 'admin'){
                       echo "<option value='subscriber'>subscriber</option>";

                    }else{
                        echo "<option value='admin'>admin</option>";
                    }

                     ?>

           </select>
    </div>
 
    <div class="form-group">
        <label for="post_tag">USER NAME</label>
        <input type="text" class="form-group"  value="<?php echo $username; ?>" name="user_name">
    </div>
    <div class="form-group">
        <label for="email">EMAIL</label>
        <input type="email" class="form-group" value="<?php echo $user_email; ?>" name="user_email">
        </div>
        <div>
        <label for="password">PASSWORD</label>
        <input type="password" class="form-group" autocomplete="off" name="user_password">
        </div>


    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_users" value="Submit">
    </div>

</form>