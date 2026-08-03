<?php include "includes/header.php"; ?>

<?php

include "includes/database.php";
$result = false;

if ($dbAvailable) {
    $result = $conn->query(
"
SELECT

articles.title,
articles.content,
articles.created_at,
users.username

FROM articles

JOIN users

ON articles.author_id = users.id

WHERE articles.published = 1

ORDER BY articles.id DESC

"
    );
}


?>


<h1>📰 Climate Chronicle</h1>


<p>
Latest updates from Climate Change Club
</p>



<?php while($result && $article = $result->fetch_assoc()): ?>


<article class="article-card">


<h2>

<?php echo htmlspecialchars($article["title"]); ?>

</h2>



<p>

<?php echo nl2br(htmlspecialchars($article["content"])); ?>

</p>



<small>

Written by:

<?php echo htmlspecialchars($article["username"]); ?>

<br>

<?php echo $article["created_at"]; ?>

</small>


</article>


<hr>


<?php endwhile; ?>
