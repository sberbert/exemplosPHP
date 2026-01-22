<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>PHP - Tipagem Dinâmica</title>
</head>
<body>

<?php
echo "<h2>Tipagem Dinâmica no PHP</h2>";
echo "<p>No PHP, o tipo da variável depende do valor atribuído.</p><hr>";

// ------------------------------------------------------
// Variável mudando de tipo ao longo do código
// ------------------------------------------------------

$valor = 10; // inteiro
echo "<b>Valor inicial:</b> 10<br>";
var_dump($valor);
echo "<hr>";

$valor = 10.5; // float
echo "<b>Agora o valor é:</b> 10.5<br>";
var_dump($valor);
echo "<hr>";

$valor = "dez"; // string
echo "<b>Agora o valor é:</b> \"dez\"<br>";
var_dump($valor);
echo "<hr>";

$valor = true; // boolean
echo "<b>Agora o valor é:</b> true<br>";
var_dump($valor);
echo "<hr>";

$valor = null; // null
echo "<b>Agora o valor é:</b> null<br>";
var_dump($valor);
echo "<hr>";

// ------------------------------------------------------
// Conversão automática de tipos (coerção)
// ------------------------------------------------------

echo "<h3>Conversão automática de tipos</h3>";

$valor = "10"; // string
echo "Valor atual (string): \"10\"<br>";
var_dump($valor);
echo "<br><br>";

$resultado = $valor + 5; // PHP converte automaticamente
echo "Resultado de \"10\" + 5:<br>";
var_dump($resultado);
echo "<br><br>";
?>

</body>
</html>