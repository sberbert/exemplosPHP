<?php
    $nomes = ["Ana", "Carlos", "Marina"];
    $novoNome = $_GET['nome'] ?? null;

    if ($novoNome) {
        $nomes[] = $novoNome; //como não é persistido, vai ser perdido ao atualizar a página
    }
?>

<h2>Lista de Alunos</h2>
<ul>
    <?php foreach ($nomes as $nome): ?>
        <li><?= htmlspecialchars($nome) ?></li>
    <?php endforeach; ?>
</ul>

<form>
    <input type="text" name="nome" placeholder="Digite um nome">
    <button type="submit">Adicionar</button>
</form>