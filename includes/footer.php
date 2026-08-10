<?php

if (defined("CCC_FOOTER_INCLUDED")) {
    return;
}
define("CCC_FOOTER_INCLUDED", true);

?>
<footer class="site-footer">
    <div class="footer-inner">
        <p><strong><?php echo htmlspecialchars($siteName ?? "Climate Change Club"); ?></strong> &middot; Student-led climate action &middot; &copy; 2026</p>
        <p class="summer-fundraiser"><i class="fas fa-lemon" aria-hidden="true"></i> This summer, we are going to set up a lemonade stand to raise money for tree planting and student climate action.</p>
    </div>
</footer>
</body>
</html>
