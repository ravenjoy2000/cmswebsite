<?php session_start() ?>


<?php 

    $_SESSION['Username']= null;    
    $_SESSION['User_firstname'] = null;
    $_SESSION['User_lastname'] =  null;
    $_SESSION['User_role'] =  null;

    header("Location: ../index.php");
    

?>