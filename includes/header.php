<?php

require_once __DIR__ . "/config.php";

// Several legacy pages include this file more than once. Keep the shared
// markup and session initialization single-run.
if (defined("CCC_HEADER_INCLUDED")) {
    return;
}
define("CCC_HEADER_INCLUDED", true);

ccc_start_session();


/*
    Safe defaults
*/

$pageTitle = $pageTitle ?? $siteName;
$pageDescription = $pageDescription ?? "Join Climate Change Club for student-led climate action, projects, articles, videos, and practical ways to help.";


/*
    Detect admin folder
*/

$basePath = "";

if (strpos($_SERVER["PHP_SELF"], "/admin/") !== false) {
    $basePath = "../";
}

$requestPath = parse_url($_SERVER["REQUEST_URI"] ?? "/", PHP_URL_PATH) ?: "/";
if ($requestPath === "/") {
    $requestPath = "/index.php";
}
$canonicalUrl = $siteURL . $requestPath;
$styleVersion = (string) (@filemtime(__DIR__ . "/../style.css") ?: "1");
$scriptVersion = (string) (@filemtime(__DIR__ . "/../javascript.js") ?: "1");

// Keep public pages cache-friendly while avoiding stale HTML after deploys.
if (!headers_sent()) {
    header("X-Content-Type-Options: nosniff");
    header("Referrer-Policy: strict-origin-when-cross-origin");
    header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />


<meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, "UTF-8"); ?>" />

<meta name="robots" content="index, follow, max-image-preview:large" />

<meta name="theme-color" content="#0f3d38" />
<meta name="color-scheme" content="light" />


<link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, "UTF-8"); ?>" />


<meta property="og:type" content="website" />

<meta property="og:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8"); ?>" />

<meta property="og:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, "UTF-8"); ?>" />

<meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, "UTF-8"); ?>" />
<meta property="og:site_name" content="Climate Change Club" />
<meta property="og:image" content="<?php echo htmlspecialchars($siteURL . "/images/stop-climate-change-background.webp", ENT_QUOTES, "UTF-8"); ?>" />


<meta name="twitter:card" content="summary_large_image" />

<meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8"); ?>" />
<meta name="twitter:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, "UTF-8"); ?>" />
<meta name="twitter:image" content="<?php echo htmlspecialchars($siteURL . "/images/stop-climate-change-background.webp", ENT_QUOTES, "UTF-8"); ?>" />



<title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8"); ?></title>

<script type="application/ld+json">
<?php echo json_encode([
    "@context" => "https://schema.org",
    "@type" => "Organization",
    "name" => $siteName,
    "url" => $siteURL,
    "description" => $pageDescription,
    "logo" => $siteURL . "/images/stop-climate-change-background.webp"
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>



<link rel="stylesheet" href="<?php echo $basePath; ?>style.css?v=<?php echo $styleVersion; ?>">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" referrerpolicy="no-referrer">


<script src="<?php echo $basePath; ?>javascript.js?v=<?php echo $scriptVersion; ?>" defer></script>



</head>


<body>


<a class="skip-link" href="#main-content">Skip to content</a>



<header class="site-header">


<nav class="site-nav" aria-label="Main navigation">



<a class="nav-logo" href="<?php echo $basePath; ?>index.php">

<span class="brand-mark">
CCC
</span>

<span>
Climate Change Club
</span>

</a>





<button 
class="nav-toggle" 
type="button"
aria-controls="primary-navigation"
aria-expanded="false"
aria-label="Open menu"
>

<span class="bar"></span>

<span class="bar"></span>

<span class="bar"></span>

</button>





<ul id="primary-navigation" class="nav-list" data-visible="false">



<li>
<a href="<?php echo $basePath; ?>index.php" data-nav-section="home">
Home
</a>
</li>




<li class="dropdown">

<button class="nav-menu-button" type="button" aria-expanded="false" aria-haspopup="true" data-nav-section="club">
Club <span class="nav-caret" aria-hidden="true"></span>
</button>


<ul class="submenu" aria-label="Club pages">


<li>
<a href="<?php echo $basePath; ?>about.php">
About
</a>
</li>


<li>
<a href="<?php echo $basePath; ?>projects.php">
Projects
</a>
</li>


<li>
<a href="<?php echo $basePath; ?>meetings.php">
Meetings
</a>
</li>


</ul>


</li>





<li class="dropdown">


<button class="nav-menu-button" type="button" aria-expanded="false" aria-haspopup="true" data-nav-section="resources">
Resources <span class="nav-caret" aria-hidden="true"></span>
</button>


<ul class="submenu" aria-label="Resource pages">


<li>
<a href="<?php echo $basePath; ?>notices.php">
Notices
</a>
</li>


<li>
<a href="<?php echo $basePath; ?>articles.php">
Articles
</a>
</li>


<li>
<a href="<?php echo $basePath; ?>climatechronicle.php">
The Climate Chronicle
</a>
</li>

<li>
<a href="<?php echo $basePath; ?>reasons.php">
Why climate action matters
</a>
</li>


<li>
<a href="<?php echo $basePath; ?>download.php">
Download App
</a>
</li>


</ul>


</li>





<li>
<a href="<?php echo $basePath; ?>watch.php" data-nav-section="watch">
Watch
</a>
</li>




<li>
<a href="<?php echo $basePath; ?>contact.php" data-nav-section="contact">
Contact
</a>
</li>

<li>
<button class="nav-donate-button" id="donateButton" type="button">
<i class="fas fa-heart" aria-hidden="true"></i> Donate
</button>
</li>

<li class="dropdown">
<button class="nav-menu-button" id="betaNavBtn" type="button" aria-expanded="false" aria-haspopup="true" data-nav-section="beta">
Beta <span class="notification-dot" id="updateDot" aria-hidden="true"></span><span class="nav-caret" aria-hidden="true"></span>
</button>
<ul class="submenu" aria-label="Beta pages">
<li><a href="<?php echo $basePath; ?>beta-test.php">Test Lab</a></li>
<li><a href="<?php echo $basePath; ?>beta-docs.php">Documentation</a></li>
<li><a href="<?php echo $basePath; ?>beta-report.php">Report a Problem</a></li>
<li class="beta-logout-item"><button class="nav-logout" type="button" data-beta-logout>Logout</button></li>
</ul>
</li>






<?php if(isset($_SESSION["user_id"])): ?>


<li>
<a href="<?php echo $basePath; ?>profile.php">
👤 Profile
</a>
</li>


<li>
<a href="<?php echo $basePath; ?>my-orders.php">
📦 Orders
</a>
</li>


<li>
<a href="<?php echo $basePath; ?>logout.php">
Logout
</a>
</li>



<?php else: ?>


<li>
<a href="<?php echo $basePath; ?>login.php">
Login
</a>
</li>


<li>
<a href="<?php echo $basePath; ?>register.php">
Register
</a>
</li>



<?php endif; ?>





<?php if(isset($_SESSION["role"]) && $_SESSION["role"] === "admin"): ?>


<li>
<a href="<?php echo $basePath; ?>admin/dashboard.php">
👑 Admin
</a>
</li>


<?php endif; ?>



</ul>


</nav>


</header>

<div class="popup donate-popup" id="donatePopup" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="donate-title">
    <div class="popup-content">
        <button class="popup-close" type="button" aria-label="Close donation dialog">&times;</button>
        <h2 id="donate-title">Support trees with <?php echo htmlspecialchars($siteName); ?></h2>
        <p>Your gift helps fund tree planting and climate education.</p>
        <div class="gfm-embed" data-url="https://www.gofundme.com/f/plant-trees-with-the-climate-change-club/widget/small?attribution_id=sl%3Aea4c8cf4-cfa2-4f1d-8902-a7b5adf17d00"></div>
    </div>
</div>
