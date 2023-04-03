<?php
session_start();
require_once '../db-connect.php';

$result = $db->query("SELECT COUNT(*) as count FROM plats");
$row = $result->fetch_assoc();
$plats_count = $row["count"];

$res2 = $db->query('SELECT COUNT(*) as count FROM commandes');
$row2 = $res2->fetch_assoc();
$commandes_count = $row2["count"];

$res3 = $db->query("SELECT COUNT(*) as count FROM commandes WHERE statut = 'Livrée'");
$row3 = $res3->fetch_assoc();
$completed_commandes_count = $row3["count"];


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="adminDashboardStyle.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Carte</h6>
                        <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span></span></h2>
                        <p class="m-b-0">Menu des plats<span class="f-right"><?php echo $plats_count; ?></span></p>
                        <a href="gestion-plats.php"><button>Accéder</button></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Plat du jour</h6>
                        <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span></span></h2>
                        <p class="m-b-0"><span class="f-right"></span></p>
                        <a href="plat-du-jour.php"><button>Accéder</button></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Commandes reçus</h6>
                        <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span><?php echo $commandes_count; ?></span></h2>
                        <p class="m-b-0">Completed Orders<span class="f-right"><?php echo $completed_commandes_count; ?></span></p>
                        <a href="gestion-commandes.php"><button>Accéder</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>