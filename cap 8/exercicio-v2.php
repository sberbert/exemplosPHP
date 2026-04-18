<?php

//versão que mantém os valores em casa de erro

$erro = "";
$resultado = "";

// valores padrão (evita erro no primeiro carregamento)
$nome = "";
$preco = "";
$quantidade = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = trim($_POST['nome']);
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    // VALIDAÇÃO
    if (empty($nome)) {
        $erro .= "Nome do produto é obrigatório<br>";
    }

    if (empty($preco) || $preco <= 0) {
        $erro .= "Preço deve ser maior que zero<br>";
    }

    if (empty($quantidade) || $quantidade <= 0) {
        $erro .= "Quantidade deve ser maior que zero<br>";
    }

    // PROCESSAMENTO
    if ($erro == "") {

        $total = $preco * $quantidade;

        // formatação
        $totalFormatado = number_format($total, 2, ',', '.');

        $resultado = "
            <h3>Cadastro realizado!</h3>
            <b>Produto:</b> $nome <br>
            <b>Preço:</b> R$ " . number_format($preco, 2, ',', '.') . " <br>
            <b>Quantidade:</b> $quantidade
            <hr>
            <b>Total: R$ $totalFormatado</b>
        ";

        // limpa os campos após sucesso
        $nome = "";
        $preco = "";
        $quantidade = "";        
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Produto</title>
</head>
<body>

<h2>Cadastro de Produto</h2>

<hr>

<form method="POST">

    Nome do produto:<br>
    <input type="text" name="nome" value="<?= $nome ?>"><br><br>

    Preço unitário:<br>
    <input type="number" step="0.01" name="preco" value="<?= $preco ?>"><br><br>

    Quantidade:<br>
    <input type="number" name="quantidade" value="<?= $quantidade ?>"><br><br>

    <button type="submit">Cadastrar</button>

</form>

<br>

<?php
    if ($erro != "") {
        echo "<div style='color:red'>$erro</div>";
    }

    echo $resultado;
?>

</body>
</html>