<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>PHP - Arrays Essenciais</title>
</head>
<body>

<?php
echo "<h2>Arrays Essenciais no PHP</h2>";
echo "<p>Exemplos dos principais tipos e funções de arrays.</p><hr>";

// ------------------------------------------------------
// 1) Array indexado
// ------------------------------------------------------
echo "<h3>Array indexado</h3>";

$cores = ["Azul", "Verde", "Vermelho"];

echo "Array completo:<br>";
print_r($cores);
echo "<br>";

echo "Elemento da posição 1: " . $cores[1] . "<br><br>";

// ------------------------------------------------------
// 2) Array associativo
// ------------------------------------------------------
echo "<h3>Array associativo</h3>";

$aluno = [
  "nome"  => "Maria",
  "idade" => 20,
  "curso" => "Informática"
];

echo "Nome do aluno: " . $aluno["nome"] . "<br>";
echo "Idade: " . $aluno["idade"] . "<br>";
echo "Curso: " . $aluno["curso"] . "<br><br>";

// ------------------------------------------------------
// 3) foreach - percorrer arrays
// ------------------------------------------------------
echo "<h3>foreach</h3>";

echo "<b>Array indexado:</b><br>";
foreach ($cores as $cor) {
  echo "- $cor<br>";
}

echo "<br><b>Array associativo:</b><br>";
foreach ($aluno as $chave => $valor) {
  echo "$chave: $valor<br>";
}
echo "<br>";

// ------------------------------------------------------
// 4) count() - quantidade de elementos
// ------------------------------------------------------
echo "<h3>count()</h3>";

echo "Quantidade de cores: " . count($cores) . "<br><br>";

// ------------------------------------------------------
// 5) array_push() e array_pop()
// ------------------------------------------------------
echo "<h3>array_push() e array_pop()</h3>";

array_push($cores, "Amarelo");
echo "Após array_push:<br>";
print_r($cores);
echo "<br>";

$removido = array_pop($cores);
echo "Elemento removido: $removido<br>";
print_r($cores);
echo "<br><br>";

// ------------------------------------------------------
// 6) in_array() - verificar existência
// ------------------------------------------------------
echo "<h3>in_array()</h3>";

if (in_array("Verde", $cores)) {
  echo "A cor Verde existe no array.<br>";
} else {
  echo "A cor Verde não existe no array.<br>";
}
echo "<br>";

// ------------------------------------------------------
// 7) sort() e rsort()
// ------------------------------------------------------
echo "<h3>sort() e rsort()</h3>";

sort($cores);
echo "Ordem crescente:<br>";
print_r($cores);
echo "<br>";

rsort($cores);
echo "Ordem decrescente:<br>";
print_r($cores);
echo "<br><br>";

// ------------------------------------------------------
// 8) Array multidimensional
// ------------------------------------------------------
echo "<h3>Array multidimensional</h3>";

$alunos = [
  ["nome" => "Ana",   "nota" => 8.5],
  ["nome" => "João",  "nota" => 6.0],
  ["nome" => "Carlos","nota" => 9.0]
];

foreach ($alunos as $a) {
  echo "Aluno: " . $a["nome"] . " - Nota: " . $a["nota"] . "<br>";
}
?>

</body>
</html>