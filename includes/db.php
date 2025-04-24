<?php

//Hard way to Connect
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "123";
$db['db_name'] = "cmd";

foreach($db as $key => $value){
    define(strtoupper($key), $value);

}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (!$connection) {
    echo "Disconnected";
}else{
}

//Easy way to Connect to Data base
// $connection = mysqli_connect("localhost","root","","cms");
// if (!$connection){
//     die("Disconected". mysqli_connect_error());
// }else{
//     echo"Connect";
// }

//

?>