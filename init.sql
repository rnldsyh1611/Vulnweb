CREATE DATABASE IF NOT EXISTS vulnweb;

-- Ubah password root
ALTER USER 'root'@'localhost' IDENTIFIED BY 'root';

-- Gunakan DB
USE vulnweb;

-- Buat tabel
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255),
  password VARCHAR(255)
);

-- User dummy
INSERT INTO users (username, password) VALUES ('admin', 'dockeradmin');
