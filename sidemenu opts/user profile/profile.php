<?php

session_start();

$_SESSION['username'] = 'johndoe';
$_SESSION['first_name'] = 'John';
$_SESSION['last_name'] = 'Doe';
$_SESSION['email'] = 'john.doe@gmail.com';
$_SESSION['phone'] = '123-456-7890';

if (!isset($_SESSION['active_status'])) {
    $_SESSION['active_status'] = true;
}

// Handle active status toggle
if (isset($_POST['toggle_active'])) {
    $_SESSION['active_status'] = !$_SESSION['active_status'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>

<div class="profile-container">
    <div class="profile-header">
        <button class="menu-btn">☰</button>
    </div>

    <div class="profile-content">
        <div class="profile-picture"></div>

        <h1><?php echo htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']); ?></h1>
        <p>Utility Worker</p>

        <form method="POST" style="margin-bottom: 20px;">
            <button class="status-btn <?php echo $_SESSION['active_status'] ? 'active' : 'inactive'; ?>" type="submit" name="toggle_active">
                <?php echo $_SESSION['active_status'] ? 'Active' : 'Inactive'; ?>
            </button>
        </form>

        <div class="profile-buttons">
            <button onclick="editProfile()">Edit Profile</button>
            <button onclick="changePassword()">Change Password</button>
        </div>

        <div class="tabs">
            <span class="tab active">Account Settings</span>
            <span class="tab">Preferences</span>
            <span class="tab">Action</span>
        </div>

        <div class="profile-form">
            <label>Username</label>
            <input type="text" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly>

            <label>First Name</label>
            <input type="text" value="<?php echo htmlspecialchars($_SESSION['first_name']); ?>" readonly>

            <label>Last Name</label>
            <input type="text" value="<?php echo htmlspecialchars($_SESSION['last_name']); ?>" readonly>

            <label>Email Address</label>
            <input type="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" readonly>

            <label>Phone Number</label>
            <input type="text" value="<?php echo htmlspecialchars($_SESSION['phone']); ?>" readonly>
        </div>
    </div>
</div>

<script>
function editProfile() {
    alert('Edit Profile clicked! (You can open a form modal here)');
}

function changePassword() {
    alert('Change Password clicked! (You can open a password change modal here)');
}
</script>

</body>
</html>