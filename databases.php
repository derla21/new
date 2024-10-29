<?php
// Database connection
$user = 'root';
$pass = '';
$dbName = 'testdb';

$db = new mysqli('localhost', $user, $pass, $dbName) or die("Unable to connect: " . $db->connect_error);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Basic validation (add more as needed)
    if (!empty($username) && !empty($password)) {
        // Here you should fetch the user's data from the database
        $query = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $query->bind_param("ss", $username, $password);
        $query->execute();
        $result = $query->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            // User is authenticated
            echo "Welcome, " . htmlspecialchars($username) . "!";

            // Record login information (e.g., timestamp)
            $timestamp = date("Y-m-d H:i:s");
            $logQuery = $db->prepare("INSERT INTO login_logs (username, login_time) VALUES (?, ?)");
            $logQuery->bind_param("ss", $username, $timestamp);
            $logQuery->execute();

            echo "Your login time has been recorded.";
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Please enter username and password.";
    }
}
?>

<!-- HTML login form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>

<form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <input type="submit" value="Login">
</form>

</body>
</html>
