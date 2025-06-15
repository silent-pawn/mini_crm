<?php
include 'auth.php';
include 'db.php';

if (!isset($_GET['id'])) {
    die("ID belirtilmedi.");
}

$id = $_GET['id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $stmt = $conn->prepare("UPDATE customers SET name=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $phone, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: customers.php");
    exit();
}

// Mevcut müşteri bilgilerini getir
$stmt = $conn->prepare("SELECT * FROM customers WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$customer = $result->fetch_assoc();
$stmt->close();

if (!$customer) {
    die("Müşteri bulunamadı.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Müşteri Düzenle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>✏️ Müşteri Düzenle</h2>
    <p><a href="customers.php">🔙 Müşteri Listesine Dön</a></p>

    <form method="POST">
        <label>Ad Soyad:</label><br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($customer['name']); ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>" required><br><br>

        <label>Telefon:</label><br>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>" required><br><br>

        <input type="submit" value="Güncelle">
    </form>
</body>
</html>