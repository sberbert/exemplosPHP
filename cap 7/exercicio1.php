<?php
date_default_timezone_set("America/Sao_Paulo");

$hoje = new DateTime();
$anoAtual = $hoje->format("Y");

// Último dia do ano atual
$anoNovo = new DateTime("$anoAtual-12-31");

// Se hoje for depois de 31/12, calcular para o próximo ano
if ($hoje > $anoNovo) {
    $anoNovo = new DateTime(($anoAtual + 1) . "-12-31");
}

$diferenca = $hoje->diff($anoNovo);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dias para o Ano Novo</title>
</head>
<body>

<h2>Contagem Regressiva para o Ano Novo</h2>

<p>Data atual: <?= $hoje->format("d/m/Y") ?></p>

<?php if ($diferenca->days == 0): ?>

    <h3>Hoje é o último dia do ano!</h3>

<?php else: ?>

    <h3>Faltam <?= $diferenca->days ?> dias para acabar o ano.</h3>

<?php endif; ?>

</body>
</html>