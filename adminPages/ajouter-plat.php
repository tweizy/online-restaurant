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
    <title>Ajouter un plat</title>

    <style>
        .form-group {
            margin-bottom: 20px;
        }
        label {
            margin-bottom: 5px;
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

    <div class="ps-5 pe-5">
        <h1>Ajouter un plat</h1>
        <form method="post" action="">
            <?php
            $stmt = $db->prepare("INSERT INTO plats (pname, ptype, pdescription, price) VALUES (?, ?, ?, ?)");
            ?>

            <div class="form-group">
                <label for="nom">Nom du plat</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="desc"></textarea>
            </div>
            <div class="form-group">
                <label for="type">Type du plat</label>
                <select class="form-control" name="type" id="type">
                    <?php
                    $result2 = $db->query("SELECT DISTINCT ptype FROM plats");
                    while ($row = $result2->fetch_assoc()) {
                        $type = $row["ptype"];
                        echo "<option value='$type'>$type</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" class="form-control" id="prix" step="0.01" name="prix">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name = $_POST["nom"];
        $desc = $_POST["desc"];
        $type = $_POST["type"];
        $prix = $_POST["prix"];

        $stmt->bind_param('sssd', $name, $type, $desc, $prix);
        $success = $stmt->execute();

        if ($success) {
            header('location: gestion-plats.php?plateAdded=true');
            exit();
        }
    }
    ?>
</body>
</html>
