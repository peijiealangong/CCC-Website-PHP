<?php include "../includes/header.php"; ?>

<?php
include "includes/header.php";
?>

<?php

include "../includes/auth.php";
requireAdmin();

include "../includes/database.php";


$id=$_GET["id"];


$stmt=$conn->prepare(
"DELETE FROM donations WHERE id=?"
);


$stmt->bind_param(
"i",
$id
);


$stmt->execute();


header("Location: donations.php");

exit;

?>