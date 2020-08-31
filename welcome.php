<?php
  session_start();
  if(!isset($_SESSION['login_user'])){
    header("location: index.php");
  };
?>
<!doctype html>
<html lang="en">
  <head>
    <?php
      include('scripts.php');
    ?>
    <title>SEPM project</title>
  </head>

  <header>
    <div class="container-fluid bg-dark text-white p-3">
        <h1>Robot Tour Management System</h1>
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
    <?php
      include('footer.php');
    ?>
  </footer>

</html>