<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini_crm";
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$mesaj = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST["customer_id"];
    $product = $_POST["product"];
    $quantity = $_POST["quantity"];

    if (!empty($customer_id) && !empty($product) && !empty($quantity)) {
        $sql = "INSERT INTO orders (customer_id, product, quantity, order_date)
                VALUES ('$customer_id', '$product', '$quantity', NOW())";

        if ($conn->query($sql) === TRUE) {
            $mesaj = "✅ Sipariş başarıyla eklendi.";
        } else {
            $mesaj = "❌ Hata: " . $conn->error;
        }
    } else {
        $mesaj = "⚠️ Lütfen tüm alanları doldurun.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Sipariş Oluştur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="number"],
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .message {
            text-align: center;
            color: #333;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Sipariş Oluştur</h2>
    <a href="index.php" class="back-link">⬅️ Ana Menüye Dön</a>
    <form method="post">
        <label>Müşteri ID:</label>
        <input type="number" name="customer_id" required>

        <label>Ürün Adı:</label>
        <input type="text" name="product" required>

        <label>Adet:</label>
        <input type="number" name="quantity" required>

        <input type="submit" value="Sipariş Oluştur">
    </form>

    <?php if (!empty($mesaj)) {
        echo "<div class='message'>$mesaj</div>";
    } ?>
</div>

</body>
</html>