<?php
include("config.php");
session_start();

if(isset($_POST['delete1'])){
    $userId = $_POST['delete1'];
    $intID = (int)$userId;
    $qurey = "DELETE from users WHERE userId = '$intID';";
    
    if(mysqli_query($db,$qurey)){
      echo '<script type="text/javascript">';
      echo ' alert("User deleted successfully.");';  
      echo 'window.location.href = "manageUsers.php";';
      echo '</script>';
    }else{
      echo '<script type="text/javascript">';
      echo ' alert("Action failed.");';  
      echo 'window.location.href = "manageUsers.php";';
      echo '</script>';
    }
};  
?>

<?php
if(isset($_POST['editButton'])){
  $userId = $_POST['editButton'];
  $intId = (int)$userId;
  $q = "SELECT * FROM users WHERE userId = '$intId';";
  $result = mysqli_query($db,$q);
  while($row=mysqli_fetch_array($result)){ 
    if(!isset($_SESSION['login_user'])){
        header("location: index.php");
    };
    if($_SESSION['permUser'] != 1 ){
      header('location: welcome.php');
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
                          <form method=post  onsubmit='return checkPassword(this)' class=form-contact>
                            <div class=row>
                                <div class=col-12>
                                    <div class=form-group>
                                        <label for=id>User Id</label>
                                        <input class=form-control valid name=id id=id type=text  readonly value=<?php echo"{$row['userId']}"?>>
                                    </div>
                                </div>
                                <div class=col-12>
                                    <div class=form-group>
                                        <label for=role>Admin</label>
                                        <input <?php if($row['role'] == 'admin'){echo " checked=true ";}?> type=radio id=admin name=role value=admin>
                                        <label for=role>Assistant</label>
                                        <input <?php if($row['role'] == 'assistant'){echo " checked=true ";}?>type=radio id=assistant name=role value=assistant>
                                    </div>
                                </div>
                                <div class=col-12>
                                    <div class=form-group>
                                        <label for=username>Username</label>
                                        <input  required pattern=[A-Za-z0-9]{5,20} title='Please username between 5 and 20 characters.' class=form-control valid name=username id=username type=text value=<?php echo"{$row['username']}"?>>
                                    </div>
                                </div>
                                <div class=col-12>
                                    <div class=form-group>
                                        <label for=permTour>Tour Permission Granted</label>
                                        <input <?php if($row['permTour'] == 1){echo " checked=true";}?> type=checkbox id=premTour name=permTour value=1>
                                    </div>
                                </div>
                                <div class=col-12>
                                    <div class=form-group>
                                        <label for=permLocation>Location Permission Granted</label>
                                        <input <?php if($row['permLocation'] == 1){echo " checked=true";}?> type=checkbox id=premLocation name=permLocation value=1>
                                    </div>
                                </div>
                                <div class=col-12>
                                    <div class=form-group>
                                        <label for=permUser>User Permission Granted</label>
                                        <input <?php if($row['permUser'] == 1){echo " checked=true";}?> type=checkbox id=premUser name=permUser value=1>
                                    </div>
                                </div>
                                <div class=col-12>
                                  <div class=form-group>
                                      <label for=password1>Password</label>
                                      <input required pattern=[A-Za-z0-9]{5,20} title='Please enter password between 5 to 20 characters' value=<?php echo"{$row['password']}"?> class=form-control valid name=password1 id=password1 type=password onfocus=this.placeholder = '' onblur=this.placeholder = 'Enter password' placeholder=Enter password>
                                  </div>
                                </div>
                                <div class=col-12>
                                  <div class=form-group>
                                    <label for=password2>Confirm Password</label>
                                    <input required pattern=[A-Za-z0-9]{5,20} title='Please re-enter password' value=<?php echo"{$row['password']}"?> class=form-control valid name=password2 id=password2 type=password onfocus=this.placeholder= '' onblur=this.placeholder = 'Re-enter password' placeholder= Re-enter password>
                                  </div>
                                </div>
                                <div class=col-12>
                                  <div class=form-group mt-3>
                                    <input type=submit class=button button-contactForm boxed-btn name=editSubmit value=Edit>
                                  </div>
                                </div>
                          </div>
                          </form>
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
<?php
  }; //end of while loop
}
?>

<?php
  if(isset($_POST['editSubmit'])){
      $userId = $_POST['id'];
      $role = $_POST['role'];
      $username = $_POST['username'];
      $password = $_POST['password1'];
      $permTour = $_POST['permTour'];
      $permLocation = $_POST['permLocation'];
      $permUser = $_POST['permUser'];

      $userIdInt = (int)$userId;
      $permTourInt = (int)$permTour;
      $permLocationInt = (int)$permLocation;
      $permUserInt = (int)$permUser;
        
      $sql = "UPDATE users SET username = '$username', role = '$role', password = '$password', permTour = '$permTourInt', permLocation = '$permLocationInt', permUser = '$permUserInt' WHERE userId = '$userIdInt';";
        
      if(mysqli_query($db,$sql)){
          echo '<script type="text/javascript">';
          echo ' alert("User edited successfully.");';  
          echo 'window.location.href = "manageUsers.php";';
          echo '</script>';
      }else{
        echo '<script type="text/javascript">';
          echo ' alert("Action failed.");';  
          echo 'window.location.href = "manageUsers.php";';
          echo '</script>';
      };
  };
?>







