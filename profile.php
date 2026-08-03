<?php include "includes/header.php"; ?>

<?php

include "includes/auth.php";
requireLogin();

include "includes/database.php";
$user_id = $_SESSION["user_id"];
$user = null;

if ($dbAvailable) {
    $stmt = $conn->prepare("SELECT username, email FROM users WHERE id=?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
}


?>


<h1>👤 My Profile</h1>


<?php if (!$dbAvailable): ?>
<p class="database-message"><?php echo htmlspecialchars($dbError); ?></p>
<?php elseif (!$user): ?>
<p class="database-message">Your profile could not be found.</p>
<?php else: ?>

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
<?php endif; ?>
