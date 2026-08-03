<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/admin-header.php";


if($_SERVER["REQUEST_METHOD"]=="POST"){


$amount=$_POST["amount"];

$trees=$_POST["trees"];


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


Amount:

<br>

<input name="amount" type="number" step="0.01">


<br><br>


Trees:

<br>

<input name="trees" type="number">


<br><br>


<button>
Save
</button>


</form>
