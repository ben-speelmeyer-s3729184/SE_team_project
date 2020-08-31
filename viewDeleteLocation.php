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

    <body class="bg">
        <section class="contact-section">
            <div class="container">
                <div class="row" style="background-color:white;">
                    <div class="col-12">
                        <h2 class="contact-title">View and delete locations</h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    
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
<!-- ================ contact section end ================= -->