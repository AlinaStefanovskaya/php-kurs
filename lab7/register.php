<?php
session_start();
require_once('db.php'); 

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Користувач з такою електронною поштою вже існує.";
} else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
    if (mysqli_query($conn, $insertQuery)) {
        $_SESSION['user'] = $username;
        echo "success";
    } else {
        echo "Помилка реєстрації.";
    }
}
?>
