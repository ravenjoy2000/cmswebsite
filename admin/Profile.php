
    <!-- header -->
    <?php include "includes/admin_header.php" ?>
    <?php

                        if(isset($_SESSION['Username'])){
                            $Profile_username = $_SESSION['Username'];
                            $query = "SELECT * FROM users WHERE username = '{$Profile_username}' ";

                            $select_user_profile_query = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_array($select_user_profile_query)){

                                $Username = $row['username'];
                                $User_password	= $row['user_password'];
                                $User_firstname = $row['user_firstname'];
                                $User_lastname =  $row['user_lastname'];
                                $User_email =     $row['user_email'];
                                $User_image =     $row['user_image'];
                                $User_role =      $row['user_role'];
                                $User_randSalt =  $row['user_randSalt'];

                            }

                        }

    ?>

    <?php

if(isset($_POST['update_user'])){

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $username = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

      
    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}' ";
    $query .= "WHERE username = '{$Profile_username}' ";

    $edit_user_query = mysqli_query($connection,$query);

 

}
              

    ?>

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

                    <!-- Form -->
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="post_status">USER FIRST NAME</label>
                        <input type="text" class="form-group" value="<?php echo $User_firstname; ?>" name="user_firstname">
                    </div>
                    <div class="form-group">
                        <label for="title">USER LAST NAME</label>
                        <input type="text" class="form-group" value=" <?php echo $User_lastname; ?>" name="user_lastname">
                    </div>
                


                    <div class="form-group">
                        <select name="user_role" id="" class="form-group">
                                    <option value="SUBSCRIBER"><?php echo $User_role; ?></option>
                                    
                                    <?php 

                                    if($user_role == 'admin'){
                                    echo "<option value='SUBSCRIBER'>SUBCRIBER</option>";

                                    }else{
                                        echo "<option value='ADMIN'>ADMIN</option>";
                                    }

                                    ?>

                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="post_tag">USER NAME</label>
                        <input type="text" class="form-group"  value="<?php echo $Username; ?>" name="user_name">
                    </div>
                    <div class="form-group">
                        <label for="email">EMAIL</label>
                        <input type="email" class="form-group" value="<?php echo $User_email; ?>" name="user_email">
                        </div>
                        <div>
                        <label for="password">PASSWORD</label>
                        <input type="password" class="form-group" autocomplete="off" name="user_password">
                        </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="update_user" value="UPDATE PROFILE">
                    </div>

                </form>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<!-- footer -->
        <?php include "includes/admin_footer.php" ?>


        