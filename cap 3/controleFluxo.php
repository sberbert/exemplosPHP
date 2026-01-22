<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>PHP - Controle de Fluxo, Ternário e Coalescing</title>
</head>
<body>

<?php
echo "<h2>Controle de Fluxo no PHP</h2>";
echo "<p>Exemplos de if, operador ternário, null coalescing (??) e switch.</p><hr>";

// ======================================================
// 1) if / else
// ======================================================
echo "<h3>if / else</h3>";

$idade = 17;

if ($idade >= 18) {
  echo "Maior de idade<br>";
} else {
  echo "Menor de idade<br>";
}
echo "<hr>";

// ======================================================
// 2) if / elseif / else
// ======================================================
echo "<h3>if / elseif / else</h3>";

$nota = 6.5;

if ($nota >= 7) {
  echo "Aprovado<br>";
} elseif ($nota >= 5) {
  echo "Recuperação<br>";
} else {
  echo "Reprovado<br>";
}
echo "<hr>";

// ======================================================
// 3) Operadores lógicos
// ======================================================
echo "<h3>Operadores lógicos</h3>";

$frequencia = 80;

if ($nota >= 7 && $frequencia >= 75) {
  echo "Aluno aprovado por nota e frequência<br>";
} else {
  echo "Aluno reprovado<br>";
}
echo "<hr>";

// ======================================================
// 4) Operador ternário
// ======================================================
echo "<h3>Operador ternário</h3>";

$resultado = ($nota >= 7) ? "Aprovado" : "Reprovado";
echo "Resultado: $resultado<br>";
echo "<hr>";

// ======================================================
// 5) Null Coalescing (??)
// ======================================================
echo "<h3>Operador Null Coalescing (??)</h3>";
echo "<p>Define um valor padrão quando a variável é <b>null</b> ou não existe.</p>";

// Simulando dados vindos da URL (?nome=Maria)
$nome = $_GET["nome"] ?? "Visitante";
$idadeUsuario = $_GET["idade"] ?? "Idade não informada";

echo "Nome: $nome<br>";
echo "Idade: $idadeUsuario<br><br>";

// Comparação com if tradicional
echo "<b>Comparação com if (isset):</b><br>";

if (isset($_GET["curso"])) {
  $curso = $_GET["curso"];
} else {
  $curso = "Curso não informado";
}

echo "Curso: $curso<br>";
echo "<hr>";

// ======================================================
// 6) switch
// ======================================================
echo "<h3>switch</h3>";

$dia = 3;

switch ($dia) {
  case 1:
    echo "Domingo<br>";
    break;
  case 2:
    echo "Segunda-feira<br>";
    break;
  case 3:
    echo "Terça-feira<br>";
    break;
  case 4:
    echo "Quarta-feira<br>";
    break;
  case 5:
    echo "Quinta-feira<br>";
    break;
  case 6:
    echo "Sexta-feira<br>";
    break;
  case 7:
    echo "Sábado<br>";
    break;
  default:
    echo "Dia inválido<br>";
}
echo "<hr>";

?>

</body>
</html>