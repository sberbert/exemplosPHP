<?php
    $host = "143.106.241.4";
    $banco = "simone";
    $usuario = "simone";
    $senha = "vida280112";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha); //dsn
    } catch (PDOException $e) {
        file_put_contents(
            "erros.log",
            date("d/m/Y H:i:s") . " - Erro na conexão: " . $e->getMessage() . PHP_EOL,
            FILE_APPEND
        );
        
        die("❌ Não foi possível conectar ao banco de dados. Tente novamente mais tarde.");
    }

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);