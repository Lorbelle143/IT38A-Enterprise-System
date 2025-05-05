<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: row;
      height: 100vh;
      background-color: #f9f9f9;
    }

    /* Sidebar Styles */
    .sidebar {
      width: 250px;
      background-color: #007bff;
      color: white;
      position: fixed;
      height: 100%;
      top: 0;
      left: -250px;
      transition: 0.3s;
      display: flex;
      flex-direction: column;
      padding-top: 20px;
    }

    .sidebar.open {
      left: 0;
    }

    .sidebar h2 {
      margin: 0;
      font-size: 24px;
      margin-bottom: 30px;
      text-align: center;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      font-size: 18px;
      margin-bottom: 15px;
      padding-left: 20px;
      transition: 0.3s;
    }

    .sidebar a:hover {
      color: #ddd;
    }

    .hamburger-menu {
      font-size: 30px;
      cursor: pointer;
      position: fixed;
      top: 20px;
      left: 20px;
      z-index: 1000;
    }

    /* Main Content Styles */
    .main-content {
      margin-left: 0;
      padding: 20px;
      width: 100%;
      transition: margin-left 0.3s;
    }

    .header {
      background-color: #007bff;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid #aaa;
    }

    .header h2 {
      margin: 0;
      color: white;
    }

    .header .user-icon {
      font-size: 24px;
      cursor: pointer;
    }

    .search-bar {
      margin: 20px 0;
      display: flex;
      justify-content: center;
    }

    .search-bar input {
      padding: 10px;
      border-radius: 15px;
      border: 1px solid #ccc;
      width: 300px;
    }

    .content {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
      padding: 20px;
    }

    .card {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .card h3 {
      margin-top: 0;
      margin-bottom: 10px;
    }

    .task-list, .work-list {
      list-style: none;
      padding-left: 0;
    }

    .task-list li, .work-list li {
      margin: 5px 0;
      padding-left: 10px;
      border-left: 3px solid #ccc;
    }

    .checkbox {
      margin-right: 5px;
    }

    .card button {
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      margin-top: 10px;
    }

    .card button:hover {
      background-color: #0056b3;
    }

    .create-work-order {
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      margin: 20px;
    }

    .hidden {
      display: none;
    }

    .create-work-order input,
    .create-work-order textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .create-work-order button {
      padding: 10px 15px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      margin-right: 10px;
      cursor: pointer;
    }

    .create-work-order button:hover {
      background-color: #0056b3;
    }

    .cancel-btn {
      background-color: #ccc;
      color: black;
    }

    .cancel-btn:hover {
      background-color: #999;
    }

    .work-orders-list {
      display: none;
      padding: 15px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      margin-top: 20px;
    }

    .work-orders-list ul {
      list-style: none;
      padding-left: 0;
    }

    .work-orders-list li {
      padding: 10px;
      border-bottom: 1px solid #eee;
    }
  </style>
</head>
<body>

  <!-- Hamburger Menu Icon -->
  <div class="hamburger-menu" onclick="toggleSidebar()">☰</div>

  <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
    <h2>Dashboard</h2>
    <a href="profile.php">Profile</a>
    <!-- Removed the Work Orders link -->
    <a href="tasks.php">Tasks</a>
    <a href="reports.php">Reports</a>
    <a href="settings.php">Settings</a>
    <a href="logout.php">Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">

    <!-- Header -->
    <div class="header">
      <h2>Welcome to the Dashboard</h2>
      <div class="user-icon">👤</div>
    </div>

    <!-- Search Bar -->
    <div class="search-bar">
      <input type="text" placeholder="Search...">
    </div>

    <!-- Main Dashboard Content -->
    <div class="content">
      <div class="card">
        <h3>Dashboard</h3>
        <ul class="task-list">
          <li>Work order overview</li>
          <li>Assign Task</li>
          <li>Task Status</li>
        </ul>
      </div>

      <div class="card">
        <h3>Work Orders</h3>
        <ul class="work-list">
          <li><button onclick="showWorkOrders()">Show Work Orders</button></li>
        </ul>
      </div>

      <div class="card">
        <h3>Pending Task</h3>
        <ul class="task-list">
          <li>Fix server issue</li>
          <li>Review report</li>
        </ul>
      </div>

      <div class="card">
        <h3>Completed Task</h3>
        <ul class="task-list">
          <li><input type="checkbox" class="checkbox" checked>Backup done</li>
          <li><input type="checkbox" class="checkbox" checked>System updated</li>
        </ul>
      </div>

      <div class="card">
        <h3>Create Work Orders</h3>
        <button onclick="showWorkOrder()">➕ New Order</button>
      </div>

      <div class="card" style="grid-column: 1 / -1;">
        <h3>Reports</h3>
        <p>No reports available.</p>
      </div>
    </div>

    <!-- Work Order Form (hidden initially) -->
    <div id="create-work-order" class="create-work-order hidden">
      <h3>Create New Work Order</h3>
      <form>
        <label>
          Title:
          <input type="text" placeholder="Enter title" required>
        </label><br>
        <label>
          Description:
          <textarea placeholder="Describe the task" required></textarea>
        </label><br>
        <label>
          Due Date:
          <input type="date" required>
        </label><br>
        <button type="submit">Submit</button>
        <button type="button" class="cancel-btn" onclick="hideWorkOrder()">Cancel</button>
      </form>
    </div>

    <!-- Work Orders List (hidden initially) -->
    <div id="work-orders-list" class="work-orders-list">
      <h3>Work Orders List</h3>
      <ul>
        <li>Work Order #1: Fix server issue</li>
        <li>Work Order #2: Update software</li>
        <li>Work Order #3: Backup system</li>
      </ul>
    </div>

  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const mainContent = document.querySelector('.main-content');
      sidebar.classList.toggle('open');
      mainContent.style.marginLeft = sidebar.classList.contains('open') ? '250px' : '0';
    }

    function showWorkOrder() {
      document.getElementById('create-work-order').classList.remove('hidden');
      window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    }

    function hideWorkOrder() {
      document.getElementById('create-work-order').classList.add('hidden');
    }

    // Function to show work orders
    function showWorkOrders() {
      const workOrdersList = document.getElementById('work-orders-list');
      workOrdersList.classList.toggle('hidden');
    }
  </script>

</body>
</html>