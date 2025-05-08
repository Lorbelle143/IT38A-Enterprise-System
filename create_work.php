<?php
session_start();
require_once 'config.php'; // Connects to your database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $due_date = $_POST['due_date'] ?? '';

    if (empty($title) || empty($description) || empty($due_date)) {
        $_SESSION['work_order_error'] = "All fields are required.";
        header("Location: dashboard.php");
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO work_orders (title, description, due_date, created_by) VALUES (?, ?, ?, ?)");
    $created_by = $_SESSION['username'] ?? 'unknown';
    $stmt->bind_param("ssss", $title, $description, $due_date, $created_by);

    if ($stmt->execute()) {
        $_SESSION['work_order_success'] = "Work order created successfully.";
    } else {
        $_SESSION['work_order_error'] = "Failed to create work order.";
    }

    $stmt->close();
    $conn->close();

    header("Location: dashboard.php");
    exit;
}
?>
