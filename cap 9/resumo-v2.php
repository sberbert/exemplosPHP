<?php
    session_start();

    // Segurança: verificar se os dados existem
    if (!isset($_SESSION['produto'])) {
        echo "Nenhum dado encontrado!";
        exit;
    }

    $produto    = $_SESSION['produto'];
    $quantidade = $_SESSION['quantidade'];
?>

<h2>Resumo do Pedido</h2>
<p>Produto:    <?php echo $produto; ?></p>
<p>Quantidade: <?php echo $quantidade; ?></p>

<a href="finalizar.php">Finalizar</a>