<?php

$pdo = require 'db_connect.php';

$pdo->exec('CREATE TABLE users (
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL
)');

$pdo->query('CREATE TABLE url_mapping (
    user_id INTEGER,
    original_url VARCHAR(255),
    short_url VARCHAR(255) UNIQUE,
    follow_url INTEGER DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users (id)
)');
