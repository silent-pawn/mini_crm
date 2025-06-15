<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "mini_crm"; 

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}
?>