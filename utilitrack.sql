-- 1. Departments Table
CREATE TABLE departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL,
    description TEXT
);

-- 2. Users Table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(100),
    email VARCHAR(100),
    role ENUM('admin', 'technician', 'manager') DEFAULT 'technician',
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES departments(department_id)
);

-- 3. Assets Table
CREATE TABLE assets (
    asset_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_name VARCHAR(100) NOT NULL,
    asset_type VARCHAR(50),
    location VARCHAR(100),
    status ENUM('active', 'inactive', 'under_maintenance') DEFAULT 'active'
);

-- 4. Work Orders Table
CREATE TABLE work_orders (
    work_order_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    assigned_to INT,
    asset_id INT,
    status ENUM('open', 'in_progress', 'completed', 'cancelled') DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (assigned_to) REFERENCES users(user_id),
    FOREIGN KEY (asset_id) REFERENCES assets(asset_id)
);

-- 5. Maintenance Logs Table
CREATE TABLE maintenance_logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT,
    work_order_id INT,
    performed_by INT,
    notes TEXT,
    date_performed DATE,
    FOREIGN KEY (asset_id) REFERENCES assets(asset_id),
    FOREIGN KEY (work_order_id) REFERENCES work_orders(work_order_id),
    FOREIGN KEY (performed_by) REFERENCES users(user_id)
);