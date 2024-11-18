<?php
// Start session
session_start();

// Database connection
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

// Handle signup form submission
if (isset($_POST['signup-btn'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Hash the password before storing it in the database
    $hashed_password = $password;

    // Insert user data into the database
    $sql = "INSERT INTO signup (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        // Registration successful, set session variable and redirect to dashboard
        $_SESSION['email'] = $email;
        header("Location: dashboard.html"); // Replace with the path to your dashboard page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle login form submission
if (isset($_POST['signin-btn'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    echo $email.$password;
    // Retrieve user data from the database
    $sql = "SELECT * FROM signup WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            // Password verification successful, set session variable and redirect to dashboard
            $_SESSION['email'] = $email;
            header("Location: dashboard.html"); // Replace with the path to your dashboard page
            exit();
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "length 0";
    }
}

// Close connection
$conn->close();
?>
