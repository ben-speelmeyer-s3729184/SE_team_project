<?php
    session_start();//this file terminates the session 
    //and returns user to the index page.

    if(session_destroy()){
        header("location: index.php");
    }
?>