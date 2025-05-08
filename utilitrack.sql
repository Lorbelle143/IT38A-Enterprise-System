-- Drop existing tables if they exist (for clean setup)
DROP TABLE IF EXISTS reports;
DROP TABLE IF EXISTS job_schedule;
DROP TABLE IF EXISTS work_orders;

-- Work Orders Table
CREATE TABLE work_orders (
    work_order_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    status ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
    due_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Job Schedule Table
CREATE TABLE job_schedule (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    work_order_id INT,
    scheduled_date DATE,
    assigned_person VARCHAR(100),
    status ENUM('scheduled', 'rescheduled', 'done') DEFAULT 'scheduled',
    notes TEXT,
    FOREIGN KEY (work_order_id) REFERENCES work_orders(work_order_id)
        ON DELETE CASCADE
);

-- Reports Table
CREATE TABLE reports (
    report_id INT AUTO_INCREMENT PRIMARY KEY,
    work_order_id INT,
    report_title VARCHAR(150),
    report_body TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (work_order_id) REFERENCES work_orders(work_order_id)
        ON DELETE CASCADE
);

-- Sample Insert: Work Order
INSERT INTO work_orders (title, description, status, due_date)
VALUES 
('Fix server issue', 'Resolve the downtime in the main server.', 'pending', STR_TO_DATE('10/05/2025', '%d/%m/%Y')),
('Review report', 'Analyze the incident report and prepare feedback.', 'in_progress', STR_TO_DATE('12/05/2025', '%d/%m/%Y')),
('System updated', 'Routine update of ERP modules.', 'completed', STR_TO_DATE('08/05/2025', '%d/%m/%Y'));

-- Sample Insert: Job Schedule
INSERT INTO job_schedule (work_order_id, scheduled_date, assigned_person, status, notes)
VALUES 
(1, '2025-05-09', 'Technician John', 'scheduled', 'Server fix scheduled for Friday.'),
(2, '2025-05-10', 'Manager Claire', 'rescheduled', 'Report analysis rescheduled.'),
(3, '2025-05-07', 'IT Admin Leo', 'done', 'System update completed yesterday.');

-- Sample Insert: Reports
INSERT INTO reports (work_order_id, report_title, report_body)
VALUES 
(3, 'System Update Complete', 'All system modules updated and tested.'),
(1, 'Server Issue Resolved', 'Main server now stable. Issue resolved.'),
(2, 'Report Reviewed', 'Findings discussed in weekly meeting.');