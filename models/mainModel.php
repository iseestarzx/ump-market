<?php
function getProducts() {
        try {
        $pdo = new PDO('mysql:host=market.yasuo.ru;dbname=marketdb', 'pvlxqts', 'ko$%21C219x2@;;');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT id, category, title, description, price, image, xqty FROM products");
        $stmt->execute(); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {

        echo "Ошибка PDO: " . $e->getMessage();

        return false;
    }
}
?>
