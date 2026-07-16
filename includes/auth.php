<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/*
    Require any logged-in user
*/
function requireLogin()
{
    if (!isset($_SESSION["user_id"])) {

        header("Location: /ccc-website/login.php");
        exit;

    }
}


/*
    Require administrator access
*/
function requireAdmin()
{
    requireLogin();


    if (
        !isset($_SESSION["role"]) ||
        $_SESSION["role"] !== "admin"
    ) {

        http_response_code(403);

        die("Access denied.");

    }
}


/*
    Create CSRF token
*/
function createCSRFToken()
{
    if (!isset($_SESSION["csrf_token"])) {

        $_SESSION["csrf_token"] =
            bin2hex(random_bytes(32));

    }

    return $_SESSION["csrf_token"];
}


/*
    Check CSRF token
*/
function verifyCSRFToken($token)
{
    return isset($_SESSION["csrf_token"])
        && hash_equals(
            $_SESSION["csrf_token"],
            $token
        );
}

?>