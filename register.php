<?php
session_start();
$error = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dummy registration validation
    $valid_username = 'johndoe';
    $valid_password = 'password123';

    // Get form inputs
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Check if username is empty
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = 'All fields are required.';
    } 
    // Check if password and confirm password match
    elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } 
    // Check if username is already taken (for example, checking against a static username)
    elseif ($username === $valid_username) {
        $error = 'Username already exists.';
    } 
    else {
        // Registration successful (dummy implementation)
        $_SESSION['username'] = $username;
        $success_message = 'Registration successful! You are now logged in.';
        header('Location: dashboard.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        /* Same styling as login */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        .register-container h2 {
            margin-top: 0;
            text-align: center;
        }
        .register-container label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        .register-container input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .register-container button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .register-container button:hover {
            background-color: #0056b3;
        }
        .error, .success {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
        .success {
            color: green;
        }
        .login-prompt {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .login-prompt a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .login-prompt a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>

        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if ($success_message): ?>
            <div class="success"><?= htmlspecialchars($success_message) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required />

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required />

            <button type="submit">Register</button>
        </form>

        <div class="login-prompt">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>
</body>
</html>