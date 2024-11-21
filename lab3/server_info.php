<?php
echo "<p>IP-адреса клієнта: " . $_SERVER['REMOTE_ADDR'] . "</p>";
echo "<p>Назва та версія браузера: " . $_SERVER['HTTP_USER_AGENT'] . "</p>";
echo "<p>Назва скрипта: " . $_SERVER['PHP_SELF'] . "</p>";
echo "<p>Метод запиту: " . $_SERVER['REQUEST_METHOD'] . "</p>";
echo "<p>Шлях до файлу на сервері: " . $_SERVER['SCRIPT_FILENAME'] . "</p>";
?>
