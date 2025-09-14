<?php
$servername = "localhost";
$username = "server";
$password = "Vishwa@123";
$dbname = "website_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];

// Insert into MySQL
$sql = "INSERT INTO users (fname, lname, email, phone, location) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $fname, $lname, $email, $phone, $location);

if($stmt->execute()){
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
