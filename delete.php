<?php

    include_once "Database.php";

    $database = new Database();
    $id = $_GET['id'];
    $query = $database->prepare("DELETE FROM `keys` WHERE id = ?");
    $query->execute([$id]);
    echo "deleted";

?>