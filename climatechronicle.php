<?php include "includes/header.php"; ?>

<header class="page-hero page-hero-chronicle">
    <div class="page-hero-content reveal-on-scroll">
        <span class="page-kicker">Climate Chronicle</span>
        <h1>The Climate Chronicle</h1>
        <p>Important climate stories, student observations, and global warming context.</p>
    </div>
</header>
<?php

include "includes/database.php";


$result = $conn->query(
"
SELECT

title,
content,
created_at

FROM articles

WHERE published = 1

ORDER BY created_at DESC

"
);


if ($result && $result->num_rows > 0):


while($article = $result->fetch_assoc()):

?>


<article class="chronicle-article">


<h2>
<?php echo htmlspecialchars($article["title"]); ?>
</h2>


<p>
<?php echo nl2br(htmlspecialchars($article["content"])); ?>
</p>


<small>
Published:
<?php echo htmlspecialchars($article["created_at"]); ?>
</small>


</article>


<?php

endwhile;


else:

?>


<p>
More climate articles will be added soon! 🌎
</p>


<?php endif; ?>
<p>
<div class="color-panel">
<button onclick="changeColor('blue')">Change Background: Blue</button>
<button onclick="changeColor('white')">Change Background: White</button>
<button onclick="changeColor('#a8dadc')">Ocean Blue</button>
<button onclick="changeColor('#2a9d8f')">Rainforest Green</button>
<button onclick="changeColor('#f4a261')">Sunset Orange</button>
<button onclick="changeColor('red')">Red</button>
<button onclick="changeColor('lightblue')">Light Blue</button>
<button onclick="changeColor('green')">Green</button>
<button onclick="changeColor('')">Reset Background</button>

  <button onclick="changeColor('#264653')">ðŸŒŠ Ocean Depth</button>
  <button onclick="changeColor('#2a9d8f')">ðŸŒ¿ Forest Floor</button>
  <button onclick="changeColor('#f4d35e')">â˜€ï¸ Solar Glow</button>
  <button style="background-color: #f4d35e; color: #222;" onclick="changeColor('#f4d35e')">â˜€ï¸ Solar Glow</button>
  <button onclick="changeColor('#a8dadc')">â„ï¸ Polar Ice</button>
  <button onclick="changeColor('#e9c46a')">ðŸŒ¾ Desert Sand</button>
  <button onclick="changeColor('#6c757d')">ðŸŒªï¸ Storm Sky</button>
  <button onclick="changeColor('#ffcad4')">ðŸŒ¸ Spring Bloom</button>
  <button onclick="changeColor('#5e548e')">ðŸŒŒ Midnight</button>
  <button onclick="changeColor('#d8f3dc')">ðŸŒ¬ï¸ Wind Whisper</button>
</div>
  </p>


<!-- Elfsight Comments | Untitled Comments -->
<div class="elfsight-app-bc7be1bb-94bd-4a93-9743-67b7cb0d6ad6" data-elfsight-app-lazy></div>
<!-- Elfsight Accessibility | Climate Change Club Website Accessibility button -->
<div class="elfsight-app-55baa1f4-7f05-4b47-be17-ff2f8e6710c7" data-elfsight-app-lazy></div>

<!-- Footer -->
<footer>
    <p><strong><?php echo $siteName; ?></strong> | &copy; 2026 Student-Led Initiative | v4.0.0 | BETA v4.0</p>
</footer>

<!-- Elfsight Background Music | Background music -->
<script src="https://elfsightcdn.com/platform.js" async></script>
<div class="elfsight-app-f7ca7360-edf8-4dfa-831b-eb1678915d1c" data-elfsight-app-lazy></div>
</body>
</html>
<script src="https://www.google.com/recaptcha/api.js?render=6LexhnssAAAAAJKsI0vXffvPWyNjPh76uV2Cqfip"></script>
<script>
   grecaptcha.ready(function() {
       grecaptcha.execute('6LexhnssAAAAAJKsI0vXffvPWyNjPh76uV2Cqfip', {action: 'submit'}).then(function(token) {
           // Send token to backend for verification
       });
   });
</script>

