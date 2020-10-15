<?php
    include('config.php');// include configration file for database
    session_start();

    $role = $_POST['role'];// get the values from the submitted form
    $username = $_POST['username'];
    $password = $_POST['password1'];
    $permTour = $_POST['permTour'];
    $permLocation = $_POST['permLocation'];
    $permUser = $_POST['permUser'];
   
    $userIdInt = (int)$userId;// change string to intager
    $permTourInt = (int)$permTour;
    $permLocationInt = (int)$permLocation;
    $permUserInt = (int)$permUser;

    if(isset($_POST['username'])){
        $sqlcheck = "SELECT username from users WHERE username = '$username';";//query to check if username is already taken

        $result = mysqli_query($db,$sqlcheck);//execute query
        $numrows = mysqli_num_rows($result);// return the number of rows from the query 
        if($numrows > 0){
            echo '<script type="text/javascript">';
            echo ' alert("Username is already taken, please choose another");';  // alert the user that the username is already taken
            echo 'window.location.href = "createUser.php";';
            echo '</script>';
            
        }else{
            $sql = "INSERT INTO users(role,username,password,permTour,permLocation,permUser) VALUES ('$role','$username','$password','$permTourInt','$permLocationInt','$permUserInt');";
            //if the username has not been taken then this query will be executed and the values entered into the database
            if(mysqli_query($db,$sql)){
                echo '<script type="text/javascript">';
                echo ' alert("User created successfully.");';  //alert the user that the action was successful
                echo 'window.location.href = "createUser.php";';
                echo '</script>';
            }else{
                echo "ERROR: Not able to execute $sql." . mysqli_error($db);
            } 
        }
    }
?>