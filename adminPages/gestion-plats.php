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

    <style>
        body {
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="header sticky-top bg-primary mb-5">
        <h2 class="title">Online Restaurant</h2>
        <div>
            <a href="../login-register-Pages/logout.php" class="bg-danger"><i class="fa-solid fa-right-from-bracket fa-lg"></i>Logout</a>
            <a href="../login-register-Pages/change-password.php" class="bg-success"><i class="fa-solid fa-lock fa-lg"></i>Change Password</a>
        </div>
    </div>

    <?php
    if (isset($_GET["plateChanged"])) echo "<div class='alert alert-success mx-auto' style='width: 80vh;'>Informations changées avec succès</div>";
    if (isset($_GET["plateAdded"])) echo "<div class='alert alert-success mx-auto' style='width: 80vh;'>Plat ajouté avec succès</div>";
    if (isset($_GET["plateDeleted"])) echo "<div class='alert alert-danger mx-auto' style='width: 80vh;'>Plat supprimé avec succès</div>";
    ?>

    <div class="container mb-2">
        <a href="ajouter-plat.php">
            <button class="btn btn-success fs-4">
                <i class="fa-sharp fa-solid fa-plus ms-0"></i><span>Ajouter un plat</span>
            </button>
        </a>

    </div>

    <?php
    $sql = "SELECT * FROM plats";
    if($query = $db-> prepare($sql)){
    if($query-> execute()){
    $result = $query-> get_result();
    if($result-> num_rows > 0){
    echo "<div class='container'>";
        while($row = $result->fetch_array()){
        ?>
        <div class="card" style="width: 18rem; margin-right: 30px; margin-bottom: 30px">
            <img style="max-height: 300px" class="card-img-top" src="../img/<?php echo $row["pname"] ?>.jpg" alt="<?php echo $row["pname"] ?>">
            <div class="card-body">
                <div>
                    <h5 class="card-title"><?php echo $row["pname"] ?></h5>
                    <p style="background-color: red; color: white; border-radius: 10px; width: 70px; text-align: center"><?php echo $row["ptype"] ?></p>
                </div>
                <p class="card-text"><?php echo $row["pdescription"] ?></p>
                <p style="font-weight: bold;"><?php echo $row["price"]."$" ?></p>
                <div class="d-flex flex-column gap-1">
                    <a href="<?php echo "changer-plat.php?id=" . $row["pid"]; ?>"><button class="btn btn-primary w-100"><i class='fa-solid fa-pen-to-square fa-lg ms-0'></i>Changer les informations</button></a>
                    <a href="<?php echo "supprimer-plat.php?id=" . $row["pid"]; ?>"><button class="btn btn-danger w-100"><i class='fa-solid fa-trash fa-lg ms-0'></i>Supprimer ce plat</button></a>
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