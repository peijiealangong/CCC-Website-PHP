<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . "/includes/auth.php";
require_once __DIR__ . "/config.php";
requireValidCSRFToken();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Method not allowed.");
}

if (SMTP_USERNAME === "" || SMTP_PASSWORD === "") {
    http_response_code(503);
    exit("The email service is not configured.");
}

$recipientEmail = filter_var(trim($_POST["email"] ?? ""), FILTER_VALIDATE_EMAIL);
$recipientName = trim($_POST["name"] ?? "Supporter");

if (!$recipientEmail || $recipientName === "") {
    http_response_code(422);
    exit("Please provide a valid name and email address.");
}

require_once __DIR__ . "/PHPMailer-master/src/Exception.php";
require_once __DIR__ . "/PHPMailer-master/src/PHPMailer.php";
require_once __DIR__ . "/PHPMailer-master/src/SMTP.php";

try {
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = SMTP_PORT;
    $mail->setFrom(SMTP_USERNAME, $siteName);
    $mail->addAddress($recipientEmail);
    $mail->Subject = "Thanks for contacting " . $siteName;
    $mail->Body = "Hello " . $recipientName . ",\n\nThanks for reaching out. We'll get back to you soon!";
    $mail->send();

    echo "Message sent successfully.";
} catch (Exception $exception) {
    error_log("CCC email error: " . $exception->getMessage());
    http_response_code(502);
    echo "We could not send your message. Please try again later.";
}
