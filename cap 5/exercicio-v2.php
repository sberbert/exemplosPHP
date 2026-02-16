<?php
// Array inicial
$tarefas = ["Estudar PHP", "Fazer exercício", "Revisar aula"];

// Adicionar nova tarefa
$novaTarefa = $_GET['tarefa'] ?? null;

if ($novaTarefa) {
    $tarefas[] = $novaTarefa;
}

// Remover tarefa pelo índice
$remover = $_GET['remover'] ?? null;

if ($remover !== null && isset($tarefas[$remover])) {
    unset($tarefas[$remover]);
}

// Filtro opcional (tarefas com mais de 10 caracteres)
$filtro = $_GET['filtrar'] ?? null;

if ($filtro) {
    $tarefas = array_filter($tarefas, function($t) {
        return strlen($t) > 10;
    });
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
</head>
<body>

<h2>Lista de Tarefas</h2>

<ul>
    <?php foreach ($tarefas as $indice => $tarefa): ?>
        <li>
            <?= htmlspecialchars($tarefa) ?>
            <a href="?remover=<?= $indice ?>">❌</a>
        </li>
    <?php endforeach; ?>
</ul>

<p><strong>Total:</strong> <?= count($tarefas) ?></p>

<hr>

<h3>Adicionar nova tarefa</h3>
<form>
    <input type="text" name="tarefa" placeholder="Digite uma nova tarefa">
    <button type="submit">Adicionar</button>
</form>

<hr>

<h3>Filtro</h3>
<a href="?filtrar=1">Mostrar apenas tarefas longas</a>

</body>
</html>