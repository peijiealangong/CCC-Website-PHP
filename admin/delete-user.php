<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/database.php";


$id = $_GET["id"];


/*
    Prevent deleting yourself
*/

if ($id == $_SESSION["user_id"]) {

    die("You cannot delete your own account.");

}


$stmt = $conn->prepare(
    "DELETE FROM users WHERE id=?"
);


$stmt->bind_param(
    "i",
    $id
);


$stmt->execute();


header("Location: users.php");

exit;

?>
