<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/admin-header.php";


$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id) {
    http_response_code(404);
    exit("Article not found.");
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    requireValidCSRFToken();

    $title = trim($_POST["title"] ?? "");
    $content = trim($_POST["content"] ?? "");
    if ($title === "" || $content === "" || strlen($title) > 180) {
        exit("Please provide a title up to 180 characters and article content.");
    }


    $stmt = $conn->prepare(
        "UPDATE articles 
        SET title=?, content=? 
        WHERE id=?"
    );


    $stmt->bind_param(
        "ssi",
        $title,
        $content,
        $id
    );


    $stmt->execute();


    echo "<p>✅ Article updated!</p>";

}




$stmt = $conn->prepare(
    "SELECT * FROM articles WHERE id=?"
);


$stmt->bind_param(
    "i",
    $id
);


$stmt->execute();


$article = $stmt->get_result()->fetch_assoc();

if (!$article) {
    http_response_code(404);
    exit("Article not found.");
}



?>


<h1>✏️ Edit Article</h1>


<form method="POST">
<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(createCSRFToken(), ENT_QUOTES, "UTF-8"); ?>">


<label>
Title:
</label>

<br>

<input
type="text"
name="title"
maxlength="180"
value="<?php echo htmlspecialchars($article["title"]); ?>"
required
>


<br><br>


<label>
Content:
</label>

<br>


<textarea
name="content"
rows="12"
cols="70"
required
><?php echo htmlspecialchars($article["content"]); ?></textarea>


<br><br>


<button type="submit">
Save Changes
</button>


</form>



</main>

</div>
<?php require_once __DIR__ . "/../includes/admin-footer.php"; ?>
