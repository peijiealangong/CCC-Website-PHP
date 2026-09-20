<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/admin-header.php";

$result = $conn->query("
    SELECT id, username, email, role, created_at
    FROM users
    ORDER BY id ASC
");

?>

<h1>👥 User Management</h1>

<table class="admin-table">

<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Role</th>
    <th>Joined</th>
    <th>Actions</th>
</tr>

<?php while($user = $result->fetch_assoc()): ?>

<tr>

<td><?php echo $user["id"]; ?></td>

<td><?php echo htmlspecialchars($user["username"]); ?></td>

<td><?php echo htmlspecialchars($user["email"]); ?></td>

<?php
if ($user["role"] == "admin") {
    echo "👑 Admin";
} else {
    echo "👤 Member";
}
?>

<td>

<a href="edit-user.php?id=<?php echo $user["id"]; ?>">
    ✏️ Edit
</a>

<br>

<form class="inline-form" method="post" action="delete-user.php" onsubmit="return confirm('Delete this user?');">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(createCSRFToken(), ENT_QUOTES, "UTF-8"); ?>">
    <input type="hidden" name="id" value="<?php echo (int) $user["id"]; ?>">
    <button class="text-button danger-button" type="submit">🗑️ Delete</button>
</form>

</td>

</tr>

<?php endwhile; ?>

</table>
</main>

</div>
<?php require_once __DIR__ . "/../includes/admin-footer.php"; ?>
