<?php
$siteName = "Climate Change Club";
include "includes/header.php";
include "includes/database.php";

$articles = false;
if ($dbAvailable) {
    $articles = $conn->query(
        "SELECT articles.title, articles.content, articles.created_at, users.username
         FROM articles
         JOIN users ON articles.author_id = users.id
         WHERE articles.published = 1
         ORDER BY articles.created_at DESC"
    );
}
?>

<header class="page-hero page-hero-chronicle">
    <div class="page-hero-content reveal-on-scroll">
        <span class="page-kicker">Club stories</span>
        <h1>Climate Articles</h1>
        <p>Student perspectives, climate research, and practical ideas for action.</p>
    </div>
</header>

<main class="content-page">
    <?php if (!$dbAvailable): ?>
        <p class="database-message"><?php echo htmlspecialchars($dbError); ?></p>
    <?php elseif (!$articles || $articles->num_rows === 0): ?>
        <section class="content-card"><i class="fas fa-newspaper" aria-hidden="true"></i><h2>Stories are on the way</h2><p>Check back soon for the next club article.</p></section>
    <?php else: ?>
        <?php while ($article = $articles->fetch_assoc()): ?>
            <article class="article-content">
                <h2><?php echo htmlspecialchars($article["title"]); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($article["content"])); ?></p>
                <small>Written by <?php echo htmlspecialchars($article["username"]); ?> &middot; <?php echo htmlspecialchars($article["created_at"]); ?></small>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php include "includes/footer.php"; ?>
