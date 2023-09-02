<?php

$hostname = "localhost";
$username = "root";
$password = "qw3rty1234";
$database = "php_pdo_db";

$dsn = "mysql:host=" . $hostname . ";dbname=" . $database;

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}

// return object by default instead of assoc
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
