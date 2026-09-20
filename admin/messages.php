<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/admin-header.php";
?>

<h1>📨 Messages</h1>

<section class="content-card">
    <h2>Contact message delivery</h2>
    <p>The public contact form currently uses its configured email service and does not store messages in the website database. Check the service inbox for new submissions.</p>
    <p>To add an on-site inbox later, create a protected messages table and record only the information needed to respond.</p>
</section>

</main>
</div>
<?php require_once __DIR__ . "/../includes/admin-footer.php"; ?>
