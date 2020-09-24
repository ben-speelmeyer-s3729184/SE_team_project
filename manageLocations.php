<?php
  include('config.php');
  session_start();
  if(!isset($_SESSION['login_user'])){
    header("location: index.php");
  };
  if($_SESSION['permLocation'] != 1 ){
    header('location: welcome.php');
  };
?>
<!doctype html>
<html lang="en">
    <head>
        <?php
            include('scripts.php');
        ?>
        <title>Manage Locations</title>
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
                        <h2 class="contact-title">Manage Locations</h2>
                    </div>
                    <form method="post" action="editLocations.php">
                        <div style="height:500px;overflow-y:auto">
                            <div class="table-responsive">
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
                                                $query_select = 'SELECT * from locations;';
                                                $result_select = mysqli_query($db,$query_select) or die(mysqli_error($db));
                                                while($row=mysqli_fetch_array($result_select)){
                                                    print"<tr>";
                                                    print"<td>{$row['locationId']}</td>";
                                                    print"<td>{$row['locationName']}</td>";
                                                    print"<td>{$row['locationX']}</td>";
                                                    print"<td>{$row['locationY']}</td>";
                                                    print"<td>{$row['locationDescription']}</td>";
                                                    print"<td><button onclick='speak({$row['locationDescription']})'>Play description</button></td>";
                                                    print"<td>{$row['locationMinTime']}</td>";
                                                    print"<td><button type=submit name=delete1 value={$row['locationId']}>Delete</button></td>";
                                                    print"<td><button type=submit class=button boxed-btn name=editButton value={$row['locationId']}>Edit</button></td>";
                                                    print"<td><button type=submit class=button boxed-btn name=copyButton value={$row['locationId']}>Copy</button></td>";
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
        include('footer.php');
        ?>
    </footer>

</html>

<!-- ================ Edit Location end ================= -->