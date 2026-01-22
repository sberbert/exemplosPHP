<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>PHP - Funções Essenciais</title>
</head>
<body>

<?php
echo "<h2>Funções Essenciais no PHP</h2>";
echo "<p>Funções permitem reutilizar código e organizar melhor o programa.</p><hr>";

// ------------------------------------------------------
// 1) Função simples (sem parâmetro e sem retorno)
// ------------------------------------------------------
echo "<h3>Função simples</h3>";

function mensagem() {
  echo "Olá! Esta mensagem veio de uma função.<br>";
}

mensagem();
echo "<hr>";

// ------------------------------------------------------
// 2) Função com parâmetros
// ------------------------------------------------------
echo "<h3>Função com parâmetros</h3>";

function saudacao($nome) {
  echo "Olá, $nome!<br>";
}

saudacao("Maria");
saudacao("João");
echo "<hr>";

// ------------------------------------------------------
// 3) Função com retorno
// ------------------------------------------------------
echo "<h3>Função com retorno</h3>";

function soma($a, $b) {
  return $a + $b;
}

$resultado = soma(10, 5);
echo "Resultado da soma: $resultado<br>";
echo "<hr>";

// ------------------------------------------------------
// 4) Parâmetro com valor padrão
// ------------------------------------------------------
echo "<h3>Parâmetro com valor padrão</h3>";

function calcularDesconto($valor, $percentual = 10) {
  return $valor - ($valor * $percentual / 100);
}

echo "Desconto padrão (10%): " . calcularDesconto(100) . "<br>";
echo "Desconto personalizado (20%): " . calcularDesconto(100, 20) . "<br>";
echo "<hr>";

// ------------------------------------------------------
// 5) Tipagem opcional (introdução)
// ------------------------------------------------------
echo "<h3>Tipagem opcional</h3>";

function multiplicar(int $a, int $b): int {
  return $a * $b;
}

echo "Multiplicação: " . multiplicar(4, 5) . "<br>";
echo "<hr>";

// ------------------------------------------------------
// 6) Função usando array
// ------------------------------------------------------
echo "<h3>Função com array</h3>";

function media(array $notas) {
  $total = array_sum($notas);
  return $total / count($notas);
}

$notasAluno = [7, 8, 9];
echo "Média do aluno: " . media($notasAluno) . "<br>";
echo "<hr>";

// ------------------------------------------------------
// 7) Escopo de variáveis
// ------------------------------------------------------
echo "<h3>Escopo de variáveis</h3>";

$valor = 10;

function mostrarValor() {
  // $valor aqui NÃO é o mesmo da variável global
  $valor = 5;
  echo "Valor dentro da função: $valor<br>";
}

mostrarValor();
echo "Valor fora da função: $valor<br>";
echo "<hr>";
?>
</body>
</html>