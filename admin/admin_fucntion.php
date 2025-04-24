<?php  
                           



    function escape($string){
        global $connection;
      return  mysqli_real_escape_string($connection, trim($string));

    }




                function users_online(){

                    if(isset($_GET['ONLINE'])){

                    global $connection;

                    if(!$connection){

                        session_start();

                        include("../includes/db.php");

                        $session = session_id();
                        $time = time();
                        $time_out_in_secounds = 30;
                        $time_out = $time - $time_out_in_secounds;

                        $query = "SELECT * FROM users_onilne WHERE session = '$session'";
                        $send_query = mysqli_query($connection,$query);
                        $count = mysqli_num_rows($send_query);

                        if($count == NULL){
                            mysqli_query($connection, "INSERT INTO users_onilne(session, time) VALUES('$session','$time')");
                        }else{
                            mysqli_query($connection, "UPDATE users_onilne SET time = '$time' WHERE session = '$session'");
                        }
                          $user_online = mysqli_query($connection, "SELECT * FROM users_onilne WHERE time > '$time_out'");
                        echo $count_user = mysqli_num_rows($user_online);

                    }
                           
                } // Get Request isset from JS script.js
            } 

            users_online();


                           function insert_categories(){
                                
                            global $connection;
                           
                           /// Add Categories Queries
                                 if(isset($_POST['submit'])){   

                                  $cat_title = $_POST['cat_title'];

                                    if($cat_title == "" || empty($cat_title)){
                                        echo "This field should not be empty";
                                    }else{
                                            $query = "INSERT INTO categories(cat_title)";
                                            $query .= "VALUE('{$cat_title}') ";

                                            $create_category_query = mysqli_query($connection,$query);

                                            if(!$create_category_query){
                                                die('Query Failed'. mysqli_error($connection));
                                            }else{

                                            }
                                    }
                                   
                                 }

                                }


                                function findAllCategotries(){
                                    global $connection;

                                    $query = "SELECT * FROM categories ";
                                    $select_categories = mysqli_query($connection,$query);
          
                                 while($row = mysqli_fetch_assoc($select_categories )){
                                  $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];
                                  
                                  echo "<tr>";
                                  echo"<td>{$cat_id}</td>";
                                  echo"<td>{$cat_title}</td>";
                                  echo"<td><a href='admin_categories.php?delete={$cat_id}'>Delete</a></td>"; // This is delete button
                                  echo"<td><a href='admin_categories.php?edit={$cat_id}'>Edit</a></td>"; // This is upadate button
                                  echo "<tr>";
                                  
                                  }

                                }

                                function deleteCategories(){
                                    global $connection;
                                    if(isset($_GET['delete'])){
                                        $the_cat_id = $_GET['delete'];
                                        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                                        $delete_query = mysqli_query($connection,$query);
                                        header("Location: admin_categories.php");
                                     }
                                }

                                

                                function comfirm($result){
                                    global $connection;
                                    if(!$result){
                                        die("QUERY FAILED" . mysqli_error($connection));
                                     }
                                     
                                }

?>