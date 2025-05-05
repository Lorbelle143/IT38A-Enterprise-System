
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header"></div>
    <div class="tile">
        <h2>Sign Up</h2>
        <form method="POST" action="dashboard.php">
            <input type="text" name="username" placeholder="Username" class="input-field" required><br>
            <input type="email" name="email" placeholder="Email" class="input-field" required><br>
            <input type="password" name="password" placeholder="Password" class="input-field" required><br>
            <button type="submit" class="button">Sign Up</button>
        </form>
    </div>
</body>
</html>