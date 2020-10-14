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
<html>
    <head>
        <?php
        include('scripts.php');
        ?>
    <title>Manage Tour</title>  
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
                        <h2 class="contact-title">Add A New Tour</h2>
                    </div>
                    <div class="col-lg-8">
                        <form  method=post action="submitNewTourToDatabase.php"  class="form-contact contact_form" >
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input required pattern=[A-Za-z]{1,20} title='Please enter only letters and a maximum of 20 charaters.' class="form-control valid" name="tourName" id="tourName"  type="text"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Tour Name'" placeholder="Enter Tour Name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Select tour type:</h5>
                                        <lable for=long>Long</label>
                                        <input type=radio checked=true value=long name=tourType id=long>
                                        <lable for=medium>Medium</label>
                                        <input type=radio value=medium name=tourType id=medium>
                                        <lable for=short>Short</label>
                                        <input type=radio value=short name=tourType id=short>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5>Select Locations:</h5>
                                    <div style="height:380px;overflow-y:auto">
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
                                                                print"<td><input type=checkbox value={$row['locationId']} name=addLocation[]></td>";
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
                                </div>
                            </div>
                            <div class="form-group mt-2">
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