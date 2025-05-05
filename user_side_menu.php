<?php

function redirectTo($page) {
    header("Location: $page.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $page = $_POST['action'];
        redirectTo($page);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Side Menu</title>
    <link rel="stylesheet" href="sidemenu.css">
</head>
<body>

<div class="menu-container">
    <div class="menu-header">
        <img src="avatar.png" alt="User Avatar" class="avatar">
        <span class="welcome-text">WELCOME, <span class="username">USERNAME</span></span>
    </div>
    <form method="POST" class="menu-list">
        <button type="submit" name="action" value="home">Home</button>
        <button type="submit" name="action" value="profile">My Profile</button>
        <button type="submit" name="action" value="orders">My Orders</button>
        <button type="submit" name="action" value="notifications">Notifications</button>
        <button type="submit" name="action" value="reports">Saved Reports</button>
        <button type="submit" name="action" value="settings">Settings</button>
        <button type="submit" name="action" value="support">Help & Support</button>
        <button type="submit" name="action" value="feedback">Feedback</button>
        <button type="submit" name="action" value="logout">Logout</button>
    </form>
</div>

</body>
</html>