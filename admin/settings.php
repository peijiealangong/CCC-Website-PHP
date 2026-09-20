<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/config.php";
require_once __DIR__ . "/../includes/admin-header.php";
?>

<h1>⚙️ Settings</h1>

<section class="content-card">
    <h2>Deployment configuration</h2>
    <p>Site and service settings are managed through environment variables so passwords and API credentials never appear in the admin interface or repository.</p>
    <dl class="settings-list">
        <div><dt>Site URL</dt><dd><?php echo htmlspecialchars($siteURL, ENT_QUOTES, "UTF-8"); ?></dd></div>
        <div><dt>Database</dt><dd>Configured through DB_HOST, DB_PORT, DB_NAME, DB_USER, and DB_PASSWORD.</dd></div>
        <div><dt>Email</dt><dd>Configured through SMTP_HOST, SMTP_PORT, SMTP_USERNAME, and SMTP_PASSWORD when enabled.</dd></div>
    </dl>
    <p class="note">Update these values in your hosting provider’s environment settings, then redeploy. Do not add secrets to a PHP file.</p>
</section>

</main>
</div>
<?php require_once __DIR__ . "/../includes/admin-footer.php"; ?>
