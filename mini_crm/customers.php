<?php
include 'db.php';

$query = "SELECT * FROM customers";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Sorgu hatası: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıtlı Müşteriler</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>✅ Kayıtlı Müşteriler</h1>
    <a href="index.php" class="back-link">⬅️ Ana Menüye Dön</a>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Ad Soyad</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Kayıt Tarihi</th>
            <th>İşlem</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td><?= $row['created_at'] ?></td>
                <td>
                    <a href="edit_customer.php?id=<?= $row['id'] ?>">✏️ Düzenle</a> |
                    <a href="delete_customer.php?id=<?= $row['id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')">🗑️ Sil</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>