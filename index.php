<?php
    session_start();

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        if($_SESSION["utype"] == "client"){
            header("location: client-dashboard.php");
        }
        else if($_SESSION["utype"] == "admin"){
            header("location: admin-dashboard.php");
        }
        exit;
    }
?>