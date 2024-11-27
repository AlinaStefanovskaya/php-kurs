<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}


$orderNumber = $_POST['orderNumber'];
$orderWeight = $_POST['orderWeight'];
$city = $_POST['city'];
$deliveryType = $_POST['deliveryType'];
$branchOrLocker = $_POST['branchOrLocker'];


if (empty($orderNumber) || empty($orderWeight) || empty($city) || empty($deliveryType) || empty($branchOrLocker)) {
    echo "Будь ласка, заповніть всі поля.";
    exit();
}

$stmt = $conn->prepare("INSERT INTO orders (orderNumber, orderWeight, city, deliveryType, branchOrLocker) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sdsss", $orderNumber, $orderWeight, $city, $deliveryType, $branchOrLocker);

if ($stmt->execute()) {
    echo "Замовлення успішно збережено.";
} else {
    echo "Помилка збереження замовлення: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
