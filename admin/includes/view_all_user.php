
<table class="table table-bordered table-hover ">
   <thead>
       <tr>
           <th>ID</th>
           <th>USER NAME</th>
           <th>FIRST NAME</th>
           <th>LAST NAME</th>
           <th>EMAIL</th>
           <th>ROLE</th>
        


       </tr>
   </thead>
   <tbody>

   <?php // add posts 
   
   $query = "SELECT * FROM users ";
   $select_Users = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_Users)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password	= $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname =  $row['user_lastname'];
    $user_email =     $row['user_email'];
    $user_image =     $row['user_image'];
    $user_role =      $row['user_role'];
    $user_randSalt =  $row['user_randSalt'];


    echo "<tr>";
    echo "<td> $user_id </td>";
    echo "<td> $username </td>";
    echo "<td> $user_firstname </td>";
    echo "<td> $user_lastname </td>";
    echo "<td> $user_email </td>";
    echo "<td> $user_role </td>";

    echo "<td>  </td>";
    echo "<td><a href='./admin_user.php?change_to_admin={$user_id}'>ADMIN</a></td>";
    echo "<td><a href='./admin_user.php?change_to_sub={$user_id}'>SUBSCRIBER</a></td>";
    echo "<td><a href='./admin_user.php?source=edit_user&edit_user={$user_id}'>EDIT</a></td>";
    echo "<td><a href='./admin_user.php?delete={$user_id}'>DELETE</a></td>";
    echo "</tr>";

    }
   ?>

   <?php 
   
      // change_to_sub
      if(isset($_GET['change_to_sub']) ){

        $the_user_id = escape($_GET['change_to_sub']);
         $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id ";
         $change_to_sub_query = mysqli_query($connection,$query);
         header("Location: admin_user.php");
     
        }
       
   // change_to_admin
   if(isset($_GET['change_to_admin']) ){

    $the_user_id = escape($_GET['change_to_admin']);
     $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id ";
     $change_to_admin_query = mysqli_query($connection,$query);
     header("Location: admin_user.php");
 
    }
      
   // delete Comments
   
   if(isset($_GET['delete']) ){
    if(isset($_SESSION['User_role'])){
        if($_SESSION['User_role'] == 'admin'){

   $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
    $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
    $delete_user_query = mysqli_query($connection,$query);
    header("Location: admin_user.php");
    }
    
   }
}

   ?>


</tbody>
</table>

