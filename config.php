<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','Buddy8790*');
define('DB_NAME','sepm');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

if($db === false){
    die("ERROR: Could not connect" . mysqli_connect_error());
}
?>