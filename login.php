<?php
// login.php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dummy credentials for example
    $valid_username = 'johndoe';
    $valid_password = 'password123';

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        // On success, set session and redirect to dashboard or profile
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-container {
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 300px;
    }
    .login-container h2 {
      margin-top: 0;
      text-align: center;
    }
    .login-container label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    .login-container input {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .login-container button {
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
    .login-container button:hover {
      background-color: #0056b3;
    }
    .signup-prompt {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }
    .signup-prompt a {
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }
    .signup-prompt a:hover {
      text-decoration: underline;
    }
    .error {
      color: red;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>

    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />

      <button type="submit">Log In</button>
    </form>

    <div class="signup-prompt">
      Don’t have an account? <a href="register.php">Sign up here</a>
    </div>
  </div>
</body>
</html>