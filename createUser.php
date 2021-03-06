<?php
  include("config.php");
  session_start();
  if(!isset($_SESSION['login_user'])){//check  if the user is logged in 
    header("location: index.php");
  };
  if($_SESSION['permUser'] != 1 ){// check if the user has user permissions
    header('location: welcome.php');
  };
?>
<!doctype html>
<html>
    <head>
        <?php
        include('scripts.php');
        ?>
        <title>Create Users</title>
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
        include('nav.php');// include navigation element
    ?>
    <body class="bg">
        <section class="contact-section">
            <div class="container">
                <div class="row" style="background-color:white;">
                    <div class="col-12">
                        <h2 class="contact-title">Add A New User</h2>
                    </div>
                    <div class="col-lg-8">
                        <form  method=post action="submitNewUserToDatabase.php" onsubmit="return checkPassword(this)"  class="form-contact contact_form" ><!-- begin form-->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <p>Select role</p>
                                        <label for="admin">Admin</label>
                                        <input name="role" id="admin"  type="radio" value="admin" ></input>
                                        <label for="assistant">Assistant</label>
                                        <input checked="true" name="role" id="assistant"  type="radio" value="assistant"  ></input>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input required pattern=[A-Za-z0-9]{5,20} title='Please enter user name between 5 to 20 characters.' class="form-control valid" name="username" id="username" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter username'" placeholder="Enter username">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for=permTour>Tour Permission Granted</label>
                                        <input type=checkbox id=premTour name=permTour value=1>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for=permTour>Location Permission Granted</label>
                                        <input type=checkbox id=permLocation name=permLocation value=1>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for=permTour>User Permission Granted</label>
                                        <input type=checkbox id=premUser name=permUser value=1>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input required pattern=[A-Za-z0-9]{5,20} title='Please enter password between 5 to 20 characters' class="form-control valid" name="password1" id="password1" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter password'" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input required pattern=[A-Za-z0-9]{5,20} title='Please re-enter password' class="form-control valid" name="password2" id="password2" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Re-enter password'" placeholder="Re-enter password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" class="button button-contactForm boxed-btn" value="Add"/><!-- submits the form to submit new user to data base--> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>

    <footer>
        <?php
            include('footer.php');//include footer element 
        ?>
    </footer>

</html>
<!-- ================ contact section end ================= -->