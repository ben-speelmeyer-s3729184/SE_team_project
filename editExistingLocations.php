<?php
  include('config.php');
  session_start();
  if(!isset($_SESSION['login_user'])){
    header("location: index.php");
  };
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Manage Locations</title>
  <link rel="apple-touch-icon" sizes="180x180" href="images/fav/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/fav/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/fav/favicon-16x16.png">
  <script src="function.js"></script>
  <script>
    function showLocation(str){
        var xhttp;
        if (str == ""){
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET","getLocation.php?q=" +str, true);
        xhttp.send();
    }
  </script>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <link rel="stylesheet" href="css/reglogin.css">
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
                    <h2 class="contact-title">Edit Existing Locations</h2>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <select name='locationId' onchange='showLocation(this.value)'>
                            <option value="">Select location Id to edit</option>
                            <?php
                                $query_select = 'SELECT locationId from locations;';
                                $result_select = mysqli_query($db,$query_select) or die(mysqli_error($db));
                                while($row=mysqli_fetch_array($result_select)){
                                    print "<option value='{$row['locationId']}'>{$row['locationId']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div id="txtHint">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- ================ Edit Location end ================= -->