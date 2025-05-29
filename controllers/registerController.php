<?php
require_once __DIR__ . '/../models/userModel.php';

class RegisterController {
public function register() {
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name && $password)  {
        if (registerUser($name, $password)) {
            $message = "Пользователь зарегистрирован!";
            header("Location: index.php?page=login");
            exit();
        } else {
            $message = "Ошибка при регистрации. Попробуй выбрать другой Логин";
        }
    } else {
        $message = "Пожалуйста, заполните все поля.";
    }
}


// Передаем $message в view
require_once __DIR__ . '/../views/register.php';
}
}