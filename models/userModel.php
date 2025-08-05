<?php
function registerUser($name, $password) {
    try {
        $pdo = new PDO('mysql:host=xxx;dbname=marketdb', 'user', 'pass');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (login, password) VALUES (?, ?)");
        return $stmt->execute([$name, $hash]);

    } catch (PDOException $e) {
        return false;
    }
}

function getUserByName($name) {
        $pdo = new PDO('mysql:host=xxx;dbname=marketdb', 'user', 'pass');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT id, login, password, role FROM users WHERE login = ?");
        $stmt->execute([$name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }

}
