<?php
  include("config.php");
  session_start();
  if(isset($_POST['but_delete'])){
    if(isset($_POST['delete'])){
      foreach($_POST['delete'] as $locationId){
        $intID = (int)$locationId;
        $qurey = "DELETE from locations WHERE locationId = '$intID';";
        mysqli_query($db,$qurey);
      }
    }
  }  
  
 

header('location: viewDeleteLocation.php');
?>