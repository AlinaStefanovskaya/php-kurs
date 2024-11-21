<?php
$directory = 'uploads/';

if (is_dir($directory)) {
    $files = array_diff(scandir($directory), array('.', '..'));
    if (count($files) > 0) {
        echo "<h2>Список файлів у папці 'uploads':</h2>";
        echo "<ul>";
        foreach ($files as $file) {
            echo "<li><a href='{$directory}{$file}' download>{$file}</a></li>";
        }
        echo "</ul>";
    } else {
        echo "У папці 'uploads' немає файлів.";
    }
} else {
    echo "Папка 'uploads' не існує.";
}
?>
