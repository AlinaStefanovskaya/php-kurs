<?php
session_start();
include('db.php');  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

                
        if (!$conn) {
            die("Помилка з'єднання з базою даних: " . mysqli_connect_error());
        }

        
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $user = mysqli_fetch_assoc($result);
            
            if (password_verify($password, $user['password'])) {
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['email'];
                $response['username'] = $user['username'];
                echo "Успішний вхід!";
            } else {
                echo "Невірний пароль";
            }
        } else {
            echo "Користувач з такою електронною поштою не знайдений";
        }
    } else {
        echo "Будь ласка, введіть електронну пошту та пароль";
    }
    return $response;
}
?>
