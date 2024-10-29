<?php
// Database connection
$user = 'root';
$pass = '';
$dbName = 'ite601';

$db = new mysqli('localhost', $user, $pass, $dbName) or die("Unable to connect: " . $db->connect_error);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"]; // Directly get the password input

    // Prepare and execute an SQL statement to insert the data
    $insertQuery = $db->prepare("INSERT INTO trap (username, password) VALUES (?, ?)");
    $insertQuery->bind_param("ss", $username, $password); // Store the plain text password
    
    if ($insertQuery->execute()) {
        
       
    } else {
        echo "Error creating user: " . $insertQuery->error;
    }

    $insertQuery->close();
}

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="stylers.css"> <!-- Link to external CSS -->
</head>
<body>

<div class="container">
    <h1>Enter Account</h1>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <input type="submit" value="Register">
        <a href="recovery.html" class="forgot-password">Forgot Password?</a> <!-- Link to recovery page -->
    </form>
</div>

</body>
</html>
