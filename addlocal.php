 <?php
  include("config.php");
  $locationName = mysqli_real_escape_string($db, $_REQUEST['locationName']);
  $coordinates = mysqli_real_escape_string($db, $_REQUEST['coordinates']);
  $description = mysqli_real_escape_string($db, $_REQUEST['description']);
  $minTime = mysqli_real_escape_string($db, $_REQUEST['minTime']);
  
  $sql = "INSERT INTO locations(locationName, locationXY, locationDescription, locationMinTime) VALUES ('$locationName','$coordinates','$description','$minTime');";
  
  if(mysqli_query($db,$sql)){
    echo "<script type='text/javascript'>alert('Data entered successfully');</script>";
  }else{
    echo "ERROR: Not able to execute $sql. " . mysqli_error($db);
  }
?>
  
 