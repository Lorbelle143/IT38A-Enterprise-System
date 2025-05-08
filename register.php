<?php
session_start();
require_once 'config.php'; // ✅ Connects to your database

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = 'All fields are required.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } else {
        // Check if username already exists in the database
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = 'Username already exists.';
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = 'user'; // Default role

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $hashed_password, $role);

            if ($stmt->execute()) {
                $_SESSION['success_message'] = 'Registration successful! You can now log in.';
                header('Location: login.php');
                exit;
            } else {
                $error = 'Registration failed. Please try again.';
            }
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #FEF6E4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            width: 350px;
            position: relative;
            text-align: center;
        }

        .header-wave {
            position: absolute;
            top: 0;
            left: 0;
            height: 100px;
            width: 100%;
            background: #001F54;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            clip-path: ellipse(100% 80% at 50% 0%);
        }

        h2 {
            margin-top: 100px;
            font-size: 28px;
            font-weight: 700;
            color: #000;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #003d80;
        }

        .login-prompt {
            margin-top: 15px;
            font-size: 14px;
        }

        .login-prompt a {
            color: #0056b3;
            text-decoration: none;
            font-weight: bold;
        }

        .login-prompt a:hover {
            text-decoration: underline;
        }

        .error, .success {
            margin-top: 10px;
            font-size: 14px;
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="header-wave"></div>
        <h2>REGISTER</h2>

        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="password" name="confirm_password" placeholder="Confirm Password" required />
            <button type="submit">Register</button>
        </form>

        <div class="login-prompt">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>
</body>
</html>
