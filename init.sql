-- Create database and tables
CREATE DATABASE IF NOT EXISTS school_admin CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE school_admin;

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255),
    email VARCHAR(255),
    role VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(100),
    course VARCHAR(100),
    day VARCHAR(20),
    time VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Example admin (password: admin123) - change after import
-- To generate hash in PHP: echo password_hash('admin123', PASSWORD_DEFAULT);
