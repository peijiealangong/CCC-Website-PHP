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
        $username = trim($_POST["username"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $password = $_POST["password"] ?? "";

        if (strlen($username) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8) {
            $message = "Use a name with at least 2 characters, a valid email address, and a password with at least 8 characters.";
            $messageType = "error";
        } else {
            $check = $conn->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
            $check->bind_param("s", $email);
            $check->execute();

            if ($check->get_result()->num_rows > 0) {
                $message = "An account already exists for that email address.";
                $messageType = "error";
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $role = "member";
                $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $username, $email, $hash, $role);

                if ($stmt->execute()) {
                    $message = "Account created. You can log in now.";
                    $messageType = "success";
                } else {
                    $message = "We could not create your account. Please try again later.";
                    $messageType = "error";
                }
            }
        }
    }
}

$siteName = "Climate Change Club";
include "includes/header.php";
?>

<main class="content-page">
    <section class="contact-card">
        <i class="fas fa-user-plus" aria-hidden="true"></i>
        <h1>Create an account</h1>
        <p>Join the club website to access your profile and order history.</p>
        <form class="contact-form" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(createCSRFToken()); ?>">
            <div class="form-group">
                <label for="registerName">Username</label>
                <input id="registerName" type="text" name="username" autocomplete="username" minlength="2" required>
            </div>
            <div class="form-group">
                <label for="registerEmail">Email address</label>
                <input id="registerEmail" type="email" name="email" autocomplete="email" required>
            </div>
            <div class="form-group">
                <label for="registerPassword">Password</label>
                <input id="registerPassword" type="password" name="password" autocomplete="new-password" minlength="8" required>
            </div>
            <button class="btn-primary" type="submit"><i class="fas fa-user-plus" aria-hidden="true"></i> Create account</button>
            <?php if ($message): ?><p class="form-status is-<?php echo $messageType; ?>" aria-live="polite"><?php echo htmlspecialchars($message); ?></p><?php endif; ?>
        </form>
        <p>Already have an account? <a href="login.php">Log in</a>.</p>
    </section>
</main>

<?php include "includes/footer.php"; ?>
