<?php

$hostname = "localhost";
$username = "root";
$password = "qw3rty1234";
$database = "php_pdo_db";

$dsn = "mysql:host=" . $hostname . ";dbname=" . $database;

$pdo = new PDO($dsn, $username, $password);

// return object by default instead of assoc
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
