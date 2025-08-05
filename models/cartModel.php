<?php

function getProductById($id) {
    $pdo = new PDO('mysql:host=xxx;dbname=marketdb', 'user', 'pass');
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product ?: null; // лучше вернуть null, если не найден
}



?>
