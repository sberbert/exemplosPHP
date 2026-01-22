<?php
header('Content-Type: application/json');

echo json_encode([
    "nome" => "Simone",
    "perfil" => "Admin"
]);

//colocar para executar para poder consumir com JS
//usar o servidor interno do PHP na porta 8000