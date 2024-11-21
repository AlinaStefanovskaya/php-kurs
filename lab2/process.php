<?php
$target_dir = "uploads/";
$file = $_FILES['fileToUpload'];
$target_file = $target_dir . basename($file["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$allowed_types = ['jpg', 'jpeg', 'png'];
if (!in_array($fileType, $allowed_types)) {
    echo "Дозволені лише зображення (jpg, jpeg, png).";
    $uploadOk = 0;
}

if ($file["size"] > 2 * 1024 * 1024) {
    echo "Розмір файлу не повинен перевищувати 2 МБ.";
    $uploadOk = 0;
}

if (file_exists($target_file)) {
    $target_file = $target_dir . pathinfo($file["name"], PATHINFO_FILENAME) . "_" . time() . "." . $fileType;
}

if ($uploadOk && move_uploaded_file($file["tmp_name"], $target_file)) {
    echo "Файл " . basename($file["name"]) . " успішно завантажено.<br>";
    echo "Ім'я файлу: " . basename($file["name"]) . "<br>";
    echo "Тип: " . $fileType . "<br>";
    echo "Розмір: " . round($file["size"] / 1024, 2) . " KB<br>";
    echo "<a href='" . $target_file . "'>Завантажити файл</a>";
} else {
    echo "Вибачте, сталася помилка при завантаженні вашого файлу.";
}
?>
