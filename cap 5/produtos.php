<?php
    $produtos = [
        ["nome" => "Notebook", "preco" => 3000],
        ["nome" => "Mouse", "preco" => 80],
        ["nome" => "Teclado", "preco" => 150]
    ];

    $total = 0;
    foreach ($produtos as $produto) {
        $total += $produto['preco'];
    }
    ?>

    <h2>Produtos</h2>
    <?php foreach ($produtos as $produto): ?>
        <p><?= $produto['nome'] ?> - R$ <?= $produto['preco'] ?></p>
    <?php endforeach; ?>

    <h3>Total: R$ <?= $total ?></h3>