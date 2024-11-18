<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "festconnect"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO registrations (name, email, phone, gender, receive_updates, teammates, teammates_count, accommodation, members_count) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $email, $phone, $gender, $receive_updates, $teammates, $teammates_count, $accommodation, $members_count);

    // Set parameters
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $receive_updates = isset($_POST["update"]) ? "Yes" : "No";
    $teammates = $_POST["teammates"];
    $teammates_count = isset($_POST["teammatesNum"]) ? $_POST["teammatesNum"] : null; // Check if set
    $accommodation = isset($_POST["accommodation"]) ? "Yes" : "No";
    $members_count = $_POST["membersCount"];
    
    // Execute SQL statement
    // if ($stmt->execute()) {
    //     echo "Registration successful";
    // } else {
    //     echo "Error: " . $stmt->error;
    // }
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #4CAF50;
        }

        p {
            font-size: 18px;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Successful</h2>
        <p>Thank you for registering!</p>
        <p>Your registration details have been submitted successfully.</p>
        <p><a href="dashboard.html">Back to Home</a></p>
    </div>
</body>
</html>
