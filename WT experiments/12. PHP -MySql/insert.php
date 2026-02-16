<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "simple_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$username = "";
$email = "";
$message = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];

    // Prepare and execute SQL
    $stmt = $conn->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $email);
    
    if ($stmt->execute()) {
        $message = "Data inserted successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Insert to Database</title>
</head>
<body>
    <h2>Enter Details</h2>
    <form method="POST" action="">
        Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>"><br><br>
        Email: <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>
        <input type="submit" value="Submit">
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>