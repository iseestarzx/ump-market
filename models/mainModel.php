<?php
function getProducts() {
        try {
        $pdo = new PDO('mysql:host=market.yasuo.ru;dbname=marketdb', 'pvlxqts', 'ko$%21C219x2@;;');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT id, category, title, description, price, image, xqty FROM products");
        $stmt->execute(); // просто делается запрос true или false
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // получаем массив с данными

    } catch (PDOException $e) {
        // Для отладки можно вывести ошибку, но лучше логировать
        echo "Ошибка PDO: " . $e->getMessage();

        // Или для продакшена логируем в файл:
        // error_log("PDO Error: " . $e->getMessage());

        // Возвращаем false, чтобы контроллер знал, что регистрация не удалась
        return false;
    }
}
?>