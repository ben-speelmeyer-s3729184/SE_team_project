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
    
    <title>SEPM project</title>

  </head>
  <header>
    <div class="container-fluid bg-dark text-white p-3">
        <h1>Robot Tour Management System</h1>
    </div>
  </header>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link " href="index.html">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="locations.html">Locations</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="users.html">Users</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link  " href="logout.php">Logout</a>
      </li>
    </ul>
  </nav>
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