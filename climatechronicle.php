<?php
$siteName = "Climate Change Club";
include "includes/header.php";
include "includes/database.php";

$articles = $dbAvailable ? $conn->query(
    "SELECT title, content, created_at FROM articles WHERE published = 1 ORDER BY created_at DESC"
) : false;
?>

<header class="page-hero page-hero-chronicle">
    <div class="page-hero-content reveal-on-scroll">
        <span class="page-kicker">Climate Chronicle</span>
        <h1>The Climate Chronicle</h1>
        <p>Important climate stories, student observations, and global warming context.</p>
    </div>
</header>

<main class="content-page">
    <?php if (!$dbAvailable): ?>
        <p class="database-message"><?php echo htmlspecialchars($dbError); ?></p>
    <?php elseif (!$articles || $articles->num_rows === 0): ?>
        <section class="content-card"><i class="fas fa-earth-americas" aria-hidden="true"></i><h2>More stories are coming</h2><p>We are preparing the next Climate Chronicle entry.</p></section>
    <?php else: ?>
        <?php while ($article = $articles->fetch_assoc()): ?>
            <article class="article-content">
                <h2><?php echo htmlspecialchars($article["title"]); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($article["content"])); ?></p>
                <small>Published <?php echo htmlspecialchars($article["created_at"]); ?></small>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php include "includes/footer.php"; ?>
