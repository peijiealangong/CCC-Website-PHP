<?php
$siteName = "Climate Change Club";
$pageTitle = "Contact Climate Change Club";
$pageDescription = "Contact Climate Change Club with a project idea, question, resource, or climate-action opportunity.";
include "includes/header.php";
?>

<header class="page-hero page-hero-contact">
    <div class="page-hero-content reveal-on-scroll">
        <span class="page-kicker">Contact</span>
        <h1>Contact Us</h1>
        <p>Send a message to the Climate Change Club and we will get back to you as soon as we can.</p>
    </div>
</header>

<main class="content-page">
    <section class="contact-card">
        <i class="fas fa-paper-plane" aria-hidden="true"></i>
        <h2>Send a message</h2>
        <p>Questions, project ideas, and feedback are always welcome.</p>
        <form id="contactForm" class="contact-form">
            <div class="form-group">
                <label for="contactName">Your name</label>
                <input id="contactName" name="name" type="text" autocomplete="name" required>
            </div>
            <div class="form-group">
                <label for="contactEmail">Email address</label>
                <input id="contactEmail" name="email" type="email" autocomplete="email" required>
            </div>
            <div class="form-group">
                <label for="contactMessage">Message</label>
                <textarea id="contactMessage" name="message" rows="6" maxlength="2000" required></textarea>
            </div>
            <div class="form-actions">
                <button class="btn-primary" type="submit"><i class="fas fa-paper-plane" aria-hidden="true"></i> Send message</button>
                <a class="btn-ghost" href="mailto:gongpeijie620@gmail.com">Use email instead</a>
            </div>
            <p id="contactStatus" class="form-status" aria-live="polite"></p>
        </form>
    </section>

    <section class="resource-grid">
        <article class="content-card">
            <i class="fas fa-lightbulb" aria-hidden="true"></i>
            <h2>Share an idea</h2>
            <p>Tell us about a project, speaker, resource, or improvement you would like to see.</p>
        </article>
        <article class="content-card">
            <i class="fas fa-shield-heart" aria-hidden="true"></i>
            <h2>Your privacy</h2>
            <p>Only share the contact details needed for a reply. We will never ask for a password or financial information through this form.</p>
        </article>
    </section>
</main>

<script src="sendEmail.js" defer></script>
<?php include "includes/footer.php"; ?>
