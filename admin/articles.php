<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/admin-header.php";


$query = "
SELECT 
    articles.id,
    articles.title,
    articles.created_at,
    users.username

FROM articles

JOIN users
ON articles.author_id = users.id

ORDER BY articles.id DESC
";


$result = $conn->query($query);

?>


<h1>📰 Article Management</h1>


<a href="create-article.php">
➕ Create Article
</a>


<br><br>


<table class="admin-table">

<tr>

<th>ID</th>
<th>Title</th>
<th>Author</th>
<th>Date</th>
<th>Actions</th>

</tr>


<?php while($article = $result->fetch_assoc()): ?>


<tr>

<td>
<?php echo $article["id"]; ?>
</td>


<td>
<?php echo htmlspecialchars($article["title"]); ?>
</td>


<td>
<?php echo htmlspecialchars($article["username"]); ?>
</td>


<td>
<?php echo $article["created_at"]; ?>
</td>


<td>

<a href="edit-article.php?id=<?php echo $article["id"]; ?>">
✏️ Edit
</a>

<br>

<a 
href="delete-article.php?id=<?php echo $article["id"]; ?>"
onclick="return confirm('Delete this article?');"
>
🗑️ Delete
</a>
</td>


</tr>


<?php endwhile; ?>


</table>


</main>

</div>
