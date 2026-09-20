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
    header("Location: users.php", true, 303);
    exit;
}


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


header("Location: users.php", true, 303);

exit;

?>
