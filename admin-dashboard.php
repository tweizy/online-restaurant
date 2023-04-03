<h1>This is the admin dashboard</h1>

<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || $_SESSION["utype"] === "client"){
    header("location: login.php");
    exit;
}
?>

<a href="logout.php">Logout</a>
<a href="change-password.php">Change password</a>
