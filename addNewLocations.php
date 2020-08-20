<?php
  include("config.php");
  session_start();
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
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Manage Locations</title>
  <link rel="apple-touch-icon" sizes="180x180" href="images/fav/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/fav/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/fav/favicon-16x16.png">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <link rel="stylesheet" href="css/reglogin.css">
</head>
<header>
    <div class="container-fluid bg-dark text-white p-3">
        <h1>Robot Tour Management System</h1>
        <p>Login as: <?php echo $_SESSION['login_user']?></p>
    </div>
  </header>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link " href="index.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="addNewLocations.php">Add Locations</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="editExistingLocations.php">Edit Locaiton</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link  " href="logout.php">Logout</a>
      </li>
    </ul>
  </nav>
<body class="bg">
    <div class="container">
      <!-- <button class="btn-redirect" onclick="window.location.href='index.php';">BACK TO HOME</button> -->
      <form id="signinForm">
      </div>

      <section class="contact-section">
        <div class="container">
            


            <div class="row" style="background-color:white;">
                <div class="col-12">
                    <h2 class="contact-title">Add A New Location</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control valid" name="locationName" id="locationName" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Location Name'" placeholder="Enter Location Name"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control valid" name="coordinates" id="coordinates" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter x-y coordinates'" placeholder="Enter x-y coordinatese">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="description" id="description" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description'" placeholder=" Enter Description"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="minTime" id="minTime" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Min. Time'" placeholder="Enter Min. Tme">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn" >Add</button>
                        
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
<!-- ================ contact section end ================= -->