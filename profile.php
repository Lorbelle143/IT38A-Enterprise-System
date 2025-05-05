
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="sidebar">
        <h2>Menu</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main-content">
        <h1>Your Profile</h1>
        <form method="POST" action="profile_update.php">
            <input type="text" name="name" placeholder="Full Name" class="input-field" required><br>
            <input type="email" name="email" placeholder="Email Address" class="input-field" required><br>
            <input type="text" name="phone" placeholder="Phone Number" class="input-field" required><br>
            <button type="submit" class="button">Update Profile</button>
        </form>
    </div>

</body>
</html>