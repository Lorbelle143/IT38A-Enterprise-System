<?php
// You might include session handling or authentication here
// session_start();
// if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .menu {
            width: 200px;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .menu a {
            display: block;
            padding: 10px;
            margin: 5px 0;
            background-color: #ddd;
            text-decoration: none;
            color: black;
        }
        .menu a:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <h1>User Menu</h1>
    <div class="menu">
        <a href="dashboard.php">Dashboard</a>
        <a href="profile.php">Profile</a>
        <a href="settings.php">Settings</a>
        <a href="logout.php">Log Out</a>
    </div>
</body>
</html>
