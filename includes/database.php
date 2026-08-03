<?php

// A stopped MySQL service should not turn every PHP page into a blank page.
mysqli_report(MYSQLI_REPORT_OFF);

$host = "localhost";
$username = "root";
$password = "";
$database = "ccc_database";

$conn = @new mysqli($host, $username, $password, $database);
$dbAvailable = $conn instanceof mysqli && !$conn->connect_errno;
$dbError = $dbAvailable
    ? ""
    : "The database is currently unavailable. Start MySQL in XAMPP to enable live data.";

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
