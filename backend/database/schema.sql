CREATE DATABASE IF NOT EXISTS staff_management;
USE staff_management;

CREATE TABLE departments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  head_user_id INT DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  department_id INT DEFAULT NULL,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('main_head', 'department_head', 'employee') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL
);

CREATE TABLE leaves (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  department_id INT DEFAULT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  reason TEXT NOT NULL,
  status ENUM('pending_department_head', 'pending_main_head', 'approved', 'rejected') NOT NULL DEFAULT 'pending_department_head',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL
);

CREATE TABLE attendance (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  date DATE NOT NULL,
  in_time TIME DEFAULT NULL,
  out_time TIME DEFAULT NULL,
  status ENUM('present', 'absent') NOT NULL DEFAULT 'present',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uniq_user_date (user_id, date),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE holidays (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  holiday_date DATE NOT NULL UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE notifications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  message VARCHAR(255) NOT NULL,
  is_read TINYINT(1) DEFAULT 0,
  created_at DATETIME NOT NULL
);

INSERT INTO users (name, email, password, role) VALUES
('Main Head', 'admin@company.com', '$2y$10$KB57Vg9Uv7o8M90M3zyUQe0hShPvIXxGj8A6rEuB8fB20IRG7kfhq', 'main_head');
-- password: admin123
