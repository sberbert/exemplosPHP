<?php
    $nome = $_GET['nome'] ?? '';
    $nome = trim($nome);
    $mensagem = '';

    if ($nome) {
        if (strlen($nome) < 3) {
            $mensagem = "Nome muito curto.";
        } else {
            $mensagem = "Olá, " . htmlspecialchars(strtoupper($nome));
        }
    }
?>

<form>
    <input type="text" name="nome" placeholder="Digite seu nome">
    <button type="submit">Enviar</button>
</form>

<p><?= $mensagem ?></p>