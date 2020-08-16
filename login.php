<?php
  session_start();
  if(isset($SESSION["loggedin"])) && $_SESSION['loggedin'] === true){
    hedaer("location: welcome.php");
    exit;
  }
  require_once "config.php";

  $username = $password = "":
  $username_err = $password_err = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
      $username_err = "Please enter username";
    } else {
      $username = trim($_POST["username"]);
    }

    if(empty(trim($_POST["password"]))){
      $passeword_err = "Please enter your password";
    } else {
      $password = trim($_POST["password"]);
    }

    if(empty($username_err) && empty($password_err)){
      $sql = "SELECT id, username, password from users WHERE username = ?";

      if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        $param_username = $username;

        
      }
    }
  }

  
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
        <a class="nav-link " href="index.hmtl">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="locations.html">Locations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="users.html">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled " href="#">Logout</a>
      </li>
    </ul>
  </nav>
  <body>
    <div class="container">
      <form id="signinForm">
        <h1>LOGIN</h1>
        <label>
          <p class="label-txt">EMAIL</p>
          <input type="text" class="input" id="emailInputSignin">
          <div class="line-box">
            <div class="line"></div>
          </div>
        </label>
        <label>
          <p class="label-txt">PASSWORD</p>
          <input type="password" class="input" id="passwordInputSignin">
          <div class="line-box">
            <div class="line"></div>
          </div>
        </label>
        <input class="btn-login" type="submit" value="Login"></input>
        
      </form>
    </div>
      
  </body>
  <footer>
    <div class="container-fluid fixed-bottom bg-dark text-white">
      <p>2020 &copy </p>
    </div>
    
  </footer>

</html>