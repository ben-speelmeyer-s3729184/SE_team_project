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
        <title>Manage Users</title>
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
                    <h2 class="contact-title">View and delete Users</h2>
                </div>
            </div>
            <form method="post" action="deleteUser.php">
                <div style="height:500px;overflow-y:auto">
                    <div class="table-responsive">
                        <table class="table table-dark ">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>User ID</th>
                                    <th>User role</th>
                                    <th>User Name</th>
                                    <th>Permission for tour management</th>
                                    <th>Permission for location management</th>
                                    <th>Permission for user management</th>
                                    <th>Creation date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $query_select = 'SELECT * from users;';
                                        $result_select = mysqli_query($db,$query_select) or die(mysqli_error($db));
                                        while($row=mysqli_fetch_array($result_select)){
                                            print"<tr>";
                                            print"<td><input type=checkbox value={$row['id']} name=delete[]></td>";
                                            print"<td>{$row['id']}</td>";
                                            print"<td>{$row['role']}</td>";
                                            print"<td>{$row['username']}</td>";
                                            print"<td>{$row['permTour']}</td>";
                                            print"<td>{$row['permLocation']}</td>";
                                            print"<td>{$row['permUser']}</td>";
                                            print"<td>{$row['created_at']}</td>";
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
