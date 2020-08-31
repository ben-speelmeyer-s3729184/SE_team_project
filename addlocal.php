 <?php
  include("config.php");
  session_start();
  
  $locationName = $_POST['locationName'];
  $coordinateX = $_POST['coordinateX'];
  $coordinateY = $_POST['coordinateY'];
  $description = $_POST['description'];
  $minTime = $_POST['minTime'];
  
  $sql = "INSERT INTO locations(locationName, locationX, locationY, locationDescription, locationMinTime) VALUES ('$locationName','$coordinateX','$coordinateY','$description','$minTime');";
  
  if(mysqli_query($db,$sql)){
    header('location: worked.php');
  }else{
    echo "ERROR: Not able to execute $sql. " . mysqli_error($db);
  }
  header('location: addNewLocations.php');
?>
  
 