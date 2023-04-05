<div class="container p-3">
    <h1 class="mb-4">Plats</h1>
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

            echo "<tr><td>$name</td><td>$type</td><td>$description</td><td>$price</td><td><a class='me-3' href='changer-plat.php?id=$pid'><i class='fa-solid fa-pen-to-square fa-lg' style='color: #00ad00;'></i></a><a href='supprimer-plat.php?id=$pid'><i class='fa-solid fa-trash fa-lg' style='color: #ff0000;'></a></td></tr>";
        }
        ?>
    </table>
</div>