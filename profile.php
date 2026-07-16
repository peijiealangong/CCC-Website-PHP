<?php include "includes/header.php"; ?>

<?php

include "includes/auth.php";
requireLogin();

include "includes/database.php";
include "includes/header.php";


$user_id = $_SESSION["user_id"];


$stmt = $conn->prepare(
    "SELECT username, email FROM users WHERE id=?"
);


$stmt->bind_param(
    "i",
    $user_id
);


$stmt->execute();


$user = $stmt->get_result()->fetch_assoc();


?>


<h1>👤 My Profile</h1>


<div class="profile-card">


<h2>
<?php echo htmlspecialchars($user["username"]); ?>
</h2>


<p>
📧 Email:

<?php echo htmlspecialchars($user["email"]); ?>

</p>


<a href="my-orders.php">
📦 View My Orders
</a>


</div>