<?php
  include("config.php");
  session_start();
  if(!isset($_SESSION['login_user'])){
    header("location: index.php");
  };
?>
<!doctype html>
<html>
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

    <body class="align-content-center">
        <div class="container">
            <div class="row" style="background-color:white;">
                <div class="col-12">
                    <h2 class="contact-title">View and delete locations</h2>
                </div>
            </div>
            <form method="post" action="deletelocal.php">
                <div style="height:500px;overflow-y:auto">
                    <div class="table-responsive">
                        <table class="table table-dark ">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Location ID</th>
                                    <th>Location Name</th>
                                    <th>Location X coordinate</th>
                                    <th>Location Y coordinate</th>
                                    <th>Location Description</th>
                                    <th>Location Minimum Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $query_select = 'SELECT * from locations;';
                                        $result_select = mysqli_query($db,$query_select) or die(mysqli_error($db));
                                        while($row=mysqli_fetch_array($result_select)){
                                            print"<tr>";
                                            print"<td><input type=checkbox value={$row['locationId']} name=delete[]></td>";
                                            print"<td>{$row['locationId']}</td>";
                                            print"<td>{$row['locationName']}</td>";
                                            print"<td>{$row['locationX']}</td>";
                                            print"<td>{$row['locationY']}</td>";
                                            print"<td>{$row['locationDescription']}</td>";
                                            print"<td>{$row['locationMinTime']}</td>";
                                            print"</tr>";
                                            
                                        }
                                ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
                <div class="pt-2">
                    <input  type="submit" name="but_delete" class="button  boxed-btn" value="Delete"/> 
                </div>
            </form>
        </div>
    </body>

    <footer>
        <?php
        include('footer.php');
        ?>
    </footer>
</html>
