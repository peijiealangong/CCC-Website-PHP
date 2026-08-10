<?php

require_once __DIR__ . "/../includes/auth.php";
requireAdmin();

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../includes/admin-header.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $title = $_POST["title"];
    $content = $_POST["content"];
    $author_id = $_SESSION["user_id"];


    $stmt = $conn->prepare(
        "INSERT INTO articles
        (author_id, title, content)
        VALUES (?, ?, ?)"
    );


    $stmt->bind_param(
        "iss",
        $author_id,
        $title,
        $content
    );


    $stmt->execute();


    echo "<p>✅ Article created!</p>";

}


?>


<h1>📰 Create Article</h1>


<form method="POST">


<label>
Title:
</label>

<br>

<input 
type="text"
name="title"
required
>


<br><br>


<label>
Content:
</label>

<br>


<textarea
name="content"
rows="10"
cols="60"
required
></textarea>


<br><br>


<button type="submit">
Publish Article
</button>


</form>


</main>

</div>
