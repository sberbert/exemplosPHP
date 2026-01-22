<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>A Linguagem PHP</title>
</head>
<body>

<?php
// ======================================================
// 1) Saída básica com echo
// ======================================================
echo "Hello World! <br><br>";
echo "<b>Olá Mundo</b><br><br>";

// ======================================================
// 2) Variáveis: criação, tipo dinâmico e exibição
// ======================================================
echo "<h3>Variáveis</h3>";

// String
$nome = "COTIL";
echo "Valor de \$nome: $nome<br><br>";

// var_dump mostra tipo, tamanho e valor
echo "<br><br>";

// Outra string
$outroNome = "UNICAMP";

// Concatenação (usando .)
echo "Concatenação: " . $nome . " " . $outroNome . "<br>";

// Interpolação (funciona com aspas duplas)
echo "Interpolação: $nome $outroNome<br><br>";

// ======================================================
// 3) Unset e isset (existência da variável)
// ======================================================
echo "<h3>unset() e isset()</h3>";

unset($nome); // remove a variável do escopo

if (isset($nome)) {
  echo "Ainda existe: $nome<br><br>";
} else {
  echo "A variável \$nome não existe mais (foi removida com unset).<br><br>";
}

// ======================================================
// 4) Tipos comuns: int, float, boolean
// ======================================================
echo "<h3>Tipos comuns</h3>";

// Float
$valor = 50.15;
echo "Float \$valor: $valor<br>";
var_dump($valor);
echo "<br><br>";

// Boolean (echo pode confundir: true vira "1" e false não imprime nada)
$aprovado = true;
echo "Boolean \$aprovado (formatado): " . ($aprovado ? "true" : "false") . "<br>";
var_dump($aprovado);
echo "<br><br>";

// ======================================================
// 5) Arrays
// ======================================================
echo "<h3>Arrays</h3>";

// arrays
$disciplinas = ["BD", "LP", "DAW"];
echo "Disciplinas: ";
print_r($disciplinas);
echo "<br>";

echo "A posição 2 do array (\$disciplinas[2]): " . $disciplinas[2] . "<br><br>";

// ======================================================
// 6) Null e string vazia
// ======================================================
echo "<h3>Null e vazio</h3>";

$nulo  = NULL;
$vazio = "";

echo "\$nulo: ";
var_dump($nulo);
echo "<br>";

echo "\$vazio: ";
var_dump($vazio);
echo "<br><br>";

// ======================================================
// 7) Constantes
// ======================================================
echo "<h3>Constantes</h3>";

//constantes - const
const PI = 3.14;
const NOME_ALUNO = "Maria";

// define() - constantes - mais antigo - cod procedura
//define("PI", 3.14);
//define("NOME_ALUNO", "Maria");

// (Opcional) existe também: const PI2 = 3.14; (fora de blocos)
$resultado = 3 * PI;

echo "3 * PI = $resultado<br>";
echo "Nome do Aluno: " . NOME_ALUNO . "<br><br>";

// ======================================================
// 8) Superglobais: $_SERVER e $_GET
// ======================================================
echo "<h3>Superglobais</h3>";
echo "<b>\$_SERVER</b><br>";

echo "SERVER_ADDR: " . ($_SERVER["SERVER_ADDR"] ?? "N/D") . "<br>";
echo "SERVER_NAME: " . ($_SERVER["SERVER_NAME"] ?? "N/D") . "<br>";
echo "HTTP_USER_AGENT: " . ($_SERVER["HTTP_USER_AGENT"] ?? "N/D") . "<br>";
echo "REMOTE_ADDR: " . ($_SERVER["REMOTE_ADDR"] ?? "N/D") . "<br>";
echo "SCRIPT_NAME: " . ($_SERVER["SCRIPT_NAME"] ?? "N/D") . "<br><br>";

// $_GET pode não existir se o parâmetro não vier na URL
echo "<b>\$_GET</b><br>";
echo "Exemplo de URL: ?x=10&y=20<br><br>";

$x = $_GET["x"] ?? "(não veio x)";
$y = $_GET["y"] ?? "(não veio y)";

echo "x = $x<br>";
echo "y = $y<br>";

?>
</body>
</html>