<?php
  include("config.php");
  session_start();
  if(!isset($_SESSION['login_user'])){
    header("location: index.php");
  };
  if($_SESSION['permLocation'] != 1 ){
      header('location: welcome.php');
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
                        <h2 class="contact-title">Add A New Location</h2>
                    </div>
                    <div class="col-lg-8">
                        <form  method=post action="addLocation.php"  class="form-contact contact_form" >
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input required pattern=[A-Za-z]{1,20} title='Please enter only letters and a maximum of 20 charaters.' class="form-control valid" name="locationName" id="locationName"  type="text"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Location Name'" placeholder="Enter Location Name"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input required pattern=[A-Z]{1} title='Please enter one capital letter.' class="form-control valid" name="coordinateX" id="coordinateX" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter X coordinate'" placeholder="Enter X coordinate">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input required pattern=[0-9]{1,2} title='Please enter one or two numbers' class="form-control valid" name="coordinateY" id="coordinateY" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Y coordinate'" placeholder="Enter Y coordinate">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="description" id="description" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description'" placeholder=" Enter Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input required pattern=[0-9]{1,4} title='Please enter the minimum time in seconds, maximum 4 digits' class="form-control" name="minTime" id="minTime" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Min. Time'" placeholder="Enter Min. Tme">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" class="button button-contactForm boxed-btn" value="Add"/>
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
<!-- ================ contact section end ================= -->