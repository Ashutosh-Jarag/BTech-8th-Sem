<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form Validation</title>
</head>
<body>
    <h2>Login Form</h2>
    <?php
    // Initialize variables as empty
    $name = $phone = $email = $password = "";
    $errors = [];
    $success = false;

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get input values
        $name = trim($_POST["name"]);
        $phone = trim($_POST["phone"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        // Validate name (letters and spaces, 2+ characters)
        if (empty($name)) {
            $errors["name"] = "This Field is Required";
        } elseif (!preg_match("/^[a-zA-Z ]{2,}$/", $name)) {
            $errors["name"] = "Invalid input: Name must be 2+ letters (no numbers)";
        }

        // Validate phone (exactly 10 digits)
        if (empty($phone)) {
            $errors["phone"] = "This Field is Required";
        } elseif (!preg_match("/^\d{10}$/", $phone)) {
            $errors["phone"] = "Invalid input: Phone must be exactly 10 digits";
        }

        // Validate email (basic email format)
        if (empty($email)) {
            $errors["email"] = "This Field is Required";
        } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
            $errors["email"] = "Invalid input: Invalid email format";
        }

        // Validate password (6+ characters, at least one number)
        if (empty($password)) {
            $errors["password"] = "This Field is Required";
        } elseif (!preg_match("/^[a-zA-Z0-9]*[0-9][a-zA-Z0-9]*$/", $password) || strlen($password) < 6) {
            $errors["password"] = "Invalid input: Password must be 6+ characters with at least one number";
        }

        // Check if there are no errors
        if (empty($errors)) {
            $success = true;
        }
    }
    ?>

    <!-- Display success or form -->
    <?php if ($success): ?>
        <h3>Login Successfully</h3>
        <p>Name: <?php echo htmlspecialchars($name); ?></p>
        <p>Phone: <?php echo htmlspecialchars($phone); ?></p>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
    <?php else: ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Name:</label><br>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"><br>
            <?php if (isset($errors["name"])): ?>
                <span><?php echo $errors["name"]; ?></span><br>
            <?php endif; ?>

            <label>Phone Number:</label><br>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>"><br>
            <?php if (isset($errors["phone"])): ?>
                <span><?php echo $errors["phone"]; ?></span><br>
            <?php endif; ?>

            <label>Email:</label><br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
            <?php if (isset($errors["email"])): ?>
                <span><?php echo $errors["email"]; ?></span><br>
            <?php endif; ?>

            <label>Password:</label><br>
            <input type="password" name="password"><br>
            <?php if (isset($errors["password"])): ?>
                <span><?php echo $errors["password"]; ?></span><br>
            <?php endif; ?>

            <br>
            <input type="submit" value="Login">
        </form>
    <?php endif; ?>
</body>
</html>