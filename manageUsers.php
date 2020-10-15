<?php
  include("config.php");
  session_start();
  if(!isset($_SESSION['login_user'])){// check if the user is logged in 
    header("location: index.php");
  };
  if($_SESSION['permUser'] != 1 ){
    header('location: welcome.php');// check to see if the user has user permissions 
  };
?>
<!doctype html>
<html>
    <head>
        <?php
        include('scripts.php');// imclude relivant scripts
        ?>
        <title>Manage Users</title>
    </head>

    <header>
        <div class="container-fluid bg-dark text-white p-3">
            <h1>Robot Tour Management System</h1>
        </div>
    </header>

    <?php
        include('nav.php');// inlcude the navigation element
    ?>

    <body class="align-content-center">
        <div class="container">
            <div class="row" style="background-color:white;">
                <div class="col-12">
                    <h2 class="contact-title">View and delete Users</h2>
                </div>
            </div>
            <form method="post" action="updateUserDatabase.php">
                <div style="height:500px;overflow-y:auto">
                    <div class="table-responsive">
                        <table class="table table-dark ">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>User role</th>
                                    <th>User Name</th>
                                    <th>Permission for tour management</th>
                                    <th>Permission for location management</th>
                                    <th>Permission for user management</th>
                                    <th>Creation date</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $query_select = 'SELECT * from users;';
                                        $result_select = mysqli_query($db,$query_select) or die(mysqli_error($db));// get all the user data from the user database
                                        while($row=mysqli_fetch_array($result_select)){
                                            print"<tr>";
                                            print"<td>{$row['userId']}</td>";
                                            print"<td>{$row['role']}</td>";// insert the data into scrollable table
                                            print"<td>{$row['username']}</td>";
                                            print"<td>{$row['permTour']}</td>";
                                            print"<td>{$row['permLocation']}</td>";
                                            print"<td>{$row['permUser']}</td>";
                                            print"<td>{$row['created_at']}</td>";
                                            if($row['userId'] != 1){// stop the main admin account being deleted
                                                print"<td><button type=submit name=delete1 value={$row['userId']}>Delete</button></td>";//button is disabled
                                            }else{
                                                print"<td><button type=button disabled>Delete</button></td>";// button will delete user
                                            };
                                            print"<td><button type=submit class=button boxed-btn name=editButton value={$row['userId']}>Edit</button></td>";// button will allow changes to the user profile
                                            print"</tr>";
                                        }
                                ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </form>
        </div>
    </body>

    <footer>
        <?php
        include('footer.php');// include footer element
        ?>
    </footer>
</html>
