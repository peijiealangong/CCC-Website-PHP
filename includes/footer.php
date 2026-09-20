<?php

if (defined("CCC_FOOTER_INCLUDED")) {
    return;
}
define("CCC_FOOTER_INCLUDED", true);

?>
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-brand">
            <span class="brand-mark" aria-hidden="true">CCC</span>
            <div><strong><?php echo htmlspecialchars($siteName ?? "Climate Change Club", ENT_QUOTES, "UTF-8"); ?></strong><p>Student-led climate action, made practical.</p></div>
        </div>
        <nav class="footer-nav" aria-label="Footer navigation">
            <a href="<?php echo $basePath ?? ""; ?>about.php">About</a>
            <a href="<?php echo $basePath ?? ""; ?>projects.php">Projects</a>
            <a href="<?php echo $basePath ?? ""; ?>articles.php">Articles</a>
            <a href="<?php echo $basePath ?? ""; ?>contact.php">Contact</a>
        </nav>
        <p class="footer-meta">&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($siteName ?? "Climate Change Club", ENT_QUOTES, "UTF-8"); ?>. Built for learning, sharing, and action.</p>
    </div>
</footer>
</body>
</html>
