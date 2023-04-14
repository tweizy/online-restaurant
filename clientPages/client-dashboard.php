<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login-register-pages/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d644c28068.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Client Dashboard</title>
    <link rel="stylesheet" href="../Style/style2.css">
    <style>
        body {
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="header sticky-top bg-primary">
        <h2 class="title">Online Restaurant</h2>
        <div>
            <a href="../login-register-Pages/logout.php" class="bg-danger"><i class="fa-solid fa-right-from-bracket fa-lg"></i>Logout</a>
            <a href="../login-register-Pages/change-password.php" class="bg-success"><i class="fa-solid fa-lock fa-lg"></i>Change Password</a>
        </div>
    </div>
    <div class="container"><h1 style="margin-top: -2rem; margin-bottom: 2rem;">Menu des Plats</h1></div>


    <?php
    require_once("../include/db-connect.php");
    $sql = "SELECT * FROM plats";
    if($query = $db-> prepare($sql)){
        if($query-> execute()){
            $result = $query-> get_result();
            if($result-> num_rows > 0){
                echo "<div class='container'>";
                while($row = $result->fetch_array()){
                    ?> 
                    <div class="card" style="width: 18rem; margin-right: 30px">
                    <img style="max-height: 300px" class="card-img-top" src="../img/<?php echo $row["pname"] ?>.jpg" alt="<?php echo $row["pname"] ?>">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title"><?php echo $row["pname"] ?></h5>
                            <p style="background-color: red; color: white; border-radius: 10px; width: 70px; text-align: center"><?php echo $row["ptype"] ?></p>
                        </div>
                        <p class="card-text"><?php echo $row["pdescription"] ?></p>
                        <div>
                            <p style="font-weight: bold;"><?php echo $row["price"]."$" ?></p>
                            <a href="#" class="btn btn-primary">Commander</a>
                        </div>
                    </div>
                    </div>
                    <?php
                }
                echo "</div>";
            }
        }
    }
    ?>    
</body>
</html>

