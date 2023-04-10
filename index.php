<?php
    session_start();

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        if($_SESSION["utype"] == "client"){
            header("location: clientPages/client-dashboard.php");
        }
        else if($_SESSION["utype"] == "admin"){
            header("location: adminPages/admin-dashboard.php");
        }
        exit;
    }
    else {
        header("location: login-register-Pages/login.php");
    }
?>