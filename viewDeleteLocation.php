<?php
  include("config.php");
  session_start();
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
</head>
<header>
    <div class="container-fluid bg-dark text-white p-3">
        <h1>Robot Tour Management System</h1>
        <p>Login as: <?php echo $_SESSION['login_user']?></p>
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
                    <h2 class="contact-title">Add A New Location</h2>
                </div>
                <div class="col-lg-8">
                   
                </div>
                
            </div>
        </div>
    </section>
<!-- ================ contact section end ================= -->