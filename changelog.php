<?php
$siteName = "Climate Change Club";
$pageTitle = "Changelog | Climate Change Club";
$pageDescription = "A transparent release history for Climate Change Club website improvements, performance work, and new features.";
include "includes/header.php";
?>
<main id="main-content" class="page-shell changelog-page">
    <section class="page-hero compact-hero" aria-labelledby="changelog-title">
        <div>
            <p class="eyebrow">Built in public</p>
            <h1 id="changelog-title">Changelog</h1>
            <p>See what is new, what is improved, and what we are continuing to refine.</p>
        </div>
    </section>
    <section class="changelog-list" aria-label="Release history">
        <article class="release-card release-current">
            <div class="release-meta"><span class="release-badge">Latest</span><time datetime="2026-09-21">September 21, 2026</time></div>
            <h2>Version 27.1 — Faster, clearer, more discoverable</h2>
            <ul>
                <li>Added full-width responsive layout improvements and refined interaction states.</li>
                <li>Added reading progress and back-to-top controls for long pages.</li>
                <li>Improved SEO with structured organization data, social preview images, and sitemap coverage.</li>
                <li>Added baseline security headers and a public changelog.</li>
            </ul>
        </article>
        <article class="release-card">
            <div class="release-meta"><span class="release-badge">Previous</span><time datetime="2026-08-22">August 22, 2026</time></div>
            <h2>Version 5.0 — Action-first foundation</h2>
            <ul>
                <li>Introduced the guided action planner, progress states, and responsive navigation.</li>
                <li>Improved keyboard access, skip navigation, focus states, and safe environment configuration.</li>
                <li>Made public pages render safely when the database is unavailable.</li>
            </ul>
        </article>
    </section>
</main>
<?php include "includes/footer.php"; ?>
