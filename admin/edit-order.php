<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/admin-header.php";


$id = $_GET["id"];



// Update order

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $status = $_POST["status"];


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
