<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || $_SESSION["utype"] === "client"){
    header("location: ../login-register-Pages/login.php");
    exit;
}