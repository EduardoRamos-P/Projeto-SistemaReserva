<?php
    try {
        $host = "localhost";
        $dbname = "sistema_reserva";
        $usuario = "root";
        $senha = "";
        $pdo = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $usuario, $senha);
        // Configurar o PDO para lançar exceções em caso de erro
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>
