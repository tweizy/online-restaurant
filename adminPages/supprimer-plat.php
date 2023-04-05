<?php
require_once "../include/db-connect.php";
require_once "adminSessionCheck.php";

if (isset($_GET["id"])) {
    $id_plat = $_GET["id"];

    $stmt1 = $pdo->prepare("DELETE FROM plats WHERE pid = ?");

    $success1 = $stmt1->execute([$id_plat]);

    if ($success1) {
        header("location: gestion-plats.php?plateDeleted=true");
        exit();
    }
}