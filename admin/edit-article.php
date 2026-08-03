<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/admin-header.php";


$id = $_GET["id"];



if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $title = $_POST["title"];
    $content = $_POST["content"];


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



?>


<h1>✏️ Edit Article</h1>


<form method="POST">


<label>
Title:
</label>

<br>

<input
type="text"
name="title"
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
