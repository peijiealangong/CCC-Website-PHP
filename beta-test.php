<?php
$siteName = "Climate Change Club";
include "includes/header.php";
?>

<header class="page-hero page-hero-beta">
    <div class="page-hero-content reveal-on-scroll">
        <span class="page-kicker">Beta lab</span>
        <h1>Beta Testing Lab</h1>
        <p>Try upcoming experiences before they go live and help make them better.</p>
    </div>
</header>

<main class="content-page">
    <section class="feature-grid" aria-label="Beta features">
        <article class="feature-card">
            <i class="fas fa-window-maximize" aria-hidden="true"></i>
            <h2>UI Preview</h2>
            <p>Preview the experimental interface and share feedback on its motion, readability, and navigation.</p>
            <a class="btn-primary" href="beta-ui-v2.php">Open UI preview</a>
        </article>
        <article class="feature-card">
            <i class="fas fa-bell" aria-hidden="true"></i>
            <h2>Notifications</h2>
            <p>Try the in-page update notices and report anything unexpected about their timing or behavior.</p>
            <a class="btn-secondary" href="beta-report.php">Report an issue</a>
        </article>
        <article class="feature-card">
            <i class="fas fa-comments" aria-hidden="true"></i>
            <h2>Community chat</h2>
            <p>Join the club discussion space to continue a conversation beyond the website.</p>
            <a class="btn-secondary" href="https://climatechangeclubgroup.discourse.group/" target="_blank" rel="noopener">Visit community chat</a>
        </article>
    </section>

    <section class="content-card">
        <i class="fas fa-square-poll-vertical" aria-hidden="true"></i>
        <h2>Tell us what to release</h2>
        <p>Your feedback helps the club choose which experiments should become stable features.</p>
        <div class="elfsight-app-cc687bf5-0a29-4983-bed1-9fb3e9e286c8" data-elfsight-app-lazy></div>
    </section>
</main>

<?php include "includes/footer.php"; ?>
