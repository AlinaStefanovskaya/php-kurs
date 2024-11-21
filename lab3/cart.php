<?php
include('session_timeout.php'); 

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}

if (isset($_POST['add_to_cart'])) {
    $item = $_POST['item'];
    $_SESSION['cart'][] = $item;
}

if (isset($_SESSION['cart'])) {
    setcookie('previous_cart', implode(',', $_SESSION['cart']), time() + 3600 * 24 * 7, "/");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user_id']; ?>!</h1>
    <p>Your Shopping Cart:</p>

    <form method="POST" action="">
        <label for="item">Item:</label>
        <input type="text" name="item" id="item" required>
        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

    <h3>Current Cart:</h3>
    <ul>
        <?php
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                echo "<li>$item</li>";
            }
        }
        ?>

        <?php
        if (isset($_COOKIE['previous_cart'])) {
            echo "<h3>Previous Purchases:</h3><ul>";
            $previous_cart = explode(',', $_COOKIE['previous_cart']);
            foreach ($previous_cart as $item) {
                echo "<li>$item</li>";
            }
            echo "</ul>";
        }
        ?>
    </ul>

    <form method="GET" action="session_info.php">
        <button type="submit">Check Session Info</button>
    </form>

    <a href="logout.php">Logout</a>
</body>
</html>
