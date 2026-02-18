<?php
    date_default_timezone_set("America/Sao_Paulo");
    //date_default_timezone_set("Asia/Tokyo");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Datas e Tempo</title>
</head>
<body>

<h1>Datas e Tempo no PHP</h1>
<hr>

<!-- ===================================================== -->
<h2>1 - Data Atual - date()</h2>

<p>Data atual: <?= date("d/m/Y") ?></p>
<p>Data e hora: <?= date("d/m/Y H:i:s") ?></p>

<hr>

<!-- ===================================================== -->
<h2>2 - Timestamp - time()</h2>

<p>Timestamp atual: <?= time() ?></p>
<p>Convertendo timestamp para data: <?= date("d/m/Y", time()) ?></p>

<hr>

<!-- ===================================================== -->
<h2>3 - strtotime()</h2>

<?php
    $dataConvertida = strtotime("2026-12-25");
?>

<p>Timestamp de 25/12/2026: <?= $dataConvertida ?></p>
<p>Convertendo para data: <?= date("d/m/Y", $dataConvertida) ?></p>

<hr>

<!-- ===================================================== -->
<h2>4 - mktime()</h2>

<?php
    $dataCriada = mktime(0, 0, 0, 12, 31, 2026);
?>

<p>Timestamp criado com mktime(): <?= $dataCriada ?></p>
<p>Data correspondente: <?= date("d/m/Y", $dataCriada) ?></p>

<hr>

<!-- ===================================================== -->
<h2>5 - DateTime (Forma Moderna)</h2>

<?php
    $data = new DateTime();
?>

<p>Data atual com DateTime: <?= $data->format("d/m/Y H:i") ?></p>

<hr>

<!-- ===================================================== -->
<h2>6 - Somar / Subtrair Datas</h2>

<?php
    $prazo = new DateTime();
    $prazo->modify("+7 days");
?>

<p>Data daqui 7 dias: <?= $prazo->format("d/m/Y") ?></p>

<hr>

<!-- ===================================================== -->
<h2>7 - Diferença Entre Datas</h2>

<?php
    $data1 = new DateTime("2000-05-10");
    $data2 = new DateTime();

    $diferenca = $data1->diff($data2);
?>

<p>Diferença desde 10/05/2000:</p>
<ul>
    <li><?= $diferenca->y ?> anos</li>
    <li><?= $diferenca->m ?> meses</li>
    <li><?= $diferenca->d ?> dias</li>
    <li>Total de dias: <?= $diferenca->days ?></li>
</ul>

</body>
</html>