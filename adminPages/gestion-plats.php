<?php
require_once 'adminSessionCheck.php';
require_once '../include/db-connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b72eda9c8f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Style/style2.css">
    <title>Gestion des plats</title>
</head>
<body>
    <div class="header sticky-top bg-primary">
        <h2 class="title">Online Restaurant</h2>
        <div>
            <a href="../login-register-Pages/logout.php" class="bg-danger"><i class="fa-solid fa-right-from-bracket fa-lg"></i>Logout</a>
            <a href="../login-register-Pages/change-password.php" class="bg-success"><i class="fa-solid fa-lock fa-lg"></i>Change Password</a>
        </div>
    </div>

    <div class="container p-3">
        <h1 class="mb-4">Plats</h1>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Nom</th>
                <th>Type</th>
                <th>Description</th>
                <th>Prix</th>
                <th></th>
            </tr>
            <?php
            $result = $db->query("SELECT * FROM plats");
            while ($row = $result->fetch_assoc()) {
                $pid = $row["pid"];
                $name = $row["pname"];
                $type = $row["ptype"];
                $description = $row["pdescription"];
                $price = $row["price"];

                echo "<tr><td>$name</td><td>$type</td><td>$description</td><td>$price</td><td><a class='me-3' href='changer-plat.php?id=$pid'><i class='fa-solid fa-pen-to-square fa-lg' style='color: #00ad00;'></i></a><a href='supprimer-plat.php?id=$pid'><i class='fa-solid fa-trash fa-lg' style='color: #ff0000;'></a></td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>