<?php
// create_work_order.php
session_start();
include 'db.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Grab and sanitize inputs
    $title       = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $due_date    = $conn->real_escape_string($_POST['due_date']);

    // Insert into database
    $sql = "
      INSERT INTO work_orders (title, description, due_date)
      VALUES ('$title', '$description', '$due_date')
    ";
    if ($conn->query($sql)) {
        $message = "✅ Work order created!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Work Order</title>
  <style>
    body { font-family: Arial; background: #f7f7f7; padding: 40px; }
    .box { background: #fff; padding: 20px; border-radius: 8px; max-width: 400px; margin:auto; box-shadow:0 0 8px rgba(0,0,0,0.1); }
    h2 { margin-top:0; }
    input, textarea { width:100%; padding:8px; margin:8px 0; border:1px solid #ccc; border-radius:4px; }
    button { padding:10px 15px; background:#007bff; color:#fff; border:none; border-radius:4px; cursor:pointer; }
    .message { margin:10px 0; font-weight:bold; }
    a { display:inline-block; margin-top:10px; color:#007bff; text-decoration:none; }
  </style>
</head>
<body>
  <div class="box">
    <h2>Create Work Order</h2>
    <?php if($message): ?><div class="message"><?= htmlspecialchars($message) ?></div><?php endif; ?>
    <form method="POST">
      <label>Title</label>
      <input type="text" name="title" required>
      <label>Description</label>
      <textarea name="description" rows="4" required></textarea>
      <label>Due Date</label>
      <input type="date" name="due_date" required>
      <button type="submit">Submit</button>
    </form>
    <a href="view_work_orders.php">← View All Work Orders</a>
  </div>
</body>
</html>