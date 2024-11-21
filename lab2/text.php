<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['textData'];
    // Запис тексту у файл log.txt
    file_put_contents('log.txt', $text . PHP_EOL, FILE_APPEND);
    echo "Текст успішно збережено.<br>";
}

echo "<h2>Вміст файлу log.txt:</h2>";
if (file_exists('log.txt')) {
    echo nl2br(file_get_contents('log.txt'));
} else {
    echo "Файл log.txt поки порожній.";
}
?>
