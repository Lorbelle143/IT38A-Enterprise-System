<?php
// Start the session
session_start();

// Load work orders from the tasks.json file
$tasksFile = 'tasks.json';
if (file_exists($tasksFile)) {
    $tasksData = json_decode(file_get_contents($tasksFile), true);
} else {
    $tasksData = ['pending' => [], 'completed' => []];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Show Work Orders</title>
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

  </style>
</head>
<body>

  <div class="header">
    <h2>Show Work Orders</h2>
    <div class="user-icon">👤</div>
  </div>

  <div class="search-bar">
    <input type="text" placeholder="Search...">
  </div>

  <main class="content">
    <div class="card">
      <h3>Pending Work Orders</h3>
      <ul class="work-list">
        <?php foreach ($tasksData['pending'] as $task): ?>
          <li>
            <?php echo htmlspecialchars($task['task']); ?> (Created: <?php echo $task['created_at']; ?>)
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="card">
      <h3>Completed Work Orders</h3>
      <ul class="work-list">
        <?php foreach ($tasksData['completed'] as $task): ?>
          <li>
            <?php echo htmlspecialchars($task['task']); ?> (Completed on: <?php echo $task['created_at']; ?>)
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="card">
      <h3><a href="dashboard.php"><button>Back to Dashboard</button></a></h3>
    </div>

  </main>

</body>
</html>
