<?php
$siteName = "Climate Change Club";
include "includes/header.php";
?>

<header class="page-hero page-hero-beta">
    <div class="page-hero-content reveal-on-scroll">
        <span class="page-kicker">Feedback</span>
        <h1>Report a Problem</h1>
        <p>Send a clear bug report or feature suggestion for the beta experience.</p>
    </div>
</header>

<main class="content-page">
    <section class="contact-card">
        <i class="fas fa-bug" aria-hidden="true"></i>
        <h2>Submit feedback</h2>
        <form id="betaForm" class="beta-form" action="https://formspree.io/f/xqeyoyvg" method="POST">
            <div class="form-group">
                <label for="userEmail">Your email</label>
                <input type="email" name="email" id="userEmail" autocomplete="email" required>
            </div>
            <div class="form-group">
                <label for="feedbackType">Category</label>
                <select name="Category" id="feedbackType" required>
                    <option value="bug">Bug report</option>
                    <option value="suggest">Feature suggestion</option>
                </select>
            </div>
            <div class="form-group">
                <label for="feedbackDesc">Your message</label>
                <textarea name="message" id="feedbackDesc" rows="6" maxlength="2000" required></textarea>
            </div>
            <button type="submit" class="btn-primary"><i class="fas fa-paper-plane" aria-hidden="true"></i> Send report</button>
            <p id="formSuccessMessage" class="form-status is-success" style="display:none" aria-live="polite">Thanks — your report was sent.</p>
        </form>
    </section>
</main>

<?php include "includes/footer.php"; ?>
