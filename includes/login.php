<?php include "db.php" ?>
<?php session_start() ?>

<?php 

        if(isset($_POST['login'])){
        $UserName = $_POST['username'];
        $Password = $_POST['password'];

       $User_name = mysqli_real_escape_string($connection, $UserName);
       $Pass_word = mysqli_real_escape_string($connection, $Password);

       $query = "SELECT * FROM users WHERE username = '{$User_name}' ";
       $select_user_query = mysqli_query($connection,$query);

       if(!$select_user_query){
            die("QUERY FAILED". mysqli_error($connection));
       }
       

       while($row = mysqli_fetch_array($select_user_query)){

         $db_user_id = $row['user_id'];
         $db_username = $row['username'];
         $db_user_password = $row['user_password'];
         $db_user_firstname = $row['user_firstname'];
         $db_user_lastname = $row['user_lastname'];
         $db_user_role = $row['user_role'];

       }

//        $password = crypt($Pass_word, $db_user_password); // Encypthing User Password


       if(password_verify($Password, $db_user_password)){

        $_SESSION['Username'] = $db_username ;
        $_SESSION['User_firstname'] = $db_user_firstname ;
        $_SESSION['User_lastname'] = $db_user_lastname ;
        $_SESSION['User_role'] = $db_user_role ;

                header("Location: ../admin/admin_index.php");     
       } else{
                header("Location: ../index.php");
       }

        }


?>