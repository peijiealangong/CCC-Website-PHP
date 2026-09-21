<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/admin-header.php";

$result = $conn->query("SELECT id, username, email, role, created_at FROM users ORDER BY id ASC");
?>

<div class="admin-page-heading">
    <div><p class="eyebrow">Membership</p><h1><i class="fas fa-users" aria-hidden="true"></i> User management</h1><p>Review member accounts and access levels.</p></div>
</div>

<div class="admin-table-wrap" tabindex="0" aria-label="User management table">
    <table class="admin-table">
        <thead><tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th><th>Joined</th><th><span class="sr-only">Actions</span></th></tr></thead>
        <tbody>
        <?php while ($user = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo (int) $user["id"]; ?></td>
                <td><?php echo htmlspecialchars($user["username"]); ?></td>
                <td><?php echo htmlspecialchars($user["email"]); ?></td>
                <td><span class="admin-status <?php echo $user["role"] === "admin" ? "is-admin" : ""; ?>"><?php echo htmlspecialchars(ucfirst($user["role"])); ?></span></td>
                <td><?php echo htmlspecialchars($user["created_at"]); ?></td>
                <td class="admin-actions"><a href="edit-user.php?id=<?php echo (int) $user["id"]; ?>">Edit</a><form class="inline-form" method="post" action="delete-user.php" onsubmit="return confirm('Delete this user?');"><input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(createCSRFToken(), ENT_QUOTES, "UTF-8"); ?>"><input type="hidden" name="id" value="<?php echo (int) $user["id"]; ?>"><button class="text-button danger-button" type="submit">Delete</button></form></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</main>
</div>
<?php require_once __DIR__ . "/../includes/admin-footer.php"; ?>
