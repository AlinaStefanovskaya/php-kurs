<?php
session_start();
include('db.php'); 
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}


$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id]);
$user = $stmt->fetch();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];
    $new_email = $_POST['email'];

    
    if (!empty($new_password)) {
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
    } else {
        
        $new_password = $user['password'];
    }

    
    $update_query = "UPDATE users SET username = ?, password = ?, email = ? WHERE id = ?";
    $stmt = $pdo->prepare($update_query);
    $stmt->execute([$new_username, $new_password, $new_email, $user_id]);

    
    echo "Профіль оновлено!";
}

?>


<form action="profile_edit.php" method="POST">
    <label for="username">Ім'я:</label>
    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>

    <label for="password">Новий пароль:</label>
    <input type="password" id="password" name="password"><br>

    <button type="submit">Оновити профіль</button>
</form>
