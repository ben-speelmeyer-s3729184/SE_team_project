<?php
  session_start();
  if(!isset($_SESSION['login_user'])){
    header("location: index.php");
  };
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>SEPM project</title>

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
  <body>
    <div class="text-center">
        <p>Welcome to the Robot Tour Management System, please select an option from the navigation bar.</p> 
    </div>
  </body>
  <footer>
    <div class="container-fluid fixed-bottom bg-dark text-white">
      <p>2020 &copy </p>
    </div>
    
  </footer>

</html>