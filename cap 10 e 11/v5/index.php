<?php
    require 'config.php';

    //para mensagens    
    $sucesso = $_GET['sucesso'] ?? '';
    $excluido = $_GET['excluido'] ?? '';

    $erro = "";
    $sucesso = "";

    $nome = "";
    $preco = "";
    $quantidade = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nome = trim($_POST['nome']);
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];

        // VALIDAÇÃO
        if (empty($nome)) {
            $erro .= "Nome obrigatório<br>";
        }

        if (empty($preco) || $preco <= 0) {
            $erro .= "Preço inválido<br>";
        }

        if (empty($quantidade) || $quantidade <= 0) {
            $erro .= "Quantidade inválida<br>";
        }

        // CADASTRO
        if ($erro == "") {

            $sql = "INSERT INTO produtos(nome, preco, quantidade)
                    VALUES ('$nome', '$preco', '$quantidade')";

            $executaQuery = $conn->query($sql);

            if ($executaQuery) {

                $sucesso = "Produto cadastrado com sucesso!";

                // limpa formulário
                $nome = "";
                $preco = "";
                $quantidade = "";

            } else {
                $erro = "Erro ao cadastrar produto";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h2>➕ Cadastro de Produtos</h2>
    <hr>

    <form method="POST">
        Nome do produto:<br>
        <input type="text" name="nome" value="<?= $nome ?>">
        <br><br>

        Preço:<br>
        <input type="number" step="0.01" name="preco" value="<?= $preco ?>">
        <br><br>

        Quantidade:<br>
        <input type="number" name="quantidade" value="<?= $quantidade ?>">
        <br><br>

        <button type="submit">✅ Cadastrar</button>
    </form>
    <br>

    <?php
        if ($erro != "") {
            echo "<div style='color:red'>$erro</div>";
        }

        if ($sucesso != "") {
            echo "<div style='color:green'>$sucesso</div>";
        }
    ?>

    <hr>
    <a href="listar.php">🔎 Ver Produtos Cadastrados</a>

</body>
</html>