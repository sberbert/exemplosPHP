<?php
    $host = "143.106.241.4";
    $banco = "simone";
    $usuario = "simone";
    $senha = "simenome";
    $conn = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha); //dsn
    $conn->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);