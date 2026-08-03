<?php
$siteName = "Climate Change Club";
include "includes/header.php";
?>

<main class="content-page">
    <section class="contact-card">
        <i class="fas fa-flask" aria-hidden="true"></i>
        <h1>Beta Access</h1>
        <p>Sign in to try features that are still in testing.</p>
        <form id="betaLoginForm" class="contact-form">
            <div class="form-group"><label for="betaUser">Username</label><input type="text" id="betaUser" autocomplete="username" required></div>
            <div class="form-group"><label for="betaPass">Password</label><input type="password" id="betaPass" autocomplete="current-password" required></div>
            <label><input type="checkbox" id="rememberMe" style="width:auto"> Remember this browser</label>
            <button type="submit" id="loginBtn" class="btn-primary"><i class="fas fa-right-to-bracket" aria-hidden="true"></i> Sign in</button>
            <p id="loginError" class="form-status is-error" style="display:none" aria-live="polite"></p>
        </form>
        <p>Need beta access? <a href="beta-signup.php">Create a beta account</a>.</p>
    </section>
</main>

<script>
const betaScriptUrl = "https://script.google.com/macros/s/AKfycbzK_c0FmKiHqWAAr9kE231Qj0nxZgbcu-s4aUcrufzuoL5PrRaFbIEt-8VNunjgbf4/exec";
document.getElementById("betaLoginForm").addEventListener("submit", async (event) => {
    event.preventDefault();
    const button = document.getElementById("loginBtn");
    const error = document.getElementById("loginError");
    button.disabled = true;
    button.textContent = "Checking…";
    error.style.display = "none";
    try {
        const response = await fetch(betaScriptUrl, { method: "POST", body: JSON.stringify({ action: "login", username: document.getElementById("betaUser").value, password: document.getElementById("betaPass").value }) });
        const result = await response.json();
        if (result.result !== "success") throw new Error("Invalid credentials");
        sessionStorage.setItem("betaLoggedIn", "true");
        if (document.getElementById("rememberMe").checked) localStorage.setItem("betaLoggedIn", "true");
        window.location.replace("beta-test.php");
    } catch (exception) {
        error.textContent = "We could not sign you in. Check your details and try again.";
        error.style.display = "block";
        button.disabled = false;
        button.innerHTML = '<i class="fas fa-right-to-bracket" aria-hidden="true"></i> Sign in';
    }
});
</script>
<?php include "includes/footer.php"; ?>
