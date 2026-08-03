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

<a 
href="delete-user.php?id=<?php echo $user["id"]; ?>"
onclick="return confirm('Delete this user?');"
>
🗑️ Delete
</a>

</td>

</tr>

<?php endwhile; ?>

</table>
</main>

</div>
