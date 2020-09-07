<?php
  include("config.php");
  session_start();
  if(isset($_POST['but_delete'])){
    if(isset($_POST['delete'])){
      foreach($_POST['delete'] as $userId){
        $intID = (int)$userId;
        $qurey = "DELETE from users WHERE id = '$intID';";
        mysqli_query($db,$qurey);
      }
    }
  }  
  
 

header('location: viewDeleteUser.php');
?>