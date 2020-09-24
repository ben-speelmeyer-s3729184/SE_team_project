<?php
  include("config.php");
  session_start();
  if(!isset($_SESSION['login_user'])){
    header("location: index.php");
  };
  if($_SESSION['permTour'] != 1 ){
    header('location: welcome.php');
  };
?>
<!doctype html>
<html lang="en" class="notranslate">
    <head>
        <?php
        include('scripts.php');
        ?>
        
        <title>Manage Tours</title>
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
                    <h2 class="contact-title ">Manage Tours</h2>
                </div>
            </div>
            <form method="post" action="editTour.php">
                <div style="height:500px;overflow-y:auto">
                    <div class="table-responsive">
                        <table class="table table-dark ">
                            <thead>
                                <tr>
                                    <th>Tour Id</th>
                                    <th>Tour Name</th>
                                    <th>Tour Type</th>
                                    <th>Tour Duration</th>
                                    <th>Tour Status</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query_select = 'SELECT * from tours;';
                                    $result_select = mysqli_query($db,$query_select) or die(mysqli_error($db));
                                    while($row=mysqli_fetch_array($result_select)){
                                        print"<tr>";
                                        print"<td>{$row['tourId']}</td>";
                                        print"<td>{$row['tourName']}</td>";
                                        print"<td>{$row['tourType']}</td>";
                                        print"<td>{$row['tourDuration']}</td>";
                                        print"<td>{$row['tourStatus']}</td>";
                                        print"<td><button type=submit name=delete1 value={$row['tourId']}>Delete</button></td>";
                                        print"<td><button type=submit class=button boxed-btn name=editButton value={$row['tourId']}>Edit</button></td>";
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
        include('footer.php');
        ?>
    </footer>
</html>
