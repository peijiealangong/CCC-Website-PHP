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
            <h2>Version 28.0 — Unified design system and refinement</h2>
            <ul>
                <li><strong>Major design consolidation:</strong> Unified the v28 design system across all pages with consistent variables, spacing, typography, and component styling.</li>
                <li><strong>Visual polish:</strong> Refined colors, shadows, borders, and interactions for a calmer, more professional appearance without changing core functionality.</li>
                <li><strong>Improved header visibility:</strong> Enhanced site header with clearer branding, better navigation hierarchy, and stronger visual presence.</li>
                <li><strong>Better spacing and rhythm:</strong> Standardized padding, margins, and whitespace across all sections for improved readability and reduced visual clutter.</li>
                <li><strong>Component consistency:</strong> Cards, buttons, forms, and interactive elements now share unified styling patterns throughout the site.</li>
                <li><strong>Accessibility refinements:</strong> Improved focus states, keyboard navigation, and semantic structure across all templates.</li>
                <li><strong>Performance optimization:</strong> Consolidated CSS patterns and removed redundant styles for faster page loads.</li>
            </ul>
        </article>
        <article class="release-card">
            <div class="release-meta"><span class="release-badge">Previous</span><time datetime="2026-09-21">September 21, 2026</time></div>
            <h2>Version 27.3 — Admin improvements</h2>
            <ul>
                <li>Refreshed the admin workspace with icon-based navigation, overview metrics, and responsive tables.</li>
                <li>Added clearer "view site" and control-center actions for administrators.</li>
                <li>Improved mobile admin spacing and touch targets.</li>
            </ul>
        </article>
        <article class="release-card">
            <div class="release-meta"><time datetime="2026-09-21">September 21, 2026</time></div>
            <h2>Version 27.2 — Resource expansion</h2>
            <ul>
                <li>Added the evidence-based "Why climate action matters" resource page.</li>
                <li>Added mobile-friendly reason cards, external source links, and an accessible FAQ.</li>
                <li>Expanded resource navigation and sitemap coverage.</li>
            </ul>
        </article>
        <article class="release-card">
            <div class="release-meta"><time datetime="2026-09-21">September 21, 2026</time></div>
            <h2>Version 27.1 — Speed and discoverability</h2>
            <ul>
                <li>Added full-width responsive layout improvements and refined interaction states.</li>
                <li>Added reading progress and back-to-top controls for long pages.</li>
                <li>Improved SEO with structured organization data, social preview images, and sitemap coverage.</li>
                <li>Added baseline security headers and a public changelog.</li>
            </ul>
        </article>
        <article class="release-card">
            <div class="release-meta"><time datetime="2026-08-22">August 22, 2026</time></div>
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
