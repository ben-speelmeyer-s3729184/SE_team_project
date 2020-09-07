<?php
  include("config.php");
  session_start();
  if(isset($_POST['but_delete'])){
    if(isset($_POST['delete'])){
      foreach($_POST['delete'] as $locationId){
        $intID = (int)$locationId;
        $qurey = "DELETE from locations WHERE locationId = '$intID';";
        mysqli_query($db,$qurey);
      }
    }
  } 
  if(isset($_POST['copy'])){
    if(isset($_POST['delete'])){
      foreach($_POST['delete'] as $locationId){
        $intID = (int)$locationId;
        $qurey = "SELECT * from locations WHERE locationId = '$intID';";
        $result = mysqli_query($db,$qurey) or die(mysqli_error($db));
        while($row=mysqli_fetch_array($result)){
          $sql = "INSERT INTO locations(locationName, locationX, locationY, locationDescription, locationMinTime)
          VALUES ('{$row['locationName']}','{$row['locationX']}','{$row['locationY']}','{$row['locationDescription']}','{$row['locationMinTime']}');";
          mysqli_query($db,$sql);
        }
        
      }
    }
  } 
  
 

header('location: viewDeleteLocation.php');
?>