<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Mini CRM - Ana Menü</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu-box {
            background: white;
            padding: 40px 60px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 30px;
        }

        .menu-links a {
            display: block;
            margin: 12px 0;
            font-size: 18px;
            color: #007BFF;
            text-decoration: none;
            transition: 0.3s;
        }

        .menu-links a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .icon {
            font-size: 22px;
            margin-right: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="menu-box">
        <h1> Mini CRM Ana Menü</h1>
        <div class="menu-links">
            <a href="add_customer.php"><span class="icon">➕</span>Yeni Müşteri Ekle</a>
            <a href="customers.php"><span class="icon">✅</span>Kayıtlı Müşteriler</a>
            <a href="orders.php"><span class="icon">📦</span>Siparişler</a>
            <a href="add_order.php"><span class="icon">🛒</span>Sipariş Oluştur</a>
        </div>
    </div>
</div>
</body>
</html>