<?php

declare(strict_types=1);

/**
 * Central, deployment-safe site settings.
 *
 * Secrets belong in environment variables, never in tracked PHP files. The
 * .env.example file documents every supported value for local development.
 */
function ccc_env(string $key, string $default = ""): string
{
    $value = getenv($key);

    return $value === false || $value === "" ? $default : trim($value);
}

function ccc_site_path(string $path = ""): string
{
    $basePath = trim(ccc_env("SITE_BASE_PATH"), "/");
    $path = ltrim($path, "/");
    $prefix = $basePath === "" ? "" : "/" . $basePath;

    return $path === "" ? ($prefix ?: "/") : $prefix . "/" . $path;
}

function ccc_start_session(): void
{
    if (session_status() !== PHP_SESSION_NONE) {
        return;
    }

    $isSecure = (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off")
        || (($_SERVER["SERVER_PORT"] ?? "") === "443");

    session_set_cookie_params([
        "lifetime" => 0,
        "path" => ccc_site_path(),
        "secure" => $isSecure,
        "httponly" => true,
        "samesite" => "Lax",
    ]);
    session_start();
}

$siteName = $siteName ?? ccc_env("SITE_NAME", "Climate Change Club");
$siteURL = rtrim(ccc_env("SITE_URL", "https://climatechangeclub.pages.dev"), "/");
