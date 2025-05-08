<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sidebar</title>
  
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f5f5;
    }

    .sidebar {
      width: 250px;
      background-color: #ffffff;
      border-right: 1px solid #e0e0e0;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;  /* Align items to start */
      position: fixed;
      height: 100vh;
      padding: 20px;
    }

    .logo h2 {
      font-size: 22px;
      color: #003049;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .profile {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 20px 0;
      border-bottom: 1px solid #eee;
    }

    .profile img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }

    .profile-info {
      display: flex;
      flex-direction: column;
    }

    .profile-info .name {
      font-weight: bold;
      font-size: 14px;
    }

    .profile-info .email {
      font-size: 12px;
      color: #777;
    }

    .menu-section {
      flex-grow: 1;
      margin-top: 30px;
    }

    .menu-group h4 {
      font-size: 12px;
      color: #999;
      margin: 20px 0 10px;
      text-transform: uppercase;
    }

    .menu-group a {
      text-decoration: none;
      color: #003049;
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 0;
      transition: 0.3s;
      position: relative;
    }

    .menu-group a:hover {
      color: #219ebc;
    }

    .badge {
      font-size: 12px;
      padding: 2px 8px;
      border-radius: 12px;
      margin-left: auto;
    }

    .green {
      background-color: #90be6d;
      color: white;
    }

    .yellow {
      background-color: #f9c74f;
      color: white;
    }

    .main-content {
      margin-left: 250px;
      padding: 30px;
    }

    .main-content h1 {
      color: #003049;
    }

    /* You can customize more of your dashboard here */
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Profile section moved to the top -->
    <div class="profile">
      <img src="https://i.pravatar.cc/40" alt="Profile" />
      <div class="profile-info">
        <p class="name">John Doe</p>
        <p class="email">doeejon@gmail.com</p>
      </div>
    </div>

    <div class="menu-section">
      <div class="menu-group">
        <h4>MAIN</h4>
        <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#"><i class="fas fa-clipboard-list"></i> Job Schedule</a>
        <a href="#"><i class="fas fa-tasks"></i> Work Orders</a>
        <a href="#"><i class="fas fa-boxes"></i> Asset Inventory</a>
        <a href="#"><i class="fas fa-chart-line"></i> Reports</a>
        <a href="#"><i class="fas fa-calendar-alt"></i> Calendar</a>

      </div>

      <div class="menu-group">
        <h4>ACCOUNT</h4>
        <a href="#"><i class="fas fa-bell"></i> Notifications <span class="badge green">24</span></a>
        <a href="#"><i class="fas fa-comments"></i> Chat <span class="badge yellow">8</span></a>
        <a href="#"><i class="fas fa-life-ring"></i> Help & Support</a>
        <a href="#"><i class="fas fa-cog"></i> Settings</a>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <h1>Welcome to UtiliTrack!</h1>
    <p>This is where your existing dashboard content will go.</p>

    <div style="margin-top: 20px;">
      <h2>Tasks Overview</h2>
      <p>[Insert your tasks table or stats here]</p>
    </div>

    <div style="margin-top: 20px;">
      <h2>Recent Work Orders</h2>
      <p>[Insert your work orders section here]</p>
    </div>

    <!-- End of existing dashboard content -->
  </div>

</body>
</html>