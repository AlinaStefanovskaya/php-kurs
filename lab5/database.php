<?php
$host = 'localhost';
$db = 'alina';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Підключення не вдалось: " . $mysqli->connect_error);
}
?>
