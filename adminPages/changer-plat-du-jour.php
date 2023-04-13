<?php
require_once 'adminSessionCheck.php';
require_once '../include/db-connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["id"])) {
    $pid = htmlspecialchars($_GET["id"]);
    $success1 = $db->query("UPDATE plats SET ptype = 'plat' WHERE ptype = 'plat du jour'");
    $stmt2 = $db->prepare("UPDATE plats SET ptype = 'plat du jour' WHERE pid = ?");
    $stmt2->bind_param('i', $pid);
    $success2 = $stmt2->execute();

    if ($success1 && $success2) {
        header('location: admin-dashboard.php?PDJ_changed=true');
        exit();
    }
}