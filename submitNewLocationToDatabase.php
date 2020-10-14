 <?php
  include("config.php"); // including the database configuration file 
  session_start();
  
  $locationName = $_POST['locationName'];// get the elements from the form that was submitted
  $coordinateX = $_POST['coordinateX'];
  $coordinateY = $_POST['coordinateY'];
  $description = $_POST['description'];
  $minTime = $_POST['minTime'];
  
  $sql = "INSERT INTO locations(locationName, locationX, locationY, locationDescription, locationMinTime) VALUES ('$locationName','$coordinateX','$coordinateY','$description','$minTime');"; //sql query to add the data to the locations table
  
  if(mysqli_query($db,$sql)){
    echo '<script type="text/javascript">';
    echo ' alert("Location created successfully.");'; //alerts the user that the location was successfully add to the database 
    echo 'window.location.href = "createLocations.php";'; // redirects the user back to the create locations page
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo ' alert("Action failed.");'; // alerts the user that the data was not submitted to the database 
    echo 'window.location.href = "createLocations.php";';// redirects the user back to the create location page
    echo '</script>';
  }
  
?>
  
 