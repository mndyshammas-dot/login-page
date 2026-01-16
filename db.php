<?php
// db.php

$databasePath = __DIR__ . '/database.db';

try {
    // Create (connect to) SQLite database in file
    $db = new PDO("sqlite:" . $databasePath);
    // Set errormode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create users table if not exists
    $query = "CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                email TEXT NOT NULL UNIQUE,
                password TEXT NOT NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
              )";
    
    $db->exec($query);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
