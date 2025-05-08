<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>UtiliTrack | Home</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #fef6e4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background: #fff;
      width: 350px;
      padding: 40px 30px;
      border-radius: 20px;
      box-shadow: 0 0 12px rgba(0,0,0,0.1);
      text-align: center;
      position: relative;
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

    input[type="text"], input[type="password"] {
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

    .signup-prompt {
      margin-top: 15px;
      font-size: 14px;
    }

    .signup-prompt a {
      color: #0056b3;
      text-decoration: none;
      font-weight: bold;
    }

    .signup-prompt a:hover {
      text-decoration: underline;
    }

    .error, .success {
      margin-top: 10px;
      font-size: 14px;
    }

    .error {
      color: red;
    }

    .success {
      color: green;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="header-wave"></div>
    <h2>Welcome to UtiliTrack</h2>

    <form action="login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login
