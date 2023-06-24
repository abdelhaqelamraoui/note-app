

CREATE DATABASE IF NOT EXISTS notesdb;

USE notesdb;


CREATE TABLE IF NOT EXISTS notes (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  creation_date DATE NOT NULL DEFAULT CURDATE(),
  creation_time TIME NOT NULL DEFAULT CURTIME(),
  modification_date DATE,
  modification_time TIME,
  content TEXT NOT NULL
);
