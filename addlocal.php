 <?php
  include("config.php");
  session_start();
  $locationName = $_POST['locationName'];
  $coordinates = $_POST['coordinates'];
  $description = $_POST['description'];
  $minTime = $_POST['minTime'];
  
  $sql = "INSERT INTO locations(locationName, locationXY, locationDescription, locationMinTime) VALUES ('$locationName','$coordinates','$description','$minTime');";
  
  if(mysqli_query($db,$sql)){
    echo "<script type='text/javascript'>alert('Data entered successfully');</script>";
  }else{
    echo "ERROR: Not able to execute $sql. " . mysqli_error($db);
  }
  exit(0);
?>
  
 