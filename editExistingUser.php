<?php
  include('config.php');
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
        <title>Manage Users</title>
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
                xhttp.open("GET","getUser.php?q=" +str, true);
                xhttp.send();
            }
        </script>
        <script> 
          
          // Function to check Whether both passwords 
          // is same or not. 
          function checkPassword(form) { 
              password1 = form.password1.value; 
              password2 = form.password2.value; 

              // If password not entered 
              if (password1 == '') 
                  alert ("Please enter Password"); 
                    
              // If confirm password not entered 
              else if (password2 == '') 
                  alert ("Please enter confirm password"); 
                    
              // If Not same return False.     
              else if (password1 != password2) { 
                  alert ('\nPassword did not match: Please try again...') 
                  return false; 
              } 
          } 
      </script>
    </head>
    <header>
        <div class="container-fluid bg-dark text-white p-3">
            <h1>Robot Tour Management System</h1>
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
                        <h2 class="contact-title">Edit Existing Users</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <select name='username' onchange='showLocation(this.value)'>
                                <option value="">Select Username to edit</option>
                                <?php
                                    $query_select = 'SELECT username from users;';
                                    $result_select = mysqli_query($db,$query_select) or die(mysqli_error($db));
                                    while($row=mysqli_fetch_array($result_select)){
                                        print "<option value='{$row['username']}'>{$row['username']}</option>";
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

    <footer>
        <?php
        include('footer.php');
        ?>
    </footer>

</html>

<!-- ================ Edit Location end ================= -->