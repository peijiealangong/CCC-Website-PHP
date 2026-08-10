<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/database.php";


$id = $_GET["id"];


$stmt = $conn->prepare(
    "DELETE FROM articles WHERE id=?"
);


$stmt->bind_param(
    "i",
    $id
);


$stmt->execute();


header("Location: articles.php");

exit;

?>
