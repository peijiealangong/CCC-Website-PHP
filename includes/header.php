<?php

require_once __DIR__ . "/config.php";

if (defined("CCC_HEADER_INCLUDED")) {
    return;
}
define("CCC_HEADER_INCLUDED", true);

ccc_start_session();

$pageTitle = $pageTitle ?? $siteName;
$pageDescription = $pageDescription ?? "Join Climate Change Club for student-led climate action, projects, articles, videos, and practical ways to help.";
$basePath = strpos($_SERVER["PHP_SELF"] ?? "", "/admin/") !== false ? "../" : "";
$requestPath = parse_url($_SERVER["REQUEST_URI"] ?? "/", PHP_URL_PATH) ?: "/";
if ($requestPath === "/") {
    $requestPath = "/index.php";
}
$pageKey = basename($requestPath, ".php") ?: "home";
$canonicalUrl = $siteURL . $requestPath;
$styleVersion = (string) (@filemtime(__DIR__ . "/../style.css") ?: "1");
$scriptVersion = (string) (@filemtime(__DIR__ . "/../javascript.js") ?: "1");
$socialImage = $siteURL . "/images/stop-climate-change-background.webp";

if (!headers_sent()) {
    header("X-Content-Type-Options: nosniff");
    header("Referrer-Policy: strict-origin-when-cross-origin");
    header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, "UTF-8"); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="theme-color" content="#123d35">
    <meta name="color-scheme" content="light">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, "UTF-8"); ?>">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Climate Change Club">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8"); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, "UTF-8"); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, "UTF-8"); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($socialImage, ENT_QUOTES, "UTF-8"); ?>">
    <meta property="og:image:alt" content="Climate Change Club student-led climate action">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8"); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, "UTF-8"); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($socialImage, ENT_QUOTES, "UTF-8"); ?>">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8"); ?></title>

    <script type="application/ld+json"><?php echo json_encode([
        "@context" => "https://schema.org",
        "@graph" => [
            ["@type" => "Organization", "@id" => $siteURL . "/#organization", "name" => $siteName, "url" => $siteURL, "description" => $pageDescription, "logo" => $socialImage],
            ["@type" => "WebSite", "@id" => $siteURL . "/#website", "name" => $siteName, "url" => $siteURL, "publisher" => ["@id" => $siteURL . "/#organization"]]
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="<?php echo $basePath; ?>style.css?v=<?php echo $styleVersion; ?>">
    <link rel="stylesheet" href="<?php echo $basePath; ?>v28-enhancements.css">
    <script src="<?php echo $basePath; ?>javascript.js?v=<?php echo $scriptVersion; ?>" defer></script>
</head>
<body data-page="<?php echo htmlspecialchars($pageKey, ENT_QUOTES, "UTF-8"); ?>">
    <a class="skip-link" href="#main-content">Skip to content</a>

    <header class="site-header">
        <div class="site-header-inner">
            <a class="nav-logo" href="<?php echo $basePath; ?>index.php" aria-label="Climate Change Club home">
                <span class="brand-mark" aria-hidden="true"><i class="fas fa-leaf"></i><span>CCC</span></span>
                <span class="site-brand-copy"><strong>Climate Change Club</strong><small>Student-led local action</small></span>
            </a>

            <nav class="site-nav" aria-label="Main navigation">
                <button class="nav-toggle" type="button" aria-controls="primary-navigation" aria-expanded="false" aria-label="Open menu">
                    <span class="bar"></span><span class="bar"></span><span class="bar"></span>
                </button>
                <ul id="primary-navigation" class="nav-list" data-visible="false">
                    <li><a href="<?php echo $basePath; ?>index.php" data-nav-section="home">Home</a></li>
                    <li><a href="<?php echo $basePath; ?>projects.php" data-nav-section="projects">Projects</a></li>
                    <li class="dropdown">
                        <button class="nav-menu-button" type="button" aria-expanded="false" aria-haspopup="true" data-nav-section="learn">Learn <span class="nav-caret" aria-hidden="true"></span></button>
                        <ul class="submenu" aria-label="Learning resources">
                            <li><a href="<?php echo $basePath; ?>watch.php">Watch</a></li>
                            <li><a href="<?php echo $basePath; ?>articles.php">Articles</a></li>
                            <li><a href="<?php echo $basePath; ?>climatechronicle.php">Climate Chronicle</a></li>
                            <li><a href="<?php echo $basePath; ?>reasons.php">Why action matters</a></li>
                            <li><a href="<?php echo $basePath; ?>meetings.php">Meetings</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo $basePath; ?>about.php" data-nav-section="about">About</a></li>
                    <li><a href="<?php echo $basePath; ?>contact.php" data-nav-section="contact">Contact</a></li>
                    <li class="nav-donate-item"><button class="nav-donate-button" id="donateButton" type="button"><i class="fas fa-heart" aria-hidden="true"></i><span>Support trees</span></button></li>
                    <?php if (isset($_SESSION["user_id"])): ?>
                        <li class="dropdown nav-account">
                            <button class="nav-menu-button" type="button" aria-expanded="false" aria-haspopup="true" data-nav-section="account"><i class="fas fa-user" aria-hidden="true"></i><span class="nav-account-label">Account</span><span class="nav-caret" aria-hidden="true"></span></button>
                            <ul class="submenu" aria-label="Account pages">
                                <li><a href="<?php echo $basePath; ?>profile.php">Profile</a></li>
                                <li><a href="<?php echo $basePath; ?>my-orders.php">My orders</a></li>
                                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin"): ?><li><a href="<?php echo $basePath; ?>admin/dashboard.php">Admin dashboard</a></li><?php endif; ?>
                                <li><a href="<?php echo $basePath; ?>logout.php">Log out</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li><a class="nav-login" href="<?php echo $basePath; ?>login.php">Log in</a></li>
                        <li><a class="nav-join" href="<?php echo $basePath; ?>register.php">Join the club</a></li>
                    <?php endif; ?>
                    <li class="dropdown nav-more">
                        <button class="nav-menu-button" id="betaNavBtn" type="button" aria-expanded="false" aria-haspopup="true" data-nav-section="more">More <span class="notification-dot" id="updateDot" aria-hidden="true"></span><span class="nav-caret" aria-hidden="true"></span></button>
                        <ul class="submenu" aria-label="More pages">
                            <li><a href="<?php echo $basePath; ?>notices.php">Notices</a></li>
                            <li><a href="<?php echo $basePath; ?>download.php">Downloads</a></li>
                            <li><a href="<?php echo $basePath; ?>changelog.php">Changelog</a></li>
                            <li><a href="<?php echo $basePath; ?>beta-test.php">Beta lab</a></li>
                            <li><a href="<?php echo $basePath; ?>beta-docs.php">Documentation</a></li>
                            <li><a href="<?php echo $basePath; ?>beta-report.php">Report an issue</a></li>
                            <li class="beta-logout-item"><button class="nav-logout" type="button" data-beta-logout>Beta logout</button></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="popup donate-popup" id="donatePopup" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="donate-title">
        <div class="popup-content">
            <button class="popup-close" type="button" aria-label="Close donation dialog">&times;</button>
            <h2 id="donate-title">Support trees with <?php echo htmlspecialchars($siteName, ENT_QUOTES, "UTF-8"); ?></h2>
            <p>Your gift helps fund tree planting and climate education.</p>
            <div class="gfm-embed" data-url="https://www.gofundme.com/f/plant-trees-with-the-climate-change-club/widget/small?attribution_id=sl%3Aea4c8cf4-cfa2-4f1d-8902-a7b5adf17d00"></div>
        </div>
    </div>
