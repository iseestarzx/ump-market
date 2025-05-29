<?php
class OrderController {
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

    public function showUserOrders() {
        $this->requireLogin();

        $userId = $_SESSION['user_id'];

        // Получаем заказы пользователя
        $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Получаем товары для каждого заказа
        $stmtItems = $this->pdo->prepare("
            SELECT oi.*, p.title 
            FROM order_items oi 
            JOIN products p ON oi.product_id = p.id 
            WHERE oi.order_id = ?
        ");

        foreach ($orders as $index => $order) {
            $stmtItems->execute([$order['id']]);
            $orders[$index]['items'] = $stmtItems->fetchAll(PDO::FETCH_ASSOC);
        }

        

        require_once __DIR__ . '/../views/my_orders.php';
    }
}
