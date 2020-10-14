<?php
include("config.php"); // include the configuration file
session_start();

if(isset($_POST['delete1'])){ // if the button that submitted the form was nammed delete1 the program will enter this if statment
  $locationId = $_POST['delete1']; // this passes the buttons value to the locationId variable 
  $intID = (int)$locationId;// changes the variable from a string to an intager
  $qurey = "DELETE from locations WHERE locationId = '$intID';";// will delete the row from the database where the locationId is equal to the one from the form
  if(mysqli_query($db,$qurey)){//execute the query
    echo '<script type="text/javascript">';
    echo ' alert("Location deleted successfully.");'; // alerts the user if successful 
    echo 'window.location.href = "manageLocations.php";';
    echo '</script>'; 
  }else{
    echo '<script type="text/javascript">';
    echo ' alert("Action failed.");';  // alerts the user if unsuccessful
    echo 'window.location.href = "manageLocations.php";';
    echo '</script>'; 
  }
   
}



if(isset($_POST['copyButton'])){//if the form was submitted by the button named copyButton the program will enter this if statment
  $locationId = $_POST['copyButton'];// gets the location id from the button value
  $intId = (int)$locationId;// converts the value from a string to a intager
  $qurey = "SELECT * from locations WHERE locationId = '$intId';"; // users the location id value from the from to find the data of that location as to copy its data
  $result = mysqli_query($db,$qurey) or die(mysqli_error($db));//statment to get the data from the database to be copied in the database
  while($row=mysqli_fetch_array($result)){ // using the while statment to insert the data into a create statment
    $sql = "INSERT INTO locations(locationName, locationX, locationY, locationDescription, locationMinTime)
    VALUES ('{$row['locationName']}','{$row['locationX']}','{$row['locationY']}','{$row['locationDescription']}','{$row['locationMinTime']}');";// this function will copy everything from the original location but the locationId a new locationid will be add to the copied locatoin to mitigate duplicate location id's
    if(mysqli_query($db,$sql)){//execute the query
      echo '<script type="text/javascript">';
      echo ' alert("Location Copied successfully.");'; // alert the user if the query was successful  
      echo 'window.location.href = "manageLocations.php";';
      echo '</script>'; 
    }else{
      echo '<script type="text/javascript">';
      echo ' alert("Action failed.");';  
      echo 'window.location.href = "manageLocations.php";';// alert the user if the query was unsuccessful
      echo '</script>'; 
    }
  }
      
}

if(isset($_POST['editButton'])){// if the button used to submit the form was name editButton the program will enter this if statment
  
  $locationId = $_POST['editButton']; // the value of the button is retrieved 
  $intId = (int)$locationId; // the value is changed from a string to an intager

  $q = "SELECT * FROM locations WHERE locationId = '$intId';"; // this qurey will get the location data form the database to populate the form for editing

  $result = mysqli_query($db,$q);// execute the query
  while($row=mysqli_fetch_array($result)){ // while loop used to populate the from form the result of the sql statment
      if(!isset($_SESSION['login_user'])){ // check if the user is logged in 
        header("location: index.php");
      };
      if($_SESSION['permLocation'] != 1 ){ //check if the user has location permissions
          header('location: welcome.php');
      };
    ?>
    <!doctype html>
    <html>
        
        <head>
            <?php
            include('scripts.php'); // include relivent scripts for the page
            ?>
        <title>Manage Locations</title>  
        </head>

        <header>
            <div class="container-fluid bg-dark text-white p-3">
                <h1>Robot Tour Management System</h1>
            </div>
        </header>

        <?php
            include('nav.php'); // include the navigation element
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
                                            <input type=text readonly name=locationId value=<?php echo "{$row['locationId']}";?>> <!-- populate the location id, though it is disabled so the user can not change it -->
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
                                        speechSynthesis.speak(speech);  //user javascripts inbuilt class speechSynthesis to read the description to the user, this function is triggered by the "click to hear description" button
                                    }
                                </script>
                                    <input type="submit" name=editSubmit class="button button-contactForm boxed-btn" value="Edit"/> <!-- once the modifications are submitted the editSubmit if statment will be triggered -->
                                    <button type="button"  onclick=speak() >Click to hear description</button>
                                </div>
                            </form><!-- end of form -->
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

if(isset($_POST['editSubmit'])){ // after the location has been modified this if statment will be triggered
  $locationId = $_POST['locationId'];
  $locationName = $_POST['locationName'];//all the values of the from are collected 
  $coordinateX = $_POST['coordinateX'];
  $coordinateY = $_POST['coordinateY'];
  $description = $_POST['description'];
  $minTime = $_POST['minTime'];

  $int_cast = (int)$locationId; // location id is changed from a string to an intager
  
  $sql = "UPDATE locations SET locationName = '$locationName', locationX = '$coordinateX', locationY = '$coordinateY', locationDescription = '$description', locationMinTime = '$minTime' WHERE locationId = '$int_cast';"; // this statment will update the existing location with the updated data
  
  if(mysqli_query($db,$sql)){
    echo '<script type="text/javascript">';
    echo ' alert("Location edited successfully.");';  // alert the user if successful
    echo 'window.location.href = "manageLocations.php";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo ' alert("Action failed.");';  //alert the user if unsuccessful
    echo 'window.location.href = "manageLocations.php";';
    echo '</script>';
  }
}

?>

















  
  
 
  
 


















