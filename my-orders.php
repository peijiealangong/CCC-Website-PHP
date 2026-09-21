<?php
require_once "includes/auth.php";
requireLogin();

$siteName = "Climate Change Club";
include "includes/header.php";
include "includes/database.php";

$orders = false;
if ($dbAvailable) {
    $stmt = $conn->prepare(
        "SELECT product, quantity, status, created_at FROM orders WHERE user_id = ? ORDER BY id DESC"
    );
    $stmt->bind_param("i", $_SESSION["user_id"]);
    $stmt->execute();
    $orders = $stmt->get_result();
}
?>

<main class="content-page">
    <section class="content-card">
        <i class="fas fa-box" aria-hidden="true"></i>
        <h1>My Orders</h1>
        <?php if (!$dbAvailable): ?>
            <p class="database-message"><?php echo htmlspecialchars($dbError); ?></p>
        <?php elseif (!$orders || $orders->num_rows === 0): ?>
            <p>You do not have any orders yet.</p>
        <?php else: ?>
            <div class="resource-grid">
                <?php while ($order = $orders->fetch_assoc()): ?>
                    <article class="content-card order-card">
                        <h2><?php echo htmlspecialchars($order["product"]); ?></h2>
                        <p><strong>Quantity:</strong> <?php echo (int) $order["quantity"]; ?></p>
                        <p><strong>Status:</strong> <?php echo htmlspecialchars($order["status"]); ?></p>
                        <p><strong>Placed:</strong> <?php echo htmlspecialchars($order["created_at"]); ?></p>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include "includes/footer.php"; ?>
