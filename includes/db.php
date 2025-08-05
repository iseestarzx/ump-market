<?php
$pdo = new PDO('mysql:host=xxx;dbname=marketdb', 'user', 'pass');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
