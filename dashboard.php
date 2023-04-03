<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<a href="logout.php">Logout</a>
<a href="change-password.php">Change password</a>
