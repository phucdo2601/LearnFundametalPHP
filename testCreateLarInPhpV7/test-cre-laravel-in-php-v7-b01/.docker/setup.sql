-- create the databases
CREATE DATABASE IF NOT EXISTS projectone;

-- create the users for each database
CREATE USER 'phucdn'@'%' IDENTIFIED BY '12345678A@';
GRANT CREATE, ALTER, INDEX, LOCK TABLES, REFERENCES, UPDATE, DELETE, DROP, SELECT, INSERT ON `projectone`.* TO 'phucdn'@'%';

FLUSH PRIVILEGES;