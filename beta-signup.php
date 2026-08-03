<?php
$siteName = "Climate Change Club";
include "includes/header.php";
?>

<main class="content-page">
    <section class="contact-card">
        <i class="fas fa-flask" aria-hidden="true"></i>
        <h1>Create Beta Account</h1>
        <p>Beta features may change quickly. Please share any issue you find.</p>
        <form id="pureSignupForm" class="contact-form">
            <div class="form-group"><label for="newSubUser">Username</label><input type="text" id="newSubUser" autocomplete="username" required></div>
            <div class="form-group"><label for="newSubPass">Password</label><input type="password" id="newSubPass" autocomplete="new-password" minlength="8" required></div>
            <button type="submit" id="signupBtn" class="btn-primary"><i class="fas fa-user-plus" aria-hidden="true"></i> Create account</button>
            <p id="statusMsg" class="form-status" style="display:none" aria-live="polite"></p>
        </form>
        <p>Already have access? <a href="beta-login.php">Sign in</a>.</p>
    </section>
</main>

<script>
const betaSignupUrl = "https://script.google.com/macros/s/AKfycbzK_c0FmKiHqWAAr9kE231Qj0nxZgbcu-s4aUcrufzuoL5PrRaFbIEt-8VNunjgbf4/exec";
document.getElementById("pureSignupForm").addEventListener("submit", async (event) => {
    event.preventDefault();
    const button = document.getElementById("signupBtn");
    const status = document.getElementById("statusMsg");
    button.disabled = true;
    button.textContent = "Creating…";
    status.className = "form-status";
    status.textContent = "Creating your beta account…";
    status.style.display = "block";
    try {
        const response = await fetch(betaSignupUrl, { method: "POST", body: JSON.stringify({ action: "signup", username: document.getElementById("newSubUser").value, password: document.getElementById("newSubPass").value }) });
        const result = await response.json();
        if (result.result === "success") {
            status.className = "form-status is-success";
            status.textContent = "Account created. Redirecting to sign in…";
            window.setTimeout(() => window.location.assign("beta-login.php"), 1200);
            return;
        }
        status.className = "form-status is-error";
        status.textContent = result.result === "exists" ? "That username is already taken." : "We could not create the account. Please try again.";
    } catch (exception) {
        status.className = "form-status is-error";
        status.textContent = "We could not connect to the beta service. Please try again.";
    }
    button.disabled = false;
    button.innerHTML = '<i class="fas fa-user-plus" aria-hidden="true"></i> Create account';
});
</script>
<?php include "includes/footer.php"; ?>
