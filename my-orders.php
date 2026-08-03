<?php include "includes/header.php"; ?>

<?php

include "includes/auth.php";
requireLogin();

include "includes/database.php";
$user_id = $_SESSION["user_id"];
$orders = false;

if ($dbAvailable) {
    $stmt = $conn->prepare(
"
SELECT 
product,
quantity,
status,
created_at

FROM orders

WHERE user_id=?

ORDER BY id DESC
"
    );


    $stmt->bind_param("i", $user_id);


    $stmt->execute();


    $orders = $stmt->get_result();
}


?>


<h1>📦 My Orders</h1>


<?php if (!$dbAvailable): ?>
<p class="database-message"><?php echo htmlspecialchars($dbError); ?></p>
<?php else: ?>

<?php if($orders->num_rows == 0): ?>


<p>
You have no orders yet.
</p>


<?php endif; ?>



<?php while($order=$orders->fetch_assoc()): ?>


<div class="order-card">


<h2>
<?php echo htmlspecialchars($order["product"]); ?>
</h2>


<p>
Quantity:
<?php echo $order["quantity"]; ?>
</p>


<p>
Status:
<strong>
<?php echo htmlspecialchars($order["status"]); ?>
</strong>
</p>


<p>
Date:
<?php echo $order["created_at"]; ?>
</p>


</div>


<hr>


<?php endwhile; ?>
<?php endif; ?>
