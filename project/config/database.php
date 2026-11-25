<?php
// config/database.php
$host = 'localhost';
$db = 'db_latihan';
$user = 'root';
$pass = '';
try {
 $pdo = new PDO(
 "mysql:host=$host;dbname=$db;charset=utf8mb4",
 $user,
 $pass,
 [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
 );
} catch (PDOException $e) {
 // Detail error tidak ditampilkan kepada pengguna aplikasi
 error_log($e->getMessage());
 http_response_code(500);
 exit('Terjadi kesalahan pada koneksi database.');
}
?>
