<?php

$siteName = "Climate Change Club";
$pageTitle = "Project documentation | Climate Change Club";
$pageDescription = "Release notes, setup guidance, privacy notes, and testing information for the Climate Change Club website.";

include "includes/header.php";
?>

<header class="page-hero page-hero-beta">
    <div class="page-hero-content reveal-on-scroll">
        <span class="page-kicker">Project guide</span>
        <h1>Documentation</h1>
        <p>A concise guide to the site, its current release, local setup, and the safeguards that keep it dependable.</p>
    </div>
</header>

<main id="main-content" class="content-page documentation-page">
    <section class="content-card documentation-intro">
        <i class="fas fa-compass" aria-hidden="true"></i>
        <h2>Current release: v5.0.0</h2>
        <p>Released August 22, 2026. This release replaces the crowded homepage with an action-first experience, strengthens account and administration safeguards, and makes configuration safe to deploy across environments.</p>
        <div class="button-group">
            <a class="btn-primary" href="#release-notes">What changed</a>
            <a class="btn-secondary" href="#setup">Setup guide</a>
        </div>
    </section>

    <section id="release-notes" aria-labelledby="release-notes-title">
        <div class="section-heading"><span class="section-kicker">Release notes</span><h2 id="release-notes-title">v5.0.0 — Action-first refresh</h2></div>
        <div class="feature-grid">
            <article class="feature-card"><i class="fas fa-wand-magic-sparkles" aria-hidden="true"></i><h3>Clearer homepage</h3><p>The homepage now focuses on real club work, progress, next steps, and a guided action picker instead of competing popups and third-party widgets.</p></article>
            <article class="feature-card"><i class="fas fa-universal-access" aria-hidden="true"></i><h3>More usable by everyone</h3><p>A skip link, visible keyboard focus, tab keyboard controls, semantic progress indicators, and responsive layouts improve navigation and readability.</p></article>
            <article class="feature-card"><i class="fas fa-shield-halved" aria-hidden="true"></i><h3>Safer operations</h3><p>Configuration now comes from environment variables, sessions use safer cookie defaults, and all admin changes require a CSRF token and POST request.</p></article>
            <article class="feature-card"><i class="fas fa-gauge-high" aria-hidden="true"></i><h3>Less page weight</h3><p>The homepage no longer loads a gallery of optional external widgets or interruption popups. Essential content is available without JavaScript.</p></article>
        </div>
    </section>

    <section id="setup" class="content-card" aria-labelledby="setup-title">
        <i class="fas fa-screwdriver-wrench" aria-hidden="true"></i>
        <h2 id="setup-title">Configuration and local setup</h2>
        <p>Copy <code>.env.example</code> to <code>.env</code> outside version control, then set only the services you use. Public pages render without a database; account, article, order, and donation features require the database variables.</p>
        <ol class="documentation-list">
            <li>Set <code>SITE_URL</code> to the public HTTPS URL and <code>SITE_BASE_PATH</code> only if the app lives in a subdirectory.</li>
            <li>Set <code>DB_HOST</code>, <code>DB_PORT</code>, <code>DB_NAME</code>, <code>DB_USER</code>, and <code>DB_PASSWORD</code> in the deployment environment.</li>
            <li>Configure SMTP only if <code>send_email.php</code> is used; leave it blank otherwise.</li>
            <li>Use a PHP-capable host for PHP pages and add the same environment variables in that host’s dashboard.</li>
        </ol>
        <p class="note"><strong>Security action:</strong> credentials that were previously committed to the repository must be rotated in their provider dashboards. Removing them from the working tree does not invalidate already exposed values.</p>
    </section>

    <section aria-labelledby="content-title">
        <div class="section-heading"><span class="section-kicker">Content map</span><h2 id="content-title">Where visitors can go</h2></div>
        <div class="resource-grid">
            <article class="content-card"><h3>Club</h3><p><a href="about.php">About</a>, <a href="projects.php">Projects</a>, and <a href="meetings.php">Meetings</a> explain the mission and current community work.</p></article>
            <article class="content-card"><h3>Resources</h3><p><a href="articles.php">Articles</a>, <a href="climatechronicle.php">Climate Chronicle</a>, and <a href="watch.php">Watch</a> provide learning paths.</p></article>
            <article class="content-card"><h3>Participation</h3><p><a href="contact.php">Contact</a> invites ideas and questions. The newsletter link opens a hosted form in a new tab.</p></article>
        </div>
    </section>

    <section class="content-card" aria-labelledby="testing-title">
        <i class="fas fa-list-check" aria-hidden="true"></i>
        <h2 id="testing-title">Release checklist</h2>
        <ul class="documentation-list">
            <li>Run PHP syntax validation for every application PHP file.</li>
            <li>Check home, projects, contact, account, and admin paths at desktop and mobile widths.</li>
            <li>Verify keyboard navigation: skip link, mobile menu, dropdowns, dialogs, forms, and the homepage action tabs.</li>
            <li>Confirm links, sitemap URLs, canonical URL, and deployment environment variables before publishing.</li>
            <li>Test a database-unavailable state so public pages stay helpful rather than failing blank.</li>
        </ul>
    </section>

    <section class="content-card" aria-labelledby="privacy-title">
        <i class="fas fa-user-shield" aria-hidden="true"></i>
        <h2 id="privacy-title">Privacy and data</h2>
        <p>The homepage saves no personal action data. Newsletter and contact submissions are handled by their linked services. Account data is stored only when the database is configured; passwords are hashed by PHP before storage.</p>
    </section>
</main>

<?php include "includes/footer.php"; ?>
