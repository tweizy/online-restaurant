<?php
require_once "../include/db-connect.php";
require_once "adminSessionCheck.php";

if (isset($_GET["id"])) {
    $id_plat = $_GET["id"];

    $stmt1 = $db->prepare("DELETE FROM plats WHERE pid = ?");
    $stmt1->bind_param('i', $id_plat);
    $success1 = $stmt1->execute();

    if ($success1) {
        header("location: gestion-plats.php?plateDeleted=true");
        exit();
    }
}