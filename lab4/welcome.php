<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ласкаво просимо</title>
</head>
<body>
    <h1>Ласкаво просимо, <?php echo $_SESSION['username']; ?>!</h1>
    <p>Це захищена сторінка.</p>
    <a href="logout.php">Вийти</a>
</body>
</html>
