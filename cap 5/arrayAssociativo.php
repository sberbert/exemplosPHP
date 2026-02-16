<?php
    $usuario = [
        "nome" => "Simone",
        "email" => "simone@email.com",
        "perfil" => "Admin"
    ];

    echo $usuario["nome"];

    //percorrendo
    foreach ($usuario as $chave => $valor) {
        echo "<p>$chave: $valor</p>";
    }