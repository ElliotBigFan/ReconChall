CREATE DATABASE IF NOT EXISTS ctf_db;
USE ctf_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE flags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    flag_name VARCHAR(50) NOT NULL,
    flag_value TEXT NOT NULL
);

-- Insert admin user with strong password
INSERT INTO users (username, password, is_admin) VALUES 
('admin', 'YWRtaW4xMjM=', TRUE);

-- Insert vulnerable user
INSERT INTO users (username, password, is_admin) VALUES 
('elliot', 'password', FALSE);

-- Insert flags
INSERT INTO flags (flag_name, flag_value) VALUES 
('db_flag', 'CTF{Database_Secrets_Are_Not_For_Everyone}');

