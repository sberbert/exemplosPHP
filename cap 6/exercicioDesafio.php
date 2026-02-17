<?php
    $texto = $_GET['texto'] ?? '';
    $textoLimpo = trim($texto);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercício Strings</title>
</head>
<body>

<h2>Exercício - Manipulação de Texto</h2>

<form>
    <input type="text" name="texto" placeholder="Digite um texto" size="40">
    <button type="submit">Enviar</button>
</form>

<hr>

<?php if ($texto): ?>

    <h3>Texto sem espaços:</h3>
    <?= htmlspecialchars($textoLimpo) ?>

    <h3>Quantidade de caracteres:</h3>
    <?= strlen($textoLimpo) ?>

    <h3>Maiúsculo:</h3>
    <?= strtoupper($textoLimpo) ?>

    <h3>Contém a palavra "php"?</h3>
    <?php
        if (strpos(strtolower($textoLimpo), "php") !== false) {
            echo "Sim, contém.";
        } else {
            echo "Não contém.";
        }
    ?>

    <h3>Substituição:</h3>
    <?= str_replace("php", "LINGUAGEM PHP", strtolower($textoLimpo)) ?>

    <h3>Primeiros 3 caracteres:</h3>
    <?= substr($textoLimpo, 0, 3) ?>

    <h3>Protegido com htmlspecialchars():</h3>
    <?= htmlspecialchars($texto) ?>

<?php endif; ?>

</body>
</html>