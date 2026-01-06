<?php
try {
    $pdo = new PDO('mysql:host=mysql;port=3306;dbname=db', 'root', 'root');
    echo "Connected successfully\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
