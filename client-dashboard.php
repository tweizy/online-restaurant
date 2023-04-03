<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<h1>This is the client dashboard</h1>

<a href="logout.php">Logout</a>
<a href="change-password.php">Change password</a>
