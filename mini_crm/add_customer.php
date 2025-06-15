<?php
include 'auth.php';
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $stmt = $conn->prepare("INSERT INTO customers (name, email, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);
    $stmt->execute();
    $stmt->close();

    header("Location: customers.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Yeni Müşteri Ekle</title>
</head>
<body>
    <h2>➕ Yeni Müşteri Ekle</h2>
    <p><a href="index.php">⬅️ Ana Menüye Dön</a></p>

    <form method="POST">
        <label>Ad Soyad:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Telefon:</label><br>
        <input type="text" name="phone" required><br><br>

        <input type="submit" value="Ekle">
    </form>
</body>
</html>