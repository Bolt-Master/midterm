#create database
CREATE DATABASE shop_db;
#create user
CREATE USER 'shop_db_admin'@'localhost' IDENTIFIED BY 'Q1w2E3';
#grant access to a new user
GRANT ALL PRIVILEGES ON shop_db.* TO 'shop_db_admin'@'localhost';
#create table
CREATE TABLE shop_db_table
(
  item_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  item_name VARCHAR(256) NOT NULL,
  item_price FLOAT(16) NOT NULL,
  item_comment VARCHAR(512) NOT NULL
)
