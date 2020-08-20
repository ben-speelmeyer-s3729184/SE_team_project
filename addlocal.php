 <?php
 
  $locationName = mysqli_real_escape_string($db, $_P['locationName']);
  $coordinates = mysqli_real_escape_string($db, $_P['coordinates']);
  $description = mysqli_real_escape_string($db, $_P['description']);
  $minTime = mysqli_real_escape_string($db, $_P['minTime']);
  
  $sql = "INSERT INTO locations(locationName, locationXY, locationDescription, locationMinTime) VALUES ('$locationName','$coordinates','$description','$minTime');";
  
  if(mysqli_query($db,$sql)){
    echo "<script type='text/javascript'>alert('Data entered successfully');</script>";
  }else{
    echo "ERROR: Not able to execute $sql. " . mysqli_error($db);
  }
?>
  
 