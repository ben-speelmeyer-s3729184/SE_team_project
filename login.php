<?php
 include("config.php");
 session_start();

 if($_SERVER["REQUEST_METHOD"] == "POST"){
   $myUserName = mysqli_real_escape_string($db,$_POST['userName']);
   $myPassword = mysqli_real_escape_string($db,$_POST['password']);

   $sql = "SELECT id FROM users where username = '$myUserName' and password = '$myPassword'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $active = $row['active'];

   $count = mysqli_num_rows($result);

   if ($count == 1){
     session_register("myUserName");
     $_SESSION['login_user'] = $myUserName;

     header("location: welcome.php");
    }else {
      $error = "Your username or password is incorrect";
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
      <form action = "" method = "post">
        <h1>LOGIN</h1>
        <label>
          <p class="label-txt">Username</p>
          <input type="text" class="input" id="userName">
          <div class="line-box">
            <div class="line"></div>
          </div>
        </label>
        <label>
          <p class="label-txt">Password</p>
          <input type="password" class="input" id="password">
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