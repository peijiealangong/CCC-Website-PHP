<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/admin-header.php";


$query = "
SELECT 
    orders.id,
    orders.product,
    orders.quantity,
    orders.status,
    orders.created_at,
    users.username,
    users.email

FROM orders

JOIN users 
ON orders.user_id = users.id

ORDER BY orders.id DESC
";


$result = $conn->query($query);


?>


<h1>📦 Order Management</h1>


<table class="admin-table">

<tr>

<th>ID</th>

<th>Customer</th>

<th>Email</th>

<th>Product</th>

<th>Quantity</th>

<th>Status</th>

<th>Date</th>

<th>Actions</th>

</tr>


<?php while($order = $result->fetch_assoc()): ?>


<tr>


<td>
<?php echo $order["id"]; ?>
</td>


<td>
<?php echo htmlspecialchars($order["username"]); ?>
</td>


<td>
<?php echo htmlspecialchars($order["email"]); ?>
</td>


<td>
<?php echo htmlspecialchars($order["product"]); ?>
</td>


<td>
<?php echo $order["quantity"]; ?>
</td>


<td>
<?php echo htmlspecialchars($order["status"]); ?>
</td>


<td>
<?php echo $order["created_at"]; ?>
</td>


<td>

<a href="edit-order.php?id=<?php echo $order["id"]; ?>">
✏️ Edit
</a>

</td>


</tr>


<?php endwhile; ?>


</table>


</main>

</div>
<?php require_once __DIR__ . "/../includes/admin-footer.php"; ?>
