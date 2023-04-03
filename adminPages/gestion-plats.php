<?php
session_start();
require_once '../db-connect.php';
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
    <title>Gestion des plats</title>
</head>
<body>
    <div class="container p-3">
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

                echo "<tr><td>$name</td><td>$type</td><td>$description</td><td>$price</td><td><a href='changer-plat.php?id=$pid'>Changer</a></td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>