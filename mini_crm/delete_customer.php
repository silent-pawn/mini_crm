<?php
include 'auth.php';
include 'db.php';

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);

    $stmt = $conn->prepare("DELETE FROM customers WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: customers.php");
        exit();
    } else {
        echo "❌ Hata oluştu: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Geçerli bir ID belirtilmedi.";
}

$conn->close();
?>