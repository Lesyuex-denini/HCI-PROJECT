<?php
// Include database connection code
include 'db_connection.php';

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

// Insert user data into the database
$sql = "INSERT INTO users (name, email, password_hash) VALUES ('$name', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
