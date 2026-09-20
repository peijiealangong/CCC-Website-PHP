<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/admin-header.php";


$result = $conn->query(
"
SELECT 
donations.*,
users.username

FROM donations

LEFT JOIN users

ON donations.user_id = users.id

ORDER BY donations.id DESC
"
);


$total = $conn->query(
"SELECT SUM(amount) AS total FROM donations"
)->fetch_assoc();


$trees = $conn->query(
"SELECT SUM(trees) AS total FROM donations"
)->fetch_assoc();


?>


<h1>🌳 Donations</h1>


<h2>
Raised:
$<?php echo $total["total"] ?? 0; ?>
</h2>


<h2>
Trees:
<?php echo $trees["total"] ?? 0; ?>
</h2>


<a href="add-donation.php">
➕ Add Donation
</a>


<br><br>


<table class="admin-table">

<tr>

<th>ID</th>
<th>User</th>
<th>Amount</th>
<th>Trees</th>
<th>Date</th>
<th>Action</th>

</tr>


<?php while($donation=$result->fetch_assoc()): ?>

<tr>

<td>
<?php echo $donation["id"]; ?>
</td>


<td>
<?php echo htmlspecialchars($donation["username"] ?? "Anonymous"); ?>
</td>


<td>
$<?php echo $donation["amount"]; ?>
</td>


<td>
<?php echo $donation["trees"]; ?>
</td>


<td>
<?php echo $donation["created_at"]; ?>
</td>


<td>

<form class="inline-form" method="post" action="delete-donation.php" onsubmit="return confirm('Delete this donation?');">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(createCSRFToken(), ENT_QUOTES, "UTF-8"); ?>">
    <input type="hidden" name="id" value="<?php echo (int) $donation["id"]; ?>">
    <button class="text-button danger-button" type="submit" aria-label="Delete donation">🗑️</button>
</form>

</td>


</tr>

<?php endwhile; ?>


</table>


</main>

</div>
<?php require_once __DIR__ . "/../includes/admin-footer.php"; ?>
