<?php
$siteName = "Climate Change Club";
include "includes/header.php";
?>

<header class="page-hero page-hero-projects">
    <div class="page-hero-content reveal-on-scroll">
        <span class="page-kicker">Active work</span>
        <h1>Our Projects</h1>
        <p>Campaigns and learning projects that make climate action visible and achievable.</p>
    </div>
</header>

<main class="content-page">
    <section class="feature-grid" aria-label="Current projects">
        <article class="feature-card">
            <i class="fas fa-tree" aria-hidden="true"></i>
            <h2>Tree Planting Initiative</h2>
            <p>We are raising funds to plant trees that help reduce greenhouse-gas emissions and support healthier neighborhoods.</p>
        </article>
        <article class="feature-card">
            <i class="fas fa-recycle" aria-hidden="true"></i>
            <h2>Recycling Drive</h2>
            <p>We are planning a school recycling drive for the Pittsford School District and welcoming student ideas for it.</p>
        </article>
        <article class="feature-card">
            <i class="fas fa-people-group" aria-hidden="true"></i>
            <h2>Sustainability Meetings</h2>
            <p>Meetings give members a place to plan projects, share research, and turn good ideas into a larger impact.</p>
        </article>
        <article class="feature-card feature-card-lemonade">
            <i class="fas fa-lemon" aria-hidden="true"></i>
            <h2>Summer Lemonade Stand</h2>
            <p>We are going to set up a lemonade stand this summer to raise money for tree planting and student-led climate action.</p>
        </article>
    </section>

    <section class="resource-grid">
        <article class="content-card">
            <i class="fas fa-chalkboard-user" aria-hidden="true"></i>
            <h2>Presentations</h2>
            <p>Our team is preparing presentations that make climate knowledge clear, useful, and easy to share with others.</p>
        </article>
        <article class="content-card">
            <i class="fas fa-hand-holding-heart" aria-hidden="true"></i>
            <h2>Community Giving</h2>
            <p>We are exploring ways to support trusted conservation organizations while continuing to fund local tree-planting work.</p>
        </article>
    </section>

    <?php include "includes/theme-picker.php"; ?>
</main>

<?php include "includes/footer.php"; ?>
