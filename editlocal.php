<?php
  include("config.php");
  session_start();
  
  $locationId = $_POST['locationId'];
  $locationName = $_POST['locationName'];
  $coordinates = $_POST['coordinates'];
  $description = $_POST['description'];
  $minTime = $_POST['minTime'];
  
  $sql = "UPDATE locations SET locationName = '$locationName', locationXY = '$coordinates', locationDescription = '$description', locationMinTime = '$minTime' WHERE locationId = '$locationId';";
  
  if(mysqli_query($db,$sql)){
    header('location: worked.php');
  }else{
    echo "ERROR: Not able to execute $sql. " . mysqli_error($db);
  }
  header('location: editExistingwLocations.php');
?>