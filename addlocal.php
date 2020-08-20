 <?php
  include("config.php");
  session_start();
  
  $locationName = $_POST['locationName'];
  $coordinates = $_POST['coordinates'];
  $description = $_POST['description'];
  $minTime = $_POST['minTime'];
  
  $sql = "INSERT INTO locations(locationName, locationXY, locationDescription, locationMinTime) VALUES ('$locationName','$coordinates','$description','$minTime');";
  
  if(mysqli_query($db,$sql)){
    header('location: worked.php');
  }else{
    echo "ERROR: Not able to execute $sql. " . mysqli_error($db);
  }
  header('location: addNewLocations.php');
?>
  
 