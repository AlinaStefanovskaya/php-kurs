<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Помилка підключення до бази даних: " . $e->getMessage();
}
?>
