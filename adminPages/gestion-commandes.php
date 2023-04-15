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
    <title>Gestion des commandes</title>
</head>
<body>
    <div class="header sticky-top bg-primary mb-5">
        <h2 class="title">Online Restaurant</h2>
        <div>
            <a href="../login-register-Pages/logout.php" class="bg-danger"><i class="fa-solid fa-right-from-bracket fa-lg"></i>Logout</a>
            <a href="../login-register-Pages/change-password.php" class="bg-success"><i class="fa-solid fa-lock fa-lg"></i>Change Password</a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <tr>
            <th>ID Commande</th>
            <th>ID Utilisateur</th>
            <th>Statut de la commmande</th>
            <th>Date de la commande</th>
            <th>Total</th>
            <th>Plats commandés</th>
        </tr>
    <?php
    $res = $db->query("SELECT * FROM commandes");
    while ($row = $res->fetch_assoc()) {
        $cid = $row["cid"];
        $uid = $row["uid"];
        $statut = $row["statut"];
        $cdate = $row["cdate"];
        $bill = $row["bill"];
        $res2 = $db->query("SELECT * FROM commandes NATURAL JOIN commande_plat NATURAL JOIN plats");
        $plats = [];
        $quantites = [];
        $plat_qty = [];
        while ($row2 = $res2->fetch_assoc()) {
            $plats[] = $row2["pname"];
            $quantites[] = $row2["qty"];
        }
        for ($i=0; $i<count($plats); $i++) {
            $plat_qty[] = $quantites[$i] . " " . $plats[$i];
        }
        $info_commande = implode(", ", $plat_qty);
        echo "<tr>";
        echo "<td>$cid</td>";
        echo "<td>$uid</td>";
        echo "<td>$statut</td>";
        echo "<td>$cdate</td>";
        echo "<td>$bill $</td>";
        echo "<td>$info_commande</td>";
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>
