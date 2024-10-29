<?php

$username = "steven";
$password = "";
$dbname = "bootstrap";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have an HTML form with fields like "name", "email", etc.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $email = $_POST["password"];
    // ... other fields

    // Prepare and execute an SQL statement to insert the data
    $sql = "INSERT INTO your_table (username, password, ...) VALUES (?, ?, ...)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s...", $username, $password, ...); // Bind parameters according to data types
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();