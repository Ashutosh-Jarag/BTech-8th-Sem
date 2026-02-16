<?php
session_start();

// Destroy session
session_destroy();

// Clear cookie
setcookie("username", "", time() - 3600, "/");

echo "<h3>Session and cookie cleared!</h3>";
echo '<a href="login.php">Start again</a>';
?>
