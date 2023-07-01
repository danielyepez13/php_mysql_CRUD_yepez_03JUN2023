CREATE DATABASE php_mysql_crud_yepez;

USE php_mysql_crud_yepez;

CREATE TABLE task(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

alter table task add image LONGBLOB;
DESCRIBE task;