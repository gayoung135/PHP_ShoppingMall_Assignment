<?php
$host = 'localhost';
$user = 'root'; // XAMPP 기본값
$pass = '';     // XAMPP 기본값
$dbName = 'shop_db'; // 생성하신 DB명

$conn = mysqli_connect($host, $user, $pass, $dbName);

if (!$conn) {
    die("연결 실패: " . mysqli_connect_error());
}
?>
