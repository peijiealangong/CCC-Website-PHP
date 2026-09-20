<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/admin-header.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
requireValidCSRFToken();

$amount = filter_input(INPUT_POST, "amount", FILTER_VALIDATE_FLOAT);
$trees = filter_input(INPUT_POST, "trees", FILTER_VALIDATE_INT);

if ($amount === false || $amount === null || $amount < 0 || $trees === false || $trees === null || $trees < 0) {
    exit("Please enter a valid donation amount and tree total.");
}


$stmt=$conn->prepare(
"INSERT INTO donations(amount,trees)
VALUES(?,?)"
);


$stmt->bind_param(
"di",
$amount,
$trees
);


$stmt->execute();


echo "✅ Donation Added";


}


?>


<h1>🌳 Add Donation</h1>


<form method="POST">
<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(createCSRFToken(), ENT_QUOTES, "UTF-8"); ?>">


Amount:

<br>

<input name="amount" type="number" step="0.01" min="0" required>


<br><br>


Trees:

<br>

<input name="trees" type="number" min="0" required>


<br><br>


<button>
Save
</button>


</form>

</main>
</div>
<?php require_once __DIR__ . "/../includes/admin-footer.php"; ?>
