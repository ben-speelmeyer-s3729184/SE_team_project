<?php
  include('config.php'); // include the database configuration file
  session_start();
  if(!isset($_SESSION['login_user'])){//check the user is logged in 
    header("location: index.php"); // if no user logged in they are redirected back the index page
  };
  if($_SESSION['permLocation'] != 1 ){ // check the user has location permissions
    header('location: welcome.php'); // if the user does not have permission they are redirected to welcome page
  };
?>
<!doctype html>
<html lang="en">
    <head>
        <?php
            include('scripts.php'); // includes the relivent scripts for the page to operate
        ?>
        <title>Manage Locations</title>
    </head>
    <header>
        <div class="container-fluid bg-dark text-white p-3">
            <h1>Robot Tour Management System</h1>
        </div>
    </header>
    <?php
        include('nav.php'); // includes the navigation element
    ?>
    <body class="bg">
        <section class="contact-section">
            <div class="container">
                <div class="row" style="background-color:white;">
                    <div class="col-12">
                        <h2 class="contact-title">Manage Locations</h2>
                    </div>
                    <form method="post" action="updateLocationDatabase.php"> <!--form begins here -->
                        <div style="height:500px;overflow-y:auto">
                            <div class="table-responsive"> <!--table responsive allows the table to be scrollable-->
                                <table class="table table-dark ">
                                    <thead>
                                        <tr>
                                            <th>Location ID</th>
                                            <th>Location Name</th>
                                            <th>Location X</th>
                                            <th>Location Y</th>
                                            <th>Location Description</th>
                                            <th>Location Minimum Time</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                            <th>Copy</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $query_select = 'SELECT * from locations;'; // sql query to get all the data from the locations table
                                                $result_select = mysqli_query($db,$query_select) or die(mysqli_error($db));
                                                while($row=mysqli_fetch_array($result_select)){ // use the while loop to populate the table 
                                                    print"<tr>";
                                                    print"<td>{$row['locationId']}</td>";
                                                    print"<td>{$row['locationName']}</td>";
                                                    print"<td>{$row['locationX']}</td>";
                                                    print"<td>{$row['locationY']}</td>";
                                                    print"<td>{$row['locationDescription']}</td>";
                                                    print"<td>{$row['locationMinTime']}</td>";
                                                    print"<td><button type=submit name=delete1 value={$row['locationId']}>Delete</button></td>"; // the delete button has the locationId as it's value to it can be carried to the action file for reference
                                                    print"<td><button type=submit class=button boxed-btn name=editButton value={$row['locationId']}>Edit</button></td>";// edit has locationId as value
                                                    print"<td><button type=submit class=button boxed-btn name=copyButton value={$row['locationId']}>Copy</button></td>";// copy has locationId as value
                                                    print"</tr>";
                                                }
                                        ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>

    <footer>
        <?php
        include('footer.php'); // include footer element
        ?>
    </footer>

</html>

<!-- ================ Edit Location end ================= -->