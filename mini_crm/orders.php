<?php
include 'auth.php';
include 'db.php';

$result = $conn->query("SELECT 
    orders.id, 
    customers.name AS customer_name, 
    orders.product, 
    orders.quantity, 
    orders.order_date
FROM orders
JOIN customers ON orders.customer_id = customers.id
ORDER BY orders.order_date DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sipariş Listesi</title>
    <link rel="stylesheet" href="style.css">
    <a href="index.php" class="back-link">⬅️ Ana Menüye Dön</a>
</head>
<body>
    <h2>📦Siparişler</h2>
    
    <p><a href="add_order.php">➕ Yeni Sipariş Ekle</a></p>


    <table border="1">
    <tr>
        <th>Müşteri ID</th>
        <th>Ürün</th>
        <th>Adet</th>
        <th>Tarih</th>
    </tr>

    <?php
    include("db.php"); 
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["customer_id"] . "</td>
                <td>" . $row["product"] . "</td>
                <td>" . $row["quantity"] . "</td>
                <td>" . $row["order_date"] . "</td>
              </tr>";
    }
    ?>
</table>
</body>
</html>