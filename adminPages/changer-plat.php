<?php
require_once '../include/db-connect.php';
require_once 'adminSessionCheck.php';

if (isset($_GET["id"])) {
    $prepared_update_stmt = $db->prepare("UPDATE plats SET pname = ?, pdescription = ?, ptype = ?, price = ? WHERE pid = " . $_GET["id"]);
    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Changer les informations d'un plat</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d644c28068.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../Style/style2.css">

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
    <div class="header sticky-top bg-primary mb-5">
        <h2 class="title">Online Restaurant</h2>
        <div>
            <a href="../login-register-Pages/logout.php" class="bg-danger"><i class="fa-solid fa-right-from-bracket fa-lg"></i>Logout</a>
            <a href="../login-register-Pages/change-password.php" class="bg-success"><i class="fa-solid fa-lock fa-lg"></i>Change Password</a>
        </div>
    </div>

    <div class="ps-5 pe-5">
        <h1>Changer les informations du plat</h1>
        <form method="post" action="">
            <?php
            $id_plat = $_GET["id"];
            $result = $db->query("SELECT * FROM plats WHERE pid = '$id_plat'");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nom_plat = $row["pname"];
                $desc_plat = $row["pdescription"];
                $type_plat = $row["ptype"];
                $prix = $row["price"];

                $result->close();
            }
            else {
                echo "Ce plat n'existe pas!";
                exit();
            }
            ?>

            <div class="form-group">
                <label for="nom">Nom du plat</label>
                <input required type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom_plat; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="desc"><?php echo $desc_plat; ?></textarea>
            </div>
            <div class="form-group">
                <label for="type">Type du plat</label>
                <select class="form-control" name="type" id="type">
                    <?php
                    $result2 = $db->query("SELECT DISTINCT ptype FROM plats");
                    while ($row = $result2->fetch_assoc()) {
                        $type = $row["ptype"];
                        if ($type == $type_plat) {
                            echo "<option value='$type' selected>$type</option>";
                        }
                        else {
                            echo "<option value='$type'>$type</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input required type="number" class="form-control" id="prix" step="0.01" name="prix" value="<?php echo $prix; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Changer</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $new_name = $_POST["nom"];
        $new_desc = $_POST["desc"];
        $new_type = $_POST["type"];
        $new_prix = $_POST["prix"];

        $prepared_update_stmt->bind_param('sssd', $new_name, $new_desc, $new_type, $new_prix);
        $success = $prepared_update_stmt->execute();

        if ($success) {
            header('location: gestion-plats.php?plateChanged=true');
            exit();
        }
    }
    ?>
</body>
</html>

<?php } ?>