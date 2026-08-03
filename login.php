<?php
include "includes/auth.php";
include "includes/database.php";

$message = "";
$messageType = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!verifyCSRFToken($_POST["csrf_token"] ?? "")) {
        $message = "Your form session expired. Please try again.";
        $messageType = "error";
    } elseif (!$dbAvailable) {
        $message = $dbError;
        $messageType = "error";
    } else {
        $email = trim($_POST["email"] ?? "");
        $password = $_POST["password"] ?? "";
        $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if ($user && password_verify($password, $user["password"])) {
            session_regenerate_id(true);
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"];
            header("Location: profile.php");
            exit;
        }

        $message = "The email address or password is incorrect.";
        $messageType = "error";
    }
}

$siteName = "Climate Change Club";
include "includes/header.php";
?>

<main class="content-page">
    <section class="contact-card">
        <i class="fas fa-right-to-bracket" aria-hidden="true"></i>
        <h1>Log in</h1>
        <p>Access your club profile and order history.</p>
        <form class="contact-form" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(createCSRFToken()); ?>">
            <div class="form-group">
                <label for="loginEmail">Email address</label>
                <input id="loginEmail" type="email" name="email" autocomplete="email" required>
            </div>
            <div class="form-group">
                <label for="loginPassword">Password</label>
                <input id="loginPassword" type="password" name="password" autocomplete="current-password" required>
            </div>
            <button class="btn-primary" type="submit"><i class="fas fa-right-to-bracket" aria-hidden="true"></i> Log in</button>
            <?php if ($message): ?><p class="form-status is-<?php echo $messageType; ?>" aria-live="polite"><?php echo htmlspecialchars($message); ?></p><?php endif; ?>
        </form>
        <p>New here? <a href="register.php">Create an account</a>.</p>
    </section>
</main>

<?php include "includes/footer.php"; ?>
