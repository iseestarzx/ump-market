<?php
require_once __DIR__ . '/../models/mainModel.php';

class MainPageController {

public function helloUser() {
if (isset($_SESSION['user_name'])) {
        return [
            'message' => "Привет, " . htmlspecialchars($_SESSION['user_name']) . "!",
            'show_register_link' => false
        ];
} else {
        return [
            'message' => "Вы не авторизованы",
            'show_register_link' => true
        ];
}
}
    public function showProducts() {
    return $products = getProducts(); // получаем из модели
    }



}
// Создаём контроллер и получаем данные
$controller = new MainPageController();
$data = $controller->helloUser();
$products = $controller->showProducts();

// Подключаем view и передаём в него $data
require_once __DIR__ . '/../views/mainpage.php';
?>