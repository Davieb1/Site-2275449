<?php
$servername = "localhost";
$name = "root";
$email = "";
$database = "test";

// Create New Connection
$conn = new mysqli($servername, $name, $email);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}else {
    $stmt = $conn->prepare("insert into davie_b('name', 'email', 'message') values(?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    echo "New record created successfully";
    $stmt->close();
    $conn->close();
}
?>