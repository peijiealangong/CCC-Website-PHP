<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";


$id = $_GET["id"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $role = $_POST["role"];


    $stmt = $conn->prepare(
        "UPDATE users SET role=? WHERE id=?"
    );


    $stmt->bind_param(
        "si",
        $role,
        $id
    );


    $stmt->execute();


    echo "<p>✅ User updated!</p>";

}



$stmt = $conn->prepare(
    "SELECT * FROM users WHERE id=?"
);

$stmt->bind_param(
    "i",
    $id
);

$stmt->execute();


$user = $stmt->get_result()->fetch_assoc();


?>


<h1>✏️ Edit User</h1>


<p>
Username:
<strong>
<?php echo htmlspecialchars($user["username"]); ?>
</strong>
</p>


<p>
Email:
<?php echo htmlspecialchars($user["email"]); ?>
</p>


<form method="POST">

<label>
Role:
</label>


<select name="role">

<option value="member"
<?php if($user["role"]=="member") echo "selected"; ?>
>
👤 Member
</option>


<option value="admin"
<?php if($user["role"]=="admin") echo "selected"; ?>
>
👑 Admin
</option>


</select>


<br><br>


<button type="submit">
Save Changes
</button>


</form>
