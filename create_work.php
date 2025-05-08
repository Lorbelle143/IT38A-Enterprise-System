<?php
session_start();
require_once 'config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $due_date = $_POST['due_date'] ?? '';
    $created_by = $_SESSION['username'] ?? 'guest';

    if (empty($title) || empty($description) || empty($due_date)) {
        $error = 'All fields are required.';
    } else {
        $stmt = $conn->prepare("INSERT INTO work_orders (title, description, due_date, created_by) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $description, $due_date, $created_by);

        if ($stmt->execute()) {
            $success = 'Work order created successfully.';
        } else {
            $error = 'Failed to create work order.';
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
  <title>Create Work Order</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fef6ec;
      margin: 0;
      padding: 40px;
    }

    .container {
      max-width: 500px;
      margin: auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input[type="text"],
    textarea,
    input[type="date"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      background-color: #0056b3;
    }

    .success {
      color: green;
      text-align: center;
      margin-bottom: 15px;
    }

    .error {
      color: red;
      text-align: center;
      margin-bottom: 15px;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      text-decoration: none;
      color: #007bff;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Create Work Order</h2>

    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php elseif ($success): ?>
      <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <label>Title</label>
      <input type="text" name="title" required>

      <label>Description</label>
      <textarea name="description" required></textarea>

      <label>Due Date</label>
      <input type="date" name="due_date" required>

      <button type="submit">Submit Work Order</button>
    </form>

    <a class="back-link" href="dashboard.php">← Back to Dashboard</a>
  </div>
</body>
</html>
