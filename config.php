<?php
$host = 'localhost';                // XAMPP default MySQL host
$db   = 'IT38a-enterprise-system';   // Your database name
$user = 'root';                     // XAMPP default MySQL username
$pass = '';                         // XAMPP default MySQL password (empty by default)
$charset = 'utf8mb4';               // Character set

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Error mode
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch type
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Use native prepared statements
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo "Connection successful!"; // Optional success message
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>