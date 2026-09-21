<?php
$siteName = "Climate Change Club";
$pageTitle = "Meetings and Events | Climate Change Club";
$pageDescription = "Find out how to join Climate Change Club meetings, workshops, and community climate-action events.";
include "includes/header.php";
?>

<header class="page-hero page-hero-meetings">
    <div class="page-hero-content reveal-on-scroll">
        <span class="page-kicker">Events</span>
        <h1>Upcoming Meetings</h1>
        <p>Stay connected with workshops, club meetings, and public climate-action events.</p>
    </div>
</header>

<main class="content-page">
    <section class="content-card">
        <i class="fas fa-calendar-days" aria-hidden="true"></i>
        <h2>Meeting calendar</h2>
        <p>Our public calendar is being finalized. Check back soon for dates, topics, and ways to participate in person or online.</p>
        <a class="btn-primary" href="contact.php"><i class="fas fa-envelope" aria-hidden="true"></i> Ask about the next meeting</a>
    </section>

    <section class="resource-grid">
        <article class="content-card">
            <i class="fas fa-lightbulb" aria-hidden="true"></i>
            <h2>Bring an idea</h2>
            <p>Have a local project, speaker, or climate question in mind? Meetings are a place to turn it into a plan.</p>
        </article>
        <article class="content-card">
            <i class="fas fa-handshake" aria-hidden="true"></i>
            <h2>Everyone is welcome</h2>
            <p>Students, families, educators, and community members can all help shape the next action.</p>
        </article>
    </section>
</main>

<?php include "includes/footer.php"; ?>
