<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>
<body>
    <?php
    // Start the session
    session_start();

    // Check if logged in
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("Location: login.php");
        exit();
    }

    $username = $_SESSION["username"];

    // Handle logout
    if (isset($_GET["logout"])) {
        session_unset();
        session_destroy();
        setcookie("username", "", time() - 3600); // Remove cookie
        header("Location: login.php");
        exit();
    }
    ?>

    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>Cookie: <?php echo isset($_COOKIE["username"]) ? htmlspecialchars($_COOKIE["username"]) : "Not set"; ?></p>
    <a href="welcome.php?logout=true">Logout</a>
</body>
</html>