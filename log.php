<?php
require_once('./connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_username = $_POST["username"];
    $_password = $_POST["password"];

    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $_username, $_password);

    if ($stmt->execute()) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close(); // Close the connection
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login Form</title>
</head>
<body>
    <div class="login-form">
        <img src="cecil.jpg" style="height: 200px; width: 200px; border-radius: 50%;">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter Username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password">

            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>

            <button type="submit">Login</button>
            <button type="reset">Cancel</button>
        </form>
        <a href="#">Forgot password?</a>
    </div>
</body>
</html>