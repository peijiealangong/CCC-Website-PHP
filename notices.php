<?php
$siteName = "Climate Change Club";
include "includes/header.php";
?>

<header class="page-hero page-hero-notices">
    <div class="page-hero-content reveal-on-scroll">
        <span class="page-kicker">Command center</span>
        <h1>Notices</h1>
        <p>Club updates, release notes, and website status in one place.</p>
    </div>
</header>

<main class="content-page">
    <section class="alerts-wrapper" aria-labelledby="alerts-title">
        <h2 id="alerts-title">Current notices</h2>
        <article class="alert-card" style="border-left-color:#2a9d8f">
            <span class="badge b-new">Website update</span>
            <p><strong>Version 4.0</strong> introduced a faster climate command center, smart action prompts, browser-saved notes, and refreshed navigation.</p>
        </article>
        <article class="alert-card" style="border-left-color:#f4d35e">
            <span class="badge b-milestone">Milestone</span>
            <p><strong>Tree planting goal:</strong> every contribution helps fund another tree and climate education for students.</p>
        </article>
        <article class="alert-card fundraiser-alert">
            <span class="badge b-milestone">Summer fundraiser</span>
            <p><strong>Lemonade stand:</strong> we are going to set up a lemonade stand this summer to raise money for tree planting and student climate action.</p>
        </article>
    </section>

    <section aria-labelledby="activity-title">
        <h2 id="activity-title">Activity log</h2>
        <div class="log-section">
            <article class="log-item"><span class="badge b-new">Feature</span><p>Climate Defender and Carbon Catcher provide two interactive ways to engage with climate action.</p></article>
            <article class="log-item"><span class="badge b-fix">Improvement</span><p>The site now uses a shared responsive navigation, accessible dialog controls, and mobile-friendly content layouts.</p></article>
            <article class="log-item"><span class="badge b-new">Resources</span><p>The Watch page brings club videos, explainers, and project updates together.</p></article>
        </div>
    </section>

    <?php include "includes/theme-picker.php"; ?>
</main>

<?php include "includes/footer.php"; ?>
