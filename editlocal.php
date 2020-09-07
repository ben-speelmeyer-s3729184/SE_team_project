<?php
  include("config.php");
  session_start();
  
  $locationId = $_POST['locationId'];
  $locationName = $_POST['locationName'];
  $coordinateX = $_POST['coordinateX'];
  $coordinateY = $_POST['coordinateY'];
  $description = $_POST['description'];
  $minTime = $_POST['minTime'];

  $int_cast = (int)$locationId;
  
  $sql = "UPDATE locations SET locationName = '$locationName', locationX = '$coordinateX', locationY = '$coordinateY', locationDescription = '$description', locationMinTime = '$minTime' WHERE locationId = '$int_cast';";
  
  if(mysqli_query($db,$sql)){
            echo '<script type="text/javascript">';
            echo ' alert("Username is already taken, please choose another");';  
            echo 'window.location.href = "createUser.php";';
            echo '</script>';
  }else{
    echo "ERROR: Not able to execute $sql. " . mysqli_error($db);
  }
  header('location: editExistingLocations.php');
?>