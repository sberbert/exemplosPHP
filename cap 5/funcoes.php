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

    // count()
    echo count($usuarios);

    echo "<hr>";

    //in_array()
    $perfis = ["Admin", "User"];
    if (in_array("Admin", $perfis)) {
        echo "Perfil válido";
    }

    echo "<hr>";

    //array_push()
    $nomes = ["Ana"];
    array_push($nomes, "Carlos");
    print_r($nomes);

    echo "<hr>";

    //array_filter()
    $numeros = [10, 20, 30, 5, 8];

    $maiores = array_filter($numeros, function($n) {
        return $n > 10;
    });

    print_r($maiores);

    echo "<hr>";

    //array_map()
    $precos = [10, 20, 30];

    $precosComTaxa = array_map(function($preco) {
        return $preco * 1.1;
    }, $precos);

    print_r($precosComTaxa);
?>