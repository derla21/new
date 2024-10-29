<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styler.css">
    <title>Login Form</title>
</head>
<body>
    <div class="container">
        <form class="login-form" action="login.php" method="post">
            <h1>Instagram</h1>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
            <p class="footer-text">Don't have an account? <a href="#">Sign up</a></p>
        </form>
    </div>
</body>
</html>
<?php


$user = 'root';
$pass = '';
$db = 'testdb';

$db = new mysqli ('localhost', $user, $pass, $db) or die("unable to connect");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

// Assuming you have an HTML form with fields like "name", "email", etc.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username= $_POST["username"];
    $pass = $_POST["password"];
    // ... other fields

    // Prepare and execute an SQL statement to insert the data
    $sql = "INSERT INTO your_table (username, password, ...) VALUES (?, ?, ...)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s...", $username, $password, ...); // Bind parameters according to data types
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Data inserted successfully";
 echo "steven";


?>