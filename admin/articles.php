<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/admin-header.php";

$result = $conn->query(
    "SELECT articles.id, articles.title, articles.created_at, users.username
     FROM articles JOIN users ON articles.author_id = users.id
     ORDER BY articles.id DESC"
);
?>

<div class="admin-page-heading">
    <div><p class="eyebrow">Publishing</p><h1><i class="fas fa-newspaper" aria-hidden="true"></i> Article management</h1><p>Create, review, and update club stories.</p></div>
    <a class="btn-primary" href="create-article.php"><i class="fas fa-plus" aria-hidden="true"></i> New article</a>
</div>

<div class="admin-table-wrap" tabindex="0" aria-label="Article management table">
    <table class="admin-table">
        <thead><tr><th>ID</th><th>Title</th><th>Author</th><th>Published</th><th><span class="sr-only">Actions</span></th></tr></thead>
        <tbody>
        <?php while ($article = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo (int) $article["id"]; ?></td>
                <td><?php echo htmlspecialchars($article["title"]); ?></td>
                <td><?php echo htmlspecialchars($article["username"]); ?></td>
                <td><?php echo htmlspecialchars($article["created_at"]); ?></td>
                <td class="admin-actions"><a href="edit-article.php?id=<?php echo (int) $article["id"]; ?>">Edit</a><form class="inline-form" method="post" action="delete-article.php" onsubmit="return confirm('Delete this article?');"><input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(createCSRFToken(), ENT_QUOTES, "UTF-8"); ?>"><input type="hidden" name="id" value="<?php echo (int) $article["id"]; ?>"><button class="text-button danger-button" type="submit">Delete</button></form></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</main>
</div>
<?php require_once __DIR__ . "/../includes/admin-footer.php"; ?>
