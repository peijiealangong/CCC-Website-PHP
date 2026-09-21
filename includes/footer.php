<?php

if (defined("CCC_FOOTER_INCLUDED")) {
    return;
}
define("CCC_FOOTER_INCLUDED", true);

$footerBasePath = $basePath ?? "";
?>
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-brand">
            <span class="brand-mark" aria-hidden="true"><i class="fas fa-leaf"></i><span>CCC</span></span>
            <div>
                <strong><?php echo htmlspecialchars($siteName ?? "Climate Change Club", ENT_QUOTES, "UTF-8"); ?></strong>
                <p>Student-led climate action, made practical.</p>
            </div>
        </div>

        <div class="footer-links">
            <nav aria-label="Explore the club">
                <h2>Explore</h2>
                <a href="<?php echo $footerBasePath; ?>projects.php">Projects</a>
                <a href="<?php echo $footerBasePath; ?>meetings.php">Meetings</a>
                <a href="<?php echo $footerBasePath; ?>about.php">About</a>
            </nav>
            <nav aria-label="Learning resources">
                <h2>Learn</h2>
                <a href="<?php echo $footerBasePath; ?>watch.php">Watch</a>
                <a href="<?php echo $footerBasePath; ?>articles.php">Articles</a>
                <a href="<?php echo $footerBasePath; ?>reasons.php">Why it matters</a>
            </nav>
            <nav aria-label="Get involved">
                <h2>Get involved</h2>
                <a href="<?php echo $footerBasePath; ?>contact.php">Contact the club</a>
                <a href="<?php echo $footerBasePath; ?>changelog.php">Changelog</a>
                <a href="<?php echo $footerBasePath; ?>download.php">Downloads</a>
            </nav>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($siteName ?? "Climate Change Club", ENT_QUOTES, "UTF-8"); ?>.</p>
            <p>Made for learning, sharing, and local action.</p>
        </div>
    </div>
</footer>
</body>
</html>
