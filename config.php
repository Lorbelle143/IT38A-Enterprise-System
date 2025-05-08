<?php
$servername = "localhost";
$username = "root";  // Default username for XAMPP is "root"
$password = "";      // Default password for XAMPP is empty
$dbname = "IT38a-Enterprise-System";  // The database name you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>