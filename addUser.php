<?php
    include('config.php');
    session_start();

    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password1'];

    if(isset($_POST['username'])){
        $sqlcheck = "SELECT username from users WHERE username = '$username';";

        $result = mysqli_query($db,$sqlcheck);
        $numrows = mysqli_num_rows($result);
        if($numrows > 0){
            echo '<script type="text/javascript">';
            echo ' alert("Username is already taken, please choose another");';  
            echo 'window.location.href = "createUser.php";';
            echo '</script>';
            
        }else{
            $sql = "INSERT INTO users(role,username,password) VALUES ('$role','$username','$password');";

            if(mysqli_query($db,$sql)){
                echo '<script type="text/javascript">';
                echo ' alert("User created successfully.");';  
                echo 'window.location.href = "createUser.php";';
                echo '</script>';
            }else{
                echo "ERROR: Not able to execute $sql." . mysqli_error($db);
            } 
        }
    }
?>