<?php
session_start();

if (!isset($_SESSION['last_activity'])) {
    $_SESSION['last_activity'] = time();
}

if (time() - $_SESSION['last_activity'] > 300) {
    session_unset();
    session_destroy();
    header("Location: login_form.php");
    exit();
}

$_SESSION['last_activity'] = time();
?>
