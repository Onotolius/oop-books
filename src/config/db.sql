CREATE DATABASE my_library CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE my_library;

CREATE TABLE books (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       title VARCHAR(255) NOT NULL,
                       author VARCHAR(255) NOT NULL,
                       year VARCHAR(10),
                       genre VARCHAR(100)
);
