<?php
include("config.php");
session_start();

if(isset($_POST['delete1'])){
  $locationId = $_POST['delete1'];
  $intID = (int)$locationId;
  $qurey = "DELETE from locations WHERE locationId = '$intID';";
  if(mysqli_query($db,$qurey)){
    echo '<script type="text/javascript">';
    echo ' alert("Location deleted successfully.");';  
    echo 'window.location.href = "manageLocations.php";';
    echo '</script>'; 
  }else{
    echo '<script type="text/javascript">';
    echo ' alert("Action failed.");';  
    echo 'window.location.href = "manageLocations.php";';
    echo '</script>'; 
  }
   
}



if(isset($_POST['copyButton'])){
  $locationId = $_POST['copyButton'];
  $intId = (int)$locationId;
  $qurey = "SELECT * from locations WHERE locationId = '$intId';";
  $result = mysqli_query($db,$qurey) or die(mysqli_error($db));
  while($row=mysqli_fetch_array($result)){
    $sql = "INSERT INTO locations(locationName, locationX, locationY, locationDescription, locationMinTime)
    VALUES ('{$row['locationName']}','{$row['locationX']}','{$row['locationY']}','{$row['locationDescription']}','{$row['locationMinTime']}');";
    if(mysqli_query($db,$sql)){
      echo '<script type="text/javascript">';
      echo ' alert("Location Copied successfully.");';  
      echo 'window.location.href = "manageLocations.php";';
      echo '</script>'; 
    }else{
      echo '<script type="text/javascript">';
      echo ' alert("Action failed.");';  
      echo 'window.location.href = "manageLocations.php";';
      echo '</script>'; 
    }
  }
      
}

if(isset($_POST['editButton'])){
  
  $locationId = $_POST['editButton'];
  $intId = (int)$locationId;

  $q = "SELECT * FROM locations WHERE locationId = '$intId';";

  $result = mysqli_query($db,$q);
  while($row=mysqli_fetch_array($result)){
      if(!isset($_SESSION['login_user'])){
        header("location: index.php");
      };
      if($_SESSION['permLocation'] != 1 ){
          header('location: welcome.php');
      };
    ?>
    <!doctype html>
    <html>
        
        <head>
            <?php
            include('scripts.php');
            ?>
        <title>Manage Locations</title>  
        </head>

        <header>
            <div class="container-fluid bg-dark text-white p-3">
                <h1>Robot Tour Management System</h1>
            </div>
        </header>

        <?php
            include('nav.php');
        ?>
        <body class="bg">
            <section class="contact-section">
                <div class="container">
                    <div class="row" style="background-color:white;">
                        <div class="col-12">
                            <h2 class="contact-title">Edit Location</h2>
                        </div>
                        <div class="col-lg-8">
                            <form  method=post  class="form-contact contact_form" >
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type=text readonly name=locationId value=<?php echo "{$row['locationId']}";?>>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input required pattern=[A-Za-z]{1,20} title='Please enter only letters and a maximum of 20 charaters.' value=<?php echo "{$row['locationName']}";?> class="form-control valid" name="locationName" id="locationName"  type="text"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Location Name'" placeholder="Enter Location Name">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input required pattern=[A-Z]{1} title='Please enter one capital letter.' value=<?php echo "{$row['locationX']}";?> class="form-control valid" name="coordinateX" id="coordinateX" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter X coordinate'" placeholder="Enter X coordinate">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input required pattern=[0-9]{1,2} title='Please enter one or two numbers' value=<?php echo "{$row['locationY']}";?> class="form-control valid" name="coordinateY" id="coordinateY" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Y coordinate'" placeholder="Enter Y coordinate">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="description"  id="description" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description'" placeholder=" Enter Description"><?php echo "{$row['locationDescription']}";?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input required pattern=[0-9]{1,4} title='Please enter the minimum time in seconds, maximum 4 digits' value=<?php echo "{$row['locationMinTime']}";?> class="form-control" name="minTime" id="minTime" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Min. Time'" placeholder="Enter Min. Tme">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                <script type=text/javascript>
                                    function speak(){
                                        var speech =  new SpeechSynthesisUtterance(document.getElementById('description').value);
                                        speechSynthesis.speak(speech);
                                    }
                                </script>
                                    <input type="submit" name=editSubmit class="button button-contactForm boxed-btn" value="Edit"/>
                                    <button type="button"  onclick=speak() >Click to hear description</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </body>

        <footer>
            <?php
                include('footer.php');
            ?>
        </footer>

    </html>
<?php
  } //end of while loop
}

if(isset($_POST['editSubmit'])){
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
    echo ' alert("Location edited successfully.");';  
    echo 'window.location.href = "manageLocations.php";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo ' alert("Action failed.");';  
    echo 'window.location.href = "manageLocations.php";';
    echo '</script>';
  }
}

?>

















  
  
 
  
 


















