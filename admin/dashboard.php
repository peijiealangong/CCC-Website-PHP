<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/admin-header.php";

$adminStats = [];
foreach (["users" => "users", "articles" => "articles", "orders" => "orders", "donations" => "donations"] as $key => $table) {
    $countResult = $conn->query("SELECT COUNT(*) AS total FROM `" . $table . "`");
    $adminStats[$key] = (int) (($countResult && method_exists($countResult, "fetch_assoc") ? ($countResult->fetch_assoc()["total"] ?? 0) : 0));
}
?>

<div class="admin-page-heading"><div><p class="eyebrow">Control center</p><h1><i class="fas fa-crown" aria-hidden="true"></i> Admin Dashboard</h1></div><a class="btn-primary" href="../index.php"><i class="fas fa-arrow-up-right-from-square" aria-hidden="true"></i> View site</a></div>

<p>
Welcome back,
<strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong>!
</p>

<div class="admin-stat-grid" aria-label="Site overview">
    <?php foreach (["users" => ["Members", "fa-users"], "articles" => ["Articles", "fa-newspaper"], "orders" => ["Orders", "fa-box"], "donations" => ["Donations", "fa-tree"]] as $key => [$label, $icon]): ?>
        <a class="admin-stat" href="<?php echo $key === "users" ? "users.php" : $key . ".php"; ?>"><i class="fas <?php echo $icon; ?>" aria-hidden="true"></i><span><?php echo $label; ?></span><strong><?php echo number_format($adminStats[$key]); ?></strong></a>
    <?php endforeach; ?>
</div>

<div class="admin-grid">

    <a href="users.php" class="admin-card">
        <h2><i class="fas fa-users" aria-hidden="true"></i> Users</h2>
        <p>Manage member accounts</p>
    </a>

    <a href="orders.php" class="admin-card">
        <h2><i class="fas fa-box" aria-hidden="true"></i> Orders</h2>
        <p>Track merchandise orders</p>
    </a>

    <a href="articles.php" class="admin-card">
        <h2><i class="fas fa-newspaper" aria-hidden="true"></i> Articles</h2>
        <p>Create and edit news</p>
    </a>

    <a href="donations.php" class="admin-card">
        <h2><i class="fas fa-tree" aria-hidden="true"></i> Donations</h2>
        <p>Monitor fundraising</p>
    </a>

    <a href="messages.php" class="admin-card">
        <h2><i class="fas fa-inbox" aria-hidden="true"></i> Messages</h2>
        <p>View contact requests</p>
    </a>

    <a href="settings.php" class="admin-card">
        <h2><i class="fas fa-sliders" aria-hidden="true"></i> Settings</h2>
        <p>Website configuration</p>
    </a>

</div>
</main>

</div>
<?php require_once __DIR__ . "/../includes/admin-footer.php"; ?>
