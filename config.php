<?php

declare(strict_types=1);

require_once __DIR__ . "/includes/config.php";

defined("SMTP_HOST") || define("SMTP_HOST", ccc_env("SMTP_HOST", "smtp.gmail.com"));
defined("SMTP_USERNAME") || define("SMTP_USERNAME", ccc_env("SMTP_USERNAME"));
defined("SMTP_PASSWORD") || define("SMTP_PASSWORD", ccc_env("SMTP_PASSWORD"));
defined("SMTP_PORT") || define("SMTP_PORT", (int) ccc_env("SMTP_PORT", "587"));
