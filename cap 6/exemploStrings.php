<?php

// ==========================
// TEXTO BASE
// ==========================

$texto = "  cotil - unicamp  ";

echo "<h2>Texto original</h2>";
echo "-" . $texto . "-<br><br>";


// ==========================
// TRIM – remover espaços
// ==========================

echo "<h3>Removendo espaços</h3>";

$textoLimpo = trim($texto);

echo "Com trim(): -" . $textoLimpo . "-<br><br>";


// ==========================
// MAIÚSCULO / MINÚSCULO
// ==========================

echo "<h3>Transformação de letras</h3>";

echo "strtoupper(): " . strtoupper($textoLimpo) . "<br>";
echo "strtolower(): " . strtolower($textoLimpo) . "<br><br>";


// ==========================
// TAMANHO DA STRING
// ==========================

echo "<h3>Tamanho do texto</h3>";

echo "strlen(): " . strlen($textoLimpo) . "<br><br>";


// ==========================
// BUSCAR TEXTO (strpos)
// ==========================

echo "<h3>Buscar palavra</h3>";

$posicao = strpos($textoLimpo, "unicamp");

if ($posicao !== false) {
    echo "'unicamp' encontrada na posição: $posicao<br>";
} else {
    echo "Palavra não encontrada<br>";
}

echo "<br>";


// ==========================
// SUBSTITUIR TEXTO
// ==========================

echo "<h3>Substituição</h3>";

echo str_replace("unicamp", "UNICAMP", $textoLimpo) . "<br><br>";


// ==========================
// EXTRAIR PARTE DO TEXTO
// ==========================

echo "<h3>Extração de parte da string</h3>";

echo "substr(0, 5): " . substr($textoLimpo, 0, 5) . "<br><br>";


// ==========================
// CONCATENAÇÃO E INTERPOLAÇÃO
// ==========================

echo "<h3>Concatenação e Interpolação</h3>";

$nome = "Simone";

// concatenação
echo "Concatenação: Olá, " . $nome . "<br>";

// interpolação
echo "Interpolação: Olá, $nome<br><br>";


// ==========================
// SEGURANÇA BÁSICA
// ==========================

echo "<h3>htmlspecialchars()</h3>";

$entradaUsuario = "<b>Texto em negrito</b>";

echo "Sem proteção: $entradaUsuario<br>";
echo "Com htmlspecialchars(): " . htmlspecialchars($entradaUsuario) . "<br>";

?>