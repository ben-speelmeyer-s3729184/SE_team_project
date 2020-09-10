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
    echo '<script type="text/javascript">';
    echo ' alert("Location created successfully.");';  
    echo 'window.location.href = "createLocations.php";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo ' alert("Action failed.");';  
    echo 'window.location.href = "createLocations.php";';
    echo '</script>';
  }
  
?>
  
 