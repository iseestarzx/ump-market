<?php
//Controller — обрабатывает действия пользователя.
require_once __DIR__ . '/../models/cartModel.php';

class CartController {
private $pdo;

public function __construct($pdo) {
    $this->pdo = $pdo;
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}
private function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?page=login');
        exit;
    }
}

public function addToCart($productId) {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $this->requireLogin();

    $product = getProductById($productId);

    if ($product) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity']++;
        } else {
            $_SESSION['cart'][$productId] = [
                'product' => $product,
                'quantity' => 1
            ];
        }
    }

    header("Location: index.php?page=cart");
    exit;
}

public function removeFromCart($productId) {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $this->requireLogin();
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }

    header("Location: index.php?page=cart");
    exit;
}

public function updateQuantity($productId, $action) {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $this->requireLogin();

    // Получаем информацию о товаре
    $product = getProductById($productId);
    if (!$product) {
        // Продукт не найден, можно обработать ошибку или просто выйти
        header("Location: index.php?page=cart&error=product_not_found");
        exit;
    }


    if (isset($_SESSION['cart'][$productId])) {
        if ($action === 'increase') {
            // Проверка: не превышает ли текущее количество доступное на складе
            $currentQtyInCart = $_SESSION['cart'][$productId]['quantity'];
            if ($currentQtyInCart < $product['xqty']) {
                $_SESSION['cart'][$productId]['quantity']++;
            } else {
                // Можно передать сообщение об ошибке
                header("Location: index.php?page=cart&error=not_enough_stock");
                exit;
            }
        } elseif ($action === 'decrease') {
            $_SESSION['cart'][$productId]['quantity']--;
            if ($_SESSION['cart'][$productId]['quantity'] <= 0) {
                unset($_SESSION['cart'][$productId]);
            }
        }
    }

    header("Location: index.php?page=cart");
    exit;
}

public function clearCart() {
    $this->requireLogin();
    $_SESSION['cart'] = [];
    header("Location: index.php?page=cart");
    exit;
}

public function showCart() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $this->requireLogin();

    $cartItems = $_SESSION['cart'] ?? [];
    $errors = [];
    $formData = [
        'name' => '',
        'phone' => '',
        'address' => '',
        'delivery_method' => '',
        'payment_method' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Получаем данные из формы
        $formData['name'] = trim($_POST['name'] ?? '');
        $formData['phone'] = trim($_POST['phone'] ?? '');
        $formData['address'] = trim($_POST['address'] ?? '');
        $formData['delivery_method'] = $_POST['delivery_method'] ?? '';
        $formData['payment_method'] = $_POST['payment_method'] ?? '';

        // Валидация
        if (!$formData['name']) $errors[] = "Введите ФИО";
        if (!$formData['phone']) $errors[] = "Введите телефон";
        if (!$formData['address']) $errors[] = "Введите адрес";
        if (!$formData['delivery_method']) $errors[] = "Выберите способ доставки";
        if (!$formData['payment_method']) $errors[] = "Выберите способ оплаты";
        if (empty($cartItems)) $errors[] = "Корзина пуста";

        // Если ошибок нет — сохраняем заказ
        if (empty($errors)) {
            try {
                $this->pdo->beginTransaction();

                $total = 0;
                foreach ($cartItems as $item) {
                    $total += $item['product']['price'] * $item['quantity'];
                }

                // Вставка заказа
                $stmt = $this->pdo->prepare("
                        INSERT INTO orders (user_id, name, phone, address, delivery_method, payment_method, total, status, created_at)
                        VALUES (?, ?, ?, ?, ?, ?, ?, 'новый', NOW())
                    ");
                    $stmt->execute([
                    $_SESSION['user_id'],
                    $formData['name'],
                    $formData['phone'],
                    $formData['address'],
                    $formData['delivery_method'],
                    $formData['payment_method'],
                    $total
                    ]);

                $order_id = $this->pdo->lastInsertId();

                // Вставка товаров заказа
                $stmtItem = $this->pdo->prepare("
                    INSERT INTO order_items (order_id, product_id, quantity, price)
                    VALUES (?, ?, ?, ?)
                ");

                foreach ($cartItems as $item) {
                    $stmtItem->execute([
                        $order_id,
                        $item['product']['id'],
                        $item['quantity'],
                        $item['product']['price']
                    ]);
                }

                $this->pdo->commit();

                unset($_SESSION['cart']);

                require __DIR__ . '/../views/order_success.php';
                exit;

            } catch (Exception $e) {
                $this->pdo->rollBack();
                $errors[] = "Ошибка при оформлении заказа: " . $e->getMessage();
            }
        }
    }

    // Передаём данные в шаблон
    require __DIR__ . '/../views/cart.php';
}


}


