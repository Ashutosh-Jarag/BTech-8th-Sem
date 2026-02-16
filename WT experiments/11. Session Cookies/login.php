<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <?php
    // Start the session
    session_start();

    // Initialize variables
    $username = "";
    $error = "";

    // Check if cookie exists
    if (isset($_COOKIE["username"])) {
        $username = $_COOKIE["username"];
    }

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $remember = isset($_POST["remember"]) ? true : false;

        // Simple validation (hardcoded for demo)
        if ($username == "user" && $password == "1234") {
            // Set session
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;

            // Set cookie if "Remember Me" is checked (1 day expiry)
            if ($remember) {
                setcookie("username", $username, time() + 86400); // 24 hours
            }

            // Redirect to welcome page
            header("Location: welcome.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
    }
    ?>

    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <label>Remember Me:</label>
        <input type="checkbox" name="remember"><br><br>
        <input type="submit" value="Login">
    </form>
    <?php if ($error): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>