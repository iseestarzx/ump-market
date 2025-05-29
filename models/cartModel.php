<?php
//Model — работает с корзиной (добавление, удаление, подсчёт).

function getProductById($id) {
    $pdo = new PDO('mysql:host=market.yasuo.ru;dbname=marketdb', 'pvlxqts', 'ko$%21C219x2@;;');
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product ?: null; // лучше вернуть null, если не найден
}



?>