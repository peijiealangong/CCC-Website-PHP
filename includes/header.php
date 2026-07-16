<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/*
    Safe defaults
*/

if (!isset($siteName)) {
    $siteName = "Climate Change Club";
}


/*
    Detect admin folder
*/

$basePath = "";

if (strpos($_SERVER["PHP_SELF"], "/admin/") !== false) {
    $basePath = "../";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />


<meta name="description" content="Join Climate Change Club for student-led climate action, projects, articles, videos, and practical ways to help." />

<meta name="robots" content="index, follow, max-image-preview:large" />

<meta name="theme-color" content="#0f3d38" />


<link rel="canonical" href="https://climatechangeclub.pages.dev/" />


<meta property="og:type" content="website" />

<meta property="og:title" content="<?php echo htmlspecialchars($siteName); ?>" />

<meta property="og:description" content="Student-led climate projects, articles, videos, and climate action." />

<meta property="og:url" content="https://climatechangeclub.pages.dev/" />


<meta name="twitter:card" content="summary_large_image" />

<meta name="twitter:title" content="<?php echo htmlspecialchars($siteName); ?>" />



<title>
<?php echo htmlspecialchars($siteName); ?>
</title>



<link rel="stylesheet" href="<?php echo $basePath; ?>style.css">


<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


<script src="<?php echo $basePath; ?>javascript.js" defer></script>



</head>


<body>



<header class="site-header">


<nav class="site-nav">



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
<a href="<?php echo $basePath; ?>index.php">
Home
</a>
</li>




<li class="dropdown">

<button class="nav-menu-button" type="button">
Club
</button>


<ul class="submenu">


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


<button class="nav-menu-button" type="button">
Resources
</button>


<ul class="submenu">


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
<a href="<?php echo $basePath; ?>download.php">
Download App
</a>
</li>


</ul>


</li>





<li>
<a href="<?php echo $basePath; ?>watch.php">
Watch
</a>
</li>




<li>
<a href="<?php echo $basePath; ?>contact.php">
Contact
</a>
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