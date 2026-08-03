<?php
$siteName = "Climate Change Club";
include "includes/header.php";
?>

<header class="page-hero page-hero-about">
    <div class="page-hero-content reveal-on-scroll">
        <span class="page-kicker">Club mission</span>
        <h1>About Us</h1>
        <p>Student-led climate action that turns concern into practical, local progress.</p>
    </div>
</header>

<main class="content-page">
    <section class="feature-grid" aria-label="About the club">
        <article class="feature-card">
            <i class="fas fa-bullseye" aria-hidden="true"></i>
            <h2>Our goal</h2>
            <p>We build climate awareness through community action, shared learning, and sustainable ideas that students can put into practice.</p>
        </article>
        <a class="feature-card" href="stages.php">
            <i class="fas fa-route" aria-hidden="true"></i>
            <h2>Our roadmap</h2>
            <p>See the early work underway now and the steps we are taking to grow responsibly.</p>
        </a>
        <a class="feature-card" href="https://sway.cloud.microsoft/DTWEHBtdOijVUepH?ref=Link" target="_blank" rel="noopener">
            <i class="fas fa-book-open" aria-hidden="true"></i>
            <h2>Learn more</h2>
            <p>Explore our Microsoft Sway for the club's history, people, and longer-term vision.</p>
        </a>
    </section>

    <section class="content-card">
        <i class="fas fa-tree" aria-hidden="true"></i>
        <h2>What we're doing now</h2>
        <p>As the weather gets warmer, we are planning to plant one tree for every $10 we raise. Follow the club for project updates, local opportunities, and ways to help.</p>
        <a class="btn-primary" href="projects.php"><i class="fas fa-seedling" aria-hidden="true"></i> Explore projects</a>
    </section>

    <?php include "includes/theme-picker.php"; ?>
</main>

<?php include "includes/footer.php"; ?>
