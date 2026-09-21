<?php
require_once "includes/auth.php";
requireLogin();

$siteName = "Climate Change Club";
include "includes/header.php";
include "includes/database.php";

$user = null;
if ($dbAvailable) {
    $stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
    $stmt->bind_param("i", $_SESSION["user_id"]);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
}
?>

<main class="content-page">
    <section class="content-card profile-card">
        <i class="fas fa-user" aria-hidden="true"></i>
        <h1>My Profile</h1>
        <?php if (!$dbAvailable): ?>
            <p class="database-message"><?php echo htmlspecialchars($dbError); ?></p>
        <?php elseif (!$user): ?>
            <p>Your profile could not be found.</p>
        <?php else: ?>
            <h2><?php echo htmlspecialchars($user["username"]); ?></h2>
            <p><i class="fas fa-envelope" aria-hidden="true"></i> <?php echo htmlspecialchars($user["email"]); ?></p>
            <a class="btn-primary" href="my-orders.php"><i class="fas fa-box" aria-hidden="true"></i> View my orders</a>
        <?php endif; ?>
    </section>
</main>

<?php include "includes/footer.php"; ?>
