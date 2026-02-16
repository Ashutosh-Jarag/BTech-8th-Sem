<?php
session_start();

if (!isset($_SESSION['views'])) {
    $_SESSION['views'] = 1;
    setcookie("username", "Ashutosh", time() + (86400 * 30), "/"); // 30-day cookie
    echo "<h2>Welcome! Session started and cookie set.</h2>";
} else {
    $_SESSION['views']++;
    echo "<h2>Welcome back!</h2>";
    echo "Page views: " . $_SESSION['views'] . "<br>";
    echo "Cookie value: " . ($_COOKIE["username"] ?? "Not set") . "<br>";
}
?>

<p><a href="logout.php">Logout</a></p>
