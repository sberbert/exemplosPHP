<?php
// Array inicial
$tarefas = ["Estudar PHP", "Fazer exercício", "Revisar aula"];

// Captura nova tarefa via GET
$novaTarefa = $_GET['tarefa'] ?? null;

// Se o usuário digitou algo, adiciona ao array
if ($novaTarefa) {
    $tarefas[] = $novaTarefa;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
</head>
<body>

<h2> Lista de Tarefas</h2>

<ul>
    <?php foreach ($tarefas as $tarefa): ?>
        <li><?= htmlspecialchars($tarefa) ?></li>
    <?php endforeach; ?>
</ul>

<p><strong>Total de tarefas:</strong> <?= count($tarefas) ?></p>

<hr>

<form>
    <input type="text" name="tarefa" placeholder="Digite uma nova tarefa">
    <button type="submit">Adicionar</button>
</form>

</body>
</html>