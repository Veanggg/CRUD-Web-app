CREATE DATABASE IF NOT EXISTS todo_db;
USE todo_db;

CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL
);

INSERT INTO tasks (task) VALUES
('Finish school activity'),
('Review notes'),
('Submit assignment');
