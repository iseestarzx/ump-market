<?php
require_once __DIR__ . '/../models/userModel.php';

class LoginController {

public function login() {
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['name'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($login && $password) {
        $user = getUserByName($login);

        if ($user && password_verify($password, $user['password'])) { // проверка по функции getUserByName() и проверка соответствия с введенного пароля с его хэшем
            // Успешный вход
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['login'];
            $_SESSION['user_role'] = $user['role'];
            header("Location: index.php"); // или главная
            exit;
        } else {
            $message = "Неверный логин или пароль.";
        }
    } else {
        $message = "Введите имя и пароль.";
    }
}
require_once __DIR__ . '/../views/login.php';
}

public function logout()
    {
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();

        // Перенаправление
        header("Location: /");
        exit;
    }
}