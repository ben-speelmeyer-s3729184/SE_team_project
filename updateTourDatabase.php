<?php
  include("config.php");//include database configuration file
  session_start();
  
  if(isset($_POST['delete1'])){//if delete button submitted form this if statment is trigger
    $tourId = $_POST['delete1'];// get the tour id from the delete button value
    $intId = (int)$tourId; //change string to int
    $q = "DELETE FROM tours WHERE tourId = '$intId';";// delete from the database
    if(mysqli_query($db,$q)){
    echo '<script type="text/javascript">';
    echo ' alert("Tour deleted succesfully.");';  //alert user to successfull operation
    echo 'window.location.href = "manageTours.php";';
    echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo ' alert("Action failed.");';  // alert user to failed operation
        echo 'window.location.href = "manageTours.php";';
        echo '</script>';
    };
  }
  if(isset($_POST['editButton'])){// if edit button is used this if statment will be triggered and then edit page displayed to user
     $tourId = $_POST['editButton'];
     $intId = (int)$tourId;
     $getTourById = "SELECT * FROM tours WHERE tourId = '$intId';";//get the tour details from data base
     $tourResult = mysqli_query($db,$getTourById);
     while($tourRow=mysqli_fetch_array($tourResult)){//while loop to populate the form diplayed
        ?>
        <?php
          if(!isset($_SESSION['login_user'])){//check user is logged in
            header("location: index.php");
          };
          if($_SESSION['permTour'] != 1 ){//check user has permissions
            header('location: welcome.php');
          };
        ?>
            <!doctype html>
            <html>
                <head>
                    <?php
                    include('scripts.php');// include relivant scripts
                    ?>
                    <title>Manage Tours</title>
                </head>

                <header>
                    <div class="container-fluid bg-dark text-white p-3">
                        <h1>Robot Tour Management System</h1>
                    </div>
                </header>

                <?php
                    include('nav.php');//include navigation element
                ?>

                <body class="align-content-center">
                    <div class="container">
                        <div class="row" style="background-color:white;">
                            <div class="col-12">
                                <h2 class="contact-title">Edit Tours</h2>
                            </div>
                        </div>
                        <form method="post" >
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                          <input readonly type=text class="form-control valid" name=tourId id=tourId value=<?php echo "{$tourRow['tourId']}"?>>
                                    </div>
                                </div>
                                <div class="col-12">
                                      <div class="form-group">
                                            <input value= <?php echo "{$tourRow['tourName']}"?> required pattern=[A-Za-z]{1,20} title='Please enter only letters and a maximum of 20 charaters.' class="form-control valid" name="tourName" id="tourName"  type="text"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Tour Name'" placeholder="Enter Tour Name">
                                      </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Select tour type:</h5>
                                        <lable for=long>Long</label><!--determin and activate relivant tour type-->
                                        <input <?php if($tourRow['tourType'] == 'long'){echo ' checked=true ';} ?> type=radio value=long name=tourType id=long>
                                        <lable for=medium>Medium</label>
                                        <input <?php if($tourRow['tourType'] == 'medium'){echo ' checked=true ';} ?> type=radio value=medium name=tourType id=medium>
                                        <lable for=short>Short</label>
                                        <input <?php if($tourRow['tourType'] == 'short'){echo ' checked=true ';} ?> type=radio value=short name=tourType id=short>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Select tour status:</h5>
                                        <lable for=active>Active</label><!-- determin and activate relivant tour status-->
                                        <input <?php if($tourRow['tourStatus'] == 'active'){echo ' checked=true ';} ?>type=radio value=active name=tourStatus id=active>
                                        <lable for=deactivated>Deactivated</label>
                                        <input <?php if($tourRow['tourStatus'] == 'deactivated'){echo ' checked=true ';} ?> type=radio value=deactivated name=tourStatus id=deactivated>
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
                                                        $dataArray = array();
                                                        $localId = "SELECT locationId FROM tourLocations WHERE tourId = '{$tourRow['tourId']}';";//get all locations from tourlocations
                                                        $resultLocalId = mysqli_query($db,$localId);
                                                        while($rowLocalId=mysqli_fetch_array($resultLocalId)){
                                                            $dataArray[] = $rowLocalId['locationId'];    //input all tourlocations to array
                                                        };
                                                        $query_select = 'SELECT * from locations;';
                                                        $result_select = mysqli_query($db,$query_select) or die(mysqli_error($db));//use while loop to get location data where location id is in data array
                                                        while($row=mysqli_fetch_array($result_select)){?>
                                                            <tr>
                                                            <td><input type=checkbox  <?php if(in_array($row['locationId'],$dataArray)){echo ' checked=true ';} ?> value=<?php echo "{$row['locationId']};"?> name=addLocation[]></td>
                                                            <td><?php echo "{$row['locationId']}";?></td>
                                                            <td><?php echo "{$row['locationName']}";?></td>
                                                            <td><?php echo "{$row['locationX']}";?></td>
                                                            <td><?php echo "{$row['locationY']}";?></td>
                                                            <td><?php echo "{$row['locationDescription']}";?></td>
                                                            <td><?php echo "{$row['locationMinTime']}";?></td>
                                                            </tr>
                                                          <?php  
                                                        }
                                                    ?>
                                                </tbody>
                                            </table> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2 pb-5">
                                <input type="submit" name=editSubmit class="button button-contactForm boxed-btn" value="Edit"/><!--submit the edited data.--> 
                            </div>
                        </form>
                    </div>
                </body>

                <footer>
                    <?php
                    include('footer.php');//include footer element
                    ?>
                </footer>
            </html>

       <?php
      }//end of while loop

  }
  if(isset($_POST['editSubmit'])){//rest of code block will update tour database and tourlocations database in the same way new tours are added
    $tourId = $_POST['tourId'];
    $tourName = $_POST['tourName'];
    $tourType = $_POST['tourType'];
    $tourStatus = $_POST['tourStatus'];

    if(isset($_POST['tourName'])){
        $sql = "UPDATE tours SET tourName = '$tourName', tourType = '$tourType', tourStatus = '$tourStatus' WHERE tourId = '$tourId' ;";
        mysqli_query($db,$sql);
    }
    if(isset($_POST['addLocation'])){
        $deleteQ = "DELETE FROM tourLocations WHERE tourId = '$tourId';";
        mysqli_query($db,$deleteQ);

        foreach($_POST['addLocation'] as $locationId){
            $minTimeq = "SELECT locationMinTime FROM locations WHERE locationId = $locationId;";
            $resultMinTimeq = mysqli_query($db,$minTimeq);
            $rowMinTimeq = mysqli_fetch_array($resultMinTimeq);
            $minTime = $rowMinTimeq['locationMinTime'];
            $query = "INSERT INTO tourLocations(tourId, locationId, minTime) VALUES ('$tourId','$locationId','$minTime');";
            mysqli_query($db,$query);
        }
    }
    $dataArray = array();

    $minTimeQ = "SELECT minTime FROM tourLocations WHERE tourId = '$tourId';";
    $resultMinTimeQ = mysqli_query($db,$minTimeQ);
    while($minTimeQ=mysqli_fetch_array($resultMinTimeQ)){
        $dataArray[] = $minTimeQ['minTime'];    
    };

    $tourDuration = array_sum($dataArray);

    $timeQ = "UPDATE tours SET tourDuration = '$tourDuration' WHERE tourId = '$tourId';";

    if(mysqli_query($db,$timeQ)){
        echo '<script type="text/javascript">';
        echo ' alert("Tour succesfully updated.");';  
        echo 'window.location.href = "manageTours.php";';
        echo '</script>';    
    }else{
        echo '<script type="text/javascript">';
        echo ' alert("Action failed.");';  
        echo 'window.location.href = "manageTours.php";';
        echo '</script>';
    }
  }
  
?>