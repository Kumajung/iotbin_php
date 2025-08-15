<?php
$host = 'db';
$db   = getenv('MYSQL_DATABASE') ?: 'appdb';
$user = getenv('MYSQL_USER') ?: 'app';
$pass = getenv('MYSQL_PASSWORD') ?: 'app123';
$dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
  $pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);
  $stmt = $pdo->query('SELECT NOW() AS now_time');
  $row = $stmt->fetch();
  echo "DB connected! Current time: " . $row['now_time'];
} catch (Throwable $e) {
  http_response_code(500);
  echo "DB connect error: " . $e->getMessage();
}
