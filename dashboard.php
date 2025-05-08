<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fef6ec;
      margin: 0;
    }

    .header {
      background-color: #cce5ff;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid #aaa;
    }

    .header h2 {
      margin: 0;
    }

    .header .user-icon {
      font-size: 24px;
      cursor: pointer;
    }

    .search-bar {
      margin: 20px;
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

  <div class="header">
    <h2>DASHBOARD</h2>
    <div class="user-icon">👤</div>
  </div>

  <div class="search-bar">
    <input type="text" placeholder="Search...">
  </div>

  <main class="content">
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
      <a href="create_work.php"><button>➕ New Order</button></a>
    </div>

    <div class="card" style="grid-column: 1 / -1;">
      <h3>Reports</h3>
      <p>No reports available.</p>
    </div>
  </main>

  <!-- Work Orders List (hidden initially) -->
  <div id="work-orders-list" class="work-orders-list">
    <h3>Work Orders List</h3>
    <ul>
      <li>Work Order #1: Fix server issue</li>
      <li>Work Order #2: Update software</li>
      <li>Work Order #3: Backup system</li>
    </ul>
  </div>

  <script>
    function showWorkOrders() {
      const workOrdersList = document.getElementById('work-orders-list');
      workOrdersList.classList.toggle('hidden');
    }
  </script>

</body>
</html>
