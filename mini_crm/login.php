<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Demo kullanıcı adı/şifre
    if ($username === "admin" && $password === "1234") {
        $_SESSION["logged_in"] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Hatalı kullanıcı adı veya şifre!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>🔐 CRM Giriş</h2>

    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Kullanıcı Adı:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Şifre:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Giriş Yap">
    </form>
</body>
</html>