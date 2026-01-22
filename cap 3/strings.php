<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>PHP - Funções Essenciais de Strings</title>
</head>
<body>

<?php
echo "<h2>Funções Essenciais de Strings no PHP</h2>";
echo "<p>Exemplos das principais funções usadas no dia a dia.</p><hr>";

// ------------------------------------------------------
// String base
// ------------------------------------------------------
$texto = "PHP é uma linguagem poderosa";

echo "<b>Texto original:</b> $texto<br><br>";

// ------------------------------------------------------
// 1) strlen() - tamanho da string
// ------------------------------------------------------
echo "<h3>strlen()</h3>";
echo "Quantidade de caracteres:<br>";
var_dump(strlen($texto));
echo "<hr>";

// ------------------------------------------------------
// 2) strtoupper() e strtolower()
// ------------------------------------------------------
echo "<h3>strtoupper() e strtolower()</h3>";

echo "Maiúsculas: " . strtoupper($texto) . "<br>";
echo "Minúsculas: " . strtolower($texto) . "<br>";
echo "<hr>";

// ------------------------------------------------------
// 3) ucfirst() e ucwords()
// ------------------------------------------------------
echo "<h3>ucfirst() e ucwords()</h3>";

echo "Primeira letra maiúscula: " . ucfirst($texto) . "<br>";
echo "Primeira letra de cada palavra: " . ucwords($texto) . "<br>";
echo "<hr>";

// ------------------------------------------------------
// 4) substr() - parte da string
// ------------------------------------------------------
echo "<h3>substr()</h3>";

echo "Primeiros 3 caracteres: " . substr($texto, 0, 3) . "<br>";
echo "A partir do índice 7: " . substr($texto, 7) . "<br>";
echo "<hr>";

// ------------------------------------------------------
// 5) str_replace() - substituir texto
// ------------------------------------------------------
echo "<h3>str_replace()</h3>";

$novoTexto = str_replace("poderosa", "versátil", $texto);
echo "Texto modificado: $novoTexto<br>";
echo "<hr>";

// ------------------------------------------------------
// 6) strpos() - posição de um texto
// ------------------------------------------------------
echo "<h3>strpos()</h3>";

$posicao = strpos($texto, "linguagem");

if ($posicao !== false) {
  echo "A palavra <b>linguagem</b> começa na posição: $posicao<br>";
} else {
  echo "Palavra não encontrada.<br>";
}
echo "<hr>";

// ------------------------------------------------------
// 7) trim() - remover espaços
// ------------------------------------------------------
echo "<h3>trim()</h3>";

$textoComEspacos = "   PHP com espaços   ";
echo "Antes: '$textoComEspacos'<br>";
echo "Depois: '" . trim($textoComEspacos) . "'<br>";
echo "<hr>";

// ------------------------------------------------------
// 8) explode() - string para array
// ------------------------------------------------------
echo "<h3>explode()</h3>";

$frase = "PHP,JavaScript,Python";
$linguagens = explode(",", $frase);

echo "String original: $frase<br>";
echo "Array gerado:<br>";
print_r($linguagens);
echo "<hr>";

// ------------------------------------------------------
// 9) implode() - array para string
// ------------------------------------------------------
echo "<h3>implode()</h3>";

$textoFinal = implode(" | ", $linguagens);
echo "Array convertido em string:<br>";
echo $textoFinal;
echo "<hr>";
?>

</body>
</html>