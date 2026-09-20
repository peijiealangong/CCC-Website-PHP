<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/admin-header.php";


$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id) {
    http_response_code(404);
    exit("User not found.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    requireValidCSRFToken();

    $role = $_POST["role"] ?? "";
    if (!in_array($role, ["member", "admin"], true)) {
        exit("Invalid role.");
    }


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

if (!$user) {
    http_response_code(404);
    exit("User not found.");
}


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
<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(createCSRFToken(), ENT_QUOTES, "UTF-8"); ?>">

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

</main>
</div>
<?php require_once __DIR__ . "/../includes/admin-footer.php"; ?>
