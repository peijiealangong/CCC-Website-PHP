<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/admin-header.php";


$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id) {
    http_response_code(404);
    exit("Order not found.");
}



// Update order

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    requireValidCSRFToken();

    $status = $_POST["status"] ?? "";
    $allowedStatuses = ["Pending", "Processing", "Shipped", "Completed", "Cancelled"];
    if (!in_array($status, $allowedStatuses, true)) {
        exit("Invalid order status.");
    }


    $stmt = $conn->prepare(
        "UPDATE orders SET status=? WHERE id=?"
    );


    $stmt->bind_param(
        "si",
        $status,
        $id
    );


    $stmt->execute();


    echo "<p>✅ Order updated!</p>";

}



// Get order information

$stmt = $conn->prepare(
    "
    SELECT 
        orders.*,
        users.username,
        users.email

    FROM orders

    JOIN users
    ON orders.user_id = users.id

    WHERE orders.id=?
    "
);


$stmt->bind_param(
    "i",
    $id
);


$stmt->execute();


$order = $stmt->get_result()->fetch_assoc();

if (!$order) {
    http_response_code(404);
    exit("Order not found.");
}



?>


<h1>📦 Edit Order</h1>


<p>
<strong>Customer:</strong>

<?php echo htmlspecialchars($order["username"]); ?>

</p>


<p>
<strong>Email:</strong>

<?php echo htmlspecialchars($order["email"]); ?>

</p>


<p>
<strong>Product:</strong>

<?php echo htmlspecialchars($order["product"]); ?>

</p>



<form method="POST">
<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(createCSRFToken(), ENT_QUOTES, "UTF-8"); ?>">


<label>
Status:
</label>


<select name="status">


<option value="Pending"
<?php if($order["status"]=="Pending") echo "selected"; ?>
>
Pending
</option>



<option value="Processing"
<?php if($order["status"]=="Processing") echo "selected"; ?>
>
Processing
</option>



<option value="Shipped"
<?php if($order["status"]=="Shipped") echo "selected"; ?>
>
Shipped
</option>



<option value="Completed"
<?php if($order["status"]=="Completed") echo "selected"; ?>
>
Completed
</option>



<option value="Cancelled"
<?php if($order["status"]=="Cancelled") echo "selected"; ?>
>
Cancelled
</option>


</select>


<br><br>


<button type="submit">
Save Changes
</button>


</form>



</main>

</div>
<?php require_once __DIR__ . "/../includes/admin-footer.php"; ?>
