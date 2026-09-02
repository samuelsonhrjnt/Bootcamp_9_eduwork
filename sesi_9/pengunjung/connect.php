<?php
$host     = 'localhost';
$db_name  = 'bootcamp_9'; // Sesuaikan dengan nama database Anda
$username = 'root';               // Username database Anda
$password = '';                   // Password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $username, $password);
    // Set error mode ke Exception untuk kemudahan debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
