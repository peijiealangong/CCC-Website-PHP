<?php

declare(strict_types=1);

require_once __DIR__ . "/config.php";

// A missing database must not turn public pages into blank pages. Credentials
// are provided by the deployment environment; see .env.example.
if (function_exists("mysqli_report")) {
    mysqli_report(MYSQLI_REPORT_OFF);
}

$host = ccc_env("DB_HOST");
$username = ccc_env("DB_USER");
$password = ccc_env("DB_PASSWORD");
$database = ccc_env("DB_NAME");
$port = (int) ccc_env("DB_PORT", "3306");
$hasDatabaseConfig = $host !== "" && $username !== "" && $database !== "";

$conn = null;
if ($hasDatabaseConfig && class_exists("mysqli")) {
    $conn = @new mysqli($host, $username, $password, $database, $port);
}

$dbAvailable = class_exists("mysqli") && $conn instanceof mysqli && !$conn->connect_errno;
$dbError = $dbAvailable
    ? ""
    : ($hasDatabaseConfig
        ? "The database is temporarily unavailable. Please try again later."
        : "The database has not been configured for this environment.");

if (!$dbAvailable) {
    // Keep legacy query pages renderable while making every database
    // operation fail safely until MySQL is started.
    if (!class_exists("CccUnavailableResult")) {
        class CccUnavailableResult
        {
            public int $num_rows = 0;

            public function fetch_assoc(): ?array
            {
                return null;
            }
        }

        class CccUnavailableStatement
        {
            public function bind_param(...$params): bool
            {
                return true;
            }

            public function execute(): bool
            {
                return false;
            }

            public function get_result(): CccUnavailableResult
            {
                return new CccUnavailableResult();
            }
        }

        class CccUnavailableConnection
        {
            public int $connect_errno = 1;
            public string $connect_error;
            public string $error;

            public function __construct(string $error)
            {
                $this->connect_error = $error;
                $this->error = $error;
            }

            public function query(string $query): CccUnavailableResult
            {
                return new CccUnavailableResult();
            }

            public function prepare(string $query): CccUnavailableStatement
            {
                return new CccUnavailableStatement();
            }
        }
    }

    $conn = new CccUnavailableConnection($dbError);
}

?>
