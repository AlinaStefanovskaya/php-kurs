<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}

$last_activity = isset($_SESSION['last_activity']) ? $_SESSION['last_activity'] : 'Not set';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Information</title>
</head>
<body>
    <h1>Session Information</h1>

    <p><strong>User:</strong> <?php echo $_SESSION['user_id']; ?></p>
    <p><strong>Session Start Time:</strong> <?php echo date('Y-m-d H:i:s', $_SESSION['created']); ?></p>
    <p><strong>Last Activity Time:</strong> <?php echo date('Y-m-d H:i:s', $last_activity); ?></p>

    <?php
    if (isset($_SESSION['cart'])) {
        echo "<p><strong>Current Cart Items:</strong></p><ul>";
        foreach ($_SESSION['cart'] as $item) {
            echo "<li>$item</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No items in the cart.</p>";
    }
    ?>

    <p><a href="cart.php">Back to Cart</a> | <a href="logout.php">Logout</a></p>
</body>
</html>
