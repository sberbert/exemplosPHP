<?php

    $usuarios = [
        [
            "nome" => "Ana",
            "perfil" => "Admin"
        ],
        [
            "nome" => "Carlos",
            "perfil" => "User"
        ]
    ];

    //percorrendo
    foreach ($usuarios as $usuario) {
        echo "<b>{$usuario['nome']}</b><br>";
        echo "{$usuario['perfil']}<br><br>";
    }