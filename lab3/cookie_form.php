<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    setcookie('username', $username, time() + 3600 * 24 * 7, "/");
}

if (isset($_COOKIE['username'])) {
    echo "<p>Привіт, " . $_COOKIE['username'] . "!</p>";
} else {
    echo "<p>Привіт, новий користувачу!</p>";
}
?>

<form method="POST" action="">
    <label for="username">Введіть ваше ім'я:</label>
    <input type="text" name="username" id="username" required>
    <button type="submit">Зберегти ім'я</button>
</form>

<?php
if (isset($_COOKIE['username'])) {
    echo '<form method="POST" action="cookie_form.php">
            <button type="submit" name="delete_cookie">Видалити cookie</button>
          </form>';
}

if (isset($_POST['delete_cookie'])) {
    setcookie('username', '', time() - 3600, "/");
    header("Location: cookie_form.php");
    exit();
}
?>
