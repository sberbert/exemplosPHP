<?php

// 1. Declarando um array com nome e idade
$pessoa = [
    "nome" => "Maria",
    "idade" => 25
];

// 2. Exibindo os dados com echo
echo "Nome: " . $pessoa["nome"] . "<br>";
echo "Idade: " . $pessoa["idade"] . "<br><br>";

// 3. Função que retorna uma mensagem
function mensagem($nome) {
    return "Seja bem-vinda, $nome!";
}

// Chamando a função
echo mensagem($pessoa["nome"]);