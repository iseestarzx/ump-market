<?php
require_once('./includes/db.php');
session_start(); // сессия на всех страницах подключенных здесь
date_default_timezone_set('Asia/Yakutsk');
$page = $_GET['page'] ?? 'main'; // По умолчанию — регистрация

switch ($page) {
    case 'oferta':
        require_once __DIR__ . '/controllers/ofertaController.php';
        $controller = new OfertaController();
        $controller->showOferta();
        break;
    case 'faq':
        require_once __DIR__ . '/controllers/faqController.php';
        $controller = new FaqController();
        $controller->showFaq();
        break;
    case 'contacts':
        require_once __DIR__ . '/controllers/contactsController.php';
        $controller = new ContactsController();
        $controller->showContacts();
        break;
    case 'about':
        require_once __DIR__ . '/controllers/aboutController.php';
        $controller = new AboutController();
        $controller->showAbout();
        break;
    case 'register':
        require_once __DIR__ . '/controllers/registerController.php';
        $controller = new RegisterController();
        $controller->register();
        break;
    case 'login':
        require_once __DIR__ . '/controllers/loginController.php';
        $controller = new LoginController();
        $controller->login();
        break;
        //корзина
    case 'cart':
        require_once __DIR__ . '/includes/db.php';
        require_once __DIR__ . '/controllers/cartController.php';
        $controller = new CartController($pdo);
        $controller->showCart();
        break;
    case 'addToCart':
        require_once __DIR__ . '/controllers/cartController.php';
        $controller = new CartController($pdo);
        $controller->addToCart((int)$_GET['id']);
        break;
    case 'removeFromCart':
        require_once __DIR__ . '/controllers/cartController.php';
        $controller = new CartController($pdo);
        $controller->removeFromCart((int)$_GET['id']);
        break;
    case 'updateQuantity':
        require_once __DIR__ . '/controllers/cartController.php';
        $controller = new CartController($pdo);
        $controller->updateQuantity((int)$_GET['id'], $_GET['action']);
        break;
    case 'clearCart':
        require_once __DIR__ . '/controllers/cartController.php';
        $controller = new CartController($pdo);
        $controller->clearCart();
        break;
        //корзина
    case 'main':
        require_once __DIR__ . '/controllers/mainPageController.php';
        break;
    case 'logout':
        require_once __DIR__ . '/controllers/loginController.php';
        $controller = new LoginController();
        $controller->logout();
        break;
    case 'my_orders':
        require_once __DIR__ . '/controllers/orderController.php';
        $controller = new OrderController($pdo);
        $controller->showUserOrders();
        break;
    default:
        echo "Страница не найдена.";
}