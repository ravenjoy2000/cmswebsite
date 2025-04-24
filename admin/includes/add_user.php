
<?php 

if(isset($_POST['create_user'])){

    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);
    $username = escape($_POST['user_name']);
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10) );


    $query = "INSERT INTO users(
                          username,
                          user_password,
                          user_firstname,
                          user_lastname,
                          user_email,
                          user_role)";
    $query .=  "VALUES( 
                       '{$username}',
                       '{$user_password}',
                       '{$user_firstname}',
                       '{$user_lastname}',
                       '{$user_email}',
                       '{$user_role}') ";
    
     $create_user_query = mysqli_query($connection,$query);

     echo"User Create: " . " ". "<a href='admin_user.php'>View Users</a> ";

}


?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_status">USER FIRST NAME</label>
        <input type="text" class="" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="title">USER LAST NAME</label>
        <input type="text" class="" name="user_lastname">
    </div>
   


    <div class="form-group">
           <select name="user_role" id="" class="">
                    <option value="admin">admin</option>
                    <option value="subscriber">subscriber</option>
           </select>
    </div>
    <div class="form-group">
        <label for="post_tag">USER NAME</label>
        <input type="text" class="" name="user_name">
    </div>
    <div class="form-group">
        <label for="email">EMAIL</label>
        <input type="email" class="" name="user_email">
        </div>
        <div>
        <label for="password">PASSWORD</label>
        <input type="password" class="" name="user_password">
        </div>


    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Submit">
    </div>

</form>