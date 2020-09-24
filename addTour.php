<?php
    include("config.php");
    session_start();

    $tourName = $_POST['tourName'];
    $tourType = $_POST['tourType'];

    if(isset($_POST['tourName'])){
        $sqlcheck = "SELECT tourName from tours WHERE tourName = '$tourName';";
        $result = mysqli_query($db,$sqlcheck);
        $numrows = mysqli_num_rows($result);
        if($numrows > 0){
            echo '<script type="text/javascript">';
            echo ' alert("Tour name is already taken, please choose another");';  
            echo 'window.location.href = "createTour.php";';
            echo '</script>';
        }else{
            $sql = "INSERT INTO tours(tourName,tourType,tourStatus) VALUES ('$tourName','$tourType','active');";
            mysqli_query($db,$sql);
        }
    }
    if(isset($_POST['addLocation'])){
        $getTourId = "SELECT tourId FROM tours WHERE tourName = '$tourName';";
        $resultTourId = mysqli_query($db,$getTourId);
        $rowName = mysqli_fetch_array($resultTourId);
        $tourId = $rowName['tourId'];

        
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
        echo ' alert("Tour succesfully added.");';  
        echo 'window.location.href = "createTour.php";';
        echo '</script>';    
    }else{
        echo '<script type="text/javascript">';
        echo ' alert("Action failed.");';  
        echo 'window.location.href = "createTour.php";';
        echo '</script>';
    }

?>