<?php

require_once '../include/db-connect.php';

require_once 'adminSessionCheck.php';

$result = $db->query("SELECT COUNT(*) as count FROM plats");
$row = $result->fetch_assoc();
$plats_count = $row["count"];

$res2 = $db->query('SELECT COUNT(*) as count FROM commandes');
$row2 = $res2->fetch_assoc();
$commandes_count = $row2["count"];

$res3 = $db->query("SELECT COUNT(*) as count FROM commandes WHERE statut = 'Livrée'");
$row3 = $res3->fetch_assoc();
$completed_commandes_count = $row3["count"];

$plat_du_jour_nom = "";
$plat_du_jour_price = "";
$plat_du_jour_desc = "";

$res4 = $db->query("SELECT * FROM plats WHERE ptype = 'plat du jour'");
if ($res4->num_rows > 0) {
    $row4 = $res4->fetch_assoc();
    $plat_du_jour_nom = $row4["pname"];
    $plat_du_jour_price = $row4["price"];
    $plat_du_jour_desc = $row4["pdescription"];
}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d644c28068.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../Style/style2.css">
    <link rel="stylesheet" href="adminDashboardStyle.css">
</head>
<body>

    <div class="header sticky-top bg-primary">
        <h2 class="title">Online Restaurant</h2>
        <div>
            <a href="../login-register-Pages/logout.php" class="bg-danger"><i class="fa-solid fa-right-from-bracket fa-lg"></i>Logout</a>
            <a href="../login-register-Pages/change-password.php" class="bg-success"><i class="fa-solid fa-lock fa-lg"></i>Change Password</a>
        </div>
    </div>

    <?php
    if (isset($_GET["PDJ_changed"])) echo "<div class='alert alert-success mx-auto' style='width: 80vh; margin-top: -40px;'>Plat du jour changé avec succès</div>";
    ?>

    <div class="d-flex flex-row justify-content-center fs-4 flex-wrap column-gap-5">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card h-100">
                <div class="card-block">
                    <h1 class="m-b-20 mb-5 mt-4">Carte</h1>
                    <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span></span></h2>
                    <p class="m-b-0">Menu des plats<span class="f-right"><?php echo $plats_count; ?></span></p>
                </div>
            </div>
            <a href="gestion-plats.php"><button class="btn btn-primary col-12">Accéder</button></a>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card h-100">
                <div class="card-block">
                    <h1 class="m-b-20 mb-5 mt-4">Plat du jour</h1>
                    <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span><?php echo $plat_du_jour_nom ?></span></h2>
                    <div>
                        <img style="max-height: 150px; max-width: 150px;" class="card-img-top" src="../img/<?php echo $plat_du_jour_nom ?>.jpg" alt="<?php echo $plat_du_jour_nom ?>">
                        <span class="text-black-50 font-weight-bold fs-1"><?php echo $plat_du_jour_price ?>$</span>
                    </div>

                    <p class="m-b-0"><span class="f-right text-black-50 font-weight-bold fs-4 mb-4"><?php echo $plat_du_jour_desc ?></span></p>
                </div>
            </div>
            <a href="plat-du-jour.php"><button class="btn btn-primary col-12">Changer</button></a>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card h-100">
                <div class="card-block">
                    <h1 class="m-b-20 mb-5 mt-4">Commandes reçues</h1>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span><?php echo $commandes_count; ?></span></h2>
                    <p class="m-b-0">Commandes livrées<span class="f-right"><?php echo $completed_commandes_count; ?></span></p>
                </div>
            </div>
            <a href="gestion-commandes.php"><button class="btn btn-primary col-12">Gérer</button></a>
        </div>

    </div>
</body>
</html>