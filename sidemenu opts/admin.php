<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>UtiliTrack Dashboard</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f5f8ff;
      margin: 0;
      color: #333;
    }

    .header {
      background-color: #2f80ed;
      color: white;
      padding: 15px 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header h2 {
      margin: 0;
    }

    .dashboard {
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
    }

    .card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
      padding: 20px;
    }

    .card h4 {
      margin-top: 0;
    }

    .stat-cards {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .stat {
      background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
      color: white;
      padding: 15px;
      border-radius: 10px;
      flex: 1;
      text-align: center;
    }

    .stat h3 {
      margin: 0;
      font-size: 20px;
    }

    .stat p {
      margin: 5px 0 0;
      font-size: 14px;
    }

    .progress-circle {
      width: 80px;
      height: 80px;
      border: 6px solid #2f80ed;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      margin: 0 auto;
    }

    .recent-orders table {
      width: 100%;
      border-collapse: collapse;
    }

    .recent-orders th, .recent-orders td {
      padding: 10px;
      text-align: left;
    }

    .recent-orders tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .status-delivered {
      color: green;
      font-weight: bold;
    }

    .status-canceled {
      color: red;
      font-weight: bold;
    }

    .chart-placeholder {
      height: 100px;
      background: #e8f0fe;
      border-radius: 8px;
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <div class="header">
    <h2>UtiliTrack Admin Dashboard</h2>
    <div>👤 <?php echo $_SESSION['username'] ?? 'User'; ?></div>
  </div>

  <div class="dashboard">

    <div class="card stat-cards">
      <div class="stat">
        <h3>54,235</h3>
        <p>Customers</p>
      </div>
      <div class="stat">
        <h3>$980,632</h3>
        <p>Income</p>
      </div>
      <div class="stat">
        <h3>5,490</h3>
        <p>Products Sold</p>
      </div>
    </div>

    <div class="card">
      <h4>Data Analytics Overview</h4>
      <p>See how your account grows and how you can boost it.</p>
      <div class="progress-circle">Start</div>
    </div>

    <div class="card">
      <h4>Upgrade to Pro</h4>
      <img src="https://cdn-icons-png.flaticon.com/512/1170/1170576.png" alt="Pro Icon" width="100">
      <p><strong>$29 p/m</strong></p>
      <p>100% insurance for your goods</p>
    </div>

    <div class="card">
      <h4>Finance Flow</h4>
      <p><strong>$2,530</strong> <br>September 2021</p>
      <div class="chart-placeholder"></div>
    </div>

    <div class="card recent-orders" style="grid-column: 1 / -1;">
      <h4>Recent Orders</h4>
      <table>
        <thead>
          <tr>
            <th>Order #</th>
            <th>Product</th>
            <th>Date</th>
            <th>Price</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#1235465</td>
            <td>DJI Mavic Pro 2</td>
            <td>Sep 16, 2021</td>
            <td>$42.00</td>
            <td class="status-delivered">Delivered</td>
          </tr>
          <tr>
            <td>#1235468</td>
            <td>iPad Pro 2017 Model</td>
            <td>Sep 15, 2021</td>
            <td>$932.00</td>
            <td class="status-canceled">Canceled</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

</body>
</html>