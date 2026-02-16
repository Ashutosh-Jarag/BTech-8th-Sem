<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Counter with Session and Cookie</title>
</head>
<body>
    <h2>Visit Counter</h2>
    <?php
    // Start the session
    session_start();

    // Initialize session counter (current session visits)
    if (!isset($_SESSION["session_visits"])) {
        $_SESSION["session_visits"] = 0;
    }

    // Initialize cookie counter (total visits across sessions)
    if (!isset($_COOKIE["total_visits"])) {
        setcookie("total_visits", 0, time() + (30 * 24 * 60 * 60)); // 30 days
    }

    // Increment counters on page load
    $_SESSION["session_visits"]++;
    $totalVisits = (int)$_COOKIE["total_visits"] + 1;
    setcookie("total_visits", $totalVisits, time() + (30 * 24 * 60 * 60)); // Update cookie

    // Handle reset
    if (isset($_GET["reset"])) {
        $_SESSION["session_visits"] = 0; // Reset session counter
        setcookie("total_visits", 0, time() + (30 * 24 * 60 * 60)); // Reset cookie
        header("Location: visit_counter.php"); // Refresh page
        exit();
    }
    ?>

    <p>Session Visits (this session): <?php echo $_SESSION["session_visits"]; ?></p>
    <p>Total Visits (across sessions): <?php echo htmlspecialchars($_COOKIE["total_visits"]); ?></p>
    <a href="visit_counter.php?reset=true">Reset Counters</a>
</body>
</html>