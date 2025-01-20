<?php
$host = 'localhost';
$dbname = 'database';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("sqlite:" . __DIR__ . "/database.db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
