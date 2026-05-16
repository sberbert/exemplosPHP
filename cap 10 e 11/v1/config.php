<?php
    //$conn = new mysqli("localhost", "root", "", "loja");
    $conn = new mysqli("143.106.241.4", "simone", "simenome", "simone");

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }
?>