<?php
function registerUser($name, $password) {
    try {
        $pdo = new PDO('mysql:host=market.yasuo.ru;dbname=marketdb', 'pvlxqts', 'ko$%21C219x2@;;');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (login, password) VALUES (?, ?)");
        return $stmt->execute([$name, $hash]);

    } catch (PDOException $e) {
        // Для отладки можно вывести ошибку, но лучше логировать
        // echo "Ошибка PDOы: " . $e->getMessage();

        // Или для продакшена логируем в файл:
        // error_log("PDO Error: " . $e->getMessage());

        // Возвращаем false, чтобы контроллер знал, что регистрация не удалась
        return false;
    }
}

function getUserByName($name) { // поиск юзера по имени в бд
    try {
        $pdo = new PDO('mysql:host=market.yasuo.ru;dbname=marketdb', 'pvlxqts', 'ko$%21C219x2@;;');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT id, login, password, role FROM users WHERE login = ?");
        $stmt->execute([$name]); // передаем значение вместо ?^
        return $stmt->fetch(PDO::FETCH_ASSOC); // возвращает массив пользователя или false
    } catch (PDOException $e) {
        return false;
    }

}
