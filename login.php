<?php
 include("config.php");//inlcude database configuration file
 session_start();
 if($_SERVER["REQUEST_METHOD"] == "POST"){
  $myUserName = mysqli_real_escape_string($db,$_POST['userName']);//get value from form and remove sql elements for security
  $myPassword = mysqli_real_escape_string($db,$_POST['password']);

  $sql = "SELECT userId, permTour, permLocation, permUser FROM users where username = '$myUserName' and password = '$myPassword'";//get username, password and permissions form user database
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['active'];
  $permTour = $row['permTour'];
  $permLocation = $row['permLocation'];
  $permUser = $row['permUser'];

  $count = mysqli_num_rows($result);

  if ($count == 1){//if row equals one then user is verified
      
      $_SESSION['login_user'] = $myUserName;//create session variables for permissions
      $_SESSION['permUser'] = $permUser;
      $_SESSION['permLocation'] = $permLocation;
      $_SESSION['permTour'] = $permTour;
      header('location: welcome.php');
      }else {
      $error = "Your username or password is incorrect";//alert user the username or password is incorrect
      
      echo "<script type='text/javascript'>alert('$error');</script>";
      }
  }
 
?>

<!doctype html>
<html lang="en">
  <head>
    <?php
      include('scripts.php');// include relivant scritps for page
    ?>
    <title>SEPM project</title>
    <script type=text/javascript>
      
    </script>
  </head>

  <header>
    <div class="container-fluid bg-dark text-white p-3">
        <h1>Robot Tour Management System</h1>
    </div>
  </header>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link " href="index.php">Home</a>
      </li>
    </ul>
  </nav>

  <body>
    <div class="container">
      <form method = "post">
        <h1>LOGIN</h1>
        <label>
          <p class="label-txt">Username</p>
          <input type="text" class="input" name="userName">
          <div class="line-box">
            <div class="line"></div>
          </div>
        </label>
        <label>
          <p class="label-txt">Password</p>
          <input type="password" class="input" name="password">
          <div class="line-box">
            <div class="line"></div>
          </div>
        </label>
        <input class="btn-login" type="submit" value="Login"></input>
      </form>
    </div>
  </body>
  <footer>
    <?php
      include('footer.php');//include footer element
    ?>
  </footer>

</html>