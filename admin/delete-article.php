<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/database.php";


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Method not allowed.");
}

requireValidCSRFToken();
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if (!$id || !$dbAvailable) {
    header("Location: articles.php", true, 303);
    exit;
}


$stmt = $conn->prepare(
    "DELETE FROM articles WHERE id=?"
);


$stmt->bind_param(
    "i",
    $id
);


$stmt->execute();


header("Location: articles.php", true, 303);

exit;

?>
