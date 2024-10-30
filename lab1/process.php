<?php
// Перевірка, чи дані були отримані
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримуємо дані з форми
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];

    // Перевірка на пусті значення
    if (empty($firstName) || empty($lastName)) {
        echo "Будь ласка, заповніть всі поля.";
    } else {
        // Виводимо привітання користувачу
        echo "Привіт, $firstName $lastName!";
    }
} else {
    echo "Дані не були надіслані.";
}
?>