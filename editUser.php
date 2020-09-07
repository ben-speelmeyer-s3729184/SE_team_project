<?php
  include("config.php");
  session_start();
  
 $userId = $_POST['id'];
 $role = $_POST['role'];
 $username = $_POST['username'];
 $password = $_POST['password1'];
 $permTour = $_POST['permTour'];
 $permLocation = $_POST['permLocation'];
 $permUser = $_POST['permUser'];

 $userIdInt = (int)$userId;
 $permTourInt = (int)$permTour;
 $permLocationInt = (int)$permLocation;
 $permUserInt = (int)$permUser;
  
  $sql = "UPDATE users SET username = '$username', role = '$role', password = '$password', permTour = '$permTourInt', permLocation = '$permLocationInt', permUser = '$permUserInt' WHERE id = '$userIdInt';";
  
  if(mysqli_query($db,$sql)){
    header('location: worked.php');
  }else{
    echo "ERROR: Not able to execute $sql. " . mysqli_error($db);
  }
  header('location: editExistinguser.php');
?>